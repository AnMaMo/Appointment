<?php
function getAvaliableAdminHours($peticio, $resposta, $contenidor){
//Get the user controller
$appointments = $contenidor->appointment();

$date = $peticio->get(INPUT_POST, "date");
$ws_id = $peticio->get(INPUT_POST, "workstation");

// Get all appointments
$noAvaliableHours = $appointments->getNoAvaliableAdminHours($date, $ws_id);


$resposta->set('noAvaliableHours', $noAvaliableHours);
$resposta->setJSON();
return $resposta;
}