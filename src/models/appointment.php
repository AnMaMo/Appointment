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
}
