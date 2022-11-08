<?php
function disableDate($peticio, $resposta, $contenidor){
    // Model
    $days = $contenidor->disabledDays();

    // Import
    $date = $peticio->get(INPUT_POST, "date");

    // Logic
    $days->blockDay($date);
    
    //return
    return $resposta;
    
} 