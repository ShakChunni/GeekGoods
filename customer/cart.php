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
            <h2>Your Cart</h2>
            <div class="cart-table">
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
