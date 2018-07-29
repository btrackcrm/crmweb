
	var emailArray = [];
	var loadedPages = [];
	var currentMail;
	var emailOpenedInterval;
	var allMessages;
    var previousMessages;
    var currentPage = 1;
    var perPage = 10;

	$(document).ready(function() {
		getEmails();
		setInterval(function(){
			refreshEmails(false);
		}, 120000);
		
		$("#email-to").tagit({
            beforeTagAdded: function(event, ui) {
                return isEmail(ui.tagLabel);
            }
        });
		
		$(document).on("click", '[data-click="add-cc"]', function(a) {
				a.preventDefault();
				var t = $(this).attr("data-name"),
					l = "email-cc-" + t,
					n = '\t<div class="email-to">\t\t<label class="control-label">' + t + ':</label>\t\t<ul id="' + l + '" class="primary line-mode"></ul>\t</div>';
				$('[data-id="extra-cc"]').append(n), $("#" + l).tagit({
					beforeTagAdded: function(event, ui) {
						return isEmail(ui.tagLabel);
					}
				}), $(this).remove()
		});
		
		$('#finishEmailForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                var postData = { "email_id": currentMail.email_id, "notes": $("#emailCommentInput").val(), "status": 2 };
                $.ajax({
                    type: "POST",
                    url:  "telephony/emailRead",
                    data: postData,
                    success: function(msg) {
                        if (msg == ""){
                            swal(
                                'Status update',
                                'E-mail is now marked as - PROCESSED.',
                                'success'
                            );
                            refreshEmails(false);
                            hideEmailContent();
                        }else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
        });
		
		$('#sendEmailForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
				tinyMCE.triggerSave();
                var recipients = $("#email-to").tagit("assignedTags");
				var cc = [];
				if ($("#email-cc-Cc").length){
					cc = $("#email-cc-Cc").tagit("assignedTags");
				}
				var bcc = [];
				if ($("#email-cc-Bcc").length){
					 bcc = $("#email-cc-Bcc").tagit("assignedTags");
				}
                if (recipients.length == 0){
                    swal(
                        'No e-mail recipients',
                        'Please specify atleast one e-mail recipient',
                        'error'
                    );
                }else{
					var postData = $("#sendEmailForm").serializeArray();
					postData.push( {name: 'recipients[]', value: recipients});
					postData.push( {name: 'cc[]', value: cc });
					postData.push( {name: 'bcc[]', value: bcc });
                    $.ajax({
                    	type: "POST",
                    	url:  "telephony/sendemail",
                    	data: postData,
                    	success: function(msg) {
                        	if (msg == ""){
                            		swal(
                                		'Success',
                                		'E-mail was sent successfully',
                                		'success'
                            		);
                                    refreshEmails(false);
                                    hideComposePopup();

                        	}else {
                            		swal(
                                		'Error!',
                                		'The server encountered the following error: ' + msg,
                                		'error'
                            		);
                        	}
                    	}
                    });
                }
            });
	});
	
	function refreshEmails(showLoading){
			var postData = { "current_page": currentPage, "per_page": perPage };
			if (showLoading){
				$("#loadingPopup").show();
			}
			$.ajax({
				type: "POST",
				url:  "telephony/getEmails",
				data: postData,
				dataType: "json",
				success: function(response) {
							loadedPages = [];
							emailArray = [];
							loadedPages.push(currentPage);
							var showFrom = (currentPage - 1) * perPage;
							var showTo = showFrom + perPage;
								
							if (showTo > allMessages){
								showTo = allMessages;
							}
							var responseEmails = response.emails;
							var emailContent = "";
							for (var i = 0; i < responseEmails.length; i++){
								emailArray.splice((showFrom + i), 0, responseEmails[i]);
							}
							allMessages = response.amount;
							var emailContent = "";
							for (var i = 0; i < responseEmails.length; i++){
								var email = responseEmails[i];
								var color = "red";
								var finishedBy = "";
								var ticketContent = '<span class="text-white"><i class="fas fa-times"></i></span>';
								var isRead = "unread";
								if (email.seen == 1){
									color = "blue";
									isRead = "read";
									ticketContent = '<span class="text-white"><i class="fas fa-eye"></i></span>';
								}else if (email.seen == 2){
									color = "green";
									isRead = "read";
									ticketContent = '<span class="text-white"><i class="fas fa-check"></i></span>';
									if (email.employee_namesurname != null){
										finishedBy = "<span class='text-danger'>Agent: " + email.employee_namesurname + "</span>";
										color = "success m-0";
									}
								}
								var prettyDate = moment(email.date).format(dateformat + ", " + timeformat);
								var starIcon = "far fa-star";
								if (email.flagged == 1){
									starIcon = "fa fa-star";
								}
								var emailButtons = '<div class="email-checkbox">' +
														'<i onClick="deleteEmail(this,' + i + ')" class="fas fa-trash-alt text-danger"></i>' +
													'</div>' +
													'<div class="email-checkbox">' +
														'<i onClick="toggleStarred(this,' + i + ')" class="' + starIcon + ' text-warning"></i>' +
													'</div>';
								
								if (email.ticket_id != null){
									color = "green";
									ticketContent = "<i class='ion-pricetag text-white'></i>";
									emailButtons =  '<div class="email-checkbox">' +
														'<i onClick="toggleStarred(this,' + i + ')" class="' + starIcon + ' text-warning"></i>' +
													'</div>';
								}
								var fName = email.fromname;
								if (fName == null || fName == ""){
									fName = email.from;
								}
								var listItem = '<li class="list-group-item ' + isRead + '">' +
													emailButtons +
													'<div class="email-user m-r-10 bg-' + color + '" onClick="viewEmail(' + i + ')">' +
														ticketContent +
													'</div>' +
													'<div class="email-info" onClick="viewEmail(' + i + ')">' +
														'<div>' +
															'<span class="email-time">' + prettyDate + '</span>' +
															'<span class="email-sender">' + fName + "<br>" + finishedBy + '</span>' +
															'<span class="email-title">' + email.subject + '</span>' +
														'</div>' +
													'</div>' +
												'</li>';
								emailContent += listItem
							}
							$("#emailList").html(emailContent);
							$("#pageCount").html("Page " + currentPage + " of " + Math.ceil(allMessages / perPage));
							if (firstPageLoad){
								App.init();
								firstPageLoad = false;
							}
							if (showLoading){
								$("#loadingPopup").hide();
							}
						}
					});
		}
		
		function filterEmails(){
			loadedPages = [];
			emailArray = [];
			currentPage = 1;
			var searchQ = $("#searchEmailsInput").val();
			if (searchQ == ""){
				refreshEmails(false);
				return;
			}
			var postData = { "query": searchQ};
					if (!firstPageLoad){
						$("#loadingPopup").show();
					}
					$.ajax({
						type: "POST",
						url:  "telephony/searchEmails",
						data: postData,
						dataType: "json",
						success: function(response) {
							console.log(response);
							var responseEmails = response.emails;
							var emailContent = "";
							for (var i = 0; i < responseEmails.length; i++){
								var email = responseEmails[i];
								var color = "red";
								var finishedBy = "";
								var ticketContent = '<span class="text-white"><i class="fas fa-times"></i></span>';
								if (email.seen == 1){
									color = "blue";
									ticketContent = '<span class="text-white"><i class="fas fa-eye"></i></span>';
								}else if (email.seen == 2){
									color = "green";
									ticketContent = '<span class="text-white"><i class="fas fa-check"></i></span>';
									if (email.employee_namesurname != null){
										finishedBy = "<span class='text-danger'>Agent: " + email.employee_namesurname + "</span>";
										color = "green m-0";
									}
								}
								var prettyDate = moment(email.date).format(dateformat + ", " + timeformat);
								var starIcon = "far fa-star";
								if (email.flagged == 1){
									starIcon = "fa fa-star";
								}
								var emailButtons = '<div class="email-checkbox">' +
														'<i onClick="deleteEmail(this,' + i + ')" class="fas fa-trash-alt text-danger"></i>' +
													'</div>' +
													'<div class="email-checkbox">' +
														'<i onClick="toggleStarred(this,' + i + ')" class="' + starIcon + ' text-warning"></i>' +
													'</div>';
								
								if (email.ticket_id != null){
									color = "green";
									ticketContent = "<i class='ion-pricetag text-white'></i>";
									emailButtons =  '<div class="email-checkbox">' +
														'<i onClick="toggleStarred(this,' + i + ')" class="' + starIcon + ' text-warning"></i>' +
													'</div>';
								}
								if (email.message == null){
									email.message = "";
								}
								var fName = email.fromname;
								if (fName == null || fName == ""){
									fName = email.from;
								}
								var listItem = '<li class="list-group-item ' + isRead + '">' +
													emailButtons +
													'<div class="email-user m-r-10 bg-' + color + '" onClick="viewEmail(' + i + ')">' +
														ticketContent +
													'</div>' +
													'<div class="email-info" onClick="viewEmail(' + i + ')">' +
														'<div>' +
															'<span class="email-time">' + prettyDate + '</span>' +
															'<span class="email-sender">' + fName + "<br>" + finishedBy + '</span>' +
															'<span class="email-title">' + email.subject + '</span>' +
														'</div>' +
													'</div>' +
												'</li>';
								emailContent += listItem
							}
							$("#emailList").html(emailContent);
							
							$("#pageCount").html("Page " + currentPage + " of 1");
							$("#loadingPopup").hide();
						}
					});
		}
		
		function deleteEmail(item, index){
			var email = emailArray[index];
			swal({
				title: "Deletion confirmation",
                text: 'Are you sure you want to delete this e-mail?',
                type: 'error',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: "Cancel",
                confirmButtonText: 'Delete e-mail'
                }).then(function () {
                    var postData = { "mail_id": email.mail_id };
					$.ajax({
						type: "POST",
						url:  "email/delete",
						data: postData,
						success: function(response) {
							if (response == ""){
								swal(
									'Delete completed',
									'E-mail was successfully deleted',
									'success'
								);
								refreshEmails(false);
							}else{
								swal(
									'Error',
									'There was an unexpected error ' + response,
									'error'
								);
							}
						}
					});
                });
		}
		
		function showComposePopup(){
            $("#composePopup").show();
        }
		
		function showReplyPopup(){
			if (currentMail.employee_id == loggedEmployee){
                markEmailAsOpened(0);
            }
            $("#emailContentDIV").html("");
            $("#emailPopupDIV, #emailPopupPanel, #emailCommentPanel").hide();
			$("#email-to").tagit('createTag', currentMail.from);
			var message = currentMail.htmlmsg;
			if (message == ""){
				message = currentMail.message;
			}
			message = "<br><br><br><br><br><br>----------Reply to----------<br>From: " + currentMail.from + "<br>Date: " + currentMail.date + "<br>Subject: " + currentMail.subject + "<br><br><br>" + message;
			tinymce.get('emailMessageInput').setContent(message);
			
			$("#sendEmailForm input[name=email_subject]").val("RE: " + currentMail.subject);
			$("#composePopup").show();
		}
		
		function showForwardPopup(){
			if (currentMail.employee_id == loggedEmployee){
                markEmailAsOpened(0);
            }
            $("#emailContentDIV").html("");
            $("#emailPopupDIV, #emailPopupPanel, #emailCommentPanel").hide();
			var message = currentMail.htmlmsg;
			if (message == ""){
				message = currentMail.message;
			}
			message = "<br><br><br><br><br><br>----------Forwarded message----------<br>From: " + currentMail.from + "<br>Date: " + currentMail.date + "<br>Subject: " + currentMail.subject + "<br><br><br>" + message;
			tinymce.get('emailMessageInput').setContent(message);
			$("#sendEmailForm input[name=email_subject]").val(currentMail.subject);
			$("#composePopup").show();
		}
        
        function hideComposePopup(){
            $("#email-to, #email-cc-Cc, #email-cc-Bcc").tagit("removeAll");
            $("#sendEmailForm")[0].reset();
            $("#composePopup").hide();
        }
		
		function showNewEmailTicketPopup(){
            $("#newTicketEmailIDInput").val(currentMail.email_id);
			$("#newTicketSubjectInput").val("Subject #" + currentMail.email_id)
            var customerData = { email: currentMail.from};
            $.ajax({
                type: "POST",
                url:  "customer/getByEmail",
                data: customerData,
                dataType: "json",
                success: function(customer) {
                    if (customer.exists == 0){
						$("#ticketEmployeeSelect").val("").trigger("change");
						$("#ticketCustomerSelect").val("").trigger("change");
						$("#ticketDateInput").val(moment().format(dateformat));
                        $("#ticketPopupDIV, #newTicketDIV").show();
                    }else{
                        var customer_id = customer.customer_id;
                        if (customer_id != 0 && customer_id != null){
                            var customer;
                            for (var i = 0; i < customersArray.length; i++){
                                if (customersArray[i].customer_id == customer_id){
                                    customer = customersArray[i];
                                    break;
                                }
                            }
                            $("#ticketCustomerSelect").val(customer_id).trigger("change");
                            $("#ticketEmployeeSelect").val(customer.employee_id);
                        }
						$("#ticketEmployeeSelect").val("").trigger("change");
						$("#ticketCustomerSelect").val("").trigger("change");
						$("#ticketDateInput").val(moment().format(dateformat));
                        $("#ticketPopupDIV, #newTicketDIV").show();
                    }
                }
            });
        }
		
		function getEmails(){
			if (loadedPages.indexOf(currentPage) == -1){ //we haven't loaded this page yet, so load it
				if (!firstPageLoad){
						$("#loadingPopup").show();
				}
				var postData = { "current_page": currentPage, "per_page": perPage};
                $.ajax({
                    type: "POST",
                    url:  "telephony/getEmails",
                    data: postData,
                    dataType: "json",
                    success: function(response) {
						loadedPages.push(currentPage);
						var responseEmails = response.emails;
						var showFrom = (currentPage - 1) * perPage;
						var showTo = showFrom + perPage;
							
						if (showTo > allMessages){
							showTo = allMessages;
						}
                        var emailContent = "";
						for (var i = 0; i < responseEmails.length; i++){
							emailArray.splice((showFrom + i), 0, responseEmails[i]);
						}
						allMessages = response.amount;
						
						var emailContent = "";
						for (var i = 0; i < responseEmails.length; i++){
                            var email = responseEmails[i];
                            var color = "red";
                            var finishedBy = "";
                            var ticketContent = '<span class="text-white"><i class="fas fa-times"></i></span>';
							var isRead = "unread";
                            if (email.seen == 1){
                                color = "blue";
								isRead = "read";
								ticketContent = '<span class="text-white"><i class="fas fa-eye"></i></span>';
                            }else if (email.seen == 2){
                                color = "green";
								isRead = "read";
								ticketContent = '<span class="text-white"><i class="fas fa-check"></i></span>';
                                if (email.employee_namesurname != null){
                                    finishedBy = "<span class='text-danger'>Agent: " + email.employee_namesurname + "</span>";
                                    color = "success m-0";
                                }
                            }
                            var prettyDate = moment(email.date).format(dateformat + ", " + timeformat);
							var starIcon = "far fa-star";
							if (email.flagged == 1){
								starIcon = "fa fa-star";
							}
                            var emailButtons = '<div class="email-checkbox">' +
													'<i onClick="deleteEmail(this,' + i + ')" class="fas fa-trash-alt text-danger"></i>' +
												'</div>' +
												'<div class="email-checkbox">' +
                                                    '<i onClick="toggleStarred(this,' + i + ')" class="' + starIcon + ' text-warning"></i>' +
                                                '</div>';
                            
                            if (email.ticket_id != null){
                                color = "green";
                                ticketContent = "<i class='ion-pricetag text-white'></i>";
								emailButtons =  '<div class="email-checkbox">' +
                                                    '<i onClick="toggleStarred(this,' + i + ')" class="' + starIcon + ' text-warning"></i>' +
                                                '</div>';
                            }
							var fName = email.fromname;
							if (fName == null || fName == ""){
								fName = email.from;
							}
                            var listItem = '<li class="list-group-item ' + isRead + '">' +
												emailButtons +
												'<div class="email-user m-r-10 bg-' + color + '" onClick="viewEmail(' + i + ')">' +
												    ticketContent +
												'</div>' +
												'<div class="email-info" onClick="viewEmail(' + i + ')">' +
													'<div>' +
														'<span class="email-time">' + prettyDate + '</span>' +
														'<span class="email-sender">' + fName + "<br>" + finishedBy + '</span>' +
														'<span class="email-title">' + email.subject + '</span>' +
													'</div>' +
												'</div>' +
											'</li>';
                            emailContent += listItem
                        }
                        $("#emailList").html(emailContent);
                        $("#pageCount").html("Page " + currentPage + " of " + Math.ceil(allMessages / perPage));
                        if (firstPageLoad){
                            App.init();
                            firstPageLoad = false;
                        }else{
							$("#loadingPopup").hide();
						}
                    }
                });
            }else{
				var showFrom = (currentPage - 1) * perPage;
					var showTo = showFrom + perPage;
					if (showTo > allMessages){
						showTo = allMessages;
					}
					var emailContent = "";
							for (var i = showFrom; i < showTo; i++){
								var email = emailArray[i];
								var color = "red";
								var finishedBy = "";
								var ticketContent = '<span class="text-white"><i class="fas fa-times"></i></span>';
								var isRead = "unread";
								
								if (email.seen == 1){
									color = "blue";
									isRead = "read";
									ticketContent = '<span class="text-white"><i class="fas fa-eye"></i></span>';
								}else if (email.seen == 2){
									color = "green";
									isRead = "read";
									ticketContent = '<span class="text-white"><i class="fas fa-check"></i></span>';
									if (email.employee_namesurname != null){
										finishedBy = "<span class='text-danger'>Agent: " + email.employee_namesurname + "</span>";
										color = "success m-0";
									}
								}
								var prettyDate = moment(email.date).format(dateformat + ", " + timeformat);
								var starIcon = "far fa-star";
								if (email.flagged == 1){
									starIcon = "fa fa-star";
								}
								var emailButtons = '<div class="email-checkbox">' +
														'<i onClick="deleteEmail(this,' + i + ')" class="fas fa-trash-alt text-danger"></i>' +
													'</div>' +
													'<div class="email-checkbox">' +
														'<i onClick="toggleStarred(this,' + i + ')" class="' + starIcon + ' text-warning"></i>' +
													'</div>';
								
								if (email.ticket_id != null){
									color = "green";
									ticketContent = "<i class='ion-pricetag text-white'></i>";
									emailButtons =  '<div class="email-checkbox">' +
														'<i onClick="toggleStarred(this,' + i + ')" class="' + starIcon + ' text-warning"></i>' +
													'</div>';
								}
								
								var fName = email.fromname;
								if (fName == null || fName == ""){
									fName = email.from;
								}
								var listItem = '<li class="list-group-item ' + isRead + '">' +
													emailButtons +
													'<div class="email-user m-r-10 bg-' + color + '" onClick="viewEmail(' + i + ')">' +
														ticketContent +
													'</div>' +
													'<div class="email-info" onClick="viewEmail(' + i + ')">' +
														'<div>' +
															'<span class="email-time">' + prettyDate + '</span>' +
															'<span class="email-sender">' + fName + "<br>" + finishedBy + '</span>' +
															'<span class="email-title">' + email.subject + '</span>' +
														'</div>' +
													'</div>' +
												'</li>';
								emailContent += listItem
							}
							$("#emailList").html(emailContent);
							
							$("#pageCount").html("Page " + currentPage + " of " + Math.ceil(allMessages / perPage));
							if (firstPageLoad){
								App.init();
								firstPageLoad = false;
							}else{
								$("#loadingPopup").hide();
							}
			}
        }
		
		function toggleStarred(item, index){
            var email = emailArray[index];
            
            var isStarred = (email.flagged == 1);
            
            if (isStarred){
				$(item).removeClass("fa fa-star");
                $(item).addClass("far fa-star");
                var postData = { "email_id": email.email_id, "mail_id": email.mail_id, "starred": 0 };
				$.ajax({
					type: "POST",
					url:  "email/star",
					data: postData,
					success: function(response) {
						email.flagged = 0;
						console.log(response);
					}
				});
            }else{
				$(item).removeClass("far fa-star");
                $(item).addClass("fa fa-star");
                var postData = { "email_id": email.email_id, "mail_id": email.mail_id, "starred": 1 };
				$.ajax({
					type: "POST",
					url:  "email/star",
					data: postData,
					success: function(response) {
						email.flagged = 1;
						console.log(response);
					}
				});
            }
        }
        
        function goToNextPage() {
			if (currentPage < Math.ceil(allMessages / perPage)){
                currentPage++;
                $("#pageCount").html("Page " + currentPage + " of " + Math.ceil(allMessages / perPage));
                
                getEmails();
			}
        }
        
        function goToPreviousPage(){
			if (currentPage > 1){
				currentPage--;
				$("#pageCount").html("Page " + currentPage + " of " + Math.ceil(allMessages / perPage));
				
				getEmails();
			}
        }
        
        function viewEmail(index){
            var email = emailArray[index];
			var postData = { "mail_id": email.mail_id, "threads": 1 };
			$.ajax({
                type: "POST",
                url:  "telephony/getattachments",
                data: postData,
				dataType: "json",
                success: function(responseMail) {
					console.log(responseMail);
					currentMail = responseMail;
					currentMail.message_id = email.message_id;
					currentMail.email_id = email.email_id;
					currentMail.threads = responseMail.threads;
					var imgURL = "/assets/img/b-io.png";
					var message = responseMail.htmlmsg;
					if (message == "" || message == null){
						message = responseMail.message;
					}
					var prettyDate = moment(responseMail.date).format(dateformat + ", " + timeformat);
					if (email.seen == 0){
						markEmailAsRead();
					}
					var postData = { "email_id": currentMail.email_id };
					
					$.ajax({
						type: "POST",
						url:  "telephony/getEmail",
						data: postData,
						dataType: "json",
						success: function(dbMail) {
										var opened_by = "";
										currentMail.opened = dbMail.opened;
										currentMail.employee_id = dbMail.employee_id;
										var notesDIV = "";
										if (responseMail.seen == 2){
											notesDIV = '<li class="media media-sm clearfix">' +
															'<div class="media-body">' +
																'<div class="email-from text-inverse f-s-14 f-w-600 m-b-3">' +
																	"Employee notes:" +
																'</div>' +
																responseMail.notes +
															'</div>' +
														'</li>';
										}
										var rightNow = moment();
										if (dbMail.opened == 0){
											markEmailAsOpened(1);
											emailOpenedInterval = setInterval(function(){
												markEmailAsOpened(1);
											}, 15000);
											currentMail.employee_id = loggedEmployee;
										}else{
											if (Math.abs(moment(dbMail.opened_on).diff(rightNow, "seconds")) > 35){
												markEmailAsOpened(1);
												emailOpenedInterval = setInterval(function(){
													markEmailAsOpened(1);
												}, 15000);
												dbMail.opened = 0;
												currentMail.employee_id = loggedEmployee;
												opened_by = "";
											}else{
												opened_by = "<div class='label label-danger pull-right f-s-14'>Currently opened by: " + dbMail.employee_namesurname + "</div>";
											}
										}
										var emailHeader = '<div class="m-b-10 underline"><h4 class="m-t-0 f-w-500">' + responseMail.subject + '</h4></div>' +
																		'<ul class="media-list underline m-t-10 m-b-15 p-b-15">' +
																			'<li class="media media-sm clearfix">' +
																				'<img src="' + imgURL + '" class="pull-left media-object rounded-corner" />' + 
																				'<div class="media-body">' +
																					'<div class="email-from text-inverse f-s-14 f-w-600 m-b-3">' +
																						"from " + responseMail.fromname + " (" + responseMail.from + ")" + opened_by + 
																					'</div>' +
																					'<div class="m-b-3"><i class="fa fa-clock fa-fw"></i>&nbsp;' + prettyDate + '</div>' +
																				'</div>' +
																			'</li>' +
																			notesDIV + 
																		'</ul>';
									
										var fileContent = "";
										var files = responseMail.attachments.split(";");
										for (var i = 0; i < files.length; i++){
											if (files[i] != ""){
												fileContent += '<li class="fa-file">' +
														'<div class="document-file">' +
														'<a href="/Uploads/EmailAttachments/"' + files[i] + '" download="' + files[i] + '" ><i class="fa fa-file-image"></i></a>' +
														'</div>' +
														'<div class="document-name"><a href="/Uploads/EmailAttachments/"' + files[i] + '" download="' + files[i] + '" >' + files[i] + '</a></div>' +
														'</li>';
											}
										}
										var ticketContent = "";
										var tickets = dbMail.tickets;
										for (var i = 0; i < tickets.length; i++){
											var color = "text-warning";
											if (tickets[i].ticket_status == 1){
												color = "text-primary";
											}else if (tickets[i].ticket_status == 2){
												color = "text-success";
											}else if (tickets[i].ticket_status == 3){
												color = "text-danger";
											}
											ticketContent += '<li class="list-group-item"><a href="ticketdetails?ticket_id=' + tickets[i].ticket_id + '" target="_blank"><i class="fa fa-circle ' + color + ' m-r-5"></i>' + tickets[i].ticket_subject + "</a></li>";
										}
										var threadContent = "";
										var threads = responseMail.threads;
										for (var i = 0; i < threads.length; i++){
											var background = "";
											if (threads[i].uid == responseMail.mail_id){
												background = "bg-primary";
											}
											threadContent += '<li class="list-group-item ' + background + ' hover-pointer" onClick="viewConversation(this,' + i + ')">From <b>' + threads[i].from + '</b><br>' + moment(threads[i].date).format(dateformat + ", " + timeformat)  + "</a></li>";
										}
										$("#emailHeaderDIV").html(emailHeader);
										$("#emailMessageDIV").html(message);
										$("#emailTicketsUL").html(ticketContent);
										$("#emailThreadsUL").html(threadContent);
										$("#emailAttachmentDIV").html(fileContent);
										
										if (dbMail.opened == 0){
											var processBtn = '<button class="btn btn-success btn-sm pull-left m-r-10" onClick="markEmailAsFinished()" >Mark as processed</button>';
											if (dbMail.status == 2){
												processBtn = "";
											}
											$("#emailActionDIV").html(processBtn + '<button class="btn btn-primary btn-sm pull-left" onClick="showReplyPopup()">Reply</button><button class="btn btn-primary btn-sm pull-left m-l-10" onClick="showForwardPopup()">Forward</button><button class="btn btn-primary btn-sm pull-left m-l-10" onClick="showNewEmailTicketPopup()" >Create a ticket</button><button class="btn btn-white btn-sm pull-right pull-right" onClick="hideEmailContent()" >Close</button>')
										}else{
											$("#emailActionDIV").html('<button class="btn btn-primary btn-sm pull-left" onClick="showReplyPopup()">Reply</button><button class="btn btn-primary btn-sm pull-left m-l-10" onClick="showForwardPopup()">Forward</button><button class="btn btn-white btn-sm pull-right pull-right" onClick="hideEmailContent()" >Close</button>')
										}
										$("#emailPopupDIV, #emailPopupPanel").show();
						}
					});
				}
			});
        }
		
		function viewConversation(li,index) {
			$("#emailThreadsUL > li").removeClass("bg-primary");
			$(li).addClass("bg-primary");
			var conversation = currentMail.threads[index];
			var postData = {
				"mail_id": conversation.uid,
				"threads": 0
			};
			$.ajax({
				type: "POST",
				url:  "telephony/getattachments",
				data: postData,
				dataType: "json",
				success: function(responseMail) {
					var imgURL = "/assets/img/b-io.png";
					var message = responseMail.htmlmsg;
					if (message == "" || message == null) {
						message = responseMail.message;
					}
					var prettyDate = moment(responseMail.date).format(dateformat + ", " + timeformat);
					var emailHeader = '<div class="m-b-10 underline"><h4 class="m-t-0 f-w-500">' + responseMail.subject + '</h4></div>' +
						'<ul class="media-list underline m-t-10 m-b-15 p-b-15">' +
						'<li class="media media-sm clearfix">' +
						'<img src="' + imgURL + '" class="pull-left media-object rounded-corner" />' +
						'<div class="media-body">' +
						'<div class="email-from text-inverse f-s-14 f-w-600 m-b-3">' +
						"from " + responseMail.fromname + " (" + responseMail.from + ")" +
						'</div>' +
						'<div class="m-b-3"><i class="fa fa-clock fa-fw"></i>&nbsp;' + prettyDate + '</div>' +
						'</div>' +
						'</li>' +
						'</ul>';

					var fileContent = "";
					var files = responseMail.attachments.split(";");
					for (var i = 0; i < files.length; i++) {
						if (files[i] != "") {
							fileContent += '<li class="fa-file">' +
								'<div class="document-file">' +
								'<a href="/Uploads/EmailAttachments/"' + files[i] + '" download="' + files[i] + '" ><i class="fa fa-file-image"></i></a>' +
								'</div>' +
								'<div class="document-name"><a href="/Uploads/EmailAttachments/"' + files[i] + '" download="' + files[i] + '" >' + files[i] + '</a></div>' +
								'</li>';
						}
					}
					
					$("#emailHeaderDIV").html(emailHeader);
					$("#emailMessageDIV").html(message);
					$("#emailAttachmentDIV").html(fileContent);
				}
			});
		}
		
		function updateEmailTickets(){
			var postData = { "email_id": currentMail.email_id };
            $.ajax({
                type: "POST",
                url:  "telephony/getEmail",
                data: postData,
                dataType: "json",
                success: function(dbMail) {
								var ticketContent = "";
								var tickets = dbMail.tickets;
								for (var i = 0; i < tickets.length; i++){
									var color = "text-warning";
									if (tickets[i].ticket_status == 1){
										color = "text-primary";
									}else if (tickets[i].ticket_status == 2){
										color = "text-success";
									}else if (tickets[i].ticket_status == 3){
										color = "text-danger";
									}
									ticketContent += '<li class="list-group-item"><a href="ticketdetails?ticket_id=' + tickets[i].ticket_id + '" target="_blank"><i class="ion-pricetag ' + color + ' m-r-5"></i>' + tickets[i].ticket_subject + "</a></li>";
								}
								$("#emailTicketsUL").html(ticketContent);		
                }
            });
		}
        
        function markEmailAsRead(){
            var postData = { "email_id": currentMail.email_id, "mail_id": currentMail.mail_id, "notes": "", "status": 1 };
			console.log(postData);
            $.ajax({
                type: "POST",
                url:  "telephony/emailRead",
                data: postData,
                success: function(msg) {
                    if (msg == ""){
                        console.log("Marked as read");
                    }else {
                        alert("Error: " + msg);
                    }
                }
            });
        }
        
        function markEmailAsOpened(opened){
            var postData = { "email_id": currentMail.email_id, "opened": opened };
            $.ajax({
                type: "POST",
                url:  "telephony/emailOpened",
                data: postData,
                success: function(msg) {
                    if (msg == ""){
                        
                    }else {
                        alert("Error: " + msg);
                    }
                }
            });
        }
        
        function hideEmailContent(){
            if (currentMail.employee_id == loggedEmployee){
                markEmailAsOpened(0);
				clearInterval(emailOpenedInterval);
            }
            currentMail = null;
            $("#emailContentDIV").html("");
            $("#emailPopupDIV, #emailPopupPanel, #emailCommentPanel").hide();
        }
        
        function hideEmailComment(){
            $("#emailCommentPanel").hide();
            $("#emailPopupPanel").show();
        }
        
        function markEmailAsFinished(){
            $("#emailPopupPanel").hide();
            $("#emailCommentPanel").show();
        }
