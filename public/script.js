function clickHour(hourclicked){
    //get all elements with class "hour-clicked"
    var elements = document.getElementsByClassName("hourclicked");
    //remove class "hour-clicked" from all elements
    for(var i = 0; i < elements.length; i++){
        elements[i].classList.add("hour");
        elements[i].classList.remove("hourclicked");
    }

    //get element with id "hourclicked" and set new class
    hourclicked.classList.remove("hour");
    hourclicked.classList.add("hourclicked");

    var asd = $('.hourclicked').attr('name');
    alert(asd);

    //set to input "hour_selected" the value of the clicked hour
    document.getElementById("hour_selected").value = asd;
}



function invalidCredentials(){
    //get element and set new class
    var element = document.getElementById("credentials-error");
    element.classList.add("invalid-credentials");
    element.classList.remove("correct-credentials");
}