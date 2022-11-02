<?php
function getChangeName($peticio, $resposta, $contenidor){
    $users = $contenidor->users();

    $name_new = $peticio->get(INPUT_POST, "name_new");

    //agafa el email de la sesio
    $usermail = $peticio->get("SESSION", "loged");

    $user = $users->getUser($usermail);

    //li asigna el valor user_id de la BD
    $userid = $user["user_id"];

    $users->changeName($name_new, $userid);
    
    return $resposta;
    
} 