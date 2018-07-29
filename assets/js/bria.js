/*****************************************************************************
 * JavaScript Sample of Bria Desktop API usage over a WebSocket connection
 *****************************************************************************/
 
//$ = $uery.noConflict();
 
/****************************************************************************
                      WEB SOCKET CONNECTION HANDLING
 ****************************************************************************/
 
var apiUri = "wss://cpclientapi.softphone.com:9002/counterpath/socketapi/v1";
 
function initialize() {
	connectToWebSocket();
 }

var websocket;
var callToAnswer;
var answeredCallNumber;
var hasCall = false;
  
/* 'connectToWebSocket' contain construction or the WebSocket object, connection, error - and event handling */
/* On any disconnection the error handling will attempt to reconnect after 5 seconds */ 
function connectToWebSocket() {
	var connectionError = false;
	var incomingMessage;
	
	/* Create new WebSocket object */
	try {
		websocket = new WebSocket(apiUri);
	}
	catch(e) {
		console.log('WebSocket exception: ' + e);
	}	

	/* Event handler for connection established */
	websocket.onopen = function(evt) {
		connectionError = false;
		setConnectionStatus('CONNECTED');
	};
	
	/* Event handler for disconnection from Web-Socket */
	websocket.onclose = function(evt) {
		if (!connectionError) {
			setConnectionStatus('DISCONNECTED - retrying connection after 5 seconds ...');
		}
		console.log('OnClose: ' + evt.code);
		console.log('OnClose: ' + evt.reason);
		/* Set timer to attempt re-connection in 5 seconds */
		setTimeout(function() { connectToWebSocket(); }, 5000);
	};

	/* Event handler for Errors on the Web-Socket connection */
	websocket.onerror = function(evt) {
		connectionError = true;
		setConnectionStatus('ERROR Could not connect to WebSocket - retry will happen after 5 seconds ...');
		console.log('OnError: ' + evt.code);
		websocket.close();
	};
	
	/* Event handler for received messages via web-socket connection */	
	websocket.onmessage = function(evt) {
		appendToLog('--- RECEIVED ---\n' + evt.data);
		var response = evt.data.split('<?xml version="1.0" encoding="utf-8" ?>');
		var parser = new DOMParser();
        var xmlDoc = parser.parseFromString(response[1],"text/xml");
        var isStatusCallResponse = xmlDoc.getElementsByTagName("status").length > 0 && xmlDoc.getElementsByTagName("status")[0].getAttribute("type") == "call";
        var isStatusCallHistory = xmlDoc.getElementsByTagName("status").length > 0 && xmlDoc.getElementsByTagName("status")[0].getAttribute("type") == "callHistory";
        var isNewCallPost = xmlDoc.getElementsByTagName("event").length > 0 && xmlDoc.getElementsByTagName("event")[0].getAttribute("type") == "call";
        var isMissedCallPost = xmlDoc.getElementsByTagName("event").length > 0 && xmlDoc.getElementsByTagName("event")[0].getAttribute("type") == "missedCall";
        if (isNewCallPost){
            getCalls();
        }else if (isMissedCallPost){
            getMissedCalls();
        }else if (isStatusCallResponse){ //response for list of current calls
            var currentCallIDs = xmlDoc.getElementsByTagName("id");
            var currentCallNumbers = xmlDoc.getElementsByTagName("number");
            var currentCallStates = xmlDoc.getElementsByTagName("state");
            if (callToAnswer !== null){
                for (var i = 0; i < currentCallStates.length; i++){
                    if (currentCallIDs[i].childNodes[0].nodeValue == callToAnswer){
                        return; //call exists
                    }
                }
                callToAnswer = null;
                $(".phone-panel").removeClass("active");
                $("#phone-panel-from").html("");
            }
            var firstRingingIndex = null;
            for (var i = 0; i < currentCallStates.length; i++){
                if (currentCallStates[i].childNodes[0].nodeValue == "ringing"){
                    firstRingingIndex = i;
                    break;
                }
            }
            if (firstRingingIndex !== null){
                callToAnswer = currentCallIDs[firstRingingIndex].childNodes[0].nodeValue; //get id of call to answer
                answeredCallNumber = currentCallNumbers[firstRingingIndex].childNodes[0].nodeValue;
                $(".phone-panel").addClass("active");
                $("#phone-panel-from").html(currentCallNumbers[firstRingingIndex].childNodes[0].nodeValue);
            }else{ //no calls or call ended
                $(".phone-panel").removeClass("active");
                $("#phone-panel-from").html("");
                callToAnswer = null;
                hasCall = false;
            }
        }else if (isStatusCallHistory){
            var missedCallID = xmlDoc.getElementsByTagName("id")[0].childNodes[0].nodeValue;
            var currentCallNumber = xmlDoc.getElementsByTagName("number")[0].childNodes[0].nodeValue;
            saveCallToDB(missedCallID, currentCallNumber, "missed");
        }
		/* Process received data */
	};
}
	 
