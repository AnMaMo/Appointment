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
     * Function to get a workstation by id
     */
    public function getWorkstationById($wsId)
    {
        $query = 'SELECT * FROM workstation WHERE ws_id = :wsId';
        $stm = $this->sql->prepare($query);
        $stm->bindValue(':wsName', $wsId);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Function to get all workstations
     */
    public function getAllWorkstations()
    {
        $query = 'SELECT * FROM workstation';
        $stm = $this->sql->prepare($query);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
