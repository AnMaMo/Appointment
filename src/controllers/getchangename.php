<?php
function getChangeName($peticio, $resposta, $contenidor){
    // Model
    $users = $contenidor->users();

    // Import and validate the data
    $name_new = $peticio->getRaw(INPUT_POST, "name_new");
    $name_new = str_replace("<", "&lt;", $name_new);

    if($name_new === ""){
        return $resposta->redirect("index.php?page=useraccount");
    }


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