<?php
function getChangePassword($peticio, $resposta, $contenidor)
{
    //
    $users = $contenidor->users();
    
    //
    $password_current = $peticio->get(INPUT_POST, "password_current");
    $password_new = $peticio->get(INPUT_POST, "password_new");

    //agafa el email de la sessio
    $usermail = $peticio->get("SESSION", "loged");
    $user = $users->getUser($usermail);
    $userid = $user["user_id"];
    
    //contrasenya actual del usuari de la sessio
    $userpassword_current = $user["user_password"];
    
    //encripta la nova contrasenya
    $password_new = hash("sha256", $password_new);
    $password_current = hash("sha256", $password_current);
    
    // si la contrasenya actual i la contrasenya de la BD son iguals
    if ($password_current === $userpassword_current) {
        
        //
        $users->changePassword($password_new, $userid);
        $resposta->redirect("Location: index.php?page=useraccount");
        return $resposta;
    } else {
        
        //
        $resposta->redirect("Location: index.php?page=useraccount&error=password");
        return $resposta;
    }
}
