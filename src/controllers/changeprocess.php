<?php
function changeinfo($peticio, $resposta, $contenidor){

    $users = $contenidor->users();

    $name_new = $peticio->get(INPUT_POST, "name_new");

    $changeUseName = $users->changename($name_new);

    $resposta->set('changeUseName', $changeUseName);
    $resposta->setJSON();
    return $resposta;
}
?>