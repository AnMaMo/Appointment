<?php
// Start the session
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "appointment";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    //Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $form_username = $_POST['username'];
    $form_password = hash('sha256', $_POST['password']);


    // Prepare statement to see if player exists
    $stmt = $conn->prepare("SELECT * FROM USERS WHERE user_name = '$form_username'");
    $stmt->execute();

    // Set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();


    $userexist = false;

    // See if user exists
    if (count($result) != 0) {
        $userexist = true;
        if ($userexist) {

            //Check the password
            if ($result[0]['user_password'] == $form_password) {
                //Create a sesion with user id and value is user name
                $_SESSION['loged'] = $form_username;

                //Redirect to index.php
                header("Location: index.php");
            } else {

                // Create a invalid credentials session
                $_SESSION['invalid-credentials'] = "true";

                //Redirect to index.php
                header("Location: index.php?page=login");
            }
        }
    } else {
        // Create a invalid credentials session
        $_SESSION['invalid-credentials'] = "true";

        //Redirect to index.php
        header("Location: index.php?page=login");
    }


} catch (PDOException $e) {
    // Create a invalid credentials session
    $_SESSION['no-database-found'] = "true";

    //Redirect to index.php
    header("Location: index.php?page=login");
}
