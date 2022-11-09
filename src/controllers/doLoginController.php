<?php
function initLogin($peticio, $resposta, $contenidor)
{
    //Get the user controller
    $users = $contenidor->users();

    // Get the post info to user
    $usermail = $peticio->get(INPUT_POST, "usermail");
    $password = $peticio->get(INPUT_POST, "password");

    // Encript the password
    $password = hash("sha256", $password);

    // Get the user to the database
    $user = $users->getUser($usermail);

    // If user dont exist return to the login form
    if ($user === false) {
        $resposta->setSession("loged", false);
        $resposta->redirect("location: index.php?page=login&badcredentials=1");
    }

    // Now get the password and username of user
    $user_password = $user["user_password"];
    $username = $user["user_name"];

    // Check if the password is the same
    if($user_password === $password){
        $resposta->setSession("loged", $usermail);
        $resposta->setSession("username", $username);
        //save session if the user is admin
        if ($user["user_role"]==="admin") {
            $resposta->setSession("admin", $user);
        }
        $resposta->redirect("location: index.php");
    // Else is a bad credentials    
    }else{
        $resposta->setSession("loged", false);
        $resposta->redirect("location: index.php?page=login&badcredentials=1");
    }


    return $resposta;
}
