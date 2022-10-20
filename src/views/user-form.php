<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-form</title>
    <link rel="stylesheet" href="style.css">

</head>

<?php
$username = "Pinlin";

?>

<body>

    <div class="container">
        <form class="row align-items-start">
            <div class="col">
                <input type="text" class="form-control" id="searchUser" placeholder="Search user">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary mb-3"><img class="search-logo" src="../media/search.png" alt=""></button>
            </div>
        </form>
    </div>

    <div class="container">
        <form action="">
            <div class="row align-items-start">
                <div class="col centre  ">
                    <h1><?= $username ?></h1>
                </div>
                <div class="col">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Tria el rol</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
            </div>
        </form>
    </div>

    <div class="container user-margin">
        <div class="row align-items-start">
            <div class="col centre">
                <h1>Appointment</h1>
                <div class="row">
                    <div class="col">
                        <p>hola</p>
                    </div>
                    <div class="col">
                        <p>hola2</p>
                    </div>
                    <div class="col">
                        <p>hola3</p>
                    </div>
                </div>

            </div>

            <div class="col centre">
                <div>
                    <h1>User info</h1>

                </div>

                <div> 
                    <p>hola</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>