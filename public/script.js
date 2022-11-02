var disabledDays = [];
UpdateDisabledDays();


/**
 * This function set the params of the datepicker JQuery
 */
$(function () {
    $("#datepicker").datepicker({
        dateFormat: 'yy-mm-dd',
        firstDay: 1,

        // Iterate the array of dates to disable
        beforeShowDay: function (date) {
            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
            return [disabledDays.indexOf(string) == -1]
        }
    });
});

/**
 * Function calls when you click the datepicker
 */
function UpdateDisabledDays() {
    /**
* CALL AJAX
* url: call a controller to get the no avaliable hours for the selected date
* type: POST
* data: date and workstation id (send to the controller)
* success: call the function ProcessInvalidHours when the ajax is success
*/
    $.ajax({
        url: 'index.php?page=setDisabledDates',
        dataType: "json",
        success: setdisabledates
    });
}

/**
 * Function to set a disabled date in the datepicker
 * @param {*} disabledates 
 */
function setdisabledates(disabledates) {
    // Clear the array of disabled dates
    disabledDays = [];

    for (const date of disabledates.novalidDays) {
        // Save the date in a datetime variable
        disabledDays.push(date.day);
    }
}

/**
 * Function to call ajax to get the hours available for the selected date
 */
function selectDate() {
    // Get the workstation id and the date selected
    var workstation = $("#workstation").val();
    var date = $("#datepicker").val();

    /**
     * CALL AJAX
     * url: call a controller to get the no avaliable hours for the selected date
     * type: POST
     * data: date and workstation id (send to the controller)
     * dataType: JSON
     * success: call the function ProcessInvalidHours when the ajax is success
     */
    $.ajax({
        url: 'index.php?page=checkhours',
        type: 'POST',
        data: { date: date, workstation: workstation },
        dataType: "json",
        success: ProcessInvalidHours
    });
}

/**
 * Function to process the hours not available for the selected date and workstation
 * @param {*} data 
 */
function ProcessInvalidHours(data) {
    // Reset the hour clicked and the input "hour_selected"
    $(".hourclicked").removeClass("hourclicked").addClass("hour");
    $("#hour_selected").val("");

    // Set the click attribute on a previous hours selected and set valid again
    $(".noValidHour").attr("onclick", "clickHour(this)");
    $(".noValidHour").removeClass("noValidHour").addClass("hour");

    // Iterate the elements of the JSON array
    for (const date of data.noAvaliableHours) {
        // Save the date in a datetime variable
        var dates = new Date(date.app_datetime);

        // Get hour and minutes to the datetime
        var hour = dates.getHours();
        var minutes = dates.getMinutes();
        if (minutes == 0) {
            minutes = "00";
        }

        // Save the no valid hours in a variable
        var novalidHour = hour + ":" + minutes;

        // Get element by name novaidHour and set new class
        var element = document.getElementsByName(novalidHour);

        // Put the hour to no valid and and remove click attribute
        $(element[0]).removeClass("hour").addClass("noValidHour");
        $(element[0]).removeAttr("onclick");
    }
}


/**
 * Function executed when the user clicks on an hour.
 * @param {*} hourclicked 
 */
function clickHour(hourclicked) {
    // Get all elements with class hourclicked and set new class hour.
    $(".hourclicked").removeClass("hourclicked").addClass("hour");

    // Get the element clicked and set new class hourclicked.
    $(hourclicked).removeClass("hour").addClass("hourclicked");

    // Set to input "hour_selected" the value of the clicked hour.
    var hour = $('.hourclicked').attr('name');
    $("#hour_selected").val(hour);
}


/**
 * Function to see if user has entered invalid credentials
 * in the login form and hide the error message
 */
function invalidCredentials() {
    // Hidde the error message
    $(".credentials-error").removeClass("correct-credentials").addClass("invalid-credentials");
}