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
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_photo']);
        header('location: login.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="homeStyle.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
</head>

<body>
    <div class="fContainer">
        <nav class="wrapper">
            <span>
                <img src="img/tubes.png" class="logo">POTION PARLOR
            </span>

            <ul class="navigation">
                <li><a href="/" class="active">HOME</a></li>
                <li><a href="dashboard.php">DASHBOARD</a></li>
                <li><a href="logbook.php">LOG BOOK</a></li>
                <li><a href="aboutus.php">ABOUT US</a></li>
                <li><a href="/">
                        <?php echo $_SESSION['user_name'] ?>
                    </a></li>
                <span><a href="home.php?logout=1" id="logout-btn" class="btn btn-danger">LOG OUT</a></span>
            </ul>
        </nav>
        <div class="main-content">
            <img class="image" src="img\cuate.png">
            <h2>
                TEST
            </h2>
        </div>
    </div>


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