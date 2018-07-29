
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
					var postData = new FormData(this);
					postData.append('recipients', recipients);
					postData.append('cc', cc);
					postData.append('bcc', bcc);
					postData.append('is_reply', is_reply);
					postData.append('is_forward', is_forward);
					if (currentMail != null){
						postData.append('mail_id', currentMail.mail_id);
					}
                    $.ajax({
                    	type: "POST",
                    	url:  "email/365send",
						processData: false,
						contentType: false,
						cache: false,
                    	data: postData,
						dataType: "json",
                    	success: function(response) {
							console.log(response);
                        	if (!response.error){
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
                                		'The server encountered the following error: ' + response.message,
                                		'error'
                            		);
                        	}
                    	}
                    });
                }
            });
	});
	
	function refreshEmails(showLoading){
			currentPage = 1;
			var postData = { "current_page": currentPage, "per_page": perPage };
			if (showLoading){
				$("#loadingPopup").show();
			}
			$.ajax({
						type: "POST",
						url:  "telephony/365list",
						data: postData,
						dataType: "json",
						success: function(response) {
							loadedPages = [];
							emailArray = [];
							var responseEmails = response.emails;
							allMessages = response.count;
							loadedPages.push(currentPage);
							for (var i = 0; i < responseEmails.length; i++){
								emailArray.push(responseEmails[i]);
							}
							var showFrom = (currentPage - 1) * perPage;
							var showTo = showFrom + perPage;
							if (showTo > allMessages){
								showTo = allMessages;
							}
							var emailContent = "";
							for (var i = showFrom; i < showTo; i++){
								var email = emailArray[i];
								if (email == null || email == undefined){
									break;
								}
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
								var prettyDate = moment(email.date).format("Do MMMM, HH:mm");
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

								var fromField = email.fromname;
								
								var listItem = '<li class="list-group-item ' + isRead + '">' +
													emailButtons +
													'<div class="email-user m-r-10 bg-' + color + '" onClick="viewEmail(' + i + ')">' +
														ticketContent +
													'</div>' +
													'<div class="email-info" onClick="viewEmail(' + i + ')">' +
														'<div>' +
															'<span class="email-time">' + prettyDate + '</span>' +
															'<span class="email-sender">' + fromField + "<br>" + finishedBy + '</span>' +
															'<span class="email-title">' + email.subject + '</span>' +
															'<span class="email-desc">' + email.snippet.substring(0,60) + '...</span>' +
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
				refreshEmails();
				return;
			}
			var postData = { "query": searchQ };
					if (!firstPageLoad){
						$("#loadingPopup").show();
					}
					$.ajax({
						type: "POST",
						url:  "telephony/365search",
						data: postData,
						dataType: "json",
						success: function(responseEmails) {
							console.log(responseEmails);
							var emailContent = "";
							for (var i = 0; i < responseEmails.length; i++){
								var email = responseEmails[i];
								var color = "blue";
								var isRead = "unread";
								if (email.seen == 1){
									isRead = "read";
								}
								var prettyDate = moment(email.date).format("Do MMMM, HH:mm");
								var starIcon = "far fa-star";
								if (email.flagged == 1){
									starIcon = "fa fa-star";
								}
								
								var checkbox = '<div class="email-checkbox">' +
														'<label>' +
															'<i class="far fa-square"></i>' +
															'<input type="checkbox" data-checked="email-checkbox">' +
														'</label>' +
													'</div>';
								
								
								var fromField = email.fromname;
							
								
								
								var listItem = '<li class="list-group-item ' + isRead + '">' +
													checkbox +
													'<div class="email-checkbox">' +
														'<i onClick="toggleStarred(this,' + i + ')" class="' + starIcon + ' text-warning"></i>' +
													'</div>' +
													'<div class="email-user m-r-10 bg-' + color + '" onClick="viewEmail(' + i + ')">' +
														'<span class="text-white">' + fromField.substring(0, 1).toUpperCase() + '</span>' +
													'</div>' +
													'<div class="email-info" onClick="viewEmail(' + i + ')">' +
														'<div>' +
															'<span class="email-time">' + prettyDate + '</span>' +
															'<span class="email-sender">' + fromField + '</span>' +
															'<span class="email-title">' + email.subject + '</span>' +
															'<span class="email-desc">' + email.snippet.substring(0,60) + '...</span>' +
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
			swal({
				title: "Deletion confirmation",
                text: 'Are you sure you want to delete this e-mail?',
                type: 'error',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: "Cancel",
                confirmButtonText: 'Delete e-mail'
                }).then(function () {
                    var postData = { "mail_ids": currentMail.mail_id };
					$.ajax({
						type: "POST",
						url:  "webmail/365delete",
						data: postData,
						dataType: "json",
						success: function(response) {
							console.log(response);
							if (!response.error){
								swal(
									'Delete completed',
									'E-mail was successfully deleted',
									'success'
								);
								showEmailOverview();
								refreshEmails();
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
			is_reply = 1;
            $("#emailPopupDIV, #emailPopupPanel").hide();
			$("#email-to").tagit('createTag', currentMail.from);
			$("#emailSubjectInput").val("Re: " + currentMail.subject);
			$("#composePopup").show();
		}
		
		function showForwardPopup(){
			is_forward = 0;
            $("#emailPopupDIV, #emailPopupPanel").hide();
			tinymce.get('emailMessageInput').setContent(currentMail.message);
			$("#emailSubjectInput").val("Fw: " + currentMail.subject);
			$("#composePopup").show();
		}
        
        function hideComposePopup(){
			is_reply = 0;
			is_forward = 0;
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
					var postData = { "current_page": currentPage, "per_page": perPage };
					if (!firstPageLoad){
						$("#loadingPopup").show();
					}
					$.ajax({
						type: "POST",
						url:  "telephony/365list",
						data: postData,
						dataType: "json",
						success: function(response) {
							console.log(response);
							var responseEmails = response.emails;
							allMessages = response.count;
							loadedPages.push(currentPage);
							for (var i = 0; i < responseEmails.length; i++){
								emailArray.push(responseEmails[i]);
							}
							var showFrom = (currentPage - 1) * perPage;
							var showTo = showFrom + perPage;
							if (showTo > allMessages){
								showTo = allMessages;
							}
							var emailContent = "";
							for (var i = showFrom; i < showTo; i++){
								var email = emailArray[i];
								if (email == null || email == undefined){
									break;
								}
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
								var prettyDate = moment(email.date).format("Do MMMM, HH:mm");
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

								var fromField = email.fromname;
								
								var listItem = '<li class="list-group-item ' + isRead + '">' +
													emailButtons +
													'<div class="email-user m-r-10 bg-' + color + '" onClick="viewEmail(' + i + ')">' +
														ticketContent +
													'</div>' +
													'<div class="email-info" onClick="viewEmail(' + i + ')">' +
														'<div>' +
															'<span class="email-time">' + prettyDate + '</span>' +
															'<span class="email-sender">' + fromField + "<br>" + finishedBy + '</span>' +
															'<span class="email-title">' + email.subject + '</span>' +
															'<span class="email-desc">' + email.snippet.substring(0,60) + '...</span>' +
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
							var responseEmails = response.emails;
							allMessages = response.count;
							loadedPages.push(currentPage);
							for (var i = 0; i < responseEmails.length; i++){
								emailArray.push(responseEmails[i]);
							}
							var showFrom = (currentPage - 1) * perPage;
							var showTo = showFrom + perPage;
							if (showTo > allMessages){
								showTo = allMessages;
							}
							var emailContent = "";
							for (var i = showFrom; i < showTo; i++){
								var email = emailArray[i];
								if (email == null || email == undefined){
									break;
								}
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
								var prettyDate = moment(email.date).format("Do MMMM, HH:mm");
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

								var fromField = email.fromname;
								
								var listItem = '<li class="list-group-item ' + isRead + '">' +
													emailButtons +
													'<div class="email-user m-r-10 bg-' + color + '" onClick="viewEmail(' + i + ')">' +
														ticketContent +
													'</div>' +
													'<div class="email-info" onClick="viewEmail(' + i + ')">' +
														'<div>' +
															'<span class="email-time">' + prettyDate + '</span>' +
															'<span class="email-sender">' + fromField + "<br>" + finishedBy + '</span>' +
															'<span class="email-title">' + email.subject + '</span>' +
															'<span class="email-desc">' + email.snippet.substring(0,60) + '...</span>' +
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
        }
		
		function toggleStarred(item, index){
            var email = emailArray[index];
            
            var isStarred = (email.flagged == 1);
            
            if (isStarred){
				$(item).removeClass("fa fa-star");
                $(item).addClass("far fa-star");
                var postData = { "mail_id": email.mail_id, "importance": "Normal" };
				$.ajax({
					type: "POST",
					url:  "webmail/365star",
					data: postData,
					success: function(response) {
						console.log(response);
						email.flagged = 0;
					}
				});
            }else{
				$(item).removeClass("far fa-star");
                $(item).addClass("fa fa-star");
                var postData = { "mail_id": email.mail_id, "importance": "High" };
				$.ajax({
					type: "POST",
					url:  "webmail/365star",
					data: postData,
					success: function(response) {
						console.log(response);
						email.flagged = 1;
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
        
        function viewEmail(index) {
			var email = emailArray[index];
			var postData = { "mail_id": email.mail_id, "email_id": email.email_id };
            $.ajax({
                type: "POST",
                url:  "telephony/365attachments",
                data: postData,
				dataType: "json",
                success: function(response) {
					email.attachments = response.attachments;
					var dbMail = response.email;
					currentMail = email;
					var imgURL = "/assets/img/b-io.png";
					var message = email.message;
					var prettyDate = moment(email.date).format("dddd Do MMMM, HH:mm");
					if (email.seen == 0) {
						markEmailAsRead();
					}

					var fromField = "from " + email.fromname + " (" + email.from + ")";
					
					var notesDIV = "";
					if (email.seen == 2){
						notesDIV = '<li class="media media-sm clearfix">' +
									'<div class="media-body">' +
										'<div class="email-from text-inverse f-s-14 f-w-600 m-b-3">' +
											"Employee notes:" +
										'</div>' +
										dbMail.notes +
									'</div>' +
									'</li>';
					}
					
					var opened_by = "";
					currentMail.opened = dbMail.opened;
					currentMail.employee_id = dbMail.employee_id;
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

					var emailHeader = '<h3 class="m-t-0 m-b-15 f-w-500">' + email.subject + '</h3>' +
						'<ul class="media-list underline m-b-15 p-b-15">' +
						'<li class="media media-sm clearfix">' +
						'<img src="' + imgURL + '" class="pull-left media-object rounded-corner" />' +
						'<div class="media-body">' +
						'<div class="email-from text-inverse f-s-14 f-w-600 m-b-3">' +
						fromField + opened_by +
						'</div>' +
						'<div class="m-b-3"><i class="fa fa-clock fa-fw"></i>&nbsp;' + prettyDate + '</div>' +
						'</div>' +
						'</li>' +
						notesDIV + 
						'</ul>';
					var fileContent = "";
					var files = currentMail.attachments;
					for (var i = 0; i < files.length; i++) {
						var curFile = files[i];
						console.log(curFile);
						var attachmentLink = 'data:' + curFile.content_type + ';base64,' + curFile.content_bytes.replace(/-/g, '+').replace(/_/g, '/');
						if (curFile.content_id != "" && curFile.is_inline) {
							var regex = new RegExp('"cid:' + curFile.content_id + '"', "g");
							message = message.replace(regex, attachmentLink);
						} else {
							fileContent += '<li class="fa-file">' +
								'<div class="document-file">' +
								'<a href="' + attachmentLink + '" download="' + curFile.name + '" ><i class="fa fa-file-image"></i></a>' +
								'</div>' +
								'<div class="document-name"><a href="' + attachmentLink + '" download="' + curFile.name + '" >' + curFile.name + '</a></div>' +
								'</li>';
						}
					}
					email.message = message;
					
					
					
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
					$("#emailHeaderDIV").html(emailHeader);
					$("#emailMessageDIV").html(message);
					$("#emailTicketsUL").html(ticketContent);
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
            var postData = { "mail_id": currentMail.mail_id };
            $.ajax({
                type: "POST",
                url:  "webmail/365read",
                data: postData,
				dataType: "json",
                success: function(response) {
					console.log(response);
					if (!response.error){
						currentMail.seen = 1;
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
