<?php
session_start();
include('connection.php');

if (isset($_SESSION['logged_in'])) {
    header('location: home.php');
    exit;
}

if (isset($_POST['login_btn'])) {
    $email = $_POST['user_email'];
    $password = ($_POST['user_password']);

    $query = "SELECT user_id, user_name, user_email, user_password, user_phone,
        user_major, user_photo FROM apoteker
        WHERE user_email = ? AND user_password = ? LIMIT 1";

    $stmt_login = $conn->prepare($query);
    $stmt_login->bind_param('ss', $email, $password);

    if ($stmt_login->execute()) {
        $stmt_login->bind_result(
            $user_id,
            $user_name,
            $user_email,
            $user_password,
            $user_phone,
            $user_major,
            $user_photo
        );
        $stmt_login->store_result();

        if ($stmt_login->num_rows() == 1) {
            $stmt_login->fetch();

            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['user_phone'] = $user_phone;
            $_SESSION['user_major'] = $user_major;
            $_SESSION['user_photo'] = $user_photo;
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
                    <input type="email" name="user_email" class="form-control" id="user_email" required>
                    <label>Username</label>
                </div>
                <div class="txt_field">
                    <input type="password" name="user_password" class="form-control" required>
                    <label>Password</label>
                </div>
                <input type="submit" id="login-btn" name="login_btn" value="Login">

        </form>
    </div>
</body>

</html>