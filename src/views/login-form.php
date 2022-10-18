<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-form</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>

    <?php
    if (isset($_SESSION['invalid-credentials'])) {
    ?>
        <script>
            alert("Invalid credentials");
           // invalidCredentials();
        </script>
    <?php
        // close invalid-credentials session
        unset($_SESSION['invalid-credentials']);
    }
    
    ?>
</head>

<body>
    <div class="pagephp">
        <div class="form-contenedor">
            <div class="centerVertical">
                <span class="square"></span>
                <div class="form-title posicio">Login</div>

                <div class="form-square-form ">
                    <form class="all-forms" method="post" action="login.php">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="login-name" placeholder="Username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="login-password" placeholder="Password" name="password" required>
                        </div>

                        <div class="correct-credentials" id="credentials-error">
                            <p>Username or Password is incorrect</p>
                        </div>

                        <button type="submit" class="btn btn-primary">Login</button>

                        <div class="subform">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                            </div>
                            <div class="button" id="reg-button"><a href="">Don't have account?</a></div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

</body>

</html>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>