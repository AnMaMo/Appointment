<link rel="icon" type="image/x-icon" href="/media/logo.ico">
<title>Eurasia</title>
  
 <?php
$page = "";

if(isset($_GET['page'])){
  $page = $_GET['page'];
}

    //Navbar
    include 'navbar.php';

    if($page === "login"){
      include 'login-form.php';
    }elseif($page === "register"){
      include 'register-form.php';
    }

 ?>


