-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 09:07 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `size` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `c_id`, `size`, `username`, `amount`, `price`, `total`) VALUES
(176, 3, 'M', 'user10', 1, 320, 320);

-- --------------------------------------------------------

--
-- Table structure for table `cloth`
--

CREATE TABLE `cloth` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pic` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `ct_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cloth`
--

INSERT INTO `cloth` (`c_id`, `c_name`, `color`, `gender`, `size`, `pic`, `price`, `ct_id`, `stock`) VALUES
(1, 'Two Tone Shirt', 'Black/White', 'M', 'M', 'c1.jpg', 390, 1, 5),
(2, 'Solid Swim Shorts', 'Green', 'M', 'M', 'c2.jpg', 290, 1, 19),
(3, 'Striped Shirt', 'Blue/White', 'M', 'M', 'c5.JPG', 320, 1, 3),
(17, 'Letter Ankle Boots', 'Khaki', 'U', '38', 'sh1.JPG', 660, 3, 3),
(21, 'Patched Bomber Jacket ', 'Navy', 'M', 'S', 'abc.jpg', 430, 1, 5),
(23, 'Letter Graphic Drop ', 'Grey', 'F', 'S', 'c7.JPG', 180, 1, 8),
(26, 'Star Tassel Chain Br', 'Silver', 'F', 'F', 'j1.JPG', 30, 2, 4),
(27, '2pcs Heart Decor Bra', 'Gold', 'F', 'F', 'j2.JPG', 99, 2, 2),
(28, 'Wrap Cami Dress', 'Dusty Pink', 'F', 'M', 'c12.JPG', 460, 1, 3),
(29, 'Neck Crop Blazer', 'Green', 'F', 'L', 'c8.JPG', 420, 1, 3),
(30, 'Print Drop Shoulder', 'red', 'M', 'M', 'c9.JPG', 260, 1, -1),
(31, 'Split Front Halter', 'Baby Blue', 'F', 'S', 'c10.JPG', 310, 1, 2),
(32, 'Batwing Sleeve', 'Multicolor', 'F', 'XL', 'c11.JPG', 100, 1, 6),
(33, 'Reflective Splash', 'Multicolor', 'U', 'M', 'c13.JPG', 280, 1, 4),
(34, 'Ruched Bodycon Dress', 'Dusty Pink', 'F', 'S', 'c23.JPG', 320, 1, 4),
(35, 'Split Thigh Dress', 'Black', 'F', 'S', 'c22.JPG', 320, 1, 8),
(36, 'Split Thigh Dress', 'Burgundy', 'F', 'M', 'c21.JPG', 290, 1, 4),
(37, 'Ruched Velvet Dress', 'Black', 'F', 'S', 'c20.JPG', 220, 1, 5),
(38, 'Lantern Sleeve Dress', 'Olive Green', 'F', 'S', 'c19.JPG', 220, 1, 2),
(39, 'Sleeve Velvet Dress', 'Black', 'F', 'S', 'c18.JPG', 330, 1, 2),
(40, 'Hem Ruched Dress', 'Multicolor', 'F', 'S', 'c15.JPG', 330, 1, 4),
(41, 'Ruffle Hem Dress', 'Black', 'F', 'M', 'c14.JPG', 470, 1, 5),
(42, 'Ruffle Hem Dress', 'White', 'F', 'M', 'c17.JPG', 470, 1, 3),
(43, 'Panel Bodycon Dress', 'White', 'F', 'S', 'c16.JPG', 380, 1, 2),
(44, 'Binding Cami Dress', 'Black and White', 'F', 'M', 'c24.JPG', 460, 1, 5),
(45, 'Ruffle Hem Dress', 'Beige', 'F', 'S', 'c25.JPG', 660, 1, 1),
(46, 'Ruffle Trim Dress', 'Mocha Brown', 'F', 'XS', 'c26.JPG', 490, 1, 3),
(47, 'Sleeveless Shirt', 'White', 'F', 'S', 'c27.JPG', 170, 1, 5),
(48, 'Square Neck Blouse', 'Multicolor', 'F', 'S', 'c28.JPG', 220, 1, 4),
(49, 'Cord Crop Blouse', 'Beige', 'F', 'XS', 'c29.JPG', 360, 1, 2),
(50, 'Cord Crop Blouse', 'Maroon', 'F', 'S', 'c90.JPG', 370, 1, 3),
(51, 'Button Front Cami', 'Beige', 'F', 'S', 'c30.JPG', 190, 1, 2),
(53, 'Solid Bucket Hat', 'Green', 'U', 'F', 'a1.JPG', 70, 2, 9),
(54, 'Bedroom Slippers', 'Khaki', 'F', '36', 'sh2.JPG', 150, 3, 4),
(55, 'Bedroom Slippers', 'Dusty Pink', 'F', '37', 'sh3.JPG', 160, 3, 3),
(56, 'Chunky Sneakers', 'Multicolor', 'F', '37', 'sh4.JPG', 600, 3, 2),
(57, 'Strap Flip Flops', 'Beige', 'F', '38', 'sh6.JPG', 130, 3, 4),
(58, 'Acrylic Hair Claw', 'Multicolor', 'F', 'F', 'a3.JPG', 40, 2, 14),
(59, 'Combat Boots', 'Brown', 'F', '38', 'sh8.JPG', 640, 3, 4),
(60, 'Combat Boots', 'Beige', 'F', '38', 'sh9.JPG', 630, 3, 6),
(61, 'Buckle Belt', 'White', 'F', 'F', 'a5.JPG', 40, 2, 7),
(62, 'Fedora Hat', 'Hot Pink', 'F', 'F', 'a4.JPG', 160, 2, 5),
(63, 'Baseball Cap', 'Black', 'U', 'F', 'a7.JPG', 120, 2, 2),
(64, 'Men Minimalist Ring', 'Black', 'M', 'F', 'a9.JPG', 30, 2, 6),
(65, 'Silver Stud Earrings', 'Silver', 'F', 'F', 'a10.JPG', 920, 2, 6),
(66, 'Round Stud Earring', 'Gold', 'F', 'F', 'a12.JPG', 530, 2, 3),
(67, 'Butterfly Cuff Ring', 'Rose Gold', 'F', 'F', 'a13.JPG', 40, 2, 10),
(68, 'Sun & Moon Bracelet', 'Black', 'M', 'F', 'a15.JPG', 40, 2, 6),
(69, 'Layered Cuff Bangle', 'Silver', 'F', 'F', 'a17.JPG', 80, 2, 12),
(70, 'Layered Cuff Bangle', 'Yellow Gold', 'F', 'F', 'a14.JPG', 80, 2, 10),
(71, 'Heart Charm Bracelet', 'Brown', 'U', 'F', 'a16.JPG', 50, 2, 20),
(72, 'Snake Decor Bangle', 'Silver', 'M', 'F', 'a19.JPG', 70, 2, 11),
(73, 'Snake Decor Bangle', 'Yellow Gold', 'F', 'F', 'a20.JPG', 50, 2, 15),
(74, 'Faux Pearl Bracelet', 'White', 'F', 'F', 'a21.JPG', 20, 2, 22),
(75, 'Cubic Zirconia Water', 'Silver', 'F', 'F', 'a22.JPG', 130, 2, 10),
(76, 'Silver Stud Earrings', 'Silver', 'F', 'F', 'a23.JPG', 490, 2, 20),
(77, 'Gear Pattern Ring', 'Multicolor', 'M', 'F', 'a24.JPG', 20, 2, 20),
(78, 'Waist Slant Pocket', 'Army Green', 'M', 'M', 'c32.JPG', 740, 1, 5),
(79, 'Letter Graphic', 'Black', 'M', 'F', 'c33.JPG', 390, 1, 5),
(80, 'Ripped Denim Jacket', 'Orange', 'M', 'F', 'c34.JPG', 1060, 1, 6),
(81, 'Denim Jacket', 'Pink', 'M', 'F', 'c35.JPG', 1010, 1, 3),
(82, 'TwoTone Denim Jacket', 'Red and White', 'M', 'F', 'c38.JPG', 1010, 1, 5),
(83, 'Pocket Denim Jacket', 'Orange', 'M', 'F', 'c37.JPG', 990, 1, 4),
(84, 'Pocket Front Shirt ', 'Brown', 'M', 'M', 'c40.JPG', 410, 1, 3),
(85, 'Letter Patched Shirt', 'Mint Green', 'M', 'M', 'c41.JPG', 430, 1, 6),
(86, 'Corduroy Solid Shirt', 'Coffee Brown', 'M', 'L', 'c45.JPG', 540, 1, 10),
(87, 'Tropical Print Shirt', 'Multicolor', 'M', 'F', 'c46.JPG', 370, 1, 8),
(88, 'Pocket Front Shirt', 'Mint Green', 'M', 'S', 'c48.JPG', 370, 1, 6),
(89, 'Letter Graphic Crop', 'Navy Blue', 'F', 'S', 'c49.JPG', 120, 1, 9),
(90, 'Canvas Lace-up', 'Khaki', 'M', '39', 'sh10.JPG', 670, 3, 3),
(91, 'Lace-up Front', 'Brown', 'M', '42', 'sh11.JPG', 670, 3, 5),
(92, 'Lace-up Front Skate', 'White', 'M', '41', 'sh12.JPG', 600, 3, 3),
(93, 'Sport Sandals', 'Black', 'M', '41', 'sh13.JPG', 320, 3, 6),
(94, 'Casual Sandals', 'Beige', 'M', '39', 'sh15.JPG', 340, 3, 3),
(95, 'Minimalist Lace-up', 'Black', 'M', '40', 'sh17.JPG', 500, 3, 3),
(96, 'Light Eyeglasses', 'White', 'U', 'F', 'a25.JPG', 100, 2, 10),
(97, 'Chain Necklace', 'Gold', 'M', 'F', 'a29.JPG', 280, 2, 3),
(98, 'Letter Graphic', 'Black', 'M', '39', 'sh19.JPG', 360, 3, 7),
(99, 'Quartz Watch', 'Black', 'M', 'F', 'a30.JPG', 280, 2, 4),
(100, 'Solid ButtonUp Shirt', 'Navy Blue', 'M', 'M', 'c50.JPG', 410, 1, 3),
(101, 'Rhinestone Bracelet', 'Silver', 'M', 'F', 'a35.JPG', 110, 2, 3),
(102, 'Monk Strap Shoes', 'Brown', 'M', '40', 'sh30.JPG', 830, 3, 2),
(103, ' PU Leather Bracelet', 'Brown', 'M', 'F', 'a31.JPG', 50, 2, 6),
(104, 'Two Tone Expression', 'Black and White', 'M', 'M', 'c52.JPG', 280, 1, 6),
(105, 'Ring Charm Necklace', 'Silver', 'M', 'F', 'a39.JPG', 60, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `cloth_type`
--

CREATE TABLE `cloth_type` (
  `ct_id` int(11) NOT NULL,
  `ct_desc` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cloth_type`
