<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GeekGoods</title>
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <!-- Navbar Section Starts Here -->
  <section class="navbar">
    <div class="container">
      <div class="logo">
        <a href="index.php" title="Logo">
          <img src="images/logo.jpg" class="img-responsive" />
        </a>
      </div>
      <div class="menu text-right">
        <ul>
          <li>
            <a href="index.php">Home</a>
          </li>
          <li>
            <a href="products.php">Products</a>
          </li>
          <li>
            <a href="select-login.html">Login</a>
          </li>
        </ul>
      </div>
      <div class="clearfix"></div>
    </div>
  </section>
  <!-- Navbar Section Ends Here -->

  <!-- Product Search Section -->
  <section class="products-search text-center">
    <div class="container">
      <form action="products-search.php" method="POST">
        <input type="search" name="search" placeholder="Search for Products.." required />
        <input type="submit" name="submit" value="Search" class="btn btn-primary" />
      </form>
    </div>
  </section>

 
  <section class="product-menu">
    <div class="container">
      <h2 class="text-center">All Products</h2>

      <?php
      include('dbConnection/connection.php'); // Include your database connection file

      $sql = "SELECT * FROM tbl_products";
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
              <img src="images/product/<?php echo $product_image; ?>" alt="<?php echo $product_title; ?>" class="img-responsive img-curve" />
            </div>
            <div class="product-menu-desc">
              <h4><?php echo $product_title; ?></h4>
              <p class="product-price">$<?php echo $product_price; ?></p>
              <p class="product-detail"><?php echo $product_description; ?></p>
              <br />
              <a href="customer/login.php?redirect=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" class="btn btn-order">Order Now</a>
            </div>
          </div>
      <?php
        }
      }
      ?>

      <div class="clearfix"></div>
    </div>

</body>

</html>
