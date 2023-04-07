<?php
session_start();
include('connection.php');

if (!isset($_SESSION['logged_in'])) {
  header('location: login.php');
  exit;
}

if (isset($_GET['logout'])) {
  if (isset($_SESSION['logged_in'])) {
    unset($_SESSION['logged_in']);
    unset($_SESSION['aptk_email']);
    unset($_SESSION['aptk_name']);
    unset($_SESSION['aptk_photo']);
    header('location: login.php');
    exit;
  }
}
?>
<!-- test -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="homeStyle.css">
  <link rel="stylesheet" href="/css/bootstrap.css">

</head>

<header>
  <nav class="wrapper">
    <span>
      <img src="img/tubes.png" class="logo">POTION PARLOR
    </span>

    <ul class="navigation">
      <li><a href="home.php">HOME</a></li>
      <li><a href="dashboard.php" class="active">DASHBOARD</a></li>
      <li><a href="logbook.php">LOG BOOK</a></li>
      <li><a href="aboutus.php">ABOUT US</a></li>
      <li><a href="profile.php">
          <?php echo $_SESSION['aptk_name'] ?>
        </a></li>
      <span><a href="home.php?logout=1" id="logout-btn" class="btn btn-danger">LOG OUT</a></span>
    </ul>
  </nav>
</header>

<body>
  <main>
    <div class="fContainer">


      
        <div class="card-container">
          <div class="card">
            <img src="#" class="card-img-middle" alt="Gambar Obat 1">
            <div class="card-body">
              <h5 class="card-title">AMOXICILIN</h5>
              <p class="card-text">Kuantitas: 10 tablet</p>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-4">
          <div class="card">
            <img src="img\test.png" class="card-img-middle" alt="Gambar Obat 2">
            <div class="card-body">
              <h5 class="card-title">Nama Obat 2</h5>
              <p class="card-text">Kuantitas: 20 tablet</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="img\test.png" class="card-img-middle" alt="Gambar Obat 3">
            <div class="card-body">
              <h5 class="card-title">Nama Obat 3</h5>
              <p class="card-text">Kuantitas: 30 tablet</p>
            </div>
          </div>
        </div> -->
     

  </main>

</body>
<footer>
  <center>
    <div class="footer">
      <p>
        POTION PARLOR
      </p>
    </div>
  </center>
</footer>

</html>