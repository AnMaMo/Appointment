<?php
function getChangePassword($peticio, $resposta, $contenidor)
{
    // Get the user model
    $users = $contenidor->users();
    
    // Import
    $password_current = $peticio->get(INPUT_POST, "password_current");
    $password_new = $peticio->get(INPUT_POST, "password_new");

    // Get the session email
    $usermail = $peticio->get("SESSION", "loged");
    $user = $users->getUser($usermail);
    $userid = $user["user_id"];
    
    // Current session user password
    $userpassword_current = $user["user_password"];
    
    // Encrypt the new password
    $password_new = hash("sha256", $password_new);
    $password_current = hash("sha256", $password_current);
    
    // if the current password and the DB password are the same
    if ($password_current === $userpassword_current) {
        // Call the function
        $users->changePassword($password_new, $userid);
        $resposta->redirect("Location: index.php?page=useraccount");
        return $resposta;
    } else {
        // Redirect
        $resposta->redirect("Location: index.php?page=useraccount&error=password");
        return $resposta;
    }
}
