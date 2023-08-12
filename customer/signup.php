<?php include('../dbConnection/connection.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>GeekGoods - Signup</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .signup {
            width: 300px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .text-center {
            text-align: center;
        }

        .error {
            color: #f44336;
        }

        .success {
            color: #4caf50;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
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
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = sha1($_POST['password']); // Please consider using more secure methods for password hashing

    // Insert the user into the appropriate table (admin or customer)
    // You need to adjust the queries based on your database structure
    $sql = "INSERT INTO tbl_admin (fullname, username, password) VALUES ('$fullname', '$username', '$password')";
    // OR
    // $sql = "INSERT INTO tbl_customer (fullname, username, password) VALUES ('$fullname', '$username', '$password')";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        $_SESSION['signup'] = "<div class='success text-center'>Signup Successful</div>";
        // Redirect to appropriate login page
        // header('location:' . SITEURL . 'admin/login.php');
        // OR
        // header('location:' . SITEURL . 'customer/login.php');
    } else {
        $_SESSION['signup'] = "<div class='error text-center'>Signup Failed</div>";
        // Redirect back to the signup page
        // header('location:' . SITEURL . 'signup.php');
    }
}
?>
