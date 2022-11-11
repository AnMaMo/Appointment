<?php include '../src/views/templates/navbar.php'; ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="script.js"></script>
</head>

<body>

    <!-- PRINCIPAL PAGE (VIEW) -->
    <div class="principalPage">
        <h1 class="title">ADMIN APPOINTMENTS</h1>

        <!-- PAGE FLEXBOX ROW -->
        <div class="row align-items-start">

            <!-- PAGE FLEXBOX COLUMN -->
            <div class="col centre user-square useraccount">
                
                <!-- Section Title -->
                <p class="useraccount-text">Enable/Disable Days</p>

                <!-- Enable/Disable days Form -->
                <form method="POST">
                    <div name="changeNameForm">
                        <div class="changeconfig"><input type="text" id="adminDatepicker" placeholder="<?= $user['user_name'] ?>"></div>
                    </div>
                </form>

                <!-- Enable/Disable days Button -->
                <button class="dateOn" id="onoffDate" onclick="enableDisableDate()">Enable/Disable</button>

                <p class="useraccount-text">Enable/Disable Hours</p>
                <select id="workstation" name="workstation_selected" onchange="selectDate()">
                    <?php
                    //Get the workstations of resposta

                    foreach ($workstations as $workstation) {
                    ?>
                        <option value=<?= $workstation['ws_id'] ?>><?= $workstation['ws_name'] ?></option>
                    <?php
                    }

                    ?>
                </select>
                <div class="hour_selector">
                    <div class="hours-div">
                        <div class="hour hourOn" id="hour1" name="9:00" onclick="onoffHour(this)">9:00</div>
                        <div class="hour hourOn" id="hour2" name="9:30" onclick="onoffHour(this)">9:30</div>
                        <div class="hour hourOn" id="hour3" name="10:00" onclick="onoffHour(this)">10:00</div>
                        <div class="hour hourOn" id="hour4" name="10:30" onclick="onoffHour(this)">10:30</div>
                    </div>
                    <div class="hours-div">
                        <div class="hour hourOn" id="hour5" name="11:00" onclick="onoffHour(this)">11:00</div>
                        <div class="hour hourOn" id="hour6" name="11:30" onclick="onoffHour(this)">11:30</div>
                        <div class="hour hourOn" id="hour7" name="12:00" onclick="onoffHour(this)">12:00</div>
                        <div class="hour hourOn" id="hour8" name="12:30" onclick="onoffHour(this)">12:30</div>
                    </div>
                    <div class="hours-div">
                        <div class="hour hourOn" id="hour9" name="16:00" onclick="onoffHour(this)">16:00</div>
                        <div class="hour hourOn" id="hour10" name="16:30" onclick="onoffHour(this)">16:30</div>
                        <div class="hour hourOn" id="hour11" name="17:00" onclick="onoffHour(this)">17:00</div>
                        <div class="hour hourOn" id="hour12" name="17:30" onclick="onoffHour(this)">17:30</div>
                    </div>
                    <div class="hours-div">
                        <div class="hour hourOn" id="hour13" name="18:00" onclick="onoffHour(this)">18:00</div>
                        <div class="hour hourOn" id="hour14" name="18:30" onclick="onoffHour(this)">18:30</div>
                        <div class="hour hourOn" id="hour15" name="19:00" onclick="onoffHour(this)">19:00</div>
                        <div class="hour hourOn" id="hour16" name="19:30" onclick="onoffHour(this)">19:30</div>
                    </div>
                </div>

            </div>



            <!-- PAGE FLEXBOX COLUMN -->
            <div class="col centre user-square useraccount">
                <!-- Section Title -->
                <p class="useraccount-text">Add a Workstation</p>
                <form class="addWSDiv" method="POST" action="index.php">
                    <input type="hidden" name="page" value="addWorkstation">
                    <input type="text" name="newWS" placeholder="Add a Workstation" required>
                    <button class="btn btn-primary" type="submit" name="AddWS">Add</button>
                </form>

                <!-- Section Title -->
                <p class="useraccount-text">Workstations</p>

                <!-- TABLE OF USER APPOINTMENTS -->
                <table class="table-useraccount display">
                    <!-- TABLE HEAD -->
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <!-- TABLE BODY -->
                    <tbody>
                        <?php
                        /* Iterate the appointments */
                        foreach ($workstations as $workstation) {
                            /* Get the workstation id */
                            $wsid = $workstation['ws_id'];
                            $wsname = "default";

                            /* Iterate the workstations to get the name with the id */
                            foreach ($workstations as $workstationName) {
                                if ($workstationName['ws_id'] === $wsid) {
                                    $wsname = $workstationName['ws_name'];
                                }
                            }
                        ?>

                            <!--print the workstations-->
                            <tr>
                                <td class="ws_id"><?= $wsid ?></td>
                                <td class="ws_name"><?= $wsname ?></td>
                                <td><button type="submit" id="user_app" data-id="<?= $workstation['ws_id'] ?>" class="btn btn-primary" onclick="deleteWorkStation(<?= $workstation['ws_id'] ?>)">Delete</button></td>
                            </tr>
                        <?php

                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="col centre user-square useraccount">
                <!-- Section Title -->
                <p class="useraccount-text">Appointment List</p>



                <!-- TABLE OF USER APPOINTMENTS -->
                <table class="table-useraccount display" title="asd">
                    <!-- TABLE HEAD -->
                    <thead>
                        <tr>
                            <th>datetime</th>
                            <th>workstation</th>
                            <th>User</th>
                            <th>cancel</th>
                        </tr>
                    </thead>
                    <!-- TABLE BODY -->
                    <tbody>
                        <?php
                        /* Iterate the appointments */
                        foreach ($appointments as $appointment) {
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
                                <td class="user"><?= $appointment['user_id'] ?></td>
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
</body>

</html>