<?php
class Users
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
     * getUser et retorna l'usuari amb l'identificardor $user
     *
     * @param string $user
     * @return array user amb ["name", "pass"]
     */
    public function getUser($usermail)
    {
        $query = 'select user_id, user_name, user_password, user_mail, user_role from users where user_mail=:searchuser;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':searchuser' => $usermail]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }



    public function addUserToDatabase($username, $password, $mail)
    {
        $query = 'INSERT INTO users (user_name, user_password, user_mail, user_role) VALUES (:username, :password_passed, :mail, "user")';
        $stm = $this->sql->prepare($query);

        $stm->bindValue(':username', $username);
        $stm->bindValue(':password_passed', $password);
        $stm->bindValue(':mail', $mail);
        $result = $stm->execute();
    }

    /**
     * Change the password
     */
    public function changePassword($password_new, $userid)
    {
        $query = 'UPDATE users set user_password = :newpass where user_id = :userid';
        $stm = $this->sql->prepare($query);
        $stm->bindValue(':newpass', $password_new);
        $stm->bindValue(':userid', $userid);
        $result = $stm->execute();
    }

    /**
     * Change the name
     */
    public function changeName($name_new, $userid)
    {
        $query = 'UPDATE users set user_name = :name_new where user_id = :userid';
        $stm = $this->sql->prepare($query);
        $stm->bindValue(':name_new', $name_new);
        $stm->bindValue(':userid', $userid);
        $result = $stm->execute();
    }

    /**
     * Remove user from database
     */
    public function removeUser($usermail_remove_user)
    {
        $query = 'DELETE FROM users WHERE user_mail = :usermail_remove_user;';
        $stm = $this->sql->prepare($query);
        $stm->bindValue(':usermail_remove_user', $usermail_remove_user);
        $result = $stm->execute();
    }

    /**
     * change user role
     */
    public function changeUserRoleMysql($user_role, $usermail)
    {
        $query = 'UPDATE users set user_role = :user_role where user_mail = :usermail';
        $stm = $this->sql->prepare($query);
        $stm->bindValue(':user_role', $user_role);
        $stm->bindValue(':usermail', $usermail);
        $result = $stm->execute();
    }


    /**
     * get all users
     */
    public function getAllUsers()
    {
        $query = 'SELECT * FROM users';
        $stm = $this->sql->prepare($query);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
