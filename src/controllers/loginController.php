<?php

/**
 * Function to get a register form to
 */
function getLoginForm($peticio, $resposta, $contenidor){

    $resposta->setTemplate("login-form.php");
    return $resposta;
    }


