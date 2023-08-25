<?php include('reusables/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Products</h1>
        <br /><br />

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        // Additional session messages can be handled similarly

        ?>

        <br /><br /><br />
        <a href="add-product.php" class="btn-primary">Add Product</a>

        <br /><br /><br />
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Product Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>

            <?php
            $sql = "SELECT * FROM tbl_products";
            $res = mysqli_query($conn, $sql);
            $serial = 1;

            if ($res) {
                $count = mysqli_num_rows($res);
                if ($count > 0) {
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $id = $rows['id'];
                        $product_title = $rows['title'];
                        $description = $rows['description'];
                        $price = $rows['price'];
                        $category_id = $rows['category_id'];
                        $featured = $rows['featured'];
                        $active = $rows['active'];

                        // Get category title based on category_id
                        $sql_category = "SELECT title FROM tbl_category WHERE id=$category_id";
                        $res_category = mysqli_query($conn, $sql_category);
                        $category_row = mysqli_fetch_assoc($res_category);
                        $category_title = $category_row['title'];

                        // Check if 'image_name' exists in the array before accessing it
                        if (isset($rows['image_name'])) {
                            $image_name = $rows['image_name'];
            ?>
                            <tr>
                                <td><?php echo $serial++; ?></td>
                                <td><?php echo $product_title; ?></td>
                                <td><?php echo $description; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $category_title; ?></td>
                                <td>
                                    <?php
                                    // Display the product image if 'image_name' exists
                                    if ($image_name != "") {
                                    ?>
                                        <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name; ?>" width="100px">
                                    <?php
                                    } else {
                                        // Display a message if no image is available
                                        echo "<span class='error'>Image not added</span>";
                                    }
                                    ?>
                                </td>
                                <td><?php echo $featured; ?></td>
                                <td><?php echo $active; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-product.php?id=<?php echo $id; ?>" class="btn-secondary">Update Product</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-product.php?id=<?php echo $id; ?>" class="btn-danger">Delete Product</a>
                                </td>
                            </tr>
            <?php
                        }
                    }
                }
            }
            ?>
        </table>
        <div class="clearfix"></div>
    </div>
</div>

