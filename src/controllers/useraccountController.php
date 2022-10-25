<?php
function getUseraccount($peticio, $resposta, $contenidor)
{
    //Get the user model
    $users = $contenidor->users();
    $appointment = $contenidor->appointment();

    //agafa el email de la sesio
    $usermail = $peticio->get("SESSION", "loged");

    $user = $users->getUser($usermail);

    //li asigna el valor user_id de la BD
    $userid = $user["user_id"];
    $appointmentsList = $appointment->getUserAppointments($userid);

    // $wsid = $appointmentsList['ws_id'];
    // $wsList = $appointment->getWsId($wsid);

    $resposta->set("appointmentsList", $appointmentsList);
    // $resposta->set("wsList", $wsList);

    // var_dump($appointmentsList);
    $resposta->setTemplate("useraccount.php");
    return $resposta;
};
