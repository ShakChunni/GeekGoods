<?php include('../dbConnection/connection.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>GeekGoods - Customer Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="login">
        <h1 class="text-center">Customer Login</h1>
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
        
        // Show "Signup Successful" message from signup.php
        if (isset($_SESSION['signup']) && $_SESSION['signup'] === "success") {
            echo "<div class='success text-center'>Signup Successful</div>";
            unset($_SESSION['signup']);
        }
        ?>

        <form action="" method="POST">
            <label for="username" class="text-center">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter Username">
            <label for="password" class="text-center">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter Password">
            <br><br>
            <input type="submit" name="submit" value="Login" class="btn-primary">
        </form>

        <!-- Add a "Signup" button that redirects to signup.php -->
        <div class="signup-link">
            <a href="signup.php" class="btn-signup">Signup</a>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    $sql = "SELECT * FROM tbl_customer WHERE username='$username' AND password='$password'";
    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $_SESSION['login'] = "<div class='success text-center'>Login Successful</div>";
        // Redirect to customer dashboard or homepage
        header('location:' . SITEURL . 'customer/index.php');
    } else {
        $_SESSION['login'] = "<div class='error text-center'>Login Failed</div>";
        header('location:' . SITEURL . 'customer/login.php');
    }
}
?>