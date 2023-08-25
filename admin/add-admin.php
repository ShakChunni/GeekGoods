<?php include('reusables/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add admin</h1>

        <br></br>

        <form action="" method="post">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="your username"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="your password"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add admin" class="btn-secondary">
                    </td>

            </table>

        </form>
    </div>
</div>



<?php

// Process the value from form and save it in database  
if (isset($_POST['submit'])) {

    // 1. Get the data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = sha1($_POST['password']); // Password hashing with sha1

    // 2. SQL Query to save the data into database
    $sql = "INSERT INTO tbl_admin SET 
        full_name='$full_name',
        username='$username',
        password='$password'
    ";

    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    // 4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
    if ($res == True) {
        $_SESSION['add'] = "Admin Added Successfully";

        header("location:" . SITEURL . 'admin/manage-admin.php');
    } else {
        $_SESSION['add'] = "Failed to Add Admin";
        header("location:" . SITEURL . 'admin/add-admin.php');
    }
}

?>