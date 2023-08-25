<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <!-- Important to make website responsive -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GeekGoods - Products</title>
  <link rel="stylesheet" href="../css/style.css">
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



  <section class="product-menu">
    <div class="container">
      <h2 class="text-center">
        <div class="text-center-color">All Products</div>
      </h2>
      <?php
      include('../dbConnection/connection.php'); // Include your database connection file

      $sql = "SELECT * FROM tbl_products WHERE active='Yes'";
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
  </section>
</body>

</html>