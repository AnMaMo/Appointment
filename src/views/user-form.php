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
    <!--buscador-->
    <div class="container">
        <form class="row centre">
            <div class="col user-margin">
                <input type="text" class="user-inputbox centre" id="searchUser" placeholder="Search user">
                <button type="reset" class="user-buttom-search"><img class="search-logo" src="../media/search.png" alt="search"></button>
            </div>
        </form>
    </div>

    <!-- Canvi de rol -->
    <div class="container">
        <form action="">
            <div class="row align-items-start">
                <div class="col centre user-square ">
                    <p><?= $username ?></p>
                    <!--
                    -->
                    <select class="form-select centre" aria-label="Default select example">
                        <option selected>Tria el rol</option>
                        <option value="admin">Admin</option>
                        <option value="gestor">Gestor</option>
                        <option value="user">User</option>
                    </select>
                    <div class="col centre user-square user-margin">
                        <h1>Appointment</h1>
                        <div class="row ">

                            <div class="col">
                                <p>cita1</p>
                                <button type="button" class="btn btn-danger">Cancelar</button>

                            </div>
                            <div class="col">
                                <p>cita2</p>
                                <button type="button" class="btn btn-danger">Cancelar</button>

                            </div>
                            <div class="col">
                                <p>cita3</p>
                                <button type="button" class="btn btn-danger">Cancelar</button>

                            </div>
                        </div>
                    </div>

                    <div class="col centre user-margin user-square">
                        <div>
                            <h1>User info</h1>

                        </div>

                        <div>
                            <p>hola</p>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>


    <!--<div class="container user-margin">
        <form action="">
            <div class="row align-items-start">
                
            </div>
        </form>
    </div> -->

</body>

</html>