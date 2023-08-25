<?php include('reusables/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>

        <br><br>

        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>

        <?php
        // Fetch delivered orders for revenue calculation
        $sql = "SELECT * FROM tbl_order WHERE status='Delivered'";
        $res = mysqli_query($conn, $sql);
        $totalRevenue = 0;

        if ($res) {
            while ($row = mysqli_fetch_assoc($res)) {
                $orderTotal = $row['total'];
                $totalRevenue += $orderTotal;
                $orderProduct = $row['product'];
                echo "<div class='col-4 text-center'>";
                echo "<h1>$orderTotal</h1>";
                echo "<br>";
                echo "Order: $orderProduct";
                echo "</div>";
            }
        }
        ?>

        <div class="clearfix"></div>
        
        <div class="col-12 text-center">
            <h1>Total Revenue</h1>
            <br>
            <h2><?php echo $totalRevenue; ?></h2>
        </div>
        
    </div>
</div>


