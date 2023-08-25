-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 03:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geeksgoods`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(18, 'Raida', 'raida', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(19, 'Test', 'testAdmin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(7, 'Beauty', 'beauty.jpg', 'Yes', 'Yes'),
(8, 'Health', 'Category_900.avif', 'Yes', 'Yes'),
(11, 'Sports', 'Category_873.avif', 'No', 'Yes'),
(13, 'Fashion', 'Category_395.jpg', 'Yes', 'Yes'),
(14, 'Snacks', 'Category_475.jpg', 'No', 'Yes'),
(15, 'Camping & Hiking', 'Category_371.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `full_name`, `username`, `password`) VALUES
(14, 'Safwat Sufia', 'safwat', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(15, 'test user', 'test1', '8cb2237d0679ca88db6464eac60da96345513964');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `product` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_username` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `product`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `customer_username`) VALUES
(14, 'Cleanser', 13.40, 33, 442.20, '2023-08-25 16:52:21', 'Delivered', 'Safwat Sufia', '+8801736436786', 'safwat.sufia@g.bracu.ac.bd', 'Ramna, Dhaka South', 'safwat'),
(15, 'Magi Noodles', 80.00, 2, 160.00, '2023-08-25 19:15:38', 'Pending', 'Raida', '01736436869', 'safwat.sufia@g.bracu.ac.bd', 'Dhaka', 'test1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(5, 'Napa Extra', 'Experience relief with Napa Extra, your solution for effective pain management.', 25.00, 'Seclo-20-mg-Square.jpg', 8, 'No', 'Yes'),
(13, 'Cricket Ball', 'Elevate your cricket game with our high-performance cricket balls.', 6.00, 'categorywhat-is-the-weight-of-a-cricket-ball.jpeg', 11, 'No', 'Yes'),
(14, 'Cricket Bat', 'Elevate your cricket game with our high-performance cricket bats.', 9.00, 'cricket-bat_78370-428.avif', 11, 'No', 'Yes'),
(15, 'Football', 'Used when playing football.', 12.00, '82819632_xxl.avif', 11, 'No', 'Yes'),
(16, 'Tents', 'Used when camping outdoors.', 27.00, 'istockphoto-142533334-612x612.jpg', 15, 'No', 'Yes'),
(17, 'Skincare', 'Reveal radiant skin with our transformative skincare solutions.', 11.00, 'Nourishing-Range-mobile-banner.webp', 7, 'No', 'Yes'),
(18, 'Cleanser', 'Revitalize your skin with our effective cleansers for a fresh, balanced glow.', 13.40, 'Product_91.webp', 7, 'Yes', 'Yes'),
(19, 'Shampoo', 'Elevate your hair care routine with our rejuvenating shampoos.', 23.00, 'download.jpg', 7, 'No', 'Yes'),
(20, 'Saline', 'Choose pure comfort with our soothing saline solution.', 2.00, 'smc-fruity-salaine-1-box-20-pcs.jpg', 8, 'No', 'Yes'),
(21, 'Pyrol', 'Your remedy for discomfort.', 12.00, 'a07b0bd0-c60d-11ec-80e5-31a904866282.png', 8, 'No', 'Yes'),
(22, 'Nike Shoes', 'Iconic Nike sneakers for ultimate style and performance.', 77.25, 'download (1).jpg', 13, 'No', 'Yes'),
(23, 'Magi Noodles', 'Delicious and convenient Maggi noodles for a quick and tasty meal.', 80.00, '71Y7pDHbi8L._SL1500_.jpg', 14, 'Yes', 'Yes'),
(24, 'Mama Noodles', 'Mama noodles: Authentic Thai flavors in every bite.', 72.00, 'mama-instant-noodles-hot-spicy-flavor-248-gm.jpg', 14, 'No', 'Yes'),
(25, 'Sun Chips', 'A crispy and flavorful snacking experience with every bite', 7.00, '81Gd9HPSd6L._SL1500_.jpg', 14, 'Yes', 'Yes'),
(26, 'Potato chips', ' Savory and satisfying, the classic snack for every craving.', 5.50, 'Bombay-Sweets-Potato-Crackers-Chips.webp', 14, 'No', 'Yes'),
(27, 'Snickers', ' A delicious blend of nougat, caramel, and peanuts, wrapped in smooth chocolate.', 13.60, 'r5awurlbfcct9he2uhv5.png', 14, 'Yes', 'Yes'),
(28, 'Dairy Milk', 'Creamy and delightful milk chocolate that melts in your mouth.', 12.25, 'Cadbury-Dairy-Milk-Silk-Bubbly.webp', 14, 'Yes', 'Yes'),
(29, 'Fishing Rod', 'Your reliable companion for reeling in the big catch.', 45.99, 'istockphoto-1335786676-612x612.jpg', 15, 'Yes', 'Yes'),
(30, 'Red Dress', 'Elevate your style with a bold touch of elegance.', 166.90, 'images.jpg', 13, 'No', 'Yes'),
(31, 'HairSpray', 'Lock in your hairstyle with long-lasting hold and shine.', 66.99, '36690121.avif', 7, 'Yes', 'Yes'),
(32, 'Perfume', 'Elevate your essence with captivating fragrances.', 0.00, '1-_281_29.webp', 7, 'Yes', 'Yes'),
(33, 'Metro', 'Your solution for controlling loose stools.', 7.99, 'metro-tablet-400-mg-Ziska-Pharmaceuticals-Ltd.webp', 8, 'No', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
