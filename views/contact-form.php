<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>contact-form</title>
    <link rel="stylesheet" href="style.css">


</head>

<body>
    <div class="pagephp">
        <div class="form-contenedor">
            <div class="centerVertical">
                <span class="square-red"></span>
                <div class="form-title posicio">Contact</div>

                <div class="form-square-form ">
                    <form action="GET" name="appointmentForm" onsubmit="return appointmentValidate();">
                        <div class="mb-3">
                            <div class=" contact">
                                <input type="text" class="form-control " id="contact-name" placeholder="Name" required>
                            </div>
                            <div class=" contact">
                                <input type="text" class="form-control " id="contact-email" placeholder="Email" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control big-square" id="contact-text" placeholder="Text">
                        </div>

                        <button type="submit" class="btn-red btn-primary">Send</button>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                Accepto las condiciones de la privacidad
                            </label>
                        </div>
                    </form>

                    <!--DatePicker-->

                </div>
            </div>
        </div>
    </div>
</body>

</html>