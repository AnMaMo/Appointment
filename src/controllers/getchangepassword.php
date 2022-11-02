<?php
function getChangePassword($peticio, $resposta, $contenidor)
{
    //
    $users = $contenidor->users();

    //
    $password_new = $peticio->get(INPUT_POST, "password_new");
    $password_current = $peticio->get(INPUT_POST, "password_current");

    //agafa el email de la sessio
    $usermail = $peticio->get("SESSION", "loged");
    $user = $users->getUser($usermail);
    $userid = $user["user_id"];

    //contrasenya actual del usuari de la sessio
    $userpassword_current = $user["user_password"];

    //encripta la nova contrasenya
    $password_new = hash("sha256", $password_new);

    // si la contrasenya actual i la contrasenya de la BD son iguals
    if ($password_current === $userpassword_current) {
        //
        $users->changePassword($password_new, $userid);

    }else {
       $resposta->redirect("location: index.php?page=useraccount&errorpassword");
    }
}