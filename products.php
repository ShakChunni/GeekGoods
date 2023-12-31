<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GeekGoods</title>
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
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
            <a href="category.php">Category</a>
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
      include('dbConnection/connection.php'); 

      $sql = "SELECT * FROM tbl_products";
      $res = mysqli_query($conn, $sql);

      if ($res) {
        while ($row = mysqli_fetch_assoc($res)) {
          $product_title = $row['title'];
          $product_price = $row['price'];
          $product_description = $row['description'];
          $product_image = $row['image_name'];
          $product_category_id = $row['category_id'];

          // Retrieve category title based on category_id
          $category_query = "SELECT title FROM tbl_category WHERE id='$product_category_id'";
          $category_result = mysqli_query($conn, $category_query);

          if ($category_result && mysqli_num_rows($category_result) > 0) {
            $category_row = mysqli_fetch_assoc($category_result);
            $category_title = $category_row['title'];
          } else {
            $category_title = 'Uncategorized';
          }
      ?>
          <div class="product-menu-box">
            <div class="product-menu-img">
              <img src="images/product/<?php echo $product_image; ?>" alt="<?php echo $product_title; ?>" class="img-responsive img-curve" />
            </div>
            <div class="product-menu-desc">
              <h4><?php echo $product_title; ?></h4>
              <p class="product-category">
                <em class="category-title"><?php echo $category_title; ?></em>
              </p>
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