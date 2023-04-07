<?php
session_start();
include('connection.php');
include('Layout/header.php');
include('Layout/footer.php');

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

</header>
<body>
    
       
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