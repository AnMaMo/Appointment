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

                <p class="useraccount-text">Enable/Disable Hours</p>
                <div class="hour_selector">
                    <div class="hours-div">
                        <div class="hour" id="hour1" name="9:00" onclick="clickHour(this)">9:00</div>
                        <div class="hour" id="hour2" name="9:30" onclick="clickHour(this)">9:30</div>
                        <div class="hour" id="hour3" name="10:00" onclick="clickHour(this)">10:00</div>
                        <div class="hour" id="hour4" name="10:30" onclick="clickHour(this)">10:30</div>
                    </div>
                    <div class="hours-div">
                        <div class="hour" id="hour5" name="11:00" onclick="clickHour(this)">11:00</div>
                        <div class="hour" id="hour6" name="11:30" onclick="clickHour(this)">11:30</div>
                        <div class="hour" id="hour7" name="12:00" onclick="clickHour(this)">12:00</div>
                        <div class="hour" id="hour8" name="12:30" onclick="clickHour(this)">12:30</div>
                    </div>
                    <div class="hours-div">
                        <div class="hour" id="hour9" name="16:00" onclick="clickHour(this)">16:00</div>
                        <div class="hour" id="hour10" name="16:30" onclick="clickHour(this)">16:30</div>
                        <div class="hour" id="hour11" name="17:00" onclick="clickHour(this)">17:00</div>
                        <div class="hour" id="hour12" name="17:30" onclick="clickHour(this)">17:30</div>
                    </div>
                    <div class="hours-div">
                        <div class="hour" id="hour13" name="18:00" onclick="clickHour(this)">18:00</div>
                        <div class="hour" id="hour14" name="18:30" onclick="clickHour(this)">18:30</div>
                        <div class="hour" id="hour15" name="19:00" onclick="clickHour(this)">19:00</div>
                        <div class="hour" id="hour16" name="19:30" onclick="clickHour(this)">19:30</div>
                    </div>
                </div>

            </div>



            <!-- PAGE FLEXBOX COLUMN -->
            <div class="col centre user-square useraccount">
                <!-- Section Title -->
                <p class="useraccount-text">Add a Workstation</p>
                <div class="addWSDiv">
                    <input type="text" name="newWS" placeholder="Add a Workstation">
                    <button class="btn btn-primary" type="submit" name="AddWS" onclick="addWorkStation(this.value)">Add</button>
                </div>

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

                            <!--print the appointment-->
                            <tr>
                                <td class="ws_id"><?= $wsid ?></td>
                                <td class="ws_name"><?= $wsname ?></td>
                                <td><button type="submit" id="user_app" data-id="<?= $workstation['ws_id'] ?>" class="btn btn-primary" onclick="sendcancelappointment(this)">Delete</button></td>
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