<?php include '../src/views/templates/navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Useraccount</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="script.js"></script>

</head>

<body>

    <div class="container ">
        <h1 class="centre useraccount title-views"><?= $user['user_name'] ?> configuration</h1>
        <div class="row align-items-start ">
            <div class="col centre user-square useraccount">

                <div class="useraccount useraccount-text">
                    <p>Change personal information</p>
                </div>
                <div class="useraccount col">

                    <!--change name -->
                    <form method="POST">
                        <div class="col">
                            <input type="text" class="changeconfig" id="newName" placeholder="<?= $user['user_name'] ?>">
                            <button type="submit" class="btn btn-success cancelApp" onclick="sendchangename()">Save</button>
                        </div>
                    </form>

                    <!-- change password -->
                    <form method="POST">
                        <div class="col">
                            <input type="password" class="changeconfig" id="password_current" placeholder="Current password" required>
                            <input type="password" class="changeconfig" id="password_new" placeholder="New password" required>
                            <button type="submit" class="btn btn-success cancelApp" onclick="sendchangepassword()">Save</button>
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
                                    $wsname = $workstation['ws_name'];

                                    //print
                                    echo '<div class="row">
                                    <p class="date">' . $appointment['app_date'] . '</p>
                                    <p class="barber">' . $wsname . '</p>
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
<!-- <script>
    if ($page === "errorpassword") {
        alert("The password are not the same")
    }
</script> -->

</html>