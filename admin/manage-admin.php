<?php include('reusables/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br /><br />

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //Displaying Session Message
            unset($_SESSION['add']); //Removing Session Message
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        ?>

        <br /><br /><br />
        <a href="add-admin.php" class="btn-primary">Add Admin</a>

        <br /><br /><br />
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>


            <?php
            $sql = "SELECT * FROM tbl_admin";
            $res = mysqli_query($conn, $sql);
            $serial = 1;

            if ($res == TRUE) {
                $count = mysqli_num_rows($res); // Function to get all the rows in database
                if ($count > 0) {
                    while ($rows = mysqli_fetch_assoc($res)) {
                        //Using While loop to get all the data from database

                        //Get individual data
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];

                        //Display the values in our table
            ?>
                        <tr>
                            <td><?php echo $serial++; ?></td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                            </td>
                        </tr>
            <?php
                    }
                }
            }


            ?>




            <div class="clearfix"></div>
    </div>
</div>