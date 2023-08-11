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
            <tr>
                <td>1.</td>
                <td>Safwat Raida</td>
                <td>raida123</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>
            <tr>
                <td>1.</td>
                <td>Safwat Raida</td>
                <td>raida123</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>
            <tr>
                <td>1.</td>
                <td>Safwat Raida</td>
                <td>raida123</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>
            <tr>
                <td>1.</td>
                <td>Safwat Raida</td>
                <td>raida123</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>
        </table>


        <div class="clearfix"></div>
    </div>
</div>


<?php include('reusables/footer.php'); ?>