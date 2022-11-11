<?php
function changeinfo($peticio, $resposta, $contenidor){
    // Get the model
    $users = $contenidor->users();

    // Get the data from the request
    $name_new = $peticio->get(INPUT_POST, "name_new");

    // Change username using model
    $changeUseName = $users->changename($name_new);

    // send reply with json
    $resposta->set('changeUseName', $changeUseName);
    $resposta->setJSON();
    return $resposta;
}
?>