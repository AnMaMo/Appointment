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
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Take Appointment</button>
                    </form>

                <!--DatePicker-->

            </div>
        </div>
    </div>


</body>

</html>