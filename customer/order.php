<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order Product</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <!-- Navbar Section Starts Here -->
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
    <!-- Navbar Section Ends Here -->

    <!-- Order Form Section -->
    <section class="order-form">
        <div class="container">
            <h2 class="text-center">Order Now</h2>

            <?php
            include('../dbConnection/connection.php'); // Include your database connection file
            if (isset($_SESSION['customer_username'])) {
                $customer_username = $_SESSION['customer_username'];
                // Use $customer_id as needed in your index.php
              } else {
                // Redirect to the login page if not logged in
                header('location:' . SITEURL . 'customer/login.php');
              }

            if (isset($_GET['product_title']) && isset($_GET['product_price'])) {
                $product_title = urldecode($_GET['product_title']);
                $product_price = urldecode($_GET['product_price']);

                // Retrieve other necessary product details from tbl_products
                $sql = "SELECT * FROM tbl_products WHERE title='$product_title'";
                $res = mysqli_query($conn, $sql);

                if ($res) {
                    $row = mysqli_fetch_assoc($res);
                    $product_description = $row['description'];
                    $product_image = $row['image_name'];
                }
            }
            ?>

            <div class="order-product">
                <div class="product-img">
                    <img src="../images/product/<?php echo $product_image; ?>" alt="<?php echo $product_title; ?>" class="img-responsive img-curve" />
                </div>
                <div class="product-details">
                    <h4><?php echo $product_title; ?></h4>
                    <p class="product-price">$<?php echo $product_price; ?></p>
                    <p class="product-detail"><?php echo $product_description; ?></p>
                </div>
            </div>

            <div class="order-form">
                <form action="submit-order.php" method="POST">
                    
                    <input type="hidden" name="product_title" value="<?php echo $product_title; ?>" />
                    <input type="hidden" name="product_price" value="<?php echo $product_price; ?>" />
                    <input type="hidden" name="customer_username" value="<?php echo $customer_username; ?>" /> <!-- Using the customer_id retrieved earlier -->

                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" min="1" required />

                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" required />

                    <label for="contact">Contact:</label>
                    <input type="text" name="contact" id="contact" required />

                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required />

                    <label for="address">Address:</label>
                    <textarea name="address" id="address" required></textarea>

                    <input type="submit" name="submit" value="Place Order" class="btn btn-primary" />
                </form>
            </div>
        </div>
    </section>
</body>

</html>