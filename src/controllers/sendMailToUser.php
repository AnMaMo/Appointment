<?php
function sendmailtouser($peticio, $resposta, $contenidor){

    // Models
    $users = $contenidor->users();
    $appointment = $contenidor->appointment();
    $workstation = $contenidor->workstations();

    // Get the email of the session user
    $usermail = $peticio->get("SESSION", "loged");
    $user = $users->getUser($usermail);
    // Get user name
    $user_name = $user["user_name"];

    // Import
    $date = $peticio->get(INPUT_POST, "datepicker");
    $workstation_id = $peticio->get(INPUT_POST, "workstation");
    $hour = $peticio->get(INPUT_POST, "hour");

    // Get the workstation user
    $workstationList = $workstation->getAllWorkstations($workstation_id);
    // Get workstation name
    $ws_name = $workstationList["ws_name"];

    // mail
    $recipient = "plin@cendrassos.net";
    $subject = "New appointment in EurAsia";
    $sender = $user_name;
    $senderEmail = $usermail;
    $mailBody = "Name: $sender\nEmail Address: $senderEmail\n\nMessage: You have an appointment on the $date at $hour with $ws_name.";
    mail($recipient, $subject, $mailBody);
    sleep(1);
}
