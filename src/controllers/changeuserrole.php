<?php
function changeUserRole($peticio, $resposta, $contenidor)
{
   // Get the user model
   $users = $contenidor->users();

   // Import
   $user_role = $peticio->get(INPUT_POST, "userrole");

   //Call the function
   $users->removeUser($usermail_remove_user);

   //
   $resposta->setTemplate("admin-panel.php");
   return $resposta;

    $resposta->setTemplate("useraccount.php");
    return $resposta;
};
