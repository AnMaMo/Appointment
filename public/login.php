<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "appointment";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    //Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    echo "<br>";
    echo "<br>";
    echo "<br>";


    $form_username = $_POST['username'];
    $form_password = $_POST['password'];


    // Prepare statement to see if player exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE name = '$form_username'");
    $stmt->execute();

    // Set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();


    $userexist = false;

    // See if user exists
    if (count($result) != 0) {
        $userexist = true;
        if ($userexist){

            //Check the password
            if ($result[0]['password'] == $form_password) {
                echo "Login correct";
                echo "<br>";
                echo "user = $form_username";
                echo "<br>";
                $role = $result[0]['role'];
                echo "role = $role";
                echo "<br>";
            } else {
                echo "Login incorrect";
                echo "<br>";
            }
        }
    }else{
        echo "User doesn't exist";
    }



} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
