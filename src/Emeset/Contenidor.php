<?php

/**
 * Exemple per a M07.
 *
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Classe contenidor,  té la responsabilitat d'instaciar els models i altres objectes.
 **/

namespace Emeset;

/**
 * Contenidor: Classe contenidor.
 *
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Classe contenidor, la responsabilitat d'instaciar els models i altres objectes.
 **/
class Contenidor
{
    public $config = [];
    public $sql;

    /**
     * __construct:  Crear contenidor
     *
     * @param $config array paràmetres de configuració de l'aplicació.
     **/
    public function __construct($config)
    {
        $this->config = $config;
    }

    public function resposta()
    {
        return new \Emeset\Resposta();
    }

    public function peticio()
    {
        return new \Emeset\Peticio();
    }


    // MODELS
    
    public function users(){
        return new \users($this->config);
    }

    public function appointment(){
        return new \appointment($this->config);
    }

    public function workstations(){
        return new \workstations($this->config);
    }

    public function disabledDays(){
        return new \disabledDays($this->config);
    }
}