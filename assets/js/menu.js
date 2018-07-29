function getMenuStatistics(employee_id) {
    var postData = { "employee_id": employee_id };
    $.ajax({
        type: "POST",
        url: "<?= BASE_URL ?>" + "task/getToday",
        data: postData,
        dataType: "json",
        success: function(tasks) {
            if (tasks.length > 0) {
                $("#taskLink").html("Tasks <span class='label label-theme m-l-5'>" + tasks.length + "</span>");
                $("#eventSpan").html("Events <span class='label label-success m-l-5'>NEW</span>");
            }
        }
    });
    $.ajax({
        type: "POST",
        url: "<?= BASE_URL ?>" + "meeting/getToday",
        data: postData,
        
        success: function(meetings) {
            console.log(meetings);
            if (meetings.length > 0) {
                $("#meetingLink").html("Meetings <span class='label label-theme m-l-5'>" + meetings.length + "</span>");
                $("#eventSpan").html("Events <span class='label label-success m-l-5'>NEW</span>");
            }
        }
    });
    $.ajax({
        type: "POST",
        url: "<?= BASE_URL ?>" + "reminders/getToday",
        data: postData,
        dataType: "json",
        success: function(reminders) {
            if (reminders.length > 0) {
                $("#reminderLink").html("Reminders <span class='label label-theme m-l-5'>" + reminders.length + "</span>");
                $("#eventSpan").html("Events <span class='label label-theme m-l-5'>NEW</span>");
            }
        }
    });
}