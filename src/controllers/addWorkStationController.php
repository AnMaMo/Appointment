<?php
function addWorkstation($peticio, $resposta, $contenidor)
{
    //Get the Models
    $workstations = $contenidor->workstations();

    
    //Get the name of the workstation from the form
    $wsName = $peticio->get(INPUT_POST, "newWS");

    //Add the workstation to the database
    $workstations->addWorkStation($wsName);

    $resposta->redirect("location: index.php?page=adminApp");

    //return resposta
    return $resposta;
}
