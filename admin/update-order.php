<?php include('reusables/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order Status</h1>
        <br><br>

        <?php
        // 1. Get the ID of Selected Order
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_order WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        if ($res == TRUE) {
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                $rows = mysqli_fetch_assoc($res);
                $order_status = $rows['status'];
            } else {
                header('location:' . SITEURL . 'admin/manage-order.php');
            }
        }
        ?>

        <form action="" method="post">

            <table class="tbl-30">
                <tr>
                    <td>Order Status:</td>
                    <td>
                        <select name="order_status">
                            <option value="Pending" <?php if ($order_status == "Pending") echo "selected"; ?>>Pending</option>
                            <option value="Processing" <?php if ($order_status == "Processing") echo "selected"; ?>>Processing</option>
                            <option value="Delivered" <?php if ($order_status == "Delivered") echo "selected"; ?>>Delivered</option>
                            <option value="Cancelled" <?php if ($order_status == "Cancelled") echo "selected"; ?>>Cancelled</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
if (isset($_POST["submit"])) {
    $id = $_POST['id'];
    $order_status = $_POST['order_status'];

    // Update the order status
    $sql = "UPDATE tbl_order SET
                status = '$order_status'
                WHERE id='$id'";

    $res = mysqli_query($conn, $sql);

    if ($res == TRUE) {
        $_SESSION['order-update'] = "<div class='success'>Order Status Updated Successfully.</div>";
        header("location:" . SITEURL . 'admin/manage-order.php');
    } else {
        $_SESSION['order-update'] = "<div class='error'>Failed to Update Order Status.</div>";
        header("location:" . SITEURL . 'admin/manage-order.php');
    }
}
?>

<?php include('reusables/footer.php'); ?>
