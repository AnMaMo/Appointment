<?php
class disabledDays
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
 * Function returns Blocked days by a admin
 */
    public function getBlockedDays()
    {
        $stm = $this->sql->prepare("select * from disableddays");
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Function to get a day to see if day is blocked
     */
    public function getDay($day){
        $stm = $this->sql->prepare("select * from disableddays where day = :day");
        $stm->bindValue(':day', $day);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Function to block a day
     */
    public function blockDay($day){
        $stm = $this->sql->prepare("insert into disableddays (day) values (:day)");
        $stm->bindValue(':day', $day);
        $stm->execute();
    }

    /**
     * Function to unblock a day
     */
    public function unblockDay($day){
        $stm = $this->sql->prepare("delete from disableddays where day = :day");
        $stm->bindValue(':day', $day);
        $stm->execute();
    }



}