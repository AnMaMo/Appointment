<?php
function getAvaliableAdminHours($peticio, $resposta, $contenidor){
//Get the user controller
$appointments = $contenidor->appointment();

// Get the data from POST
$date = $peticio->get(INPUT_POST, "date");
$ws_id = $peticio->get(INPUT_POST, "workstation");

// Get all appointments
$noAvaliableHours = $appointments->getNoAvaliableAdminHours($date, $ws_id);

// send reply with json
$resposta->set('noAvaliableHours', $noAvaliableHours);
$resposta->setJSON();
return $resposta;
}