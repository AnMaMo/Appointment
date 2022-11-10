<?php //start a session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appointment</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/index.php"><img src="/media/logo.png" alt="logo" id="logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/index.php?page=appointment">Appointment</a>
          </li>

          <?php

          //is admin
          if (isset($_SESSION['admin'])) {
          ?>
              <li class="nav-item">
                <a class="nav-link" href="/index.php?page=adminpanel">Users</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/index.php?page=adminapp">Appointments</a>
              </li>
          <?php
            }
          
          ?>
        </ul>

        <?php if (isset($_SESSION['username'])) : ?>
          <span class="navbar-text">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li><a class="nav-link" href="/index.php?page=useraccount"><?= $_SESSION['username'] ?></a></li>
              <li><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
          </span>
        <?php else : ?>
          <!-- Login y register buttons -->
          <span class="navbar-text">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li><a class="nav-link" href="/index.php?page=login">Login</a></li>
              <li><a class="nav-link" href="/index.php?page=register">Register</a></li>
            </ul>
          </span>
        <?php endif; ?>
      </div>
    </div>
  </nav>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>