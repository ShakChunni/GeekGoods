<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GeekGoods</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="../css/style.css" />
  </head>

  <body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
      <div class="container">
        <div class="logo">
          <a href="#" title="Logo">
            <img
              src="../images/logo.png"
              alt="Restaurant Logo"
              class="img-responsive"
            />
          </a>
        </div>

        <div class="menu text-right">
          <ul>
            <li>
              <a href="index.php">Home</a>
            </li>
            <li>
              <a href="categories.html">Categories</a>
            </li>
            <li>
              <a href="products.html">Products</a>
            </li>
            <li>
              <a href="logout.php">Logout</a>
            </li>
          </ul>
        </div>

        <div class="clearfix"></div>
      </div>
    </section>
    <!-- Navbar Section Ends Here -->

    <section class="products-search text-center">
      <div class="container">
        <form action="products-search.html" method="POST">
          <input
            type="search"
            name="search"
            placeholder="Search for Products.."
            required
          />
          <input
            type="submit"
            name="submit"
            value="Search"
            class="btn btn-primary"
          />
        </form>
      </div>
    </section>
    <!-- Products SEARCH Section Ends Here -->

    <!-- Categories Section Starts Here -->
    <section class="categories">
      <div class="container">
        <h2 class="text-center">Explore Products</h2>

        <a href="category-products.html">
          <div class="box-3 float-container">
            <img
              src="../images/pizza.jpg"
              alt="Pizza"
              class="img-responsive img-curve"
            />

            <h3 class="float-text text-white">Pizza</h3>
          </div>
        </a>

        <a href="#">
          <div class="box-3 float-container">
            <img
              src="../images/burger.jpg"
              alt="Burger"
              class="img-responsive img-curve"
            />

            <h3 class="float-text text-white">Burger</h3>
          </div>
        </a>

        <a href="#">
          <div class="box-3 float-container">
            <img
              src="../images/momo.jpg"
              alt="Momo"
              class="img-responsive img-curve"
            />

            <h3 class="float-text text-white">Momo</h3>
          </div>
        </a>

        <div class="clearfix"></div>
      </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- Product Menu Section Starts Here -->
    <section class="product-menu">
      <div class="container">
        <h2 class="text-center">Products</h2>

        <div class="product-menu-box">
          <div class="product-menu-img">
            <img
              src="../images/menu-pizza.jpg"
              alt="Chicken Hawaiian Pizza"
              class="img-responsive img-curve"
            />
          </div>

          <div class="product-menu-desc">
            <h4>Product Title</h4>
            <p class="product-price">$2.3</p>
            <p class="product-detail">
              Made with Italian Sauce, Chicken, and organic vegetables.
            </p>
            <br />

            <a href="order.html" class="btn btn-primary">Order Now</a>
          </div>
        </div>

        <div class="product-menu-box">
          <div class="product-menu-img">
            <img
              src="../images/menu-burger.jpg"
              alt="Chicken Hawaiian Pizza"
              class="img-responsive img-curve"
            />
          </div>

          <div class="product-menu-desc">
            <h4>Smoky Burger</h4>
            <p class="product-price">$2.3</p>
            <p class="product-detail">
              Made with Italian Sauce, Chicken, and organic vegetables.
            </p>
            <br />

            <a href="#" class="btn btn-primary">Order Now</a>
          </div>
        </div>

        <div class="product-menu-box">
          <div class="product-menu-img">
            <img
              src="../images/menu-burger.jpg"
              alt="Chicken Hawaiian Burger"
              class="img-responsive img-curve"
            />
          </div>

          <div class="product-menu-desc">
            <h4>Nice Burger</h4>
            <p class="product-price">$2.3</p>
            <p class="product-detail">
              Made with Italian Sauce, Chicken, and organic vegetables.
            </p>
            <br />

            <a href="#" class="btn btn-primary">Order Now</a>
          </div>
        </div>

        <div class="product-menu-box">
          <div class="product-menu-img">
            <img
              src="../images/menu-pizza.jpg"
              alt="Chicken Hawaiian Pizza"
              class="img-responsive img-curve"
            />
          </div>

          <div class="product-menu-desc">
            <h4>Products Title</h4>
            <p class="product-price">$2.3</p>
            <p class="product-detail">
              Made with Italian Sauce, Chicken, and organic vegetables.
            </p>
            <br />

            <a href="#" class="btn btn-primary">Order Now</a>
          </div>
        </div>

        <div class="product-menu-box">
          <div class="product-menu-img">
            <img
              src="../images/menu-pizza.jpg"
              alt="Chicken Hawaiian Pizza"
              class="img-responsive img-curve"
            />
          </div>

          <div class="product-menu-desc">
            <h4>Products Title</h4>
            <p class="product-price">$2.3</p>
            <p class="product-detail">
              Made with Italian Sauce, Chicken, and organic vegetables.
            </p>
            <br />

            <a href="#" class="btn btn-primary">Order Now</a>
          </div>
        </div>

        <div class="product-menu-box">
          <div class="product-menu-img">
            <img
              src="../images/menu-momo.jpg"
              alt="Chicken Hawaiian Momo"
              class="img-responsive img-curve"
            />
          </div>

          <div class="product-menu-desc">
            <h4>Chicken Steam Momo</h4>
            <p class="product-price">$2.3</p>
            <p class="product-detail">
              Made with Italian Sauce, Chicken, and organic vegetables.
            </p>
            <br />

            <a href="#" class="btn btn-primary">Order Now</a>
          </div>
        </div>

        <div class="clearfix"></div>
      </div>

      <p class="text-center">
        <a href="#">See All Products</a>
      </p>
    </section>
    <!-- Product Menu Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
      <div class="container text-center">
        <ul>
          <li>
            <a href="#"
              ><img
                src="https://img.icons8.com/fluent/50/000000/facebook-new.png"
            /></a>
          </li>
          <li>
            <a href="#"
              ><img
                src="https://img.icons8.com/fluent/48/000000/instagram-new.png"
            /></a>
          </li>
          <li>
            <a href="#"
              ><img src="https://img.icons8.com/fluent/48/000000/twitter.png"
            /></a>
          </li>
        </ul>
      </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
      <div class="container text-center"></div>
    </section>
    <!-- footer Section Ends Here -->
  </body>
</html>