-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 01:08 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` float NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_price`, `item_quantity`, `item_type`) VALUES
('001', 'หูฟังไร้สาย', 1090, 9999, 'หูฟัง'),
('002', 'หูฟัง', 199, 9999, 'หูฟัง'),
('003', 'คีย์บอร์ดไร้สาย', 2190, 9999, 'คีย์บอร์ด'),
('004', 'คีย์บอร์ด', 219, 9999, 'คีย์บอร์ด'),
('005', 'เม้าส์', 399, 9999, 'เม้าส์');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_name` varchar(50) NOT NULL,
  `member_tel` varchar(15) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `member_province` varchar(20) NOT NULL DEFAULT 'กรุงเทพมหานคร',
  `password` varchar(20) NOT NULL,
  `member_id` int(11) NOT NULL,
  `urole` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_name`, `member_tel`, `member_email`, `member_province`, `password`, `member_id`, `urole`) VALUES
('Kulrat', '0944989329', 'kulrat_kik@gmail.com', 'กรุงเทพมหานคร', '1234', 1, 'user'),
('MM', '0944989320', 'MM@gmail.com', 'กรุงเทพมหานคร', '1234', 2, 'user'),
('Pakteema', '0814036864', 'baitong@gmail.com', 'กรุงเทพมหานคร', '1234', 3, 'user'),
('Prinyada', '0623565845', 'prinyadapinn@gmail.com', 'กรุงเทพมหานคร', '1234', 4, 'user'),
('Ruethairat', '0800533569', 'rtrmay@gmail.com', 'กรุงเทพมหานคร', '1234', 5, 'user'),
('Suwanna', '0645983619', 'swanjui@gmail.com', 'กรุงเทพมหานคร', '1234', 6, 'user'),
('ff', '0876754321', 'ff@gmail.com', 'กรุงเทพมหานคร', '1234', 7, 'user'),
('kittichet', '1234', 'kittichetadulroj@gmail.com', 'กรุงเทพมหานคร', '1234', 8, 'user'),
('asda', '1111', 'asd@yahoo.com', 'ตรัง', '1234', 9, 'user'),
('admin', '00000', 'admin@gmail.com', 'กรุงเทพมหานคร', 'admin', 11, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_date` datetime NOT NULL,
  `member_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_date`, `member_id`, `order_id`) VALUES
('2022-10-06 21:29:27', 1, 1),
('2022-10-07 21:29:20', 2, 2),
('2022-10-11 21:29:38', 5, 3),
('2022-10-12 21:29:33', 4, 4),
('2022-10-26 21:29:15', 3, 5),
('2022-10-21 13:21:49', 1, 6),
('2022-10-19 08:41:35', 1, 7),
('2022-10-24 08:46:41', 1, 8),
('2022-10-12 08:48:12', 1, 9),
('2022-10-12 08:54:30', 1, 10),
('2022-11-02 08:54:42', 1, 11),
('2022-11-02 08:55:41', 1, 12),
('2022-11-02 08:58:22', 2, 13),
('2022-11-02 09:44:01', 2, 14),
('2022-11-02 10:12:03', 2, 15),
('2022-11-02 10:13:21', 2, 16),
('2022-11-02 10:15:06', 2, 17),
('2022-11-02 10:16:27', 2, 18),
('2022-11-02 10:17:18', 2, 19),
('2022-11-02 10:17:28', 2, 20),
('2022-11-02 10:20:55', 2, 21),
('2022-11-02 10:23:27', 2, 22),
('2022-11-17 05:52:46', 2, 23),
('2022-11-17 06:29:44', 9, 24),
('2022-11-18 15:45:48', 1, 25),
('2022-11-22 11:04:10', 7, 26),
('2022-11-22 11:56:09', 8, 27),
('2022-11-22 12:09:19', 8, 28),
('2022-11-22 12:31:16', 8, 29),
('2022-11-22 12:31:21', 8, 30),
('2022-11-22 12:31:28', 8, 31),
('2022-11-22 12:33:51', 8, 32),
('2022-11-22 12:35:22', 8, 33),
('2022-11-22 12:37:05', 8, 34),
('2022-11-22 12:37:24', 8, 35),
('2022-11-22 12:38:31', 8, 36),
('2022-11-22 12:41:04', 8, 37),
('2022-11-22 12:46:16', 8, 38),
('2022-11-22 12:48:25', 8, 39),
('2022-11-22 12:57:20', 8, 40),
('2022-11-22 12:57:34', 8, 41),
('2022-11-22 12:59:42', 8, 42),
('2022-11-22 13:02:31', 7, 43),
('2022-11-22 13:07:02', 7, 44);

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `item_id` varchar(50) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`item_id`, `order_id`, `item_quantity`) VALUES
('001', 8, 1),
('001', 10, 3),
('001', 14, 3),
('001', 15, 1),
('001', 19, 2),
('001', 22, 2),
('001', 25, 1),
('001', 27, 4),
('001', 28, 1),
('001', 29, 1),
('001', 32, 1),
('001', 38, 1),
('001', 44, 1),
('002', 9, 4),
('002', 12, 1),
('002', 13, 1),
('002', 17, 1),
('002', 18, 1),
('002', 22, 10),
('002', 23, 1),
('002', 24, 1),
('002', 28, 1),
('002', 30, 1),
('002', 34, 1),
('002', 39, 1),
('002', 40, 1),
('002', 41, 1),
('002', 42, 1),
('003', 6, 1),
('003', 7, 1),
('003', 11, 1),
('003', 14, 1),
('003', 16, 1),
('003', 20, 2),
('003', 21, 2),
('003', 25, 1),
('003', 26, 10),
('003', 28, 1),
('003', 31, 4),
('003', 32, 1),
('003', 33, 2),
('003', 35, 1),
('003', 36, 1),
('003', 37, 1),
('003', 41, 1),
('003', 43, 1),
('004', 26, 17),
('004', 28, 1),
('004', 32, 1),
('004', 43, 1),
('005', 28, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`) USING BTREE;

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`) USING BTREE;

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`) USING BTREE,
  ADD KEY `member_id` (`member_id`) USING BTREE;

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`item_id`,`order_id`) USING BTREE,
  ADD KEY `order_id` (`order_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
  ADD CONSTRAINT `orderitem_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
