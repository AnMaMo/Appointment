<?php include '../src/views/templates/navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-form</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
        <div class="form-contenedor">
            <div class="centerVertical">
                <span class="square"></span>
                <div class="form-title posicio">Login</div>

                <div class="form-square-form ">
                    <form class="all-forms" method="post" action="index.php">
                        <input type="hidden" name="page" value="doLogin">
                        <div class="mb-3">
                            <input type="mail" class="form-control" id="login-name" placeholder="Mail" name="usermail" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="login-password" placeholder="Password" name="password" required>
                        </div>

                        <?php
                        if (isset($_GET['badcredentials'])) {
                        ?>
                            <div class="incorrect-credentials" id="badcredenti-error">
                                <p>Mail or Password is incorrect</p>
                            </div>
                        <?php
                        }
                        ?>

                        <button type="submit" class="btn btn-primary">Login</button>

                        <div class="subform">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                            </div>
                            <div class="button" id="reg-button"><a href="index.php?page=register">Don't have account?</a></div>
                        </div>

                    </form>
                </div>
            </div>

        </div>

    <?php include '../src/views/templates/footer.php'; ?>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
