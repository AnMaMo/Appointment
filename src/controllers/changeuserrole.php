<?php
function UserRole($peticio, $resposta, $contenidor){
    // Get the user model
    $users = $contenidor->users();

    // Import
    $user_role = $peticio->get(INPUT_POST, "user_role");

    var_dump($user_role) ;
    die();

    //
    $usermail = $peticio->get("SESSION", "edit");


    //Call the function
    $users->changeUserRoleMysql($user_role, $usermail);

};
