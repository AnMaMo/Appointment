<link rel="icon" type="image/x-icon" href="/media/logo.ico">

<?php
include "../src/config.php";

/** Controllers */
include "../src/controllers/indexController.php";
include "../src/controllers/loginController.php";
include "../src/controllers/doLoginController.php";
include "../src/controllers/registerController.php";
include "../src/controllers/doRegisterController.php";
include "../src/controllers/appointmentController.php";



/** Models */
include "../src/models/users.php";

/* MiddleWare*/
include "../src/midleware/isLoged.php";

// EMESET
include "../src/Emeset/Contenidor.php";
include "../src/Emeset/Peticio.php";
include "../src/Emeset/Resposta.php";
$contenidor = new \Emeset\Contenidor($config);
$peticio = $contenidor->peticio();
$resposta = $contenidor->resposta();


$page = $peticio->get("INPUT_REQUEST", "page") ?? "index";


if ($page === "index") {
  $resposta = ctrlIndex($peticio, $resposta, $contenidor);
  //
  // REGISTER
} elseif ($page === "register") {
  $resposta = getRegisterForm($peticio, $resposta, $contenidor);
} elseif ($page === "doregister") {
  $resposta = setUserInDatabase($peticio, $resposta, $contenidor);
  //
  // LOGIN
} elseif ($page === "login") {
  $resposta = getLoginForm($peticio, $resposta, $contenidor);
} elseif ($page === "dologin") {
  $resposta = initLogin($peticio, $resposta, $contenidor);
  //
  // PAGES
} elseif ($page === "appointment") {
  $resposta = isLogged($peticio, $resposta, $contenidor, "getAppointmentForm");
  //
} else {
  $resposta = ctrlIndex($peticio, $resposta, $contenidor);
}


$resposta->resposta();
