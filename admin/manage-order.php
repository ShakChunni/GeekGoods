<?php include('reusables/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Orders</h1>
        <br /><br />

        <?php
        if (isset($_SESSION['order-delete'])) {
            echo $_SESSION['order-delete']; 
            unset($_SESSION['order-delete']); 
        }

        if (isset($_SESSION['order-update'])) {
            echo $_SESSION['order-update'];
            unset($_SESSION['order-update']);
        }

        ?>

        <br /><br /><br />
        
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Customer Name</th>
                <th>Customer Contact</th>
                <th>Customer Email</th>
                <th>Customer Address</th>
                <th>Actions</th>
            </tr>

            <?php
            $sql = "SELECT * FROM tbl_order";
            $res = mysqli_query($conn, $sql);
            $serial = 1;

            if ($res == TRUE) {
                $count = mysqli_num_rows($res); // Function to get all the rows in the database
                if ($count > 0) {
                    while ($rows = mysqli_fetch_assoc($res)) {
                        // Get individual data
                        $id = $rows['id'];
                        $product = $rows['product'];
                        $price = $rows['price'];
                        $quantity = $rows['qty'];
                        $total = $rows['total'];
                        $order_date = $rows['order_date'];
                        $status = $rows['status'];
                        $customer_name = $rows['customer_name'];
                        $customer_contact = $rows['customer_contact'];
                        $customer_email = $rows['customer_email'];
                        $customer_address = $rows['customer_address'];

                        // Display the values in table
            ?>
                        <tr>
                            <td><?php echo $serial++; ?></td>
                            <td><?php echo $product; ?></td>
                            <td><?php echo $price; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td><?php echo $total; ?></td>
                            <td><?php echo $order_date; ?></td>
                            <td><?php echo $status; ?></td>
                            <td><?php echo $customer_name; ?></td>
                            <td><?php echo $customer_contact; ?></td>
                            <td><?php echo $customer_email; ?></td>
                            <td><?php echo $customer_address; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update Order</a>
                            </td>
                        </tr>
            <?php
                    }
                } else {
                    echo "<tr><td colspan='12' class='text-center'>No orders found.</td></tr>";
                }
            }
            ?>
        </table>

        <div class="clearfix"></div>
    </div>
</div>
