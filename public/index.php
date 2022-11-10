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
include "../src/controllers/admin-panelController.php";
include "../src/controllers/useraccountController.php";
include "../src/controllers/getuserappointments.php";
include "../src/controllers/getchangename.php";
include "../src/controllers/getchangemail.php";
include "../src/controllers/getchangepassword.php";
include "../src/controllers/getcancelappointment.php";
include "../src/controllers/searchusermail.php";
include "../src/controllers/changeuserrole.php";
include "../src/controllers/removeuser.php";
include "../src/controllers/adminAppointmetController.php";
include "../src/controllers/addWorkStationController.php";
include "../src/controllers/deleteWorkStationController.php";
include "../src/controllers/getIfDateIsBlockedController.php";
include "../src/controllers/disableDateController.php";
include "../src/controllers/enableDateController.php";
include "../src/controllers/disableHourController.php";
include "../src/controllers/enableHourController.php";
include "../src/controllers/checkAvaliableAdminHours.php";

/* Get the Models */
include "../src/models/users.php";
include "../src/models/appointment.php";
include "../src/models/workstations.php";
include "../src/models/disabledDays.php";


/* Get the MiddleWare */
include "../src/midleware/isLoged.php";
include "../src/midleware/isAdmin.php";


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
    $resposta = isLogged($peticio, $resposta, $contenidor, "saveAppointment");
    break;
  case "checkAvaliableHours":
    $resposta = isLogged($peticio, $resposta, $contenidor, "getAvaliableHours");
    break;
  case "setDisabledDates":
    $resposta = isLogged($peticio, $resposta, $contenidor, "getDisabledDays");
    break;
  case "useraccount":
    $resposta = isLogged($peticio, $resposta, $contenidor, "getUseraccount");
    break;
  case "getchangename":
    $resposta = isLogged($peticio, $resposta, $contenidor, "getchangename");
    break;
  case "changepassword":
    $resposta = isLogged($peticio, $resposta, $contenidor, "getchangepassword");
    break;
  case "getchangepassword":
    $resposta = isLogged($peticio, $resposta, $contenidor, "getchangepassword");
    break;
  case "getcancelappointment":
    $resposta = isLogged($peticio, $resposta, $contenidor, "getCancelAppointment");
    break;
  case "adminapp":
    $resposta = isAdmin($peticio, $resposta, $contenidor, "getAdminAppForm");
    break;
  case "addWorkstation":
    $resposta = isAdmin($peticio, $resposta, $contenidor, "addWorkstation");
    break;
  case "deleteWSController":
    $resposta = isAdmin($peticio, $resposta, $contenidor, "deleteWS");
    break;
  case "checkBlockedDate":
    $resposta = isAdmin($peticio, $resposta, $contenidor, "checkBlockedDate");
    break;
  case "disableDate":
    $resposta = isAdmin($peticio, $resposta, $contenidor, "disableDate");
    break;
  case "enableDisableDate":
    $resposta = isAdmin($peticio, $resposta, $contenidor, "enableDate");
    break;
  case "disableHour":
    $resposta = isAdmin($peticio, $resposta, $contenidor, "disableHour");
    break;
  case "enableHour":
    $resposta = isAdmin($peticio, $resposta, $contenidor, "enableHour");
    break;
  case "checkAvaliableAdminHours":
    $resposta = isAdmin($peticio, $resposta, $contenidor, "getAvaliableAdminHours");
    break;
  case "adminpanel":
    $resposta = isAdmin($peticio, $resposta, $contenidor, "adminpanelController");
    break;
  case "search":
    $resposta = isAdmin($peticio, $resposta, $contenidor, "getSearchUsermail");
    break;
  case "role":
    $resposta = isAdmin($peticio, $resposta, $contenidor, "UserRole");
    break;
  case "removeuser":
    $resposta = isAdmin($peticio, $resposta, $contenidor, "removeUser");
    break;
  default:
    $resposta = errorPage($peticio, $resposta, $contenidor);
    break;
}

/* Return the reply */
$resposta->resposta();
