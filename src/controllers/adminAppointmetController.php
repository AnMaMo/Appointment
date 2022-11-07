<?php

/**
 * Function to get a register form to
 */
function getAdminAppForm($peticio, $resposta, $contenidor){
    $workstations = $contenidor->workstations();

    /* Get all workstations and send to view */
    $workstationsList = $workstations->getAllWorkstations();
    $resposta->set("workstations", $workstationsList);

    /* Get all appointments and send to view */
    $appointments = $contenidor->appointment();
    $appointments = $appointments->getAllAppointments();
    $resposta->set("appointments", $appointments);

    /* Return resposta to adminAppointments view */
    $resposta->setTemplate("adminAppointments.php");
    return $resposta;
    }

