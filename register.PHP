<?php
if (isset($_POST['register_btn'])) {

    $aptk_email = $_POST['aptk_email'];
    $user_email = $_POST['user_email'];
    $aptk_password = $_POST['aptk_password'];

    $host = "";
    $username = "";
    $password = "";
    $database = "";

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO nama_tabel (aptk_email, user_email, aptk_password) VALUES ('$aptk_email', '$user_email', '$aptk_password')";

    if (mysqli_query($conn, $sql)) {
        header("Location: register_success.php");
        exit();
    } else {

        header("Location: register.php?error=Failed to register");
        exit();
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="loginStyle.css">
</head>

<body>
    <nav class="navbar">
        <div class="brand">
            <img class="logo" src="img\tubes.png">
        </div>

    </nav>

    <div class="center">
        <h1>REGISTER</h1>
        <form form id="register-form" method="POST" action="register.php">
            <?php if (isset($_GET['error'])) ?>
            <div role="alert">
                <?php if (isset($_GET['error'])) {
                    echo $_GET['error'];
                } ?>
                <div class="txt_field">
                    <input type="email" name="aptk_email" class="form-control" id="aptk_email" required>
                    <label>Username</label>
                </div>
                <div class="txt_field">
                <input type="email" name="user_email" class="form-control" id="user_email"required/>
                <label>Email</label>         
                </div>
                <div class="txt_field">
                    <input type="password" name="aptk_password" class="form-control" required>
                    <label>Password</label>
                </div>
                <input type="submit" id="register-btn" name="register_btn" value="SIGN UP">
                    
                </div>
        </form>
    </div>
</body>

</html>