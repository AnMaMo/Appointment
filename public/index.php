<?php

include "../controllers/loginController.php";
include "../controllers/registerController.php";
include "../controllers/appointmentController.php";


$page = "";

if (isset($_GET['page'])) {
  $page = $_GET['page'];
}

//Navbar
include '../views/templates/navbar.php';

if ($page === "login") {
  getLoginForm();
} elseif ($page === "register") {
  getRegisterForm();
} elseif ($page === "appointment") {
  getAppointmentForm();
}

//Footer
include '../views/templates/footer.php';
