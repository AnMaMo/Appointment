<?php

include "../src/controllers/loginController.php";
include "../src/controllers/registerController.php";
include "../src/controllers/appointmentController.php";


$page = "";

if (isset($_GET['page'])) {
  $page = $_GET['page'];
}

//Navbar
include '../src/views/templates/navbar.php';

if ($page === "login") {
  getLoginForm();
} elseif ($page === "register") {
  getRegisterForm();
} elseif ($page === "appointment") {
  getAppointmentForm();
}elseif ($page === "error") {
  getError();
}

//Footer
include '../src/views/templates/footer.php';
