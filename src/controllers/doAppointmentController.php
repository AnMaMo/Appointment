<?php
function saveAppointment($peticio, $resposta, $contenidor)
{
    //Get the Models
    $appointments = $contenidor->appointment();
    $users = $contenidor->users();
    $workstations = $contenidor->workstations();


    // Get the session mail to user
    $usermail = $peticio->get("SESSION", "loged");

    // Get the user to the database
    $user = $users->getUser($usermail);

    // Get the user id
    $user_id = $user["user_id"];

    // Get the post info to user
    $dateTimeForm = $peticio->get(INPUT_POST, "dateAppointment");
    $time = $peticio->get(INPUT_POST, "hour_selected");


    //Array the date
    $dateArray = explode("/", $dateTimeForm);
    $year = $dateArray[0];
    $month = $dateArray[1];
    $day = $dateArray[2];
    //Array the time
    $arrayTime = explode(":", $time);
    $hour = $arrayTime[0];
    $minute = $arrayTime[1];
    // Create DateTime
    $dateTime = $year . "-" . $month . "-" . $day . " " . $hour . ":" . $minute . ":00";


    // Get the workstation id by post name
    $workstation_id = $peticio->get(INPUT_POST, "workstation_selected");

    // Execute the query
    $appointments->addAppointmentToDatabase($user_id, $dateTime, $workstation_id, "user");

    $resposta->redirect("location: index.php");

    //return resposta
    return $resposta;
}
