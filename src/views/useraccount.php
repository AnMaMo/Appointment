<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Useraccount</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container ">
        <div class="row align-items-start ">
            <div class="col centre user-square useraccount">

                <div class="useraccount useraccount-text">
                    <p>Change personal information</p>
                </div>

                <div class="useraccount">
                    <form>
                        <div class="col">
                            <label for="inputPassword4" class="form-label">User name</label>
                            <input type="password" class="form-control" id="user_name">
                        </div>
                        <div class="col">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" id="user_email">
                        </div>
                        <div class="col">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <input type="password" class="form-control" id="user_password">
                        </div>
                        <button type="reset" class="btn btn-primary useraccount-button-save">SAVE</button>

                    </form>
                </div>
            </div>
            <div class="col centre user-square useraccount">
                <div class="useraccount useraccount-text">
                    <p>My appointments</p>
                </div>
                <div class="useraccount">
                <?php
                foreach ($appointmentsList as $appointment) {   
                    echo '<div class="row">
                        <p class="date">'.$appointment['app_date'].'</p>
                        <p class="barber">'.$appointment['ws_id'].'</p>
                        <button type="button" class="btn btn-danger cancelApp">Cancelar</button>
                    </div>';
                }                    
                ?>
                </div>
            </div>
        </div>

    </div>


</body>

</html>