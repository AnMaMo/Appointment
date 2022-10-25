<?php
class Appointment
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

    // public function getAppointment($userid)
    // {
    //     $query = "select * from appointments where user_id=:id;";
    //     $stm = $this->sql->prepare($query);
    //     $stm->bindValue(':searchuser', $userid);
    //     $result = $stm->execute();
    //     return $stm->fetch(\PDO::FETCH_ASSOC);
        
 
    // }


    /**
     * Function to get all workstations
     */
    public function getUserAppointments($userid)
    {
        $query = 'SELECT * FROM appointments where user_id=:userid';
        $stm = $this->sql->prepare($query);
        $stm->bindValue(':userid', $userid);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // public function getWsId($wsid){
    //     $query = 'SELECT * FROM workstation where ws_id=:wsid';
    //     $stm = $this->sql->prepare($query);
    //     $stm->bindValue(':wsid', $wsid);
    //     $stm->execute();
    //     $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    //     return $result;
    // }

}
