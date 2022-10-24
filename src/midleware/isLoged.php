<?php

function isLogged($peticio, $resposta, $contenidor, $next){

    // Get the session
    $session = $peticio->get("SESSION", "loged");

    // if a session exist use controller
    if($session) {
        $resposta = $next($peticio, $resposta, $contenidor);

    // if not exist redirect to index    
    } else {
        $resposta->redirect("location: index.php?page=login");
    }

    return $resposta;
}