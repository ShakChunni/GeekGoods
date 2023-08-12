<?php include('../dbConnection/connection.php'); ?>
<html>

<head>
    <title>GeekGoods - Login</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br><br>

        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if (isset($_SESSION['no-login-message'])) {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
        ?>

        <form action="" method="POST">
            <h3>Username</h3>
            <input type="text" name="username" placeholder="Enter Username"><br><br>
            <h3>Password</h3>
            <input type="password" name="password" placeholder="Enter Password"><br><br>
            <input type="submit" name="submit" value="Login" class="btn-primary">

        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $_SESSION['login'] = "<div class='success text-center'>Login Successful</div>";
        header('location:' . SITEURL . 'admin/');
    } else {
        $_SESSION['login'] = "<div class='error text-center'>Login Failed</div>";
        header('location:' . SITEURL . 'admin/login.php');
    }
}


?>