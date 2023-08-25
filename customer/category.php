<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GeekGoods - Categories</title>
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

    <!-- Categories Section -->
    <section class="product-menu">
        <div class="container">
            <h2 class="text-center">
                <div class="text-center-color">Browse Category</div>
            </h2>

            <?php
            include('../dbConnection/connection.php'); // database connection file

            $sql = "SELECT * FROM tbl_category WHERE active='Yes' "; // Select all categories from the tbl_category table
            $res = mysqli_query($conn, $sql);

            if ($res) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $category_id = $row['id'];
                    $category_title = $row['title'];
                    $category_image = $row['image_name'];
            ?>
                    <a href="category-products.php?category_id=<?php echo $category_id; ?>" class="category-link">
                        <div class="product-menu-box">
                            <div class="product-menu-img">
                                <img src="../images/category/<?php echo $category_image; ?>" alt="<?php echo $category_title; ?>" class="img-responsive img-curve" />
                            </div>
                            <div class="product-menu-desc">
                                <h4><?php echo $category_title; ?></h4>
                            </div>
                        </div>
                    </a>
            <?php
                }
            }
            ?>

            <div class="clearfix"></div>
        </div>
    </section>

</body>

</html>