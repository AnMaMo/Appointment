<?php
function adminpanelController($peticio, $resposta, $contenidor)
{
    
    $resposta->setTemplate("admin-panel.php");
    return $resposta;
};
