<?php include('reusables/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br><br>

        <?php
        // 1. Get the ID of Selected Category
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_category WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        if ($res == TRUE) {
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                $rows = mysqli_fetch_assoc($res);
                $category_title = $rows['title'];
                $image_name = $rows['image_name'];
                $featured = $rows['featured'];
                $active = $rows['active'];
            } else {
                header('location:' . SITEURL . 'admin/manage-category.php');
            }
        }
        ?>

        <form action="" method="post" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Category Title:</td>
                    <td><input type="text" name="category_title" value="<?php echo $category_title ?>"></td>
                </tr>
                <tr>
                    <td>Upload Image:</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes" <?php if ($featured == "Yes") echo "checked"; ?>> Yes
                        <input type="radio" name="featured" value="No" <?php if ($featured == "No") echo "checked"; ?>> No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes" <?php if ($active == "Yes") echo "checked"; ?>> Yes
                        <input type="radio" name="active" value="No" <?php if ($active == "No") echo "checked"; ?>> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
if (isset($_POST["submit"])) {
    $id = $_POST['id'];
    $category_title = $_POST['category_title'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    // Handle image upload
    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_type = $_FILES['image']['type'];

        // Get the extension of the images
        $arr = explode('.', $image_name);
        $ext = end($arr);

        // Rename the image
        $image_name = "Category_" . rand(000, 999) . '.' . $ext;

        // Upload the image
        $upload_path = "../images/category/" . $image_name;
        move_uploaded_file($image_tmp, $upload_path);
    }

    // Update the category information
    $sql = "UPDATE tbl_category SET
                title = '$category_title',
                image_name = '$image_name',
                featured = '$featured',
                active = '$active'
                WHERE id='$id'";

    $res = mysqli_query($conn, $sql);

    if ($res == TRUE) {
        $_SESSION['update'] = "<div class='success'>Category Updated Successfully.</div>";
        header("location:" . SITEURL . 'admin/manage-category.php');
    } else {
        $_SESSION['update'] = "<div class='error'>Failed to Update Category.</div>";
        header("location:" . SITEURL . 'admin/manage-category.php');
    }
}
?>

<?php include('reusables/footer.php'); ?>
