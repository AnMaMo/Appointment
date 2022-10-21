<?php

/**
 * Function to get a register form to
 */
function getRegisterForm($peticio, $resposta, $contenidor){

    $resposta->setTemplate("register-form.php");
    return $resposta;
    }


