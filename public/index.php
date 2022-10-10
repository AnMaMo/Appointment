<?php

include "../controllers/loginController.php";
include "../controllers/registerController.php";

$page = "";

if(isset($_GET['page'])){
  $page = $_GET['page'];
}

    //Navbar
    include '../views/templates/navbar.php';

    if($page === "login"){
      getLoginForm();
    }elseif($page === "register"){
      getRegisterForm();
    }
    
    //Footer
    include '../views/templates/footer.php';