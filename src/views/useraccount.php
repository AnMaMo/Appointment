<?php include '../src/views/templates/navbar.php'; ?>


<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="script.js"></script>

<!-- PRINCIPAL PAGE (VIEW) -->
<div class="principalPage">
    <h1 class="title">CONFIG <?= strtoupper($user['user_name']); ?></h1>

    <!-- PAGE FLEXBOX ROW -->
    <div class="row align-items-start">

        <!-- PAGE FLEXBOX COLUMN -->
        <div class="col centre user-square useraccount">
            <!-- Section Title -->
            <p class="useraccount-text">Change Info</p>


            <!-- Change Name Form -->
            <form method="POST">
                <div name="changeNameForm">
                    <div class="changeconfig"><input type="text" maxlength="25" id="newName" placeholder="<?= $user['user_name'] ?>"></div>
                    <div class="changeconfig"><button type="submit" class="btn btn-primary" onclick="sendchangename()">Save</button></div>
                </div>
            </form>

            <!-- Change Password Form -->
            <form method="POST" action="index.php" name="changePasswordForm">

                <div name="changeNameForm">
                    <input type="hidden" name="page" value="changepassword">
                    <div class="changeconfig"><input type="password" name="password_current" placeholder="Current password" required></div>
                    <div class="changeconfig"><input type="password" name="password_new" placeholder="New password" required></div>
                    <div class="changeconfig"><button type="submit" class="btn btn-primary">Save</button></div>
                </div>



                <?php

                /* If the password does not match */
                if (isset($_GET['error'])) {
                    if ($_GET['error'] === "password") {

                ?>
                        <div class="incorrect-credentials" id="badcredenti-error">
                            <p>Password not equals</p>
                        </div>
                <?php
                    }
                }
                ?>
            </form>

        </div>



        <!-- PAGE FLEXBOX COLUMN -->
        <div class="col centre user-square useraccount">
            <!-- Section Title -->
            <p class="useraccount-text">My appointments</p>

            <!-- TABLE OF USER APPOINTMENTS -->
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
                <tbody>
                    <?php
                    /* Iterate the appointments */
                    foreach ($appointmentsList as $appointment) {
                        /* Get the workstation id */
                        $wsid = $appointment['ws_id'];
                        $wsname = "default";

                        /* Iterate the workstations to get the name with the id */
                        foreach ($workstationList as $workstation) {
                            if ($workstation['ws_id'] === $wsid) {
                                $wsname = $workstation['ws_name'];
                            }
                        }
                    ?>
                        <!--print the appointment-->
                        <tr>
                            <td class="date"><?= $appointment['app_datetime'] ?></td>
                            <td class="workstation"><?= $wsname ?></td>
                            <td><button type="submit" id="user_app" data-id="<?= $appointment['app_id'] ?>" class="btn btn-primary" onclick="sendcancelappointment(this)">Cancel</button></td>
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