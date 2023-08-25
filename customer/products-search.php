<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GeekGoods - Search Results</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>

  <section class="navbar">
    <div class="container">
      <div class="logo">
        <a href="index.php" title="Logo">
          <img src="../images/logo.jpg" class="img-responsive">
        </a>
      </div>
      <div class="menu text-right">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li>
            <a href="category.php">Category</a>
          </li>
          <li><a href="products.php">Products</a></li>
          <li><a href="select-login.html">Login</a></li>
        </ul>
      </div>
      <div class="clearfix"></div>
    </div>
  </section>


  <section class="products-search text-center">
    <div class="container">
      <?php
      include('../dbConnection/connection.php'); // database connection 

      if (isset($_POST['search'])) {
        $searchKeyword = $_POST['search'];

        $sql = "SELECT * FROM tbl_products WHERE active='Yes' AND title LIKE '%$searchKeyword%'";
        $res = mysqli_query($conn, $sql);

        echo "<h2>Products on Your Search <a href='#' class='text-black'>\"$searchKeyword\"</a></h2>";

        if ($res) {
          while ($row = mysqli_fetch_assoc($res)) {
            $product_title = $row['title'];
            $product_price = $row['price'];
            $product_description = $row['description'];
            $product_image = $row['image_name'];
      ?>
            <div class="product-menu-box">
              <div class="product-menu-img">
                <img src="../images/product/<?php echo $product_image; ?>" alt="<?php echo $product_title; ?>" class="img-responsive img-curve">
              </div>
              <div class="product-menu-desc">
                <h4><?php echo $product_title; ?></h4>
                <p class="product-price">$<?php echo $product_price; ?></p>
                <p class="product-detail"><?php echo $product_description; ?></p>
                <br>
                <a href="order.php?product_title=<?php echo urlencode($product_title); ?>&product_price=<?php echo urlencode($product_price); ?>" class="btn btn-order">Order Now</a>
              </div>
            </div>
      <?php
          }
        } else {
          echo "<p>No products found matching your search.</p>";
        }
      }
      ?>
      <div class="clearfix"></div>
    </div>
</body>

</html>