<?php

/**
 * @author André Martínez
 * @author Pinlin Lin
 * 
 * @version 1.0
 */

/* Get the Config */
include "../src/config.php";

/* Get the Controllers */
include "../src/controllers/indexController.php";
include "../src/controllers/loginController.php";
include "../src/controllers/doLoginController.php";
include "../src/controllers/registerController.php";
include "../src/controllers/doRegisterController.php";
include "../src/controllers/appointmentController.php";
include "../src/controllers/doAppointmentController.php";
include "../src/controllers/avaliableHoursController.php";
include "../src/controllers/getDisabledDaysController.php";
include "../src/controllers/errorController.php";
include "../src/controllers/user-formController.php";
include "../src/controllers/useraccountController.php";
include "../src/controllers/getuserappointments.php";
include "../src/controllers/getchangename.php";
include "../src/controllers/getchangemail.php";
include "../src/controllers/getchangepassword.php";
include "../src/controllers/getcancelappointment.php";
include "../src/controllers/adminAppointmetController.php";
include "../src/controllers/addWorkStationController.php";
include "../src/controllers/deleteWorkStationController.php";
include "../src/controllers/getIfDateIsBlockedController.php";
include "../src/controllers/disableDateController.php";
include "../src/controllers/enableDateController.php";

/* Get the Models */
include "../src/models/users.php";
include "../src/models/appointment.php";
include "../src/models/workstations.php";
include "../src/models/disabledDays.php";

/* Get the MiddleWare */
include "../src/midleware/isLoged.php";

/* Get the Emeset Framework */
include "../src/Emeset/Contenidor.php";
include "../src/Emeset/Peticio.php";
include "../src/Emeset/Resposta.php";
$contenidor = new \Emeset\Contenidor($config);
$peticio = $contenidor->peticio();
$resposta = $contenidor->resposta();


/* Get the param "page", if is null or "" set to "index" */
$page = $peticio->get("INPUT_REQUEST", "page") ?? "index";

/* Switch to select the controller */
switch ($page) {
  case 'index':
    $resposta = ctrlIndex($peticio, $resposta, $contenidor);
    break;
  case "login":
    $resposta = getLoginForm($peticio, $resposta, $contenidor);
    break;
  case "doLogin":
    $resposta = initLogin($peticio, $resposta, $contenidor);
    break;
  case "register":
    $resposta = getRegisterForm($peticio, $resposta, $contenidor);
    break;
  case "doRegister":
    $resposta = setUserInDatabase($peticio, $resposta, $contenidor);
    break;
  case "appointment":
    $resposta = isLogged($peticio, $resposta, $contenidor, "getAppointmentForm");
    break;
  case "doAppointment":
    $resposta = saveAppointment($peticio, $resposta, $contenidor);
    break;
  case "checkAvaliableHours":
    $resposta = getAvaliableHours($peticio, $resposta, $contenidor);
    break;
  case "setDisabledDates":
    $resposta = getDisabledDays($peticio, $resposta, $contenidor);
    break;
  case "userform":
    getUserform();
    break;
  case "useraccount":
    $resposta = isLogged($peticio, $resposta, $contenidor, "getUseraccount");
    break;
  case "getchangename":
    $resposta = getchangename($peticio, $resposta, $contenidor);
    break;
  case "changepassword":
    $resposta = isLogged($peticio, $resposta, $contenidor, "getchangepassword");
    break;
  case "getchangepassword":
    $resposta = getchangepassword($peticio, $resposta, $contenidor);
    break;
  case "getcancelappointment":
    $resposta = getCancelAppointment($peticio, $resposta, $contenidor);
    break;
  case "adminApp":
    //TODO: add isadmin middelware
    $resposta = getAdminAppForm($peticio, $resposta, $contenidor);
    break;
  case "addWorkstation":
    $resposta = addWorkstation($peticio, $resposta, $contenidor);
    break;
  case "deleteWSController":
    $resposta = deleteWS($peticio, $resposta, $contenidor);
    break;
  case "checkBlockedDate":
    $resposta = checkBlockedDate($peticio, $resposta, $contenidor);
    break;
  case "disableDate":
    $resposta = disableDate($peticio, $resposta, $contenidor);
    break;
  case "enableDisableDate":
    $resposta = enableDate($peticio, $resposta, $contenidor);
    break;
    case "disableHour":
      $resposta = disableHour($peticio, $resposta, $contenidor);
      break;
  default:
    $resposta = errorPage($peticio, $resposta, $contenidor);
    break;
}

/* Return the reply */
$resposta->resposta();
