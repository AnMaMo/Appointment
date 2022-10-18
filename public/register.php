<?php
include "../controllers/registerController.php";

// Start the session
session_start();

if (isset($_SESSION['loged'])){
    //Redirect to index.php
    header("Location: index.php");
}


$servername = "localhost";
$username = "root";
$password = "";
$database = "appointment";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    //Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $form_username = $_POST['username'];
    $form_mail = $_POST['mail'];
    $form_password = hash('sha256', $_POST['password']);



    // Prepare statement to see if player exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE name = '$form_username'");
    $stmt->execute();

    // Set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();


    // If user exist redirect to register form
    if (count($result) != 0) {
        getRegisterForm();
    }

    // Get the id of the last user
    $stmt = $conn->prepare("SELECT id FROM users ORDER BY id DESC LIMIT 1");
    $stmt->execute();
    // Set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    $new_id = $result[0]['id'] + 1;


    // statement to insert into database
    $sql = $conn->prepare("INSERT INTO users (id, name, mail, password, role) VALUES ($new_id, '$form_username', '$form_mail', '$form_password', 'user')");
    $sql->execute();

    header("Location: index.php?page=login");

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}