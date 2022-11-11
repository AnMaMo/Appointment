<?php
function disableDate($peticio, $resposta, $contenidor){
    // Model
    $days = $contenidor->disabledDays();

    // Import POST
    $date = $peticio->get(INPUT_POST, "date");

    // Block day using model
    $days->blockDay($date);
    
    //return
    return $resposta;
    
} 