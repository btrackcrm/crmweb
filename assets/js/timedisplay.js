var t;
var isBusy = true;

startTime();
setFree();

function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            h = checkTime(h);
            m = checkTime(m);
            $("#timeDisplay").html(h + ":" + m);
            setTimeout(startTime, 1000);
}
        
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    } // add zero in front of numbers < 10
    return i;
}

function idleLogout() {
    
    window.onload = resetTimer;
    window.onmousemove = resetTimer;
    window.onmousedown = resetTimer; // catches touchscreen presses
    window.onclick = resetTimer;     // catches touchpad clicks
    window.onscroll = resetTimer;    // catches scrolling with arrow keys
    window.onkeypress = resetTimer;

}

function setBusy() {
        isBusy = true;
        var postData = { "status": 2 };
         $.ajax({
            type: "POST",
            url: "employee/busy",
            data: postData,
            success: function(msg) {
            
            }
         });
    }
    
    function setFree(){
        isBusy = false;
        var postData = { "status": 1 };
        $.ajax({
            type: "POST",
            url: "employee/busy",
            data: postData,
            success: function(msg) {
                
            }
         });
    }

    function resetTimer() {
        clearTimeout(t);
        if (isBusy){
            setFree();
        }
        t = setTimeout(setBusy, 600000);  // time is in milliseconds
    }

idleLogout();

