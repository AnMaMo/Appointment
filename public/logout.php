<?php
//start sesion
session_start();

//destroy session
session_destroy();

//redirect to index.php
header("Location: index.php?page=login");
?>