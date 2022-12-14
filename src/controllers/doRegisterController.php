<?php
function setUserInDatabase($peticio, $resposta, $contenidor){
    //Get the user model
    $users = $contenidor->users();

    // Get the post info to user
    $usermail = $peticio->get(INPUT_POST, "mail");
    $password = $peticio->get(INPUT_POST, "password");
    $username = $peticio->getRaw(INPUT_POST, "username");

    $username = str_replace("<", "&lt;", $username);
    if ($username === "") {
        $resposta->redirect("location: index.php?page=error");
        return $resposta;
    }


    // Encript the password
    $password = hash("sha256", $password);

    // Get the user to the database
    $user = $users->getUser($usermail);
    

    // If user exist return to register
    if($user == true) {
        $resposta->setSession("logat", false);
        $resposta->redirect("location: index.php?page=register&userexist=1");

    // Else register it in a database
    } else {
        $users->addUserToDatabase($username, $password, $usermail);
        $resposta->setSession("logat", false);
        $resposta->redirect("location: index.php?page=login");
    }

    return $resposta;
}