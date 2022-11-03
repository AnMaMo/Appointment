<?php
function getUseraccount($peticio, $resposta, $contenidor)
{
    // Get the user model
    $users = $contenidor->users();
    $appointment = $contenidor->appointment();
    $workstation = $contenidor->workstations();

    // Get the session email
    $usermail = $peticio->get("SESSION", "loged");
    $user = $users->getUser($usermail);
    // Assigns it the user_id value of the DB
    $userid = $user["user_id"];

    // Variables with the values ​​of the DB
    $appointmentsList = $appointment->getUserAppointments($userid);
    $workstationList = $workstation->getAllWorkstations();
    
    // save the variable into resposta
    $resposta->set("user", $user);
    $resposta->set("workstationList", $workstationList);
    $resposta->set("appointmentsList", $appointmentsList);

    $resposta->setTemplate("useraccount.php");
    return $resposta;
};
