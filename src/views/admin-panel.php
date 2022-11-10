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
    <div class="principalPage">

        <!-- Title -->
        <h1 class="title">ADMIN USERS</h1>

        <!-- Div user info -->
        <div class="userInfo">
            <!-- Appointment table -->
            <h2 class="subtitle">User Info</h2>
            <!-- Search user bar -->
            <div class="flexDiv">
                <input type="text" class="user-inputbox centre" id="searchusermail" placeholder="Search user mail">
                <button type="reset" class="user-buttom-search" onclick="changeadminpanel()"><img class="search-logo" src="../media/search.png" alt="search"></button>
            </div>

            <!-- Table -->
            <div class="flexDiv">
                <!-- User info -->
                <div class="flex-item">
                    <p>Name: <span id="username"></span></p>
                </div>
                <div class="flex-item">
                    <p>Mail: <span id="usermail"><?= $usermail ?></span></p>
                </div>
            </div>


            <!-- User role -->
            <div class="changeRol">
                <div class="flex-item">
                    <select class="form-select centre" id="select_role" aria-label="Default select example">
                        <option selected>Tria el rol</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <div class="flex-item">
                    <button class="btn btn-primary" onclick="changeuserrole()">Change the role</button>
                </div>
            </div>

            <!-- Appointment table -->
            <h2 class="subtitle">User appointments</h2>
            <div class="adminUserApp">
                <table class="table-useraccount display">
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

            <!-- Remove button -->
            <div>
                <button id="removeuser" class="btn btn-primary" onclick="removeUser()">Remove user</button>
            </div>
        </div>



        <!-- Page Flexbox Row -->
        <div class="row align-items-start">
            <div class="col centre user-margin user-square">
                <div>
                    <h1>All users</h1>
                </div>

                <table class="table-useraccount display">
                    <!-- TABLE HEAD -->
                    <thead>
                        <tr>
                            <th>User id</th>
                            <th>User name</th>
                            <th>User mail</th>
                        </tr>
                    </thead>
                    <!-- TABLE BODY -->
                    <tbody id="user_table">
                        <?php
                        /* Iterate the users */
                        foreach ($allUsers as $user) {
                        ?>
                            <tr>
                                <td class="user_id"><?= $user['user_id'] ?></td>
                                <td class="user_name"><?= $user['user_name'] ?></td>
                                <td class="user_mail"><?= $user['user_mail'] ?></td>
                            </tr>
                        <?php

                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <?php include '../src/views/templates/footer.php'; ?>
</body>

</html>