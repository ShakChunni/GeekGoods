<?php
// Include the database connection
include('../dbConnection/connection.php');

if (isset($_SESSION['customer_username'])) {
    $customer_username = $_SESSION['customer_username'];
    // Username storing in $customer_username
  } else {
    // Redirect to the login page if not logged in
    header('location:' . SITEURL . 'customer/login.php');
  }
  echo $customer_username; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $quantity = $_POST['quantity'];
    $full_name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $customer_username = $_POST['customer_username']; // Retrieve the customer's username

    

    // Calculate total price
    $total = $product_price * $quantity;

    // Insert data into tbl_order
    $insert_query = "INSERT INTO tbl_order (product, price, qty, total, order_date, status, customer_name, customer_contact, customer_email, customer_address, customer_username)
                     VALUES ('$product_title', '$product_price', '$quantity', '$total', NOW(), 'Pending', '$full_name', '$contact', '$email', '$address', '$customer_username')";

    $result = mysqli_query($conn, $insert_query);

    if ($result) {
        // Order successfully placed
        header("Location: order-success.php");
        exit();
    } else {
        // Order placement failed
        $error_message = "Failed to place order. Please try again.";
    }
}

// Close the database connection
mysqli_close($conn);
