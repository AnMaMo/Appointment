<?php
function getSearchUsermail($peticio, $resposta, $contenidor){
  // Get the user model
  $users = $contenidor->users();
  $appointment = $contenidor->appointment();
  $workstation = $contenidor->workstations();

  //
  $searchusermail = $peticio->get(INPUT_POST, "searchusermail");
  $resposta->setSession("edit", $searchusermail);

  //
  $usermail = $peticio->get("SESSION", "edit");

  // Get the user to the database
  $user = $users->getUser($searchusermail);

  // If user dont exist return to the login form
  if ($user === false) {
    return $resposta;
  }

  // Assigns it the user_id value of the DB
  $userid = $user["user_id"];

  // Variables with the values ​​of the DB
  $appointmentsList = $appointment->getUserAppointments($userid);
  $workstationList = $workstation->getAllWorkstations();

  // save the variable into resposta
  $resposta->set("user", $user);
  $resposta->set("workstationList", $workstationList);
  $resposta->set("appointmentsList", $appointmentsList);
  $resposta->set("usermail", $usermail);

  //
  $resposta->setJSON();
}
