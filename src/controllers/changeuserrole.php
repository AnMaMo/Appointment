<?php
function UserRole($peticio, $resposta, $contenidor){
    // Get the user model
    $users = $contenidor->users();

    // Get the user role from POST
    $user_role = $peticio->get(INPUT_POST, "user_role");

    // get the usermail from the session
    $usermail = $peticio->get("SESSION", "edit");


    // Change user role using model
    $users->changeUserRoleMysql($user_role, $usermail);

};
