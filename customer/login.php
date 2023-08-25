<?php
// database connection
include('../dbConnection/connection.php');
?>
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
        if (isset($_SESSION['no-login'])) {
            echo $_SESSION['no-login'];
            unset($_SESSION['no-login']);
        }

        // Show "Signup Successful" message from signup.php
        if (isset($_SESSION['signup'])) {
            echo $_SESSION['signup'];
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

    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = sha1($_POST['password']);

        $sql = "SELECT * FROM tbl_customer WHERE username='$username' AND password='$password'";
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if ($count == 1) {
            $row = mysqli_fetch_assoc($res);
            $_SESSION['customer_username'] = $row['username']; // Store customer username in the session

            $_SESSION['login'] = "<div class='success text-center'>Login Successful</div>";
            // Redirect to customer dashboard or homepage
            header('location:' . SITEURL . 'customer/index.php');
        } else {
            $_SESSION['no-login'] = "<div class='error text-center'>Login Failed</div>";
            // again Redirect to customer login page
            header('location:' . SITEURL . 'customer/login.php');
        }
    }
    ?>
</body>

</html>