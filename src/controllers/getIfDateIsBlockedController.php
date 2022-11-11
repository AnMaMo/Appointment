<?php
function checkBlockedDate($peticio, $resposta, $contenidor)
{
    //Get the user controller
    $days = $contenidor->disabledDays();

    //Get the day of database to see if is blocked
    $day = $days->getDay($peticio->get(INPUT_POST, "date"));

    //If day is blocked return true else return false
    if ($day) {
        $resposta->set('dayisBlocked', true);
    } else {
        $resposta->set('dayisBlocked', false);
    }

    $resposta->setJSON();
    return $resposta;
}
