<?php


session_start();

define("SITEURL", "http://localhost/geekgoods/");
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DATABASE", "geeksgoods");

$conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
$db_select = mysqli_select_db($conn, 'geeksgoods');
