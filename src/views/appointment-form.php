<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--LINKS JQUERY-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="script.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>

</head>

<body>
    <?php include '../src/views/templates/navbar.php'; ?>
    <div class="pagephp">
        <div class="form-contenedor">
            <div class="centerVertical">
                <span class="square-red"></span>
                <div class="form-title posicio">Appointment</div>

                <div class="form-square-form ">
                    <form action="index.php" method="POST" class="all-forms" name="appointmentForm">
                        <input type="hidden" name="page" value="doAppointment">
                        <div class="mb-3">
                            <input type="text" id="datepicker" name="dateAppointment" placeholder="Select a date" onchange="selectDate()">
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
                        </div>

                        <div class="hour_selector">
                        <div class="hours-div">
                            <div class="hour" id="hour1" name="9:00" onclick="clickHour(this)">9:00-9:30</div>
                            <div class="hour" id="hour2" name="9:30" onclick="clickHour(this)">9:30-10:00</div>
                            <div class="hour" id="hour3" name="10:00" onclick="clickHour(this)">10:00-10:30</div>
                            <div class="hour" id="hour4" name="10:30" onclick="clickHour(this)">10:30-11:00</div>
                        </div>
                        <div class="hours-div">
                            <div class="hour" id="hour5" name="11:00" onclick="clickHour(this)">11:00-11:30</div>
                            <div class="hour" id="hour6" name="11:30" onclick="clickHour(this)">11:30-12:00</div>
                            <div class="hour" id="hour7" name="12:00" onclick="clickHour(this)">12:00-12:30</div>
                            <div class="hour" id="hour8" name="12:30" onclick="clickHour(this)">12:30-13:00</div>
                        </div>
                        <div class="hours-div">
                            <div class="hour" id="hour9" name="16:00" onclick="clickHour(this)">16:00-16:30</div>
                            <div class="hour" id="hour10" name="16:30" onclick="clickHour(this)">16:30-17:00</div>
                            <div class="hour" id="hour11" name="17:00" onclick="clickHour(this)">17:00-17:30</div>
                            <div class="hour" id="hour12" name="17:30" onclick="clickHour(this)">17:30-18:00</div>
                        </div>
                        <div class="hours-div">
                            <div class="hour" id="hour13" name="18:00" onclick="clickHour(this)">18:00-18:30</div>
                            <div class="hour" id="hour14" name="18:30" onclick="clickHour(this)">18:30-19:00</div>
                            <div class="hour" id="hour15" name="19:00" onclick="clickHour(this)">19:00-19:30</div>
                            <div class="hour" id="hour16" name="19:30" onclick="clickHour(this)">19:30-20:00</div>
                        </div>
                        </div>
                        <input type="text" class="hidden" name="hour_selected" id="hour_selected" required>
                        <button type="submit" class="btn-red btn-primary">Take Appointment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include '../src/views/templates/footer.php'; ?>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>