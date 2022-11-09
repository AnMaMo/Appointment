<?php
function adminpanelController($peticio, $resposta, $contenidor){
    // Models
    $users = $contenidor->users();

    //get all users
    $allUsers = $users->getAllUsers();

    //send
    $resposta->set("allUsers", $allUsers);

    $resposta->setTemplate("admin-panel.php");
    return $resposta;
};
