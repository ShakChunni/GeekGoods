<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!-- Important to make website responsive -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GeekGoods - Products</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!-- Navbar Section Starts Here -->
  <section class="navbar">
    <div class="container">
      <div class="logo">
        <a href="#" title="Logo">
          <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
        </a>
      </div>
      <div class="menu text-right">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="categories.php">Categories</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
      <div class="clearfix"></div>
    </div>
  </section>
  <!-- Navbar Section Ends Here -->

  <!-- PRODUCT SEARCH Section Starts Here -->
  <section class="products-search text-center">
    <div class="container">
      <form action="products-search.php" method="POST">
        <input type="search" name="search" placeholder="Search for Products.." required />
        <input type="submit" name="submit" value="Search" class="btn btn-primary" />
      </form>
    </div>
  </section>
  <!-- PRODUCT SEARCH Section Ends Here -->

<!-- Product Menu Section -->
<section class="product-menu">
    <div class="container">
      <!-- Loop through your products -->
      <?php
      include('../dbConnection/connection.php'); // Include your database connection file

      $sql = "SELECT * FROM tbl_products WHERE active='Yes' AND featured='Yes' LIMIT 6";
      $res = mysqli_query($conn, $sql);

      if ($res) {
        while ($row = mysqli_fetch_assoc($res)) {
          $product_title = $row['title'];
          $product_price = $row['price'];
          $product_description = $row['description'];
          $product_image = $row['image_name'];
      ?>
          <div class="product-menu-box">
            <div class="product-menu-img">
              <img src="../images/product/<?php echo $product_image; ?>" alt="<?php echo $product_title; ?>" class="img-responsive img-curve" />
            </div>
            <div class="product-menu-desc">
              <h4><?php echo $product_title; ?></h4>
              <p class="product-price">$<?php echo $product_price; ?></p>
              <p class="product-detail"><?php echo $product_description; ?></p>
              <br />
              <a href="order.php?product_title=<?php echo urlencode($product_title); ?>&product_price=<?php echo urlencode($product_price); ?>" class="btn btn-order">Order Now</a>
            </div>
          </div>
      <?php
        }
      }
      ?>
      <div class="clearfix"></div>
    </div>
    <p class="text-center">
      <a href="products.php">See All Products</a>
    </p>
  </section>
  <!-- PRODUCT MENU Section Ends Here -->

  <!-- social Section Starts Here -->
  <section class="social">
    <!-- ... Social media icons code ... -->
  </section>
  <!-- social Section Ends Here -->

  <!-- footer Section Starts Here -->
  <section class="footer">
    <!-- ... Footer section code ... -->
  </section>
  <!-- footer Section Ends Here -->
</body>
</html>
