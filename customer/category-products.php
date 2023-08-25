<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GeekGoods - Category Products</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="index.php" title="Logo">
                    <img src="../images/logo.jpg" class="img-responsive" />
                </a>
            </div>
            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="category.php">Category</a>
                    </li>
                    <li>
                        <a href="products.php">Products</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                    <li>
                        <a href="cart.php">Cart</a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>


    <section class="products-search text-center">
        <div class="container">
            <form action="products-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Products.." required />
                <input type="submit" name="submit" value="Search" class="btn btn-primary" />
            </form>
        </div>
    </section>

    <!-- Products Section -->
    <section class="product-menu">
        <div class="container">
            <?php
            include('../dbConnection/connection.php'); // Include your database connection file

            if (isset($_GET['category_id'])) {
                $selected_category_id = $_GET['category_id'];

                $products_query = "SELECT * FROM tbl_products WHERE category_id='$selected_category_id'";
                $products_result = mysqli_query($conn, $products_query);

                if ($products_result && mysqli_num_rows($products_result) > 0) {
                    while ($product_row = mysqli_fetch_assoc($products_result)) {
                        $product_title = $product_row['title'];
                        $product_price = $product_row['price'];
                        $product_description = $product_row['description'];
                        $product_image = $product_row['image_name'];
                        $product_category_id = $product_row['category_id'];

                        // Retrieve category title based on category_id
                        $category_query = "SELECT title FROM tbl_category WHERE id='$product_category_id'";
                        $category_result = mysqli_query($conn, $category_query);

                        if ($category_result && mysqli_num_rows($category_result) > 0) {
                            $category_row = mysqli_fetch_assoc($category_result);
                            $category_title = $category_row['title'];
                        } else {
                            $category_title = 'Uncategorized';
                        }

                        // Display the product details with styling
                        echo '<div class="product-menu-box">';
                        echo '<div class="product-menu-img">';
                        echo '<img src="../images/product/' . $product_image . '" alt="' . $product_title . '" class="img-responsive img-curve" />';
                        echo '</div>';
                        echo '<div class="product-menu-desc">';
                        echo '<h4>' . $product_title . '</h4>';
                        echo '<p class="product-price">$' . $product_price . '</p>';
                        echo '<p class="product-detail">' . $product_description . '</p>';
                        echo '<br />';
                        echo '<a href="order.php?product_title=' . urlencode($product_title) . '&product_price=' . urlencode($product_price) . '" class="btn btn-order">Order Now</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>No products found for this category.</p>";
                }
            }
            ?>
        </div>
    </section>

</body>

</html>