function appointmentValidate() {
    var form = document.appointmentForm;
    var date = form.dateAppointment;
    alert(date.value);
    return false;
}


function validDay(day) {
    var form = document.appointmentForm;
    var date = form.dateAppointment;

    //Extract day from date
    var dateArr = date.value.split("/");
    var day = dateArr[1];

    if(day == "01"){
        document.appointmentForm.dateAppointment.value = "";
        return false;
        
    }
}


function invalidCredentials(){
    //get element and set new class
    var element = document.getElementById("credentials-error");
    element.classList.add("invalid-credentials");
    element.classList.remove("correct-credentials");
}

function sendchangename(){
    var name_new = $("#name_new").val();

    $.ajax({
        url: 'index.php?page=getchangeinfo',
        type: 'POST',
        data: { name_new: name_new},
        dataType: "json"
    });
}

function sendchangemail(){
    var email_new = $("#email_new").val();

    $.ajax({
        url: 'index.php?page=getchangemail',
        type: 'POST',
        data: { email_new: email_new},
        dataType: "json"
    });
}

function sendchangepassword(){
    var password_new = $("#password_new").val();
    var password_current =$("#password_current").val();
    
    $.ajax({
        url: 'index.php?page=getchangepassword',
        type: 'POST',
        data: { password_new: password_new, password_current:password_current},
        dataType: "json"
    });
}