<?php

if (!isset($_SESSION['loged'])){
    //Redirect to index.php
    header("Location: index.php?page=login");
}
?>




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
    <div class="pagephp">
        <div class="form-contenedor">
            <div class="centerVertical">
                <span class="square-red"></span>
                <div class="form-title posicio">Appointment</div>

                <div class="form-square-form ">
                    <form action="GET" class="all-forms" name="appointmentForm" onsubmit="return appointmentValidate();">
                        <div class="mb-3">
                            <span>Date: </span><input type="text" id="datepicker" name="dateAppointment" onchange="validDay()">
                            <select name="Barber" id="Barber">
                                <?php

                                $barbers = ["barber 1", "barber 2", "barber 3", "barber 4", "barber 5"];

                                for ($i = 0; $i < sizeof($barbers); $i++) {
                                ?>
                                    <option value=<?= $i ?>><?= $barbers[$i] ?></option>

                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="hours-div">
                            <div class="hour">9:00-9:30</div>
                            <div class="hour">9:30-10:00</div>
                            <div class="hour">10:00-10:30</div>
                            <div class="hour">10:30-11:00</div>
                        </div>
                        <div class="hours-div">
                            <div class="hour">11:00-11:30</div>
                            <div class="hour">11:30-12:00</div>
                            <div class="hour">12:00-12:30</div>
                            <div class="hour">12:30-13:00</div>
                        </div>
                        <div class="hours-div">
                            <div class="hour">16:00-16:30</div>
                            <div class="hour">16:30-17:00</div>
                            <div class="hour">17:00-17:30</div>
                            <div class="hour">17:30-18:00</div>
                        </div>
                        <div class="hours-div">
                            <div class="hour">18:00-18:30</div>
                            <div class="hour">18:30-19:00</div>
                            <div class="hour">19:00-19:30</div>
                            <div class="hour">19:30-20:00</div>
                        </div>
                        <input type="text" class="hidden" required>
                        <button type="submit" class="btn-red btn-primary">Take Appointment</button>
                    </form>

                    <!--DatePicker-->

                </div>
            </div>
        </div>
    </div>
</body>

</html>