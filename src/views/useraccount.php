<?php include '../src/views/templates/navbar.php'; ?>

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
        <h1 class="centre useraccount title-views"><?=$user['user_name']?> configuration</h1>
        <div class="row align-items-start ">
            <div class="col centre user-square useraccount">

                <div class="useraccount useraccount-text">
                    <p>Change personal information</p>
                </div>
                <div class="useraccount col">
                    <form class="form-inline" action="" method="POST">
                        <div class="col">
                            <input type="text" class="changeconfig" id="name" placeholder="<?= $user['user_name'] ?>">
                            <button type="submit" class="btn btn-success cancelApp">Save</button>
                        </div>
                    </form>
                    <form action="" method="POST">
                        <div class="col">
                            <input type="text" class="changeconfig" id="email" placeholder="<?= $user['user_mail'] ?>">
                            <button type="submit" class="btn btn-success cancelApp">Save</button>
                        </div>
                    </form>
                    <form action="" method="POST">
                        <div class="col">
                            <input type="password" class="changeconfig" id="currentpass" placeholder="Current password">
                            <input type="password" class="changeconfig" id="newpass" placeholder="New password">
                            <button type="submit" class="btn btn-success cancelApp">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col centre user-square useraccount">
                <div class="useraccount useraccount-text">
                    <p>My appointments</p>
                </div>
                <div class="useraccount">
                    <?php
                    //if you don't have dates
                    if (sizeof($appointmentsList) === 0) {
                        //print
                        echo "<p>You don't have appointments</p>";
                    } else {
                        foreach ($appointmentsList as $appointment) {
                            foreach ($workstationList as $workstation) {
                                //take the id and store it in a variable(wsid)
                                $wsid = $appointment['ws_id'];
                                //if the id are the same
                                if ($workstation['ws_id'] === $wsid) {
                                    //take the name and store it in a variable(wsidname)
                                    $wsidname = $workstation['ws_name'];

                                    //print
                                    echo '<div class="row">
                                    <p class="date">' . $appointment['app_date'] . '</p>
                                    <p class="barber">' . $wsidname . '</p>
                                    <button type="button" id="delete_' . $appointment['app_id'] . '" class="btn btn-danger cancelApp">Cancelar</button>
                                    </div>';
                                }
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>

    <?php include '../src/views/templates/footer.php'; ?>

</body>

</html>