<?php
function removeUser($peticio, $resposta, $contenidor)
{
    // Get the user model
    $users = $contenidor->users();

    // Import
    $usermail_remove_user = $peticio->get(INPUT_POST, "usermail");

    //Call the function
    $users->removeUser($usermail_remove_user);

    //
    return $resposta;
};
