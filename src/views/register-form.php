<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-form</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php include '../src/views/templates/navbar.php'; ?>

    <div class="form-contenedor">

        <span class="square"></span>
        <div class="form-title">Register</div>
        <div class="form-square-form ">
            <form class="all-forms" method="post" action="index.php">
                <input type="hidden" name="page" value="doregister">
                <div class="mb-3">
                    <input type="text" class="form-control" id="login-name" placeholder="Username" name="username" required>
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control" id="login-mail" aria-describedby="emailHelp" placeholder="Mail" name="mail" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="login-password" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>


        <div class="subform">
            <?php
            if (isset($_GET['userexist'])) {
            ?>
                <div class="incorrect-credentials" id="credentials-error">
                    <p>This username already exist!</p>
                </div>
            <?php
            }
            ?>
            <div class="button"><a href="">Signup</a></div>
        </div>


    </div>
    <?php include '../src/views/templates/footer.php'; ?>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>