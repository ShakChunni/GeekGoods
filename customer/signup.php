<?php include('../dbConnection/connection.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>GeekGoods - Signup</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="signup">
        <h1 class="text-center">Signup</h1>
        <br><br>

        <?php
        if (isset($_SESSION['signup'])) {
            echo $_SESSION['signup'];
            unset($_SESSION['signup']);
        }
        ?>

        <form action="" method="POST">
            <label for="fullname" class="text-center">Full Name</label>
            <input type="text" id="fullname" name="fullname" placeholder="Enter Full Name">
            <label for="username" class="text-center">Username</label>
            <input type="text" id="username" name="username" placeholder="Choose Username">
            <label for="password" class="text-center">Password</label>
            <input type="password" id="password" name="password" placeholder="Choose Password">
            <br><br>
            <input type="submit" name="submit" value="Signup" class="btn-primary">
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $full_name = $_POST['fullname'];
    $username = $_POST['username'];
    $password = sha1($_POST['password']); 

    // Check if any of the fields are empty
    if (empty($full_name) || empty($username) || empty($_POST['password'])) {
        $_SESSION['signup'] = "<div class='error text-center'>Please fill up all fields properly</div>";
        header('location:' . SITEURL . 'customer/signup.php');
        exit();
    }

    // Check if the username already exists
    $check_query = "SELECT * FROM tbl_customer WHERE username='$username'";
    $check_result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['signup'] = "<div class='error text-center'>Username already exists</div>";
        header('location:' . SITEURL . 'customer/signup.php');
        exit();
    }

    // Insert the user into the tbl_customer table
    $insert_query = "INSERT INTO tbl_customer (full_name, username, password) VALUES ('$full_name', '$username', '$password')";
    $insert_result = mysqli_query($conn, $insert_query);

    if ($insert_result) {
        $_SESSION['signup'] = "<div class='success text-center'>Signup Successful</div>"; // Just set a flag here
        header('location:' . SITEURL . 'customer/login.php');
        exit();
    } else {
        $_SESSION['signup'] = "<div class='error text-center'>Signup Failed</div>";
        header('location:' . SITEURL . 'customer/signup.php');
    }
}
?>
