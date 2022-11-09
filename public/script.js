/* Create a array with disabled days and call function to fill it */
var disabledDays = [];
UpdateDisabledDays();


/* Function when open the page configure the Datepicker */
$(function () {
    $("#datepicker").datepicker({
        dateFormat: 'yy-mm-dd', // Set the format of the date
        firstDay: 1, // Monday
        minDate: "dateToday", // Calendar starts today
        maxDate: "+2M", // Calendar ends in 2 months

        //  beforeShowDay: DisableSpecificDates, // Call function to disable specific dates

        /* Iterate the array of dates to disable */
        beforeShowDay: function (date) {
            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
            return [disabledDays.indexOf(string) == -1]
        }
    });
});


/* */
$(document).ready(function () {
    $('.table-useraccount').DataTable(
        // set max length of the table to 3 and not show the search bar
        { "lengthMenu": [2], "searching": false, "lengthChange": false }
    );

});




/**
 * This function actualize the disabled days array.
 * Call a ajax controller to get the disabled days.
 * 
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
        url: 'index.php?page=checkAvaliableHours',
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
    //get element and set new class
    var element = document.getElementById("credentials-error");
    element.classList.add("invalid-credentials");
    element.classList.remove("correct-credentials");
}


/**
 * It passes the new name
 * @returns 
 */
function sendchangename() {
    var name_new = $("#newName").val();

    // If you have nothing 
    if (name_new === null || name_new === "") {
        alert("write a new name!!!");
        return;
    }

    $.ajax({
        url: 'index.php?page=getchangename',
        type: 'POST',
        data: { name_new: name_new },
        dataType: "json",
    });
}



/**
 * It passes the id of the appointment
 * @param {*} appointment 
 */
function sendcancelappointment(appointment) {

    var appointment_id = $(appointment).data("id");

    $.ajax({
        url: 'index.php?page=getcancelappointment',
        type: 'POST',
        data: { appointment_id: appointment_id },
        dataType: "json"
    });

    // Reload the page
    location.reload();
}



///// ADMIN APPOINTMENT PANNEL /////

/* Function when open the page configure the Datepicker */
$(function () {
    $('#adminDatepicker').datepicker({

        // Set the date format
        dateFormat: 'yy-mm-dd',

        onSelect: selectAdminDate

    });
});


function adminBlockDay() {
    var date = $("#admindatepicker").val();

    //date get day, month and year
    var day = date.substring(0, 2);
    var month = date.substring(3, 5);
    var year = date.substring(6, 10);


    //Add to the datepicker date the class "disabledDay"
}


/**
 * 
 * @param {*} wsId 
 */
function deleteWorkStation(wsId) {
    $.ajax({
        url: 'index.php?page=deleteWSController',
        type: 'POST',
        data: { id: wsId },
        dataType: "json",
    });

    location.reload();
}


/**
 * Function to get if date is blocked or not
 */
function selectAdminDate(date) {

    // Get the workstation selected
    var workstation = $("#workstation").val();

    // with ajax see if date is blocked
    $.ajax({
        url: 'index.php?page=checkBlockedDate',
        type: 'POST',
        data: { date: date },
        dataType: "json",
        success: ProcessBlockedDate
    });


    //Actualize the hours not available for the selected date with ajax
    $.ajax({
        url: 'index.php?page=checkAvaliableAdminHours',
        type: 'POST',
        data: { date: date, workstation: workstation },
        dataType: "json",
        success: ProcessInvalidAdminHours
    });

}

function ProcessInvalidAdminHours(data) {
    // Reset the hour clicked and the input "hour_selected"
    $(".hour").removeClass("hourOff").addClass("hourOn");

    // Iterate the elements of the JSON array
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
        $(element[0]).removeClass("hourOn").addClass("hourOff");
    }
}


/**
 * Function to process the date blocked or not
 * @param {*} data
 * @returns
 *  
 * */
function ProcessBlockedDate(data) {
    // if date is blocked
    if (data.dayisBlocked == true) {
        // set the button to unblock
        $("#onoffDate").removeClass("dateOn").addClass("dateOff");
        $("#onoffDate").text("Enable Date");

    } else {
        // set the button to block
        $("#onoffDate").removeClass("dateOff").addClass("dateOn");
        $("#onoffDate").text("Disable Date");
    }
}


/**
 * Function to block or unblock the date
 */
function enableDisableDate() {
    var date = $("#adminDatepicker").val();

    //Get the class of #onoffDate if is dateOff set to dateOn and viceversa
    var onoffDate = $("#onoffDate").attr("class");

    if (onoffDate == "dateOff") {

        // with ajax unset the date blocked
        $.ajax({
            url: 'index.php?page=enableDisableDate',
            type: 'POST',
            data: { date: date, onoffDate: onoffDate },
            dataType: "json",
        });

        $("#onoffDate").removeClass("dateOff").addClass("dateOn");
        $("#onoffDate").text("Disable Date");

    } else {
        //ajax to disable the date
        $.ajax({
            url: 'index.php?page=disableDate',
            type: 'POST',
            data: { date: date },
            dataType: "json",
        });

        $("#onoffDate").removeClass("dateOn").addClass("dateOff");
        $("#onoffDate").text("Enable Date");
    }
}


/**
 * This function create or delete a admin appointment
 * @param {*} hour 
 * @returns 
 */
function onoffHour(hour) {

    var selectedHour = $(hour).attr("name");

    // get the date selected on admindatepicker
    var date = $("#adminDatepicker").val();

    //if date is not selected alert
    if (date == "" || date == null) {
        alert("Select a date");
        return;
    }

    // get the workstation selected
    var workstation = $("#workstation").val();


    // if the hour has class hourOn set to hourOff and viceversa
    if ($(hour).hasClass("hourOn")) {

        // Ajax to create the hour blocked
        $.ajax({
            url: 'index.php?page=disableHour',
            type: 'POST',
            data: { hour: selectedHour, date: date, workstation: workstation},
            dataType: "json",
        });

        $(hour).removeClass("hourOn").addClass("hourOff");
    }
    else {

        // Ajax to delete the hour blocked
        $.ajax({
            url: 'index.php?page=enableHour',
            type: 'POST',
            data: { hour: selectedHour, date: date, workstation: workstation },
            dataType: "json",
        });

        $(hour).removeClass("hourOff").addClass("hourOn");
    }

}