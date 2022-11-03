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
        $query = 'INSERT INTO appointments (app_datetime, app_type, user_id, ws_id) VALUES (:appDate, :appType, :userId, :wsId)';
        $stm = $this->sql->prepare($query);

        $stm->bindValue(':appDate', $dateTime);
        $stm->bindValue(':appType', $app_type);
        $stm->bindValue(':userId', $userId);
        $stm->bindValue(':wsId', $wsId);
        $result = $stm->execute();
    }


     /**
     * Function to get all workstations
     */
    public function getAllAppointments()
    {
        $query = 'SELECT * FROM appointments';
        $stm = $this->sql->prepare($query);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


/**
 * Function returns ocuped hours to appointments specific date
 */
    public function getNoAvaliableHours($date, $ws_id){
        $stm = $this->sql->prepare("select app_datetime from appointments where date(app_datetime) = :date AND ws_id = :ws_id");
        $stm->execute([':date' => $date, ':ws_id' => $ws_id]);
        
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
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

    
    /**
     * Function to remove appointment
     */
    public function cancelUserAppointment($appointment_id, $userid)
    {
        $query = 'DELETE FROM appointments WHERE app_id = :appointment_id and user_id = :userid';
        $stm = $this->sql->prepare($query);
        $stm->bindValue(':userid', $userid);
        $stm->bindValue(':appointment_id', $appointment_id);
        $result = $stm->execute();
    }

}