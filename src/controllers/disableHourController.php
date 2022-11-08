<?php
function disableHour($peticio, $resposta, $contenidor){
    // Model
    $appointment = $contenidor->disabledDays();

    // Import
    $date = $peticio->get(INPUT_POST, "date");

    // Logic
    $days->blockDay($date);
    
    //return
    return $resposta;
} 