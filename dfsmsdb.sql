-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 11:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dfsmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(5) NOT NULL,
  `AdminName` varchar(45) DEFAULT NULL,
  `UserName` char(45) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `UpdationDate`) VALUES
(4, 'admin', 'monish', 9113566712, 'monish@gmail.com', '$2y$10$bIxtx2W0s71i4WBM35E5t.cmdYx756durg0Wa5QJcY1V5CoFS4CD6', '2025-04-29 05:50:59', '2025-04-30 14:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `CategoryCode` varchar(50) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `CategoryCode`, `PostingDate`) VALUES
(1, 'Milk', 'MK01', '2025-04-10 16:27:43'),
(2, 'Butter', 'BT01', '2025-04-10 16:27:43'),
(3, 'Bread', 'BD01', '2025-04-10 16:27:43'),
(4, 'Paneer', 'PN01', '2025-04-10 16:27:43'),
(7, 'Ghee', 'GH01', '2025-04-10 16:27:43'),
(9, 'ice-cream', 'ice1', '2025-04-06 11:33:36'),
(10, 'Milk shake', 'ms2', '2025-04-06 11:34:35'),
(11, 'Lassi', 'la3', '2025-04-06 11:36:19'),
(12, 'protein powder ', 'pp4', '2025-04-06 11:36:56'),
(13, 'Protein shakes', 'ps5', '2025-04-06 11:37:17'),
(14, 'Milk sweets', 'MS6', '2025-04-06 11:38:02'),
(15, 'Yogurt ', 'yo1', '2025-04-06 11:38:47'),
(16, 'Cheese', 'C2', '2025-04-06 11:40:32'),
(17, 'Whipped cream', 'WC14', '2025-04-06 11:41:36'),
(18, 'Butter Milk', 'BM55', '2025-04-06 11:43:56'),
(19, 'curd', 'cur420', '2025-04-06 11:46:05'),
(20, 'Milk Cake', 'MC23', '2025-04-06 11:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany`
--

CREATE TABLE `tblcompany` (
  `id` int(11) NOT NULL,
  `CompanyName` varchar(150) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcompany`
--

INSERT INTO `tblcompany` (`id`, `CompanyName`, `PostingDate`) VALUES
(1, 'Amul', '2025-04-10 03:30:51'),
(2, 'Mother Diary', '2025-04-10 03:30:51'),
(3, 'Patanjali', '2025-04-10 03:30:51'),
(4, 'Namaste India', '2025-04-10 03:30:51'),
(10, 'Paras', '2025-04-10 03:30:51'),
(11, 'Ananda', '2025-04-10 03:30:51'),
(13, 'Arun ', '2025-04-06 11:46:57'),
(14, 'Milky mist', '2025-04-06 11:48:15'),
(15, 'Nandini ', '2025-04-06 11:49:00'),
(16, 'Hutson ', '2025-04-06 11:49:32'),
(17, 'Lynk', '2025-04-06 11:51:21'),
(18, 'Origin', '2025-04-06 12:49:20'),
(19, 'Bolt', '2025-04-06 12:49:29'),
(20, 'Muscleblaze', '2025-04-06 12:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE `tblorders` (
  `id` int(11) NOT NULL,
  `ProductId` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `InvoiceNumber` int(11) DEFAULT NULL,
  `CustomerName` varchar(150) DEFAULT NULL,
  `CustomerContactNo` bigint(12) DEFAULT NULL,
  `PaymentMode` varchar(100) DEFAULT NULL,
  `InvoiceGenDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblorders`
--

INSERT INTO `tblorders` (`id`, `ProductId`, `Quantity`, `InvoiceNumber`, `CustomerName`, `CustomerContactNo`, `PaymentMode`, `InvoiceGenDate`) VALUES
(1, 1, 1, 270491112, 'Anuj Kumar', 1425362541, 'cash', '2025-04-13 15:47:14'),
(2, 5, 1, 270491112, 'Anuj Kumar', 1425362541, 'cash', '2025-04-15 15:47:14'),
(3, 7, 1, 464760346, 'Rahul Kumar', 12345632145, 'cash', '2025-04-15 15:49:47'),
(4, 8, 1, 464760346, 'Rahul Kumar', 12345632145, 'cash', '2025-04-20 15:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `CompanyName` varchar(150) DEFAULT NULL,
  `ProductName` varchar(150) DEFAULT NULL,
  `ProductPrice` decimal(10,2) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`id`, `CategoryName`, `CompanyName`, `ProductName`, `ProductPrice`, `PostingDate`, `UpdationDate`) VALUES
(1, 'Milk', 'Amul', 'Toned milk 500ml', 22.00, '2025-03-10 15:46:13', '2025-04-29 18:06:28'),
(2, 'Milk', 'Amul', 'Toned milk 1ltr', 42.00, '2025-03-10 15:46:13', '2025-03-29 18:06:36'),
(3, 'Milk', 'Mother Diary', 'Full Cream Milk 500ml', 26.00, '2025-03-10 15:46:13', '2025-04-29 18:06:36'),
(4, 'Milk', 'Mother Diary', 'Full Cream Milk 1ltr', 50.00, '2025-03-10 15:46:13', '2025-04-29 18:06:36'),
(5, 'Butter', 'Amul', 'Butter 100mg', 46.00, '2025-03-10 15:46:13', '2025-04-29 18:06:36'),
(6, 'Bread', 'Patanjali', 'Sandwich Bread', 30.00, '2025-03-10 15:46:13', '2025-04-29 18:06:36'),
(7, 'Ghee', 'Paras', 'Ghee 500mg', 350.00, '2025-03-10 15:46:13', '2025-04-29 18:06:36'),
(8, 'Panner', 'Ananda', 'Paneer 250gm', 80.00, '2025-03-10 15:46:13', '2025-04-29 18:06:36'),
(9, 'Bread', 'Amul', 'Amul Butter milk Bread 200g', 80.00, '2025-04-06 11:55:26', NULL),
(10, 'Butter', 'Amul', 'Amul Butter 500g', 240.00, '2025-04-06 11:56:05', NULL),
(11, 'Butter', 'Amul', 'Amul Butter 200g', 110.00, '2025-04-06 11:56:44', NULL),
(12, 'Butter Milk', 'Amul', 'Amul Masti butter milk', 15.00, '2025-04-06 11:59:09', NULL),
(13, 'Butter Milk', 'Amul', 'Amul Masti Butter milk-spice', 70.00, '2025-04-06 11:59:58', NULL),
(14, 'curd', 'Amul', 'Amul Masti curd pouch', 32.00, '2025-04-06 12:01:16', NULL),
(15, 'Butter Milk', 'Amul', 'Amul Chaach Butter Milk 500ml', 25.00, '2025-04-06 12:02:19', NULL),
(16, 'ice-cream', 'Arun ', 'Cookies and Cream', 250.00, '2025-04-06 12:04:17', NULL),
(17, 'ice-cream', 'Arun ', 'Sweet Butter Icecream', 300.00, '2025-04-06 12:04:59', NULL),
(18, 'ice-cream', 'Arun ', 'Arun Italian Delight', 400.00, '2025-04-06 12:05:36', NULL),
(19, 'ice-cream', 'Arun ', 'Arun Almond Crisp', 350.00, '2025-04-06 12:06:21', NULL),
(20, 'ice-cream', 'Arun ', 'Gajar Ka Halwa Flavored Ice Cream', 250.00, '2025-04-06 12:07:29', NULL),
(21, 'ice-cream', 'Arun ', 'Kesar Pista Flavored Ice Cream', 400.00, '2025-04-06 12:08:25', NULL),
(22, 'ice-cream', 'Amul', 'Moroccan Dry Fruit', 300.00, '2025-04-06 12:09:29', NULL),
(23, 'ice-cream', 'Amul', 'Fruit Nut Fantasy', 230.00, '2025-04-06 12:10:28', NULL),
(24, 'ice-cream', 'Amul', 'Golden Pearl', 300.00, '2025-04-06 12:11:14', NULL),
(25, 'ice-cream', 'Amul', 'Roasted Almond', 275.00, '2025-04-06 12:11:42', NULL),
(26, 'ice-cream', 'Amul', 'vanilla ice-cream', 300.00, '2025-04-06 12:12:16', NULL),
(27, 'ice-cream', 'Amul', 'Cookies Cream Gold', 484.00, '2025-04-06 12:12:38', NULL),
(28, 'ice-cream', 'Milky mist', 'Creamy Butter scotch', 260.00, '2025-04-06 12:13:59', NULL),
(29, 'ice-cream', 'Milky mist', 'Doom Litchi Frosty Ice Cream', 240.00, '2025-04-06 12:14:50', NULL),
(30, 'ice-cream', 'Milky mist', 'Prime Strawberry Ice Cream ', 250.00, '2025-04-06 12:15:44', NULL),
(31, 'ice-cream', 'Milky mist', 'Tender Coconut Frosty Fusion ', 375.00, '2025-04-06 12:16:43', NULL),
(32, 'ice-cream', 'Milky mist', 'Spanish Orange Frosty Ice Cream', 347.00, '2025-04-06 12:17:28', NULL),
(33, 'ice-cream', 'Milky mist', 'Mango Frosty Fusion Ice Cream', 200.00, '2025-04-06 12:18:12', NULL),
(34, 'ice-cream', 'Milky mist', 'Chocolate Sandwich Ice Cream', 30.00, '2025-04-06 12:19:00', NULL),
(35, 'Cheese', 'Nandini ', 'Cheese Slices(750 g)', 390.00, '2025-04-06 12:20:37', NULL),
(36, 'Cheese', 'Nandini ', 'Cheese Spread Capsicum', 95.00, '2025-04-06 12:21:38', NULL),
(37, 'Cheese', 'Nandini ', 'Cheese Spread Pepper(200 g)', 30.00, '2025-04-06 12:22:24', NULL),
(38, 'Cheese', 'Nandini ', 'Processed Cheese Block(200 g)', 120.00, '2025-04-06 12:23:05', NULL),
(39, 'Cheese', 'Amul', 'Cheese Cubes(200 g)', 160.00, '2025-04-06 12:24:44', NULL),
(40, 'Cheese', 'Amul', 'Cheese Spread Yummy Plain(200 g) ', 220.00, '2025-04-06 12:25:35', NULL),
(41, 'Cheese', 'Amul', 'Amul Cheese Pack(100 g)', 72.00, '2025-04-06 12:26:28', NULL),
(42, 'Lassi', 'Amul', 'Kesari Lassi(200 ml)', 20.00, '2025-04-06 12:27:55', NULL),
(43, 'Lassi', 'Amul', 'Mango Lassi', 30.00, '2025-04-06 12:28:25', NULL),
(44, 'Lassi', 'Amul', 'Rose Lassi', 35.00, '2025-04-06 12:28:49', NULL),
(45, 'Milk', 'Nandini ', 'Nandini (250ml)', 25.00, '2025-04-06 12:31:41', NULL),
(46, 'Milk', 'Nandini ', 'Nandini (500ml)', 50.00, '2025-04-06 12:32:26', NULL),
(47, 'Milk', 'Nandini ', 'Nandini Toned Milk(250ml)', 25.00, '2025-04-06 12:33:07', NULL),
(48, 'Lassi', 'Milky mist', 'Mango Lassi', 30.00, '2025-04-06 12:34:29', NULL),
(49, 'Lassi', 'Milky mist', 'Rose Lassi', 60.00, '2025-04-06 12:35:11', NULL),
(50, 'Lassi', 'Milky mist', 'Blue Berry Lassi', 60.00, '2025-04-06 12:35:32', NULL),
(51, 'Milk shake', 'Amul', 'Banana Milk Shake', 30.00, '2025-04-06 12:36:05', NULL),
(52, 'Milk shake', 'Amul', 'Vanilla Milk Shake', 25.00, '2025-04-06 12:36:32', NULL),
(53, 'Milk shake', 'Amul', 'Kesar Milk Shake', 20.00, '2025-04-06 12:36:56', NULL),
(54, 'Milk Cake', 'Milky mist', 'Chocolate Milk Shake', 42.00, '2025-05-09 13:43:58', '2025-04-09 13:15:29'),
(55, 'Milk shake', 'Milky mist', 'Vanilla Milk Shake', 32.00, '2025-04-06 12:37:38', NULL),
(56, 'Milk shake', 'Milky mist', 'Strawberry Milk Shake', 35.00, '2025-04-06 12:37:59', NULL),
(57, 'Milk shake', 'Milky mist', 'Mango Milk Shake', 140.00, '2025-04-06 12:38:34', NULL),
(58, 'Paneer', 'Amul', 'Paneer Fresh Power of Protein', 95.00, '2025-04-06 12:39:04', NULL),
(59, 'Paneer', 'Milky mist', 'Fresh Paneer', 200.00, '2025-04-06 12:39:42', NULL),
(60, 'Paneer', 'Hutson ', 'Hatsun Paneer', 225.00, '2025-04-06 12:40:37', NULL),
(61, 'Milk Cake', 'Amul', 'Amul Milk Cake', 115.00, '2025-04-06 12:41:11', NULL),
(62, 'Milk Cake', 'Patanjali', 'Patanjali Milk Cake', 170.00, '2025-04-06 12:41:59', NULL),
(63, 'Milk Cake', 'Milky mist', 'Milky Mist Milk Cake', 250.00, '2025-04-06 12:42:19', NULL),
(64, 'Milk Cake', 'Mother Diary', 'Mother Dairy Milk Cake', 220.00, '2025-04-06 12:43:02', NULL),
(65, 'Milk sweets', 'Amul', 'Malai Peda', 500.00, '2025-04-06 12:44:07', NULL),
(66, 'Milk sweets', 'Amul', 'Rasagolla', 185.00, '2025-04-06 12:44:32', NULL),
(67, 'Milk sweets', 'Nandini ', 'Kunda', 399.00, '2025-04-06 12:45:57', NULL),
(68, 'Milk sweets', 'Nandini ', 'Halkova', 158.00, '2025-04-06 12:46:53', NULL),
(69, 'Milk sweets', 'Nandini ', 'Halkova', 158.00, '2025-04-06 12:46:53', NULL),
(70, 'Milk sweets', 'Nandini ', 'Badam Burfi', 150.00, '2025-04-06 12:47:17', NULL),
(71, 'protein powder ', 'Amul', 'Amul Pro Chocolate', 540.00, '2025-04-06 12:47:50', NULL),
(72, 'protein powder ', 'Amul', 'Whey Protein', 2000.00, '2025-04-06 12:48:32', NULL),
(73, 'protein powder ', 'Amul', 'Whey Protein', 2000.00, '2025-04-06 12:48:32', NULL),
(74, 'protein powder ', 'Origin', 'Vegan Protein Powder', 875.00, '2025-04-06 12:50:46', NULL),
(75, 'protein powder ', 'Bolt', 'Whey Protein', 2049.00, '2025-04-06 12:51:11', NULL),
(76, 'protein powder ', 'Bolt', 'Bolt Mass Gainer', 799.00, '2025-04-06 12:51:32', NULL),
(77, 'protein powder ', 'Muscleblaze', 'Biozyme Performance', 4949.00, '2025-04-06 12:52:50', NULL),
(78, 'protein powder ', 'Muscleblaze', 'Beginners jar', 1500.00, '2025-04-06 12:54:50', NULL),
(79, 'Protein shakes', 'Origin', 'Plant Protein Shake', 425.00, '2025-04-06 12:55:56', NULL),
(80, 'Protein shakes', 'Origin', 'Vegan Protein Shake', 570.00, '2025-04-06 12:56:22', NULL),
(81, 'Protein shakes', 'Origin', 'Vegan Unflavoured Protein Shake', 670.00, '2025-04-06 12:56:49', NULL),
(82, 'Protein shakes', 'Amul', 'Amul Blueberry Protein Shake', 1500.00, '2025-04-06 12:58:04', NULL),
(83, 'Whipped cream', 'Amul', 'Whipped cream', 85.00, '2025-04-06 13:02:55', NULL),
(84, 'Whipped cream', 'Nandini ', 'Nandini Cream', 150.00, '2025-04-06 13:03:42', NULL),
(85, 'Whipped cream', 'Milky mist', 'Milky Mist Cream ', 80.00, '2025-04-06 13:04:25', NULL),
(86, 'Whipped cream', 'Milky mist', 'Milky Mist UHT  Cream 1L', 250.00, '2025-04-06 13:05:40', NULL),
(87, 'Yogurt ', 'Milky mist', 'Greek  Yogurt 100g', 35.00, '2025-04-06 13:06:47', NULL),
(88, 'Yogurt ', 'Amul', 'Frozen Yogurt', 799.00, '2025-04-06 13:09:55', NULL),
(89, 'Yogurt ', 'Amul', 'Amul Yogurt Strawberry 125ml', 25.00, '2025-04-06 13:10:42', NULL),
(90, 'Yogurt ', 'Hutson ', 'Mango Yogurt Shake 175ml', 7000.00, '2025-04-06 13:11:54', NULL),
(91, 'Yogurt ', 'Hutson ', 'Blueberry Yogurt shake', 8000.00, '2025-06-06 13:12:17', NULL),
(92, 'Yogurt ', 'Hutson ', 'Strawberry Yogurt Shake', 3757.00, '2025-06-06 13:14:02', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CategoryName` (`CategoryName`);

--
-- Indexes for table `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CompanyName` (`CompanyName`);

--
-- Indexes for table `tblorders`
--
ALTER TABLE `tblorders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`ProductId`);

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compname` (`CompanyName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblcompany`
--
ALTER TABLE `tblcompany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblorders`
--
ALTER TABLE `tblorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblorders`
--
ALTER TABLE `tblorders`
  ADD CONSTRAINT `pid` FOREIGN KEY (`ProductId`) REFERENCES `tblproducts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
