<?php
function getDisabledDays($peticio, $resposta, $contenidor){
//Get the user controller
$days = $contenidor->disabledDays();

// Get all null days
$noAvaliableDays = $days->getBlockedDays();

// Return the days
$resposta->set('novalidDays', $noAvaliableDays);
$resposta->setJSON();
return $resposta;
}