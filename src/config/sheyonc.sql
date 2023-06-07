-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2023 at 02:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sheyonce`
--

-- --------------------------------------------------------

--
-- Table structure for table `products_list`
--

CREATE TABLE `products_list` (
  `product_code` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_price` varchar(19) NOT NULL DEFAULT '0',
  `promo` int(11) DEFAULT 0,
  `product_pprice` varchar(19) NOT NULL DEFAULT '0',
  `product_category` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `product_seo` text NOT NULL,
  `available` int(11) NOT NULL,
  `best_or_new` int(11) NOT NULL DEFAULT 0 COMMENT '0 os defaut,1 is new ariival, 2 is best seller',
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_list`
--

INSERT INTO `products_list` (`product_code`, `product_name`, `product_price`, `promo`, `product_pprice`, `product_category`, `product_desc`, `product_seo`, `available`, `best_or_new`, `product_image`) VALUES
(2, 'Camo full outfit', '25000', 0, '0', 20, '', '', 1, 0, '16764413611.jpg,16764413612.webp,16764413613.jpg,'),
(3, 'pink Bianka Kanywi', '15000', 0, '0', 25, '', '', 1, 1, '1676457697IMG-20230215-WA0007.jpg,1676457697IMG-20230215-WA0009.jpg,1676457697IMG-20230215-WA0010.jpg,'),
(4, 'Leroy Hart jeans', '1000', 0, '0', 25, '', '', 1, 1, '1676457734IMG-20230215-WA0003.jpg,1676457734IMG-20230215-WA0004.jpg,1676457734IMG-20230215-WA0005.jpg,'),
(5, 'Mira Goff', '20000', 0, '0', 25, '', '', 1, 0, '1676457767IMG-20230215-WA0004.jpg,1676457767IMG-20230215-WA0005.jpg,1676457767IMG-20230215-WA0007.jpg,'),
(6, 'Mara Fischer', '1500', 0, '', 25, '', '', 1, 1, '1676457806IMG-20230215-WA0005.jpg,1676457806IMG-20230215-WA0007.jpg,1676457806IMG-20230215-WA0009.jpg,'),
(7, 'Eugenia Berg', '2000', 0, '', 25, '', '', 1, 1, '1676457847IMG-20230215-WA0009.jpg,1676457847IMG-20230215-WA0010.jpg,1676457847IMG-20230215-WA0011.jpg,'),
(8, 'Shad Carney', '5000', 0, '', 25, '', '', 1, 2, '1676457867IMG-20230215-WA0010.jpg,1676457867IMG-20230215-WA0011.jpg,1676457867IMG-20230215-WA0012.jpg,'),
(10, 'Pascale Riggs', '7190', 0, '0', 25, '', '', 1, 0, '1676457918IMG-20230215-WA0011.jpg,1676457918IMG-20230215-WA0012.jpg,1676457918IMG-20230215-WA0013.jpg,'),
(11, 'customised nose mask', '2000', 0, '0', 24, '', '', 1, 0, '167645801962726611-9d47-4299-b0d3-6ab987400455__95221_-_Copy.jpg,167645801962726611-9d47-4299-b0d3-6ab987400455__95221.jpg,1676458019full_branded_mask_02__73793.jpg,'),
(12, 'Carla Morton', '8520', 0, '0', 24, '', '', 1, 0, '1676458078cross_bag_mask_set__50633.1656360458,1676458078cross_bag_mask_set__50633.16563604582,1676458078fly-girls-rock-full-printed-face-mask-pack-of-2__07225.1651071858,'),
(13, 'Melyssa Joseph', '10000', 0, '0', 25, '', '', 1, 0, '1676458113dresses-1-.jpg,1676458113hoodies-1-.jpg,1676458113image_580110837-1674557076.jpg,'),
(14, 'Willow Medina', '1110', 0, '0', 24, '', '', 1, 0, '1676458137fly-girls-rock-full-printed-face-mask-pack-of-2__07225.1651071858,1676458137fly-girls-rock-full-printed-face-mask-pack-of-2__07225.16510718582,1676458137love-myself-all-day-full-printed-face-mask-pack-of-2-4-for-dollar15-code-mask__49657.1641720'),
(16, 'Logan Byrd', '7260', 0, '', 20, '', '', 1, 1, '1676458190image_362202960-1674557076.jpg,1676458190image_580110837-1674557076.jpg,1676458190image_638852375-1674557076.jpg,'),
(17, 'Cheyenne Mckay', '9830', 0, '0', 20, '', '', 1, 2, '1676458239image_1255573467-1674557076.jpg,1676458239image_1644393218-1674557076.jpg,1676458239image_1754867923-1674557076.jpg,'),
(21, 'Kennedy Peck', '2950', 0, '0', 25, '', '', 1, 0, '1676458330image_784899363-1674557076.jpg,1676458330image_930668458-1674557076.jpg,1676458330image_1255573467-1674557076.jpg,'),
(23, 'Britanni Lindsey', '7430', 0, '0', 21, '', '', 1, 2, '1676459857272474561_1261768000970410_5169840886639569483_n__15487.1656896031,1676459857272474561_1261768000970410_5169840886639569483_n__15487.16568960312,1676459857greenstone_crew_set__07169.1675453366,'),
(24, 'Erich Floyd', '3800', 0, '0', 20, '', '', 1, 2, '1676459878greenstone_crew_set__07169.1675453366,1676459878greenstone_crew_set__07169.16754533662,1676459878homepg-sections-pic-women.png,'),
(25, 'Uriah Armstrong', '7190', 0, '0', 20, '', '', 1, 1, '1676459909love_myself_first_glow_up_legging_shirt_set__01054.1674931286,1676459909love_myself_first_glow_up_legging_shirt_set__01054.16749312862,1676459909love-myself-clothes-first-love-yourself-fly-camo-joggers-red-print__73981.1628968513,'),
(26, 'Kenneth Warner', '5200', 0, '0', 21, '', '', 1, 2, '1676459929love-myself-clothes-certified-fly-girl-all-day-tee-8-colors__36518.1621213294,1676459929love-myself-clothes-everything-that-glitters-is-not-gold-tee-gold__84376.1621212194,1676459929love-myself-clothes-everything-that-glitters-is-not-gold-tee-go'),
(27, 'Hector Wells', '4900', 0, '', 28, '', '', 1, 0, '1676460015vday_glow_up_outfit__05870.16746124562,'),
(28, 'Cheryl Hodge', '3100', 0, '', 27, '', '', 0, 1, '1676460045pink_green_camo_IG_New__78030.16674340812,1676460045red_black_leggings_01__15910.1675291115,1676460045red_black_leggings_01__15910.16752911152,'),
(29, 'Veronica Cantrell', '257', 0, '', 24, '<p>rrgrrrrrrrrrrrrrrrrrrrdddgg</p>', 'shoe,rain coat,amala,female', 1, 1, '1676595184screenshot-massimartha.blog-2023,1676595184screenshot-massimartha.blog-2023,1676595184logo.webp,');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aboutus`
--

