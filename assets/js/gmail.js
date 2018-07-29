    var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var perPage = 15;
    var currentInboxPage = 1;
    var currentSentPage = 1;
    var currentDraftPage = 1;
    var currentTrashPage = 1;
    var showingInbox = true;
    var showingSent = false;
    var showingDrafts = false;
    var showingTrash = false;
    var allMessages;
    var previousMessages;
    var firstPageLoad = true;
    var inboxLoaded = false;
    var sentMessagesLoaded = false;
    var draftMessagesLoaded = false;
    var trashMessagesLoaded = false;
    var recipientArray = [];
    var retrievedMessages = [];
    var retrievedSentMessages = [];
    var retrievedDraftMessages = [];
    var retrievedTrashMessages = [];
    var labelArray = ["INBOX", "SENT", "DRAFT", "TRASH"];
    var selectedEmail;
    var selectedEmailLi;
    // Client ID and API key from the Developer Console
    var CLIENT_ID = '199528804001-7dj1br8mm8le62dhfo2465666ikobfrt.apps.googleusercontent.com';
    // Array of API discovery doc URLs for APIs used by the quickstart
    var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/gmail/v1/rest"];
    // Authorization scopes required by the API; multiple scopes can be
    // included, separated by spaces.
    var SCOPES = 'https://www.googleapis.com/auth/gmail.modify';
    /**
     *  On load, called to load the auth2 library and API client library.
     */
    function handleClientLoad() {
        gapi.load('client:auth2', initClient);
    }
    /**
     *  Initializes the API client library and sets up sign-in state
     *  listeners.
     */
    function initClient() {
        gapi.client.init({
            discoveryDocs: DISCOVERY_DOCS,
            clientId: CLIENT_ID,
            scope: SCOPES
        }).then(function() {
            // Listen for sign-in state changes.
            gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);
            // Handle the initial sign-in state.
            updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
            $("#gAuthorizeBtn").click(function(e) {
                handleAuthClick(e);
            });
            $("#gSignOutBtn").click(function(e) {
                handleSignoutClick(e);
            });
        });
    }
    /**
     *  Called when the signed in status changes, to update the UI
     *  appropriately. After a sign-in, the API is called.
     */
    function updateSigninStatus(isSignedIn) {
        if (isSignedIn) {
            $("#gAuthorizeBtn").hide();
            $("#gSignOutBtn").show();
            listMessages();
        } else {
            $("#gAuthorizeBtn").show();
            $("#gSignOutBtn").hide();
            App.init();
            firstPageLoad = false;
        }
    }
    /**
     *  Sign in the user upon button click.
     */
    function handleAuthClick(event) {
        gapi.auth2.getAuthInstance().signIn();
    }
    /**
     *  Sign out the user upon button click.
     */
    function handleSignoutClick(event) {
        gapi.auth2.getAuthInstance().signOut();
        location.reload();
    }
    /**
     * Append a pre element to the body containing the given message
     * as its text node. Used to display the results of the API call.
     *
     * @param {string} message Text to be placed in pre element.
     */
    function appendPre(message) {
        console.log(message);
    }
    /**
     * Print all Labels in the authorized user's inbox. If no labels
     * are found an appropriate message is printed.
     */
    function listLabels() {
        gapi.client.gmail.users.labels.list({
            'userId': 'me'
        }).then(function(response) {
            var labels = response.result.labels;
            appendPre('Labels:');
            if (labels && labels.length > 0) {
                for (i = 0; i < labels.length; i++) {
                    var label = labels[i];
                    appendPre(label.name)
                }
            } else {
                appendPre('No Labels found.');
            }
        });
    }

    function listMessages() {
        $("#deleteGrp").show();
        showingInbox = true;
        showingSent = false;
        showingDrafts = false;
        showingTrash = false;
        if (!inboxLoaded) {
            retrievedMessages = [];
            request = gapi.client.gmail.users.messages.list({
                'userId': "me",
                "labelIds": ["INBOX"],
                "maxResults": 250
            }).then(function(response) {
                if (response.result.resultSizeEstimate == 0) { //no emails with this label
                    allMessages = $("#trashEmailList").children("li");
                    $("#pageCount").html("Page 0 of 0");
                    $("#loadingPopup").hide();
                    inboxLoaded = true;
                    if (!$("#emailOverview").is(":visible")) {
                        $("#emailOverview").show();
                        $("#emailDetails").hide();
                        $("#emailBody").html("");
                    }
                    return;
                }
                var messages = response.result.messages;
                var msgCount = 0;
                var unreadCount = 0;
                for (var i = 0; i < messages.length; i++) {
                    gapi.client.gmail.users.messages.get({
                        'userId': "me",
                        'id': messages[i].id
                    }).then(function(response) {
                        retrievedMessages.push(response);
                        msgCount++;
                        if (msgCount == messages.length) {
                            retrievedMessages.sort(function(a, b) {
                                return a.result.internalDate == b.result.internalDate ? 0 : +(a.result.internalDate < b.result.internalDate) || -1; //sort array by date, newest to oldest
                            });
                            var displayedMessages = 0;
                            for (var n = 0; n < retrievedMessages.length; n++) {
                                var rMessage = retrievedMessages[n];
                                var subject;
                                var from;
                                var mDate;
                                var labels = rMessage.result.labelIds;
                                var headers = rMessage.result.payload.headers;
                                for (var j = 0; j < headers.length; j++) {
                                    if (headers[j].name == "Subject") {
                                        subject = headers[j].value;
                                    }
                                    if (headers[j].name == "From") {
                                        from = headers[j].value.replace(/['"]+/g, '');
                                        if (recipientArray.indexOf(from) == -1) {
                                            recipientArray.push(from);
                                        }
                                    }
                                    if (headers[j].name == "Date") {
                                        mDate = new Date(headers[j].value);
                                        mDate = mDate.getDate() + ". " + months[mDate.getMonth()];
                                    }
                                }
                                var isRead = (labels.indexOf("UNREAD") == -1);
                                var isImportant = (labels.indexOf("IMPORTANT") != -1)
                                var isStarred = (labels.indexOf("STARRED") != -1);
                                var emailStatus = "read";
                                var importanceColor = "danger";
                                var starIcon = "far fa-star";
                                if (!isRead) {
                                    emailColor = "unread";
                                    unreadCount++;
                                }
                                if (isImportant) {
                                    importanceColor = "success";
                                }
                                if (isStarred) {
                                    starIcon = "fa fa-star";
                                }
                                var labelColor = "blue";
                                if (displayedMessages < perPage) {
                                    $("#emailList").append('<li class="list-group-item ' + emailStatus + '">' +
                                        '<div class="email-checkbox">' +
                                        '<label>' +
                                        '<i class="far fa-square"></i>' +
                                        '<input type="checkbox" data-checked="email-checkbox">' +
                                        '</label>' +
                                        '</div>' +
                                        '<div class="email-checkbox">' +
                                        '<i onClick="toggleStarred(this,' + n + ')" class="' + starIcon + ' text-warning"></i>' +
                                        '</div>' +
                                        '<div class="email-checkbox">' +
                                        '<i onClick="toggleImportant(this,' + n + ')" class="fas fa-bolt text-' + importanceColor + '"></i></span>' +
                                        '</div>' +
                                        '<div class="email-user m-r-10 bg-' + labelColor + '">' +
                                        '<span class="text-white">' + from.substring(0, 1).toUpperCase() + '</span>' +
                                        '</div>' +
                                        '<div class="email-info">' +
                                        '<div>' +
                                        '<span class="email-time">' + mDate + '</span>' +
                                        '<span class="email-sender">' + from + '</span>' +
                                        '<span class="email-title">' + subject + '</span>' +
                                        '<span class="email-desc">' + rMessage.result.snippet.substring(0, 60) + "..." + '</span>' +
                                        '</div>' +
                                        '</div>' +
                                        '</li>');
                                } else {
                                    $("#emailList").append('<li class="list-group-item hideMe">' +
                                        '<div class="email-checkbox">' +
                                        '<label>' +
                                        '<i class="far fa-square"></i>' +
                                        '<input type="checkbox" data-checked="email-checkbox">' +
                                        '</label>' +
                                        '</div>' +
                                        '<div class="email-checkbox">' +
                                        '<i onClick="toggleStarred(this,' + n + ')" class="' + starIcon + ' text-warning"></i>' +
                                        '</div>' +
                                        '<div class="email-checkbox">' +
                                        '<i onClick="toggleImportant(this,' + n + ')" class="fas fa-bolt text-' + importanceColor + '"></i></span>' +
                                        '</div>' +
                                        '<div class="email-user m-r-10 bg-' + labelColor + '">' +
                                        '<span class="text-white">F</span>' +
                                        '</div>' +
                                        '<div class="email-info">' +
                                        '<div>' +
                                        '<span class="email-time">' + mDate + '</span>' +
                                        '<span class="email-sender">' + from + '</span>' +
                                        '<span class="email-title">' + subject + '</span>' +
                                        '<span class="email-desc">' + rMessage.result.snippet.substring(0, 60) + "..." + '</span>' +
                                        '</div>' +
                                        '</div>' +
                                        '</li>');
                                }
                                displayedMessages++;
                            }
                            allMessages = $("#emailList").children("li");
                            $("#pageCount").html("Page 1 of " + Math.ceil(allMessages.length / perPage));
                            previousMessages = allMessages.slice(0, perPage);
                            if (unreadCount > 0) {
                                $("#nrOfUnread").html(unreadCount);
                            } else {
                                $("#nrOfUnread").hide();
                            }
                            if (firstPageLoad) {
                                App.init();
                                firstPageLoad = false;
                            }
                            inboxLoaded = true;
                            if (!$("#emailOverview").is(":visible")) {
                                $("#emailOverview").show();
                                $("#emailDetails").hide();
                                $("#emailBody").html("");
                            }
                        }
                    });
                }
            });
        } else {
            allMessages = $("#emailList").children("li");
            $("#pageCount").html("Page " + currentInboxPage + " of " + Math.ceil(allMessages.length / perPage));
            var offset = (currentInboxPage - 1) * perPage;
            previousMessages = allMessages.slice(offset, currentInboxPage * perPage);
            if (!$("#emailOverview").is(":visible")) {
                $("#emailOverview").show();
                $("#emailDetails").hide();
                $("#emailBody").html("");
            }
        }
    }

    function toggleImportant(item, index) {
        var email = retrievedMessages[index];
        if (showingSent) {
            email = retrievedSentMessages[index];
        } else if (showingDrafts) {
            email = retrievedDraftMessages[index];
        } else if (showingTrash) {
            email = retrievedTrashMessages[index];
        }
        var labels = email.result.labelIds;
        var isImportant = (labels.indexOf("IMPORTANT") != -1);
        if (isImportant) {
            $(item).removeClass("text-success");
            $(item).addClass("text-danger");
            gapi.client.gmail.users.messages.modify({
                'userId': "me",
                'id': email.result.id,
                'removeLabelIds': ["IMPORTANT"]
            }).then(function(response) {
                labels.splice(labels.indexOf("IMPORTANT"), 1);
                $.gritter.add({
                    title: 'E-mail unmarked',
                    time: 1500,
                    text: 'Selected e-mail is now marked as unimportant'
                });
            });
        } else {
            $(item).removeClass("text-danger");
            $(item).addClass("text-success");
            gapi.client.gmail.users.messages.modify({
                'userId': "me",
                'id': email.result.id,
                'addLabelIds': ["IMPORTANT"]
            }).then(function(response) {
                labels.push("IMPORTANT");
                $.gritter.add({
                    title: 'E-mail marked',
                    time: 1500,
                    text: 'Selected e-mail is now marked as important'
                });
            });
        }
    }

    function toggleStarred(item, index) {
        var email = retrievedMessages[index];
        if (showingSent) {
            email = retrievedSentMessages[index];
        } else if (showingDrafts) {
            email = retrievedDraftMessages[index];
        } else if (showingTrash) {
            email = retrievedTrashMessages[index];
        }
        var labels = email.result.labelIds;
        var isStarred = (labels.indexOf("STARRED") != -1);
        if (isStarred) {
            $(item).removeClass("fa fa-star");
            $(item).addClass("far fa-star");
            gapi.client.gmail.users.messages.modify({
                'userId': "me",
                'id': email.result.id,
                'removeLabelIds': ["STARRED"]
            }).then(function(response) {
                labels.splice(labels.indexOf("STARRED"), 1);
            });
        } else {
            $(item).removeClass("far fa-star");
            $(item).addClass("fa fa-star");
            gapi.client.gmail.users.messages.modify({
                'userId': "me",
                'id': email.result.id,
                'addLabelIds': ["STARRED"]
            }).then(function(response) {
                labels.push("STARRED");
            });
        }
    }

    function listSentMessages() {
        $("#deleteGrp").show();
        showingSent = true;
        showingInbox = false;
        showingDrafts = false;
        showingTrash = false;
        if (!sentMessagesLoaded) {
            retrievedSentMessages = [];
            if (!firstPageLoad) {
                $("#loadingPopup").show();
            }
            request = gapi.client.gmail.users.messages.list({
                'userId': "me",
                "labelIds": ["SENT"],
                "maxResults": 250
            }).then(function(response) {
                if (response.result.resultSizeEstimate == 0) { //no emails with this label
                    allMessages = $("#trashEmailList").children("li");
                    $("#pageCount").html("Page 0 of 0");
                    $("#loadingPopup").hide();
                    sentMessagesLoaded = true;
                    if (!$("#emailOverview").is(":visible")) {
                        $("#emailOverview").show();
                        $("#emailDetails").hide();
                        $("#emailBody").html("");
                    }
                    return;
                }
                var messages = response.result.messages;
                var msgCount = 0;
                for (var i = 0; i < messages.length; i++) {
                    gapi.client.gmail.users.messages.get({
                        'userId': "me",
                        'id': messages[i].id
                    }).then(function(response) {
                        retrievedSentMessages.push(response);
                        msgCount++;
                        if (msgCount == messages.length) {
                            retrievedSentMessages.sort(function(a, b) {
                                return a.result.internalDate == b.result.internalDate ? 0 : +(a.result.internalDate < b.result.internalDate) || -1; //sort array by date, newest to oldest
                            });
                            var displayedMessages = 0;
                            for (var n = 0; n < retrievedSentMessages.length; n++) {
                                var rMessage = retrievedSentMessages[n];
                                var subject;
                                var to;
                                var mDate;
                                var labels = rMessage.result.labelIds;
                                var headers = rMessage.result.payload.headers;
                                for (var j = 0; j < headers.length; j++) {
                                    if (headers[j].name == "Subject") {
                                        subject = headers[j].value;
                                    }
                                    if (headers[j].name == "To") {
                                        to = headers[j].value.replace(/['"]+/g, '');
                                        if (recipientArray.indexOf(to) == -1) {
                                            recipientArray.push(to);
                                        }
                                    }
                                    if (headers[j].name == "Date") {
                                        mDate = new Date(headers[j].value);
                                        mDate = mDate.getDate() + ". " + months[mDate.getMonth()];
                                    }
                                }
                                var emailStatus = "";
                                var isImportant = (labels.indexOf("IMPORTANT") == -1)
                                var importanceColor = "danger";
                                if (isImportant) {
                                    importanceColor = "success";
                                }
                                var labelColor = "blue";
                                if (displayedMessages < perPage) {
                                    $("#sentEmailList").append('<li class="list-group-item ' + emailStatus + '">' +
                                        '<div class="email-checkbox">' +
                                        '<label>' +
                                        '<i class="far fa-square"></i>' +
                                        '<input type="checkbox" data-checked="email-checkbox">' +
                                        '</label>' +
                                        '</div>' +
                                        '<div class="email-checkbox">' +
                                        '<i onClick="toggleImportant(this,' + n + ')" class="fas fa-bolt text-' + importanceColor + '"></i></span>' +
                                        '</div>' +
                                        '<div class="email-user m-r-10 bg-' + labelColor + '">' +
                                        '<span class="text-white">' + to.substring(0, 1).toUpperCase() + '</span>' +
                                        '</div>' +
                                        '<div class="email-info">' +
                                        '<div>' +
                                        '<span class="email-time">' + mDate + '</span>' +
                                        '<span class="email-sender">' + to + '</span>' +
                                        '<span class="email-title">' + subject + '</span>' +
                                        '<span class="email-desc">' + rMessage.result.snippet.substring(0, 60) + "..." + '</span>' +
                                        '</div>' +
                                        '</div>' +
                                        '</li>');
                                } else {
                                    $("#sentEmailList").append('<li class="list-group-item hideMe ' + emailStatus + '">' +
                                        '<div class="email-checkbox">' +
                                        '<label>' +
                                        '<i class="far fa-square"></i>' +
                                        '<input type="checkbox" data-checked="email-checkbox">' +
                                        '</label>' +
                                        '</div>' +
                                        '<div class="email-checkbox">' +
                                        '<i onClick="toggleImportant(this,' + n + ')" class="fas fa-bolt text-' + importanceColor + '"></i></span>' +
                                        '</div>' +
                                        '<div class="email-user m-r-10 bg-' + labelColor + '">' +
                                        '<span class="text-white">' + to.substring(0, 1).toUpperCase() + '</span>' +
                                        '</div>' +
                                        '<div class="email-info">' +
                                        '<div>' +
                                        '<span class="email-time">' + mDate + '</span>' +
                                        '<span class="email-sender">' + to + '</span>' +
                                        '<span class="email-title">' + subject + '</span>' +
                                        '<span class="email-desc">' + rMessage.result.snippet.substring(0, 60) + "..." + '</span>' +
                                        '</div>' +
                                        '</div>' +
                                        '</li>');
                                }
                                displayedMessages++;
                            }
                            allMessages = $("#sentEmailList").children("li");
                            $("#pageCount").html("Page 1 of " + Math.ceil(allMessages.length / perPage));
                            previousMessages = allMessages.slice(0, perPage);
                            $("#loadingPopup").hide();
                            sentMessagesLoaded = true;
                            if (!$("#emailOverview").is(":visible")) {
                                $("#emailOverview").show();
                                $("#emailDetails").hide();
                                $("#emailBody").html("");
                            }
                        }
                    });
                }
            });
        } else {
            allMessages = $("#sentEmailList").children("li");
            $("#pageCount").html("Page " + currentSentPage + " of " + Math.ceil(allMessages.length / perPage));
            var offset = (currentSentPage - 1) * perPage;
            previousMessages = allMessages.slice(offset, currentSentPage * perPage);
            if (!$("#emailOverview").is(":visible")) {
                $("#emailOverview").show();
                $("#emailDetails").hide();
                $("#emailBody").html("");
            }
        }
    }

    function listDraftMessages() {
        $("#deleteGrp").show();
        showingSent = false;
        showingInbox = false;
        showingDrafts = true;
        showingTrash = false;
        if (!draftMessagesLoaded) {
            retrievedDraftMessages = [];
            if (!firstPageLoad) {
                $("#loadingPopup").show();
            }
            request = gapi.client.gmail.users.messages.list({
                'userId': "me",
                "labelIds": ["DRAFT"],
                "maxResults": 250
            }).then(function(response) {
                if (response.result.resultSizeEstimate == 0) { //no emails with this label
                    allMessages = $("#trashEmailList").children("li");
                    $("#pageCount").html("Page 0 of 0");
                    $("#loadingPopup").hide();
                    draftMessagesLoaded = true;
                    if (!$("#emailOverview").is(":visible")) {
                        $("#emailOverview").show();
                        $("#emailDetails").hide();
                        $("#emailBody").html("");
                    }
                    return;
                }
                var messages = response.result.messages;
                var msgCount = 0;
                for (var i = 0; i < messages.length; i++) {
                    gapi.client.gmail.users.messages.get({
                        'userId': "me",
                        'id': messages[i].id
                    }).then(function(response) {
                        retrievedDraftMessages.push(response);
                        msgCount++;
                        if (msgCount == messages.length) {
                            retrievedDraftMessages.sort(function(a, b) {
                                return a.result.internalDate == b.result.internalDate ? 0 : +(a.result.internalDate < b.result.internalDate) || -1; //sort array by date, newest to oldest
                            });
                            var displayedMessages = 0;
                            for (var n = 0; n < retrievedDraftMessages.length; n++) {
                                var rMessage = retrievedDraftMessages[n];
                                var subject;
                                var to;
                                var mDate;
                                var labels = rMessage.result.labelIds;
                                var headers = rMessage.result.payload.headers;
                                for (var j = 0; j < headers.length; j++) {
                                    if (headers[j].name == "Subject") {
                                        subject = headers[j].value;
                                    }
                                    if (headers[j].name == "To") {
                                        to = headers[j].value.replace(/['"]+/g, '');
                                        if (recipientArray.indexOf(to) == -1) {
                                            recipientArray.push(to);
                                        }
                                    }
                                    if (headers[j].name == "Date") {
                                        mDate = new Date(headers[j].value);
                                        mDate = mDate.getDate() + ". " + months[mDate.getMonth()];
                                    }
                                }
                                var emailStatus = "";
                                var isImportant = (labels.indexOf("IMPORTANT") == -1)
                                var importanceColor = "danger";
                                if (isImportant) {
                                    importanceColor = "success";
                                }
                                var labelColor = "blue";
                                if (displayedMessages < perPage) {
                                    $("#draftEmailList").append('<li class="list-group-item ' + emailStatus + '">' +
                                        '<div class="email-checkbox">' +
                                        '<label>' +
                                        '<i class="far fa-square"></i>' +
                                        '<input type="checkbox" data-checked="email-checkbox">' +
                                        '</label>' +
                                        '</div>' +
                                        '<div class="email-checkbox">' +
                                        '<i onClick="toggleImportant(this,' + n + ')" class="fas fa-bolt text-' + importanceColor + '"></i></span>' +
                                        '</div>' +
                                        '<div class="email-user m-r-10 bg-' + labelColor + '">' +
                                        '<span class="text-white">' + to.substring(0, 1).toUpperCase() + '</span>' +
                                        '</div>' +
                                        '<div class="email-info">' +
                                        '<div>' +
                                        '<span class="email-time">' + mDate + '</span>' +
                                        '<span class="email-sender">' + to + '</span>' +
                                        '<span class="email-title">' + subject + '</span>' +
                                        '<span class="email-desc">' + rMessage.result.snippet.substring(0, 60) + "..." + '</span>' +
                                        '</div>' +
                                        '</div>' +
                                        '</li>');
                                } else {
                                    $("#draftEmailList").append('<li class="list-group-item ' + emailStatus + '">' +
                                        '<div class="email-checkbox">' +
                                        '<label>' +
                                        '<i class="far fa-square"></i>' +
                                        '<input type="checkbox" data-checked="email-checkbox">' +
                                        '</label>' +
                                        '</div>' +
                                        '<div class="email-checkbox">' +
                                        '<i onClick="toggleImportant(this,' + n + ')" class="fas fa-bolt text-' + importanceColor + '"></i></span>' +
                                        '</div>' +
                                        '<div class="email-user m-r-10 bg-' + labelColor + '">' +
                                        '<span class="text-white">' + to.substring(0, 1).toUpperCase() + '</span>' +
                                        '</div>' +
                                        '<div class="email-info">' +
                                        '<div>' +
                                        '<span class="email-time">' + mDate + '</span>' +
                                        '<span class="email-sender">' + to + '</span>' +
                                        '<span class="email-title">' + subject + '</span>' +
                                        '<span class="email-desc">' + rMessage.result.snippet.substring(0, 60) + "..." + '</span>' +
                                        '</div>' +
                                        '</div>' +
                                        '</li>');
                                }
                                displayedMessages++;
                            }
                            allMessages = $("#draftEmailList").children("li");
                            $("#pageCount").html("Page 1 of " + Math.ceil(allMessages.length / perPage));
                            previousMessages = allMessages.slice(0, perPage);
                            $("#loadingPopup").hide();
                            draftMessagesLoaded = true;
                            if (!$("#emailOverview").is(":visible")) {
                                $("#emailOverview").show();
                                $("#emailDetails").hide();
                                $("#emailBody").html("");
                            }
                        }
                    });
                }
            });
        } else {
            allMessages = $("#draftEmailList").children("li");
            $("#pageCount").html("Page " + currentDraftPage + " of " + Math.ceil(allMessages.length / perPage));
            var offset = (currentDraftPage - 1) * perPage;
            previousMessages = allMessages.slice(offset, currentDraftPage * perPage);
            if (!$("#emailOverview").is(":visible")) {
                $("#emailOverview").show();
                $("#emailDetails").hide();
                $("#emailBody").html("");
            }
        }
    }

    function listTrashMessages() {
        $("#deleteGrp").hide();
        showingSent = false;
        showingInbox = false;
        showingDrafts = false;
        showingTrash = true;
        if (!trashMessagesLoaded) {
            retrievedTrashMessages = [];
            if (!firstPageLoad) {
                $("#loadingPopup").show();
            }
            request = gapi.client.gmail.users.messages.list({
                'userId': "me",
                "labelIds": ["TRASH"],
                "maxResults": 250
            }).then(function(response) {
                if (response.result.resultSizeEstimate == 0) { //no emails with this label
                    allMessages = $("#trashEmailList").children("li");
                    $("#pageCount").html("Page 0 of 0");
                    $("#loadingPopup").hide();
                    trashMessagesLoaded = true;
                    if (!$("#emailOverview").is(":visible")) {
                        $("#emailOverview").show();
                        $("#emailDetails").hide();
                        $("#emailBody").html("");
                    }
                    return;
                }
                var messages = response.result.messages;
                var msgCount = 0;
                for (var i = 0; i < messages.length; i++) {
                    gapi.client.gmail.users.messages.get({
                        'userId': "me",
                        'id': messages[i].id
                    }).then(function(response) {
                        retrievedTrashMessages.push(response);
                        msgCount++;
                        if (msgCount == messages.length) {
                            retrievedTrashMessages.sort(function(a, b) {
                                return a.result.internalDate == b.result.internalDate ? 0 : +(a.result.internalDate < b.result.internalDate) || -1; //sort array by date, newest to oldest
                            });
                            var displayedMessages = 0;
                            for (var n = 0; n < retrievedTrashMessages.length; n++) {
                                var rMessage = retrievedTrashMessages[n];
                                var subject;
                                var from;
                                var mDate;
                                var labels = rMessage.result.labelIds;
                                var headers = rMessage.result.payload.headers;
                                for (var j = 0; j < headers.length; j++) {
                                    if (headers[j].name == "Subject") {
                                        subject = headers[j].value;
                                    }
                                    if (headers[j].name == "From") {
                                        from = headers[j].value.replace(/['"]+/g, '');
                                        if (recipientArray.indexOf(from) == -1) {
                                            recipientArray.push(from);
                                        }
                                    }
                                    if (headers[j].name == "Date") {
                                        mDate = new Date(headers[j].value);
                                        mDate = mDate.getDate() + ". " + months[mDate.getMonth()];
                                    }
                                }
                                var emailStatus = "";
                                var isImportant = (labels.indexOf("IMPORTANT") == -1)
                                var importanceColor = "danger";
                                if (isImportant) {
                                    importanceColor = "success";
                                }
                                var labelColor = "blue";
                                if (displayedMessages < perPage) {
                                    $("#trashEmailList").append('<li class="list-group-item ' + emailStatus + '">' +
                                        '<div class="email-checkbox">' +
                                        '<label>' +
                                        '<i class="far fa-square"></i>' +
                                        '<input type="checkbox" data-checked="email-checkbox">' +
                                        '</label>' +
                                        '</div>' +
                                        '<div class="email-checkbox">' +
                                        '<i onClick="toggleImportant(this,' + n + ')" class="fas fa-bolt text-' + importanceColor + '"></i></span>' +
                                        '</div>' +
                                        '<div class="email-user m-r-10 bg-' + labelColor + '">' +
                                        '<span class="text-white">' + from.substring(0, 1).toUpperCase() + '</span>' +
                                        '</div>' +
                                        '<div class="email-info">' +
                                        '<div>' +
                                        '<span class="email-time">' + mDate + '</span>' +
                                        '<span class="email-sender">' + from + '</span>' +
                                        '<span class="email-title">' + subject + '</span>' +
                                        '<span class="email-desc">' + rMessage.result.snippet.substring(0, 60) + "..." + '</span>' +
                                        '</div>' +
                                        '</div>' +
                                        '</li>');
                                } else {
                                    $("#trashEmailList").append('<li class="list-group-item ' + emailStatus + '">' +
                                        '<div class="email-checkbox">' +
                                        '<label>' +
                                        '<i class="far fa-square"></i>' +
                                        '<input type="checkbox" data-checked="email-checkbox">' +
                                        '</label>' +
                                        '</div>' +
                                        '<div class="email-checkbox">' +
                                        '<i onClick="toggleImportant(this,' + n + ')" class="fas fa-bolt text-' + importanceColor + '"></i></span>' +
                                        '</div>' +
                                        '<div class="email-user m-r-10 bg-' + labelColor + '">' +
                                        '<span class="text-white">' + from.substring(0, 1).toUpperCase() + '</span>' +
                                        '</div>' +
                                        '<div class="email-info">' +
                                        '<div>' +
                                        '<span class="email-time">' + mDate + '</span>' +
                                        '<span class="email-sender">' + from + '</span>' +
                                        '<span class="email-title">' + subject + '</span>' +
                                        '<span class="email-desc">' + rMessage.result.snippet.substring(0, 60) + "..." + '</span>' +
                                        '</div>' +
                                        '</div>' +
                                        '</li>');
                                }
                                displayedMessages++;
                            }
                            allMessages = $("#trashEmailList").children("li");
                            $("#pageCount").html("Page 1 of " + Math.ceil(allMessages.length / perPage));
                            previousMessages = allMessages.slice(0, perPage);
                            $("#loadingPopup").hide();
                            trashMessagesLoaded = true;
                            if (!$("#emailOverview").is(":visible")) {
                                $("#emailOverview").show();
                                $("#emailDetails").hide();
                                $("#emailBody").html("");
                            }
                        }
                    });
                }
            });
        } else {
            allMessages = $("#trashEmailList").children("li");
            $("#pageCount").html("Page " + currentTrashPage + " of " + Math.ceil(allMessages.length / perPage));
            var offset = (currentTrashPage - 1) * perPage;
            previousMessages = allMessages.slice(offset, currentTrashPage * perPage);
        }
    }

    function refreshMessages() {
        if (showingInbox) {
            listMessages();
        } else if (showingSent) {
            listSentMessages();
        } else if (showingDrafts) {
            listDraftMessages();
        } else {
            listTrashMessages();
        }
    }

    function replyToSelected() {
        var emailHeaders = selectedEmail.result.payload.headers;
        var replyTo;
        var inReplyTo;
        var subject;
        var messageID;
        for (var i = 0; i < emailHeaders.length; i++) {
            if (emailHeaders[i].name == "Return-Path") {
                replyTo = emailHeaders[i].value;
                replyTo = replyTo.replace("<", "");
                replyTo = replyTo.replace(">", "");
            } else if (emailHeaders[i].name == "Subject") {
                subject = emailHeaders[i].value;
            } else if (emailHeaders[i].name == "Message-ID") {
                messageID = emailHeaders[i].value;
            }
        }
        if (replyTo == null) {
            for (var i = 0; i < emailHeaders.length; i++) {
                if (emailHeaders[i].name == "From") {
                    replyTo = emailHeaders[i].value;
                    replyTo = replyTo.replace(/\"/g, '&quot;');
                    break;
                }
            }
        }
        if (replyTo == null) {
            for (var i = 0; i < emailHeaders.length; i++) {
                if (emailHeaders[i].name == "To") {
                    replyTo = emailHeaders[i].value;
                    replyTo = replyTo.replace(/\"/g, '&quot;');
                    break;
                }
            }
        }
        console.log(replyTo);
        if (!subject.toLowerCase().includes("re:")) {
            subject = "Re: " + subject;
        }
        showReplyPopup(replyTo, subject, messageID);
    }

    function forwardSelected() {
        var emailHeaders = selectedEmail.result.payload.headers;
        var subject;
        var from;
        var to;
        var date;
        for (var i = 0; i < emailHeaders.length; i++) {
            if (emailHeaders[i].name == "Subject") {
                subject = emailHeaders[i].value;
            } else if (emailHeaders[i].name == "From") {
                from = emailHeaders[i].value;
                from = from.replace(/\"/g, '&quot;');
            } else if (emailHeaders[i].name == "To") {
                to = emailHeaders[i].value;
            } else if (emailHeaders[i].name == "Date") {
                date = emailHeaders[i].value;
            }
        }
        var emailMessage = "---------- Forwarded message ----------" +
            "<br>From: " + from +
            "<br>Date: " + date +
            "<br>Subject: " + subject +
            "<br>To: " + to + "<br><br>" +
            getBody(selectedEmail.result.payload);
        showForwardPopup(subject, emailMessage);
    }

    function deleteSelected() {
        gapi.client.gmail.users.messages.trash({
            'userId': "me",
            'id': selectedEmail.result.id
        }).then(function(response) {
            $(selectedEmailLi).remove();
            showEmailOverview();
        });
    }

    function getBody(message) {
        var encodedBody = '';
        if (typeof message.parts === 'undefined' || message.parts == null) {
            encodedBody = message.body.data;
        } else {
            encodedBody = getHTMLPart(message.parts);
        }
        if (encodedBody == "") {
            encodedBody = getPlainPart(message.parts);
        }
        encodedBody = encodedBody.replace(/-/g, '+').replace(/_/g, '/').replace(/\s/g, '');
        return decodeURIComponent(escape(window.atob(encodedBody)));
    }

    function getHTMLPart(arr) {
        for (var x = 0; x <= arr.length; x++) {
            if (typeof arr[x] === 'undefined') {
                continue;
            } else if (typeof arr[x].parts === 'undefined') {
                if (arr[x].mimeType === 'text/html') {
                    return arr[x].body.data;
                }
            } else {
                return getHTMLPart(arr[x].parts);
            }
        }
        return '';
    }

    function getPlainPart(arr) {
        for (var x = 0; x <= arr.length; x++) {
            if (typeof arr[x] === 'undefined') {
                continue;
            } else if (typeof arr[x].parts === 'undefined') {
                if (arr[x].mimeType === 'text/plain') {
                    return arr[x].body.data;
                }
            } else {
                return getHTMLPart(arr[x].parts);
            }
        }
        return '';
    }
    var aCount;
    var nrOfAttachments;
    var bodyWithAttachments;

    function getAttachments(message, emailBody) {
        nrOfAttachments = 0;
        aCount = 0;
        bodyWithAttachments = emailBody;
        $("#attachmentsList").html("");
        var parts = message.result.payload.parts;
        if (parts != null) {
            for (var i = 0; i < parts.length; i++) {
                var part = parts[i];
                if (part.filename && part.filename.length > 0) {
                    nrOfAttachments++;
                    var mimeType = part.mimeType;
                    var filename = part.filename;
                    var attachId = part.body.attachmentId;
                    var indexedHeaders = part.headers.reduce(function(acc, header) {
                        acc[header.name.toLowerCase()] = header.value;
                        return acc;
                    }, {});
                    var contentId = indexedHeaders['content-id'] || '';
                    if (contentId != "") {
                        contentId = contentId.replace("<", "");
                        contentId = contentId.replace(">", "");
                    }
                    getAttachment(attachId, message.id, filename, mimeType, contentId);
                }
            }
            if (nrOfAttachments == 0) {
                $("#emailBody").html(bodyWithAttachments);
                $("#emailOverview").hide();
                $("#emailDetails").show();
            }
        } else {
            $("#emailBody").html(bodyWithAttachments);
            $("#emailOverview").hide();
            $("#emailDetails").show();
        }
    }

    function getAttachment(attachId, messageId, filename, mimeType, contentId) {
        var request = gapi.client.gmail.users.messages.attachments.get({
            'id': attachId,
            'messageId': messageId,
            'userId': "me"
        }).then(function(attachment) {
            aCount++;
            var attachmentLink = 'data:' + mimeType + ';base64,' + attachment.result.data.replace(/-/g, '+').replace(/_/g, '/');
            $("#attachmentsList").append('<li class="fa-file">' +
                '<div class="document-file">' +
                '<a href="' + attachmentLink + '" download="' + filename + '" ><i class="fa fa-file-image"></i></a>' +
                '</div>' +
                '<div class="document-name"><a href="' + attachmentLink + '" download="' + filename + '" >' + filename + '</a></div>' +
                '</li>');
            if (contentId != "") {
                bodyWithAttachments = bodyWithAttachments.replace("cid:" + contentId, attachmentLink);
            }
            if (aCount == nrOfAttachments) {
                $("#emailBody").html(bodyWithAttachments);
                $("#emailOverview").hide();
                $("#emailDetails").show();
            }
        });
    }

    function showComposePopup() {
        $("#composePopup").show();
    }

    function hideComposePopup() {
        $("#emailRecipientsInput").tagit("removeAll");
        $("#sendEmailForm")[0].reset();
        $("#composePopup").hide();
    }

    function showReplyPopup(replyTo, subject, messageID) {
        $('#emailRecipientsInput').tagit('createTag', replyTo);
        $("#emailSubjectInput").val(subject);
        $("#emailMessageIDInput").val(messageID);
        $("#composePopup").show();
    }

    function showForwardPopup(subject, forwardMessage) {
        $("#emailSubjectInput").val(subject);
        tinymce.get("emailMessageInput").setContent(forwardMessage);
        $("#composePopup").show();
    }

    function sendMessage(headers_obj, message) {
        var email = '';
        for (var header in headers_obj) {
            email += header += ": " + headers_obj[header] + "\r\n";
        }
        email += "Content-Type: text/html; charset='UTF-8'\r\n" +
            "Content-Transfer-Encoding: base64\r\n\r\n";
        email += "\r\n" + message;
        var sendRequest = gapi.client.gmail.users.messages.send({
            'userId': 'me',
            'resource': {
                'raw': Base64.encode(email).replace(/\+/g, '-').replace(/\//g, '_')
            }
        }).then(function(response) {
            console.log(response);
            swal(
                'E-mail sent',
                'Your e-mail was sent successfully',
                'success'
            );
            hideComposePopup();
        });
    }

    function goToNextPage() {
        if (showingInbox) {
            if (currentInboxPage < Math.ceil(allMessages.length / perPage)) {
                currentInboxPage++;
                $("#pageCount").html("Page " + currentInboxPage + " of " + Math.ceil(allMessages.length / perPage));
                var offset = (currentInboxPage - 1) * perPage;
                // hide previous items, if any
                if (previousMessages) {
                    previousMessages.addClass('hideMe');
                }
                // show new items, and store the set
                previousMessages = allMessages.slice(offset, currentInboxPage * perPage);
                previousMessages.removeClass('hideMe');
            }
        } else if (showingSent) {
            if (currentSentPage < Math.ceil(allMessages.length / perPage)) {
                currentSentPage++;
                $("#pageCount").html("Page " + currentSentPage + " of " + Math.ceil(allMessages.length / perPage));
                var offset = (currentSentPage - 1) * perPage;
                // hide previous items, if any
                if (previousMessages) {
                    previousMessages.addClass('hideMe');
                }
                // show new items, and store the set
                previousMessages = allMessages.slice(offset, currentSentPage * perPage);
                previousMessages.removeClass('hideMe');
            }
        } else if (showingDrafts) {
            if (currentDraftPage < Math.ceil(allMessages.length / perPage)) {
                currentDraftPage++;
                $("#pageCount").html("Page " + currentDraftPage + " of " + Math.ceil(allMessages.length / perPage));
                var offset = (currentDraftPage - 1) * perPage;
                // hide previous items, if any
                if (previousMessages) {
                    previousMessages.addClass('hideMe');
                }
                // show new items, and store the set
                previousMessages = allMessages.slice(offset, currentDraftPage * perPage);
                previousMessages.removeClass('hideMe');
            }
        } else {
            if (currentTrashPage < Math.ceil(allMessages.length / perPage)) {
                currentTrashPage++;
                $("#pageCount").html("Page " + currentTrashPage + " of " + Math.ceil(allMessages.length / perPage));
                var offset = (currentTrashPage - 1) * perPage;
                // hide previous items, if any
                if (previousMessages) {
                    previousMessages.addClass('hideMe');
                }
                // show new items, and store the set
                previousMessages = allMessages.slice(offset, currentTrashPage * perPage);
                previousMessages.removeClass('hideMe');
            }
        }
    }

    function goToPreviousPage() {
        if (showingInbox) {
            if (currentInboxPage > 1) {
                currentInboxPage--;
                $("#pageCount").html("Page " + currentInboxPage + " of " + Math.ceil(allMessages.length / perPage));
                var offset = (currentInboxPage - 1) * perPage;
                // hide previous items, if any
                if (previousMessages) {
                    previousMessages.addClass('hideMe');
                }
                // show new items, and store the set
                previousMessages = allMessages.slice(offset, currentInboxPage * perPage).removeClass('hideMe');
            }
        } else if (showingSent) {
            if (currentSentPage > 1) {
                currentSentPage--;
                $("#pageCount").html("Page " + currentSentPage + " of " + Math.ceil(allMessages.length / perPage));
                var offset = (currentSentPage - 1) * perPage;
                // hide previous items, if any
                if (previousMessages) {
                    previousMessages.addClass('hideMe');
                }
                // show new items, and store the set
                previousMessages = allMessages.slice(offset, currentSentPage * perPage);
                previousMessages.removeClass('hideMe');
            }
        } else if (showingDrafts) {
            if (currentDraftPage > 1) {
                currentDraftPage--;
                $("#pageCount").html("Page " + currentDraftPage + " of " + Math.ceil(allMessages.length / perPage));
                var offset = (currentDraftPage - 1) * perPage;
                // hide previous items, if any
                if (previousMessages) {
                    previousMessages.addClass('hideMe');
                }
                // show new items, and store the set
                previousMessages = allMessages.slice(offset, currentDraftPage * perPage);
                previousMessages.removeClass('hideMe');
            }
        } else {
            if (currentTrashPage > 1) {
                currentTrashPage--;
                $("#pageCount").html("Page " + currentTrashPage + " of " + Math.ceil(allMessages.length / perPage));
                var offset = (currentTrashPage - 1) * perPage;
                // hide previous items, if any
                if (previousMessages) {
                    previousMessages.addClass('hideMe');
                }
                // show new items, and store the set
                previousMessages = allMessages.slice(offset, currentTrashPage * perPage);
                previousMessages.removeClass('hideMe');
            }
        }
    }
    $(document).ready(function() {
        $("#emailRecipientsInput").tagit({
            beforeTagAdded: function(event, ui) {
                return isEmail(ui.tagLabel);
            }
        });
        tinymce.init({
            selector: 'textarea#emailMessageInput',
            menubar: false,
            min_height: 400,
            convert_urls: false,
            setup: function(editor) {
                editor.on('change', function() {
                    editor.save();
                });
            }
        });
        $("[data-checked=email-checkbox]").live("click", function() {
            var e = $(this).closest("label");
            var t = $(this).closest("li");
            if ($(this).prop("checked")) {
                $(e).addClass("active");
                $(t).addClass("selected")
            } else {
                $(e).removeClass("active");
                $(t).removeClass("selected")
            }
            handleEmailActionButtonStatus();
        });
        $("[data-email-action]").live("click", function() {
            var e = "[data-checked=email-checkbox]:checked";
            if ($(e).length !== 0) {
                $(e).closest("li").slideToggle(function() {
                    var indexOfLi = $(this).index();
                    var email = retrievedMessages[indexOfLi]; //if in inbox
                    if (showingSent) {
                        email = retrievedSentMessages[indexOfLi];
                    } else if (showingDrafts) {
                        email = retrievedDraftMessages[indexOfLi];
                    } else if (showingTrash) {
                        email = retrievedTrashMessages[indexOfLi];
                    }
                    gapi.client.gmail.users.messages.trash({
                        'userId': "me",
                        'id': email.result.id
                    }).then(function(response) {
                        console.log(response);
                    });
                    $(this).remove();
                    handleEmailActionButtonStatus();
                })
            }
        });
        $('#sendEmailForm').on('submit', function(e) { //use on if jQuery 1.7+
            e.preventDefault();
            var tags = $("#emailRecipientsInput").tagit("assignedTags");
            if (tags.length == 0) {
                swal(
                    'No e-mail recipients',
                    'Please specify atleast one e-mail recipient',
                    'error'
                );
            } else {
                var emailHeaders = {
                    'To': $('#emailRecipientsInput').val(),
                    'Subject': $('#emailSubjectInput').val()
                };
                if ($("#emailMessageIDInput").val() != "") {
                    emailHeaders = {
                        'To': $('#emailRecipientsInput').val(),
                        'Subject': $('#emailSubjectInput').val(),
                        'In-Reply-To': $('#emailMessageIDInput').val(),
                        'References': $("#emailMessageIDInput").val()
                    };
                }
                sendMessage(emailHeaders, tinymce.get('emailMessageInput').getContent());
            }
        });
        $("#emailList").on("click", "li .email-info", function() {
            var emailIndex = $(this).parent("li").index();
            selectedEmailLi = $(this).parent("li");
            selectedEmail = retrievedMessages[emailIndex];
            getEmailContents();
        });
        $("#sentEmailList").on("click", "li .email-info", function() {
            var emailIndex = $(this).parent("li").index();
            selectedEmailLi = $(this).parent("li");
            selectedEmail = retrievedSentMessages[emailIndex];
            getEmailContents();
        });
        $("#draftEmailList").on("click", "li .email-info", function() {
            var emailIndex = $(this).parent("li").index();
            selectedEmailLi = $(this).parent("li");
            selectedEmail = retrievedDraftMessages[emailIndex];
            getEmailContents();
        });
        $("#trashEmailList").on("click", "li .email-info", function() {
            var emailIndex = $(this).parent("li").index();
            selectedEmailLi = $(this).parent("li");
            selectedEmail = retrievedTrashMessages[emailIndex];
            getEmailContents();
        });
    });

    function getEmailContents() {
        var subject;
        var from;
        var to;
        var mDate;
        var headers = selectedEmail.result.payload.headers;
        for (var j = 0; j < headers.length; j++) {
            if (headers[j].name == "Subject") {
                subject = headers[j].value;
            }
            if (headers[j].name == "From") {
                from = headers[j].value.replace(/['"]+/g, '');
            }
            if (headers[j].name == "To") {
                to = headers[j].value.replace(/['"]+/g, '');
            }
            if (headers[j].name == "Date") {
                mDate = new Date(headers[j].value);
                mDate = mDate.getDate() + ". " + months[mDate.getMonth()];
            }
        }
        var emailContent = '<h4 class="m-b-15 m-t-0 p-b-10 underline">' + subject + '</h4>' +
            '<ul class="media-list underline m-b-20 p-b-15">' +
            '<li class="media media-sm clearfix">' +
            '<a href="javascript:;" class="pull-left">' +
            '<img class="media-object rounded-corner" alt="" src="http://track.appdev.si/Web/assets/img/user-14.jpg">' +
            '</a>' +
            '<div class="media-body">' +
            '<span class="email-from text-inverse f-w-600">' +
            'From: ' + from +
            '</span><span class="text-muted m-l-5"><i class="fa fa-clock-o fa-fw"></i>' + mDate + '</span><br>' +
            '<span class="email-to">' +
            'To: ' + to +
            '</span>' +
            '</div>' +
            '</li>' +
            '</ul>';
        emailContent += getBody(selectedEmail.result.payload);
        getAttachments(selectedEmail, emailContent);
        $("#deleteGrp").show();
    }

    function showEmailOverview() {
        $("#emailOverview").show();
        $("#emailDetails").hide();
        $("#emailBody").html("");
    }

    function getMenuStatistics(employee_id) {
        var postData = {
            "employee_id": employee_id
        };
        $.ajax({
            type: "POST",
            url: "<?= BASE_URL ?>" + "task/getToday",
            data: postData,
            dataType: "json",
            success: function(tasks) {
                var unfinished = 0;
                for (var i = 0; i < tasks.length; i++) {
                    if (tasks[i].status == 0) {
                        unfinished++;
                    }
                }
                if (unfinished > 0) {
                    $("#taskLink").html("Tasks <span class='label label-theme m-l-5'>" + unfinished + "</span>");
                    $("#eventSpan").html("Activity <span class='label label-danger m-l-5'>PENDING</span>");
                }
            }
        });
        $.ajax({
            type: "POST",
            url: "<?= BASE_URL ?>" + "meeting/getToday",
            data: postData,
            dataType: "json",
            success: function(meetings) {
                var unfinished = 0;
                for (var i = 0; i < meetings.length; i++) {
                    if (meetings[i].status == 0 || meetings[i].status == 1 || meetings[i].status == 2) {
                        unfinished++;
                    }
                }
                if (unfinished > 0) {
                    $("#meetingLink").html("Meetings <span class='label label-theme m-l-5'>" + unfinished + "</span>");
                    $("#eventSpan").html("Activity <span class='label label-danger m-l-5'>PENDING</span>");
                }
            }
        });
        $.ajax({
            type: "POST",
            url: "<?= BASE_URL ?>" + "reminders/getToday",
            data: postData,
            dataType: "json",
            success: function(reminders) {
                var unfinished = 0;
                for (var i = 0; i < reminders.length; i++) {
                    if (reminders[i].reminder_active == 1) {
                        unfinished++;
                    }
                }
                if (unfinished > 0) {
                    $("#reminderLink").html("Reminders <span class='label label-theme m-l-5'>" + unfinished + "</span>");
                    $("#eventSpan").html("Activity <span class='label label-danger m-l-5'>PENDING</span>");
                }
            }
        });
    }

    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    function handleEmailActionButtonStatus() {
        if ($("[data-checked=email-checkbox]:checked").length !== 0) {
            $("[data-email-action]").removeClass("hide")
        } else {
            $("[data-email-action]").addClass("hide")
        }
    };