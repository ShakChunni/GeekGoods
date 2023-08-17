<?php include('reusables/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Product</h1>

        <br></br>

        <form action="" method="post" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Product Title:</td>
                    <td><input type="text" name="product_title" placeholder="Enter product title"></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><textarea name="description" cols="30" rows="5" placeholder="Enter product description"></textarea></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input type="text" name="price" placeholder="Enter price"></td>
                </tr>
                <tr>
                    <td>Select Category:</td>
                    <td>
                        <select name="category_id">
                            <?php
                            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                            $res = mysqli_query($conn, $sql);
                            if ($res == TRUE) {
                                $count = mysqli_num_rows($res);
                                if ($count > 0) {
                                    while ($rows = mysqli_fetch_assoc($res)) {
                                        $category_id = $rows['id'];
                                        $category_title = $rows['title'];
                            ?>
                                        <option value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                            <?php
                                    }
                                } else {
                                    echo "<option value='0'>No Category Found</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Upload Image:</td>
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
                        <input type="submit" name="submit" value="Add Product" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include('reusables/footer.php'); ?>

<?php
if (isset($_POST['submit'])) {
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    $image_name = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];

    // Move uploaded image to the desired directory
    if (!empty($image_name)) {
        $upload_path = "../images/product" . $image_name;
        move_uploaded_file($temp_name, $upload_path);
    } else {
        // Set a default image if no image is uploaded
        $image_name = "default.jpg"; // Change this to the actual default image name
    }

    $sql = "INSERT INTO tbl_products (title, description, price, image_name, category_id, featured, active)
            VALUES ('$product_title', '$description', '$price', '$image_name', '$category_id', '$featured', '$active')";

    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($res == True) {
        $_SESSION['add'] = "Product Added Successfully";
        header("location:" . SITEURL . 'admin/manage-product.php');
    } else {
        $_SESSION['add'] = "Failed to Add Product";
        header("location:" . SITEURL . 'admin/add-product.php');
    }
}
?>