--

INSERT INTO `cloth_type` (`ct_id`, `ct_desc`) VALUES
(1, 'clothing'),
(2, 'accessories'),
(3, 'shoes');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `no` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `c_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_order` date NOT NULL,
  `price` double NOT NULL,
  `amount` int(11) NOT NULL,
  `total` double NOT NULL,
  `card_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `order_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`no`, `o_id`, `c_id`, `username`, `c_name`, `date_order`, `price`, `amount`, `total`, `card_number`, `order_status`) VALUES
(48, 1, 2, 'user01', 'Drawstring Solid Swim Shorts', '2021-01-22', 290, 1, 290, '12345', 'Processing'),
(49, 1, 3, 'user01', 'Striped Shirt', '2021-01-22', 320, 1, 320, '12345', 'Processing'),
(51, 2, 1, 'user01', 'Two Tone High Low Hem Shirt', '2021-01-22', 390, 3, 1170, '12345', 'Paid'),
(52, 2, 2, 'user01', 'Drawstring Solid Swim Shorts', '2021-01-22', 290, 1, 290, '12345', 'Paid'),
(53, 3, 1, 'user01', 'Two Tone High Low Hem Shirt', '2021-01-22', 390, 1, 390, '555', 'Sent'),
(54, 3, 2, 'user01', 'Drawstring Solid Swim Shorts', '2021-01-22', 290, 1, 290, '555', 'Sent'),
(64, 4, 2, 'user01', 'Drawstring Solid Swim Shorts', '2021-01-24', 290, 2, 580, '2222', 'Paid'),
(65, 5, 26, 'user01', 'Star Tassel Chain Br', '2023-01-19', 30, 1, 30, '12345-123', 'Processing'),
(66, 5, 3, 'user01', 'Striped Shirt', '2023-01-19', 320, 1, 320, '12345-123', 'Processing'),
(67, 6, 1, 'user01', 'Two Tone Shirt', '2023-01-19', 390, 1, 390, '5678-12', 'Processing'),
(68, 6, 3, 'user01', 'Striped Shirt', '2023-01-19', 320, 1, 320, '5678-12', 'Processing'),
(69, 7, 3, 'user01', 'Striped Shirt', '2023-01-19', 320, 1, 320, '2222', 'Paid'),
(70, 8, 2, 'user01', 'Solid Swim Shorts', '2023-01-19', 290, 1, 290, '234', 'Sent'),
(72, 9, 27, 'user01', '2pcs Heart Decor Bra', '2023-01-19', 99, 1, 99, '123-099', 'Processing'),
(73, 9, 2, 'user01', 'Solid Swim Shorts', '2023-01-19', 290, 2, 580, '123-099', 'Processing'),
(74, 10, 23, 'user01', 'Letter Graphic Drop ', '2023-01-19', 180, 1, 180, 'wqe1', 'placed'),
(75, 11, 94, 'user01', 'Casual Sandals', '2023-01-21', 340, 1, 340, '123456', 'Placed'),
(76, 11, 27, 'user01', '2pcs Heart Decor Bra', '2023-01-21', 99, 1, 99, '123456', 'Placed'),
(77, 11, 30, 'user01', 'Print Drop Shoulder', '2023-01-21', 260, 4, 1040, '123456', 'Placed');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `email`, `status`) VALUES
(1, 'admin', '1234', 'admin', 'admin@admin.com', 'Admin'),
(2, 'user01', '1234', 'user01', 'user01@mail.com', 'Customer'),
(3, 'user02', '1234', 'june', 'june@mail.com', 'Customer'),
(5, 'user03', '1234', 'jub', 'jub@mail.com', 'Customer'),
(7, 'user04', '1234', 'jub2', 'jub2@mail.com', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `cloth`
--
ALTER TABLE `cloth`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `fk_ct_id` (`ct_id`);

--
-- Indexes for table `cloth_type`
--
ALTER TABLE `cloth_type`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`no`),
  ADD KEY `fk_c_id` (`c_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `cloth`
--
ALTER TABLE `cloth`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `cloth_type`
--
ALTER TABLE `cloth_type`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cloth`
--
ALTER TABLE `cloth`
  ADD CONSTRAINT `fk_ct_id` FOREIGN KEY (`ct_id`) REFERENCES `cloth_type` (`ct_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_c_id` FOREIGN KEY (`c_id`) REFERENCES `cloth` (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
