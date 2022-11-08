<?php include '../src/views/templates/navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-panel</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="script.js"></script>
</head>

<?php
?>

<body>
    <!--search-->
    <div class="container">
        <form class="row centre" method="POST">
            <div class="col user-margin">
                <input type="text" class="user-inputbox centre" id="searchusermail" placeholder="Search user mail">
                <button type="reset" class="user-buttom-search" onclick="changeadminpanel()"><img class="search-logo" src="../media/search.png" alt="search"></button>
            </div>
        </form>
    </div>

    <div class="container">
        <form action="">
            <div class="row align-items-start">
                <div class="col centre user-square ">
                    <p><span id="usernametitle"></span></p>

                    <!-- Change the user role -->

                    <select class="form-select centre" id="select_role" aria-label="Default select example">
                        <option selected>Tria el rol</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                    <input type="hidden" name="page" value="role">
                    <button class="btn btn-danger cancelApp" onclick="changeuserrole()">Change the role</button>


                    <!-- Show appointments -->
                    <div class="col centre user-square user-margin">
                        <h1>Appointment</h1>
                        <div class="row ">
                            <!-- Appointment table -->
                            <table class="table-useraccount display" title="asd">
                                <!-- TABLE HEAD -->
                                <thead>
                                    <tr>
                                        <th>datetime</th>
                                        <th>workstation</th>
                                        <th>cancel</th>
                                    </tr>
                                </thead>
                                <!-- TABLE BODY -->
                                <tbody id="appointment_table">
                                    <!--print the appointment-->

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- User info -->
                    <div class="col centre user-margin user-square">
                        <div>
                            <h1>User info</h1>
                        </div>
                        <div>
                            <p>Name: <span id="username"></span></p>
                            <p>Mail: <span id="usermail"><?= $usermail ?></span></p>
                            <input type="hidden" name="page" value="removeuser">
                            <button type="reset" id="removeuser" class="btn btn-danger cancelApp" onclick="removeUser()">Remove user</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php include '../src/views/templates/footer.php'; ?>
</body>

</html>