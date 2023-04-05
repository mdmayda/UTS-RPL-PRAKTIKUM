<?php
session_start();
include('connection.php');

if (isset($_SESSION['logged_in'])) {
    header('location: home.php');
    exit;
}

if (isset($_POST['login_btn'])) {
    $aptk_email = $_POST['aptk_email'];
    $aptk_password = ($_POST['aptk_password']);

    $query = "SELECT aptk_id, aptk_name, aptk_email, aptk_password, aptk_phone,
        major, aptk_photo FROM apoteker
        WHERE aptk_email = ? AND aptk_password = ? LIMIT 1";

    $stmt_login = $conn->prepare($query);
    $stmt_login->bind_param('ss', $aptk_email, $aptk_password);

    if ($stmt_login->execute()) {
        $stmt_login->bind_result(
            $aptk_id,
            $aptk_name,
            $aptk_email,
            $aptk_password,
            $aptk_phone,
            $major,
            $aptk_photo
        );
        $stmt_login->store_result();

        if ($stmt_login->num_rows() == 1) {
            $stmt_login->fetch();

            $_SESSION['aptk_id'] = $aptk_id;
            $_SESSION['aptk_name'] = $aptk_name;
            $_SESSION['aptk_email'] = $aptk_email;
            $_SESSION['aptk_phone'] = $aptk_phone;
            $_SESSION['major'] = $major;
            $_SESSION['aptk_photo'] = $aptk_photo;
            $_SESSION['logged_in'] = true;

            header('location:home.php?message=Logged in successfully');
        } else {
            header('location:login.php?error=Could not verify your account');
        }
    } else {
        // Error
        header('location: login.php?error=Something went wrong!');
    }
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
        <h1>LOGIN</h1>
        <form form id="login-form" method="POST" action="login.php">
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
                    <input type="password" name="aptk_password" class="form-control" required>
                    <label>Password</label>
                </div>
                <input type="submit" id="login-btn" name="login_btn" value="Login">
                <div class="signup_link">
                    Tidak Punya Akun? <a href="register.php">Register</a>
                    
                </div>
        </form>
    </div>
</body>

</html>