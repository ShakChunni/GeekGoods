<?php
// database connection
include('../dbConnection/connection.php');

// Redirect to the login page if not logged in
if (isset($_SESSION['customer_username'])) {
    $customer_username = $_SESSION['customer_username'];
    // storing customer username
} else {
    // Redirect to the login page if not logged in
    header('location:' . SITEURL . 'customer/login.php');
}

// Retrieve orders for the logged-in customer
$sql = "SELECT * FROM tbl_order WHERE customer_username='$customer_username'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>

        .cart {
            background-color: #f9f9f9;
            padding: 50px 0;
            text-align: center;
        }

        .cart h2 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .cart-table {
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 20px;
        }

        .cart-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .cart-table th,
        .cart-table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #f2f2f2;
        }

        .cart-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .cart-table td {
            font-weight: bold;
        }
    </style>
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

    <!-- Cart Table -->
    <section class="cart">
        <div class="container">
            <div class="cart-table">
                <h2>Orders</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            $product_title = $row['product'];
                            $product_price = $row['price'];
                            $quantity = $row['qty'];
                            $total = $row['total'];
                            $status = $row['status'];
                        ?>
                            <tr>
                                <td><?php echo $product_title; ?></td>
                                <td>$<?php echo $product_price; ?></td>
                                <td><?php echo $quantity; ?></td>
                                <td>$<?php echo $total; ?></td>
                                <td><?php echo $status; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>
</html>