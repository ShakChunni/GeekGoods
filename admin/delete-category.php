<?php
include('../dbConnection/connection.php');

$id = $_GET['id'];
$sql = "DELETE FROM tbl_category WHERE id=$id";
$res = mysqli_query($conn, $sql);

if ($res == TRUE) {
    $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
    header("location:" . SITEURL . 'admin/manage-category.php');
} else {
    $_SESSION['delete'] = "Failed to Delete Category";
    header("location:" . SITEURL . 'admin/manage-category.php');
}
?>
