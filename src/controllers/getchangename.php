<?php
function getChangeName($peticio, $resposta, $contenidor){
    // Model
    $users = $contenidor->users();

    // Import
    $name_new = strip_tags($peticio->get(INPUT_POST, "name_new"));

    //Get the session email
    $usermail = $peticio->get("SESSION", "loged");
    $user = $users->getUser($usermail);
    // Assigns it the user_id value of the DB
    $userid = $user["user_id"];

    //Call the function
    $users->changeName($name_new, $userid);
    
    //return
    return $resposta;
    
} 