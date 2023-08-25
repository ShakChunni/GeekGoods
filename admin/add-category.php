<?php include('reusables/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br></br>

        <form action="" method="post" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Category Title:</td>
                    <td><input type="text" name="category_title" placeholder="Enter category title"></td>
                </tr>
                <tr>
                    <td>Image:</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php
if (isset($_POST['submit'])) {

    $category_title = $_POST['category_title'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    // Uploading the image
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $upload_path = "../images/category/";

    move_uploaded_file($tmp_name, $upload_path . $image_name);


    $sql = "INSERT INTO tbl_category (title, image_name, featured, active)
            VALUES ('$category_title', '$image_name', '$featured', '$active')";

    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($res == True) {
        $_SESSION['add'] = "Category Added Successfully";
        header("location:" . SITEURL . 'admin/manage-category.php');
    } else {
        $_SESSION['add'] = "Failed to Add Category";
        header("location:" . SITEURL . 'admin/add-category.php');
    }
}
?>