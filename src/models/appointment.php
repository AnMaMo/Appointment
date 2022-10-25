<?php
class appointment
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
     * Function to add appointment to database
     */
    public function addAppointmentToDatabase($userId, $dateTime, $wsId, $app_type)
    {
        $query = 'INSERT INTO appointments (app_date, app_type, user_id, ws_id) VALUES (:appDate, :appType, :userId, wsId)';
        $stm = $this->sql->prepare($query);

        $stm->bindValue(':appDate', $dateTime);
        $stm->bindValue(':appType', $app_type);
        $stm->bindValue(':userId', $userId);
        $stm->bindValue(':wsId', $wsId);
        $result = $stm->execute();
    }

    

}
