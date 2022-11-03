<?php
class Appointment
>>>>>>> 12779e4 (mostra les dates de cites desde BD)
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
>>>>>>> 12779e4 (mostra les dates de cites desde BD)
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
