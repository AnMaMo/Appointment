<?php
function enableHour($peticio, $resposta, $contenidor){
    // Model
    $appointment = $contenidor->appointment();

    // Get the date the hour and the workstation
    $date = $peticio->get(INPUT_POST, "date");
    $hour = $peticio->get(INPUT_POST, "hour");
    $workstation = $peticio->get(INPUT_POST, "workstation");
    

    // Get year, month and day
    $dateArray = explode("-", $date);
    $year = $dateArray[0];
    $month = $dateArray[1];
    $day = $dateArray[2];

    // Create a datetime
    $dateTime = $year . "-" . $month . "-" . $day . " " . $hour . ":00";

    // Logic
    $appointment->removeAdminAppointment($dateTime, $workstation);
    
    //return
    return $resposta;
} 