function sendMessage(msg) {
	websocket.send(msg);
	appendToLog('----- SENT -----\n' + msg);
}	

function saveCallToDB(callID, callNumber, status){
    if (callNumber.indexOf("@") != -1){ //remove IP from number
        callNumber = callNumber.split("@")[0]; //gets actual phonenumber
    }
    var postData = { "call_uid": callID, "call_number": callNumber, "status": status };
    $.ajax({
        type: "POST",
        url: "calltrack/insert",
        data: postData,
        success: function(msg) {
            console.log("Calltrack response " + msg);
        }
    });
}


/****************************************************************************
                         HTML ON-CLICK HANDLERS
 ****************************************************************************/  

function placeCall() {
    var target = $('#CallTargetTextInput').val();
	apiPlaceCall(target);
}

function bringToFront() {
	apiBringToFront();
}
	
function getCalls(){
    var content = '<?xml version=\"1.0\" encoding=\"utf-8\" ?>\r\n<status>\r\n <type>call</type>\r\n</status>';
    var msg = constructApiMessage('status', content);
    sendMessage(msg);
}

function getMissedCalls(){
    var content = '<?xml version=\"1.0\" encoding=\"utf-8\" ?>\r\n<status>\r\n <type>callHistory</type><count>1</count><entryType>missed</entryType>\r\n</status>'; //get most recent missed call
    var msg = constructApiMessage('status', content);
    sendMessage(msg);
}

function answerCall(){
    hasCall = true;
    saveCallToDB(callToAnswer, answeredCallNumber, "done");
    var content = "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\r\n<answerCall>\r\n <callId>" + callToAnswer + "</callId>\r\n</answerCall>";
    var msg = constructApiMessage('answer', content);
    sendMessage(msg);
    $(".phone-panel").removeClass("active");
    $("#phone-panel-from").html("");
}

function declineCall(){
    var content = "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\r\n<endCall>\r\n <callId>" + callToAnswer + "</callId>\r\n</endCall>";
    var msg = constructApiMessage('endCall', content);
    sendMessage(msg);
    $(".phone-panel").removeClass("active");
    $("#phone-panel-from").html("");
    hasCall = false;
}

function transferCall(){
    var content = "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\r\n<transferCall>\r\n <callId>" + callToAnswer + "</callId><target>214@192.168.19.6</target>\r\n</transferCall>";
    var msg = constructApiMessage('transferCall', content);
    sendMessage(msg);
}
	
/****************************************************************************
                          API MESSAGE CONSTRUCTION
 ****************************************************************************/	 

const userAgentString = "Minimal Bria API JavaScript Sample";
  
var lastTransactionID = 0;	
	
function getNextTransactionID() {
	lastTransactionID++;
	return lastTransactionID;
}
	
function constructApiMessage(request, body) {
    var contentLength = body.length;
	var msg = 'GET /' + request
			+ '\r\nUser-Agent: ' + userAgentString 
			+ '\r\nTransaction-ID: ' + getNextTransactionID() 
			+ '\r\nContent-Type: application/xml\r\nContent-Length: ' + contentLength;
	if (contentLength > 0)
	{
		msg += '\r\n\r\n' + body;
    }

    return msg;
}
	
	
/****************************************************************************
                             BRIA API COMMANDS
 ****************************************************************************/	

function apiPlaceCall(target) {
	var content = '<?xml version=\"1.0\" encoding=\"utf-8\" ?>\r\n<dial type="audio">\r\n <number>' + target + '</number>\r\n<displayName></displayName>\r\n</dial>';
	var msg = constructApiMessage('call', content);
	sendMessage(msg);
}	

function apiBringToFront() {	
	var msg = constructApiMessage('bringToFront', '');
	sendMessage(msg);
}


/****************************************************************************
                         HTML/UI HELPER FUNCTIONS
 ****************************************************************************/
 
function setConnectionStatus(status) {
	var statusField = $('#ConnectionStatusText');
	statusField.text(status);
	console.log('setting status to: ' + status);
}
 
function appendToLog(data) {
	var logField = $('#APIMessageLog');
	logField.val(logField.val() + data + '\n\n');
	logField.scrollTop(logField[0].scrollHeight);
}	

function clearLog() {
	var logField = $('#APIMessageLog');
	logField.val("");
}


/****************************************************************************
    EVERYTHING STARTS BY CALLING INITIALIZE WHEN THE PAGE IS DONE LOADING
 ****************************************************************************/

 window.addEventListener("load", initialize, false);
 