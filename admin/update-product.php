<?php include('reusables/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Product</h1>
        <br><br>

        <?php
        // Get the ID of Selected Product
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_products WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        if ($res == TRUE) {
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                $rows = mysqli_fetch_assoc($res);
                $product_title = $rows['title'];
                $description = $rows['description'];
                $price = $rows['price'];
                $category_id = $rows['category_id'];
                $image_name = $rows['image_name'];
                $featured = $rows['featured'];
                $active = $rows['active'];
            } else {
                header('location:' . SITEURL . 'admin/manage-product.php');
            }
        }
        ?>

        <form action="" method="post" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Product Title:</td>
                    <td><input type="text" name="product_title" value="<?php echo $product_title ?>"></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><textarea name="description"><?php echo $description ?></textarea></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input type="text" name="price" value="<?php echo $price ?>"></td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category_id">
                            <?php
                            // Display dropdown options for categories
                            $sql_category = "SELECT * FROM tbl_category WHERE active='Yes'";
                            $res_category = mysqli_query($conn, $sql_category);
                            while ($category_row = mysqli_fetch_assoc($res_category)) {
                                $category_id_option = $category_row['id'];
                                $category_title_option = $category_row['title'];
                            ?>
                                <option value="<?php echo $category_id_option; ?>" <?php if ($category_id_option == $category_id) echo "selected"; ?>><?php echo $category_title_option; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Upload Image:</td>
                    <td>
                        <?php
                        if ($image_name != "") {
                            // Display the current image
                        ?>
                            <img src="<?php echo SITEURL; ?>images/products/<?php echo $image_name; ?>" width="100px">
                        <?php
                        }
                        ?>
                        <input type="file" name="image">
                    </td>
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
                        <input type="submit" name="submit" value="Update Product" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
if (isset($_POST["submit"])) {
    $id = $_POST['id'];
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    // Handle image upload
    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_type = $_FILES['image']['type'];

        // Get the extension of the image
        $arr = explode('.', $image_name);
        $ext = end($arr);

        // Rename the image
        $image_name = "Product_" . rand(000, 999) . '.' . $ext;

        // Upload the image
        $upload_path = "../images/product/" . $image_name;
        move_uploaded_file($image_tmp, $upload_path);
    } else {
        // If no new image is uploaded, use the current image name
        $image_name = $rows['image_name'];
    }

    // Update the product information
    $sql = "UPDATE tbl_products SET
                title = '$product_title',
                description = '$description',
                price = '$price',
                category_id = '$category_id',
                image_name = '$image_name',
                featured = '$featured',
                active = '$active'
                WHERE id='$id'";

    $res = mysqli_query($conn, $sql);

    if ($res == TRUE) {
        $_SESSION['update'] = "<div class='success'>Product Updated Successfully.</div>";
        header("location:" . SITEURL . 'admin/manage-product.php');
    } else {
        $_SESSION['update'] = "<div class='error'>Failed to Update Product.</div>";
        header("location:" . SITEURL . 'admin/manage-product.php');
    }
}
?>

