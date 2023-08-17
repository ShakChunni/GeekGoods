<?php 
include('../dbConnection/connection.php');

$id = $_GET['id'];
$sql = "SELECT * FROM tbl_products WHERE id=$id";
$res = mysqli_query($conn, $sql);
if ($res == TRUE) {
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        // Get the image name to delete it from the directory
        $rows = mysqli_fetch_assoc($res);
        $image_name = $rows['image_name'];
        
        // Delete the image from the directory
        $image_path = "../images/products/" . $image_name;
        unlink($image_path);

        // Delete the product from the database
        $sql_delete = "DELETE FROM tbl_products WHERE id=$id";
        $res_delete = mysqli_query($conn, $sql_delete);

        if ($res_delete == TRUE) {
            $_SESSION['delete'] = "<div class='success'>Product Deleted Successfully.</div>";
            header("location:" . SITEURL . 'admin/manage-product.php');
        } else {
            $_SESSION['delete'] = "Failed to Delete Product";
            header("location:" . SITEURL . 'admin/manage-product.php');
        }
    } else {
        header('location:' . SITEURL . 'admin/manage-product.php');
    }
}
?>
