<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--LINKS JQUERY-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <script src="script.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/date-1.1.2/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" />
</head>

<body>
    <?php include '../src/views/templates/navbar.php'; ?>
    <div class="form-contenedor">
        <div class="centerVertical">
            <span class="square-red"></span>
            <div class="form-title posicio">Appointment</div>

            <div class="form-square-form ">
                <form action="index.php" method="POST" class="all-forms pdfApp" name="appointmentForm">
                    <input type="hidden" name="page" value="doAppointment">
                    <div class="mb-3">
                        <div class="dateAndWorkstation">
                            <input type="text" id="datepicker" name="dateAppointment" placeholder="Select a date" onchange="selectDate()" required readonly>
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
                    </div>

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
                    <input type="text" class="hidden" name="hour_selected" id="hour_selected" required>
                    <button type="submit" class="btn btn-red btn-primary" id="create_pdf" onclick="downloadpdf()">Take Appointment</button>
                </form>
            </div>
        </div>
    </div>
    <?php include '../src/views/templates/footer.php'; ?>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/date-1.1.2/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
</body>

</html>