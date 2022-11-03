<?php

/**
 * Function to get a register form to
 */
function getAppointmentForm($peticio, $resposta, $contenidor){
    $workstations = $contenidor->workstations();

    // get all workstations
    $workstations = $workstations->getAllWorkstations();
    $resposta->set("workstations", $workstations);

    $resposta->setTemplate("appointment-form.php");
    return $resposta;
    }

