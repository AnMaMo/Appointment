<?php
function getCancelAppointment($peticio, $resposta, $contenidor){
    // Get the user model
    $users = $contenidor->users();
    $appointment = $contenidor->appointment();

    // Import
    $appointment_id = $peticio->get(INPUT_POST, "appointment_id");

    // Get the session email
    $usermail = $peticio->get("SESSION", "loged");
    $user = $users->getUser($usermail);
    // Assigns it the user_id value of the DB
    $userid = $user["user_id"];

    // Appointment
    $appointmentsList = $appointment->getUserAppointments($userid);

    // Boolean
    $isuser = false;

    //check if the user has the appointment
    foreach ($appointmentsList as $app) {
        if ($appointment_id == $app["app_id"]) {
            $isuser = true;
        }
    }

    // If have appointment
    if ($isuser) {
        //call the function
        $appointment->cancelUserAppointment($appointment_id, $userid);
    }
    
    // Return
    return $resposta;
}
