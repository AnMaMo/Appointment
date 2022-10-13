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