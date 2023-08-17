<?php
include('../dbConnection/connection.php');

$id = $_GET['id'];
$sql = "DELETE FROM tbl_order WHERE id=$id";
$res = mysqli_query($conn, $sql);

if ($res == TRUE) {
    $_SESSION['order-delete'] = "<div class='success'>Order Deleted Successfully.</div>";
    header("location:" . SITEURL . 'admin/manage-order.php');
} else {
    $_SESSION['order-delete'] = "Failed to Delete Order";
    header("location:" . SITEURL . 'admin/manage-order.php');
}
?>
