<?php
function getUseraccount($peticio, $resposta, $contenidor)
{
    //Get the user model
    $users = $contenidor->users();
    $appointment = $contenidor->appointment();
    $workstation = $contenidor->workstations();


    // $currentpass = $peticio->get(INPUT_POST, "currentpass");
    // $newpass = $peticio->get(INPUT_POST, "newpass");

    //agafa el email de la sesio
    $usermail = $peticio->get("SESSION", "loged");

    $user = $users->getUser($usermail);

    //li asigna el valor user_id de la BD
    $userid = $user["user_id"];

    // $password = $user['user_password'];

    $appointmentsList = $appointment->getUserAppointments($userid);
    $workstationList = $workstation->getAllWorkstations();
    
    // Encript the password
    // $currentpass = hash("sha256", $currentpass);

    // if ($currentpass === $password) {
    //     $changeconfig = $users->changePasswordUser($newpass, $userid);
    //     $resposta->redirect("location: index.php");
    // } else {
    //     echo 'mal';
    // }
    
    $resposta->set("user", $user);
    $resposta->set("workstationList", $workstationList);
    $resposta->set("appointmentsList", $appointmentsList);
    // $resposta->set("changeconfig", $changeconfig);

    $resposta->setTemplate("useraccount.php");
    return $resposta;
};
