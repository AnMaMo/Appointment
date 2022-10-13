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
                <span class="square"></span>
                <div class="form-title posicio">Appointment</div>

                <div class="form-square-form ">

                    <form action="GET" name="appointmentForm" onsubmit="return appointmentValidate();">
                        <div class="mb-3">
                            <span>Date: </span><input type="text" id="datepicker" name="dateAppointment" onchange="validDay()">
                            <select name="Barber" id="Barber">
                                <option value="1">Barber 1</option>
                                <option value="2">Barber 2</option>
                                <option value="3">Barber 3</option>
                                <option value="4">Barber 4</option>
                            </select>
                        </div>
                        <table class="hours-table">
                            <tr>
                                <td class="hour">9:00 - 9:30</td>
                                <td class="hour">9:30 - 10:00</td>
                                <td class="hour">10:00 - 10:30</td>
                                <td class="hour">10:30 - 11:00</td>
                                <td class="hour">11:00 - 11:30</td>
                                <td class="hour">11:30 - 12:00</td>
                                <td class="hour">12:00 - 12:30</td>
                                <td class="hour">12:30 - 13:00</td>
                            </tr>
                            <tr>
                                <td class="hour">16:00 - 16:30</td>
                                <td class="hour">16:30 - 17:00</td>
                                <td class="hour">17:00 - 17:30</td>
                                <td class="hour">17:30 - 18:00</td>
                                <td class="hour">18:00 - 18:30</td>
                                <td class="hour">18:30 - 19:00</td>
                                <td class="hour">19:00 - 19:30</td>
                                <td class="hour">19:30 - 20:00</td>
                            </tr>
                        </table>
                        <input type="text" class="hidden" required>
                        <button type="submit" class="btn btn-primary">Take Appointment</button>
                    </form>

                    <!--DatePicker-->

                </div>
            </div>
        </div>
</body>

</html>