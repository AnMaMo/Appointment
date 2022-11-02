<link rel="icon" type="image/x-icon" href="/media/logo.ico">

<?php
/** Config */
include "../src/config.php";

/** Controllers */
include "../src/controllers/indexController.php";
include "../src/controllers/loginController.php";
include "../src/controllers/doLoginController.php";
include "../src/controllers/registerController.php";
include "../src/controllers/doRegisterController.php";
include "../src/controllers/appointmentController.php";
include "../src/controllers/errorController.php";
include "../src/controllers/user-formController.php";
include "../src/controllers/useraccountController.php";
include "../src/controllers/getuserappointments.php";
include "../src/controllers/getchangename.php";
include "../src/controllers/getchangemail.php";
include "../src/controllers/getchangepassword.php";


/** Models */
include "../src/models/users.php";
include "../src/models/appointment.php";
include "../src/models/workstations.php";

/* MiddleWare*/
include "../src/midleware/isLoged.php";

// EMESET
include "../src/Emeset/Contenidor.php";
include "../src/Emeset/Peticio.php";
include "../src/Emeset/Resposta.php";
$contenidor = new \Emeset\Contenidor($config);
$peticio = $contenidor->peticio();
$resposta = $contenidor->resposta();


/** Get the param "page" */
$page = $peticio->get("INPUT_REQUEST", "page") ?? "index";


if ($page === "index") {
  $resposta = ctrlIndex($peticio, $resposta, $contenidor);
  //
  // LOGIN
} elseif ($page === "login") {
  $resposta = getLoginForm($peticio, $resposta, $contenidor);
} elseif ($page === "dologin") {
  $resposta = initLogin($peticio, $resposta, $contenidor);
  //
  // REGISTER
} elseif ($page === "register") {
  $resposta = getRegisterForm($peticio, $resposta, $contenidor);
} elseif ($page === "doregister") {
  $resposta = setUserInDatabase($peticio, $resposta, $contenidor);
  //
  // USER ACCOUNT
} elseif ($page === "useraccount") {
  $resposta = getUseraccount($peticio, $resposta, $contenidor);
} elseif ($page === "getchangename") {
  $resposta = getchangename($peticio, $resposta, $contenidor);
} elseif ($page === "getchangemail") {
  $resposta = getchangemail($peticio, $resposta, $contenidor);
}elseif ($page === "getchangepassword") {
  $resposta = getchangepassword($peticio, $resposta, $contenidor); 
  //
  // PAGES
} elseif ($page === "appointment") {
  $resposta = isLogged($peticio, $resposta, $contenidor, "getAppointmentForm");
} elseif ($page === "error") {
  errorPage($peticio, $resposta, $contenidor);
} elseif ($page === "userform") {
  getUserform();
} else {
  $resposta = errorPage($peticio, $resposta, $contenidor);
}


$resposta->resposta();
