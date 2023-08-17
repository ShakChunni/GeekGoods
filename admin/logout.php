<?php 
    include('../dbConnection/connection.php');
    session_destroy();
    header("location:".SITEURL);
?>
