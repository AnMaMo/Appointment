<?php
function errorPage($peticio, $resposta, $contenidor){

    $resposta->setTemplate("error.php");
    
    return $resposta;
    
    } 