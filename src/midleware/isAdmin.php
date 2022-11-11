<?php
function isAdmin($peticio, $resposta, $contenidor, $next){
    // Models
    $users = $contenidor->users();

    // Get the session
    $usermail = $peticio->get("SESSION", "loged");
    $user = $users->getUser($usermail);
    $user_role = $user["user_role"];


    // if a session exist use controller
    if($user_role === "admin") {
        $resposta = $next($peticio, $resposta, $contenidor);

    // if not exist redirect to index    
    } else {
        $resposta->redirect("location: index.php?page=error");
    }

    return $resposta;
}