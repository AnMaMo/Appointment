<?php
class workstations
{

    private $sql;

    /**
     * Constructor de la classe imatges amb PDO
     *
     * @param array $config
     */
    public function __construct($config)
    {
        $dsn = "mysql:dbname={$config['db']};host={$config['host']}";
        $usuari = $config["user"];
        $clau = $config["pass"];

        try {
            $this->sql = new PDO($dsn, $usuari, $clau);
        } catch (PDOException $e) {
            header("Location: index.php?page=error");
            exit();
        }
    }


    /**
     * Function to get all workstations
     */
    public function getAllWorkstations()
    {
        $query = 'SELECT * FROM WORKSTATION';
        $stm = $this->sql->prepare($query);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Function to get a workstation by name
     */
    public function getWorkstationByName($wsName)
    {
        $query = 'SELECT * FROM WORKSTATION WHERE ws_name = :wsName';
        $stm = $this->sql->prepare($query);
        $stm->bindValue(':wsName', $wsName);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


     /**
     * Function to get a workstation by id
     */
    public function getWorkstationById($wsId)
    {
        $query = 'SELECT * FROM WORKSTATION WHERE ws_id = :wsId';
        $stm = $this->sql->prepare($query);
        $stm->bindValue(':wsName', $wsId);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    /**
     * Function to add a new workstation
     */
    function addWorkStation($wsName){
        $query = 'INSERT INTO WORKSTATION (ws_name) VALUES (:wsName)';
        $stm = $this->sql->prepare($query);
        $stm->bindValue(':wsName', $wsName);
        $stm->execute();
    }


    /**
     * Function to delete a workstation
     */
    function deleteWorkStationSQL($wsId){
        $query = 'DELETE FROM WORKSTATION WHERE ws_id = :wsId';
        $stm = $this->sql->prepare($query);
        $stm->bindValue(':wsId', $wsId);
        $stm->execute();
    }


}