CREATE TABLE `tbl_aboutus` (
  `id` int(11) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'sheyonce', '80c170735ec702e7727db1aa6a58ebc6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(56) NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `cat_name`, `cat_image`) VALUES
(20, 'Hoodies', 'cat-9947.jpg'),
(21, 'T-shirts', 'cat-2906.jpg'),
(22, 'Shoes', 'cat-2672.jpg'),
(23, 'Bags', 'editedcat-9783.avif'),
(24, 'Female Accesories', 'cat-1264.jpg'),
(25, 'Clothes', 'cat-5996.jpg'),
(26, 'Jackets', 'cat-4436.jpg'),
(27, 'Jumpsuits', 'cat-9888.jpg'),
(28, 'Crop-tops & tops', 'cat-7942.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id` int(11) NOT NULL,
  `gimage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimony`
--

CREATE TABLE `tbl_testimony` (
  `id` int(11) NOT NULL,
  `prof_image` varchar(300) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `testimony` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_testimony`
--

INSERT INTO `tbl_testimony` (`id`, `prof_image`, `fname`, `testimony`) VALUES
(5, 'testimony-2244.jpg', '', ''),
(6, 'testimony-3217.jpg', '', ''),
(7, 'testimony-9101.jpg', '', ''),
(8, 'testimony-2977.jpg', '', ''),
(9, 'testimony-2716.jpg', '', ''),
(10, 'testimony-710.jpg', '', ''),
(11, 'testimony-6277.jpg', '', ''),
(13, 'testimony-4457.jpg', '', ''),
(14, 'testimony-8772.jpg', '', ''),
(15, 'testimony-3894.jpg', '', ''),
(16, 'testimony-9638.png', '', ''),
(17, 'testimony-5613.jpg', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products_list`
--
ALTER TABLE `products_list`
  ADD PRIMARY KEY (`product_code`);

--
-- Indexes for table `tbl_aboutus`
--
ALTER TABLE `tbl_aboutus`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_testimony`
--
ALTER TABLE `tbl_testimony`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products_list`
--
ALTER TABLE `products_list`
  MODIFY `product_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_aboutus`
--
ALTER TABLE `tbl_aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_testimony`
--
ALTER TABLE `tbl_testimony`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
