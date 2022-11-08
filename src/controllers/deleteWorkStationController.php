<?php
function deleteWS($peticio, $resposta, $contenidor)
{
    //Get the Models
    $workstations = $contenidor->workstations();

    
    //Get the name of the workstation from the form
    $wsId = $peticio->get(INPUT_POST, "id");


    //Add the workstation to the database
    $workstations->deleteWorkStationSQL($wsId);
}
