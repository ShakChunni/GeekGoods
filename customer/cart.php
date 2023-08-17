<?php


// Include the database connection
include('../dbConnection/connection.php');

// Redirect to the login page if not logged in
if (isset($_SESSION['customer_username'])) {
    $customer_username = $_SESSION['customer_username'];
    // Use $customer_id as needed in your index.php
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
        /* Additional Cart Page Styles */

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
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <!-- ... Navbar section code ... -->
    </section>
    <!-- Navbar Section Ends Here -->

    <!-- Cart Section -->
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

    <!-- Footer Section -->
    <section class="footer">
        <!-- ... Footer section code ... -->
    </section>
</body>

</html>
