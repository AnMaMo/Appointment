<?php

function cntrlIndex($peticio, $resposta, $contenidor){

    $resposta->setTemplate("index.php");
    
    return $resposta;
}

