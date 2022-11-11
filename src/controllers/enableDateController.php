<?php
function enableDate($peticio, $resposta, $contenidor){
    // Model
    $days = $contenidor->disabledDays();

    // Import
    $date = $peticio->get(INPUT_POST, "date");

    // Logic
    $days->unblockDay($date);
    
    //return
    return $resposta;
    
} 