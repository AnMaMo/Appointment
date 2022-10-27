$(function datepicker() {
    $("#datepicker").datepicker({ dateFormat: "yy/mm/dd" }).val();
});


/**
 * Function to call ajax to get the hours available for the selected date
 */
function selectDate(date) {
    //get the workstation id and the date selected
    var workstation = document.getElementById("workstation").value;
    var date = document.getElementById("datepicker").value;

    $.ajax({
        url: 'index.php?page=checkhours',
        type: 'POST',
        data: { date: date, workstation: workstation },
        dataType: "json",
        success: procesJSON
    });
}

function procesJSON(data) {

//get all elements with clas novalidhour and set attribute onclick with jquery
$(".hourclicked").removeClass("hourclicked").addClass("hour");
    $(".noValidHour").attr("onclick", "clickHour(this)");

    $(".noValidHour").removeClass("noValidHour").addClass("hour");

    // Iterate the elements of the JSON array
    for (const date of data.noAvaliableHours) {
        // Save the date in a datetime variable
        var dates = new Date(date.app_datetime);

        //get hour and minutes to the datetime
        var hour = dates.getHours();
        var minutes = dates.getMinutes();
        if (minutes == 0) {
            minutes = "00";
        }

        // Save the no valid hours in a variable
        var novalidHour = hour + ":" + minutes;

        console.log(novalidHour);

        //get element by name novaidHour and set new class
        var element = document.getElementsByName(novalidHour);

        element[0].classList.remove("hour");
        element[0].classList.add("noValidHour");

        //remove onclick event from the no valid hours
        element[0].removeAttribute("onclick");
    }

}





function clickHour(hourclicked) {
    //get all elements with class "hour-clicked"
    var elements = document.getElementsByClassName("hourclicked");
    //remove class "hour-clicked" from all elements
    for (var i = 0; i < elements.length; i++) {
        elements[i].classList.add("hour");
        elements[i].classList.remove("hourclicked");
    }

    //get element with id "hourclicked" and set new class
    hourclicked.classList.remove("hour");
    hourclicked.classList.add("hourclicked");

    //set to input "hour_selected" the value of the clicked hour
    var hour = $('.hourclicked').attr('name');
    document.getElementById("hour_selected").value = hour;
}



function invalidCredentials() {
    //get element and set new class
    var element = document.getElementById("credentials-error");
    element.classList.add("invalid-credentials");
    element.classList.remove("correct-credentials");
}