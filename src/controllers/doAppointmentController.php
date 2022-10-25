<?php
function saveAppointment($peticio, $resposta, $contenidor)
{
    //Get the user controller
    $appointments = $contenidor->appointment();

    $dateTime = $peticio->get(INPUT_POST, "dateAppointment");

    echo $dateTime;

    $appointments->addAppointmentToDatabase(1, $dateTime, 1, "user");

    $resposta->redirect("location: index.php?page=login&badcredentials=1");
    
    //return resposta
    return $resposta;
}
