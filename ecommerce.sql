-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2024 at 04:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `cart_qty`) VALUES
(6, 7, 6, 5),
(7, 3, 1, 1),
(8, 18, 1, 1),
(9, 7, 5, 1),
(10, 18, 1, 1),
(12, 7, 1, 1),
(14, 5, 6, 1),
(17, 7, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(50) NOT NULL,
  `product_qty` int(100) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_shop` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_qty`, `product_image`, `product_shop`) VALUES
(1, 'MASKER SENSI DUCKBILL SACHET ISI 6 PCS', 14900, 1, 'mask.png', 'Kimia Farma'),
(3, 'VortexSeries ONI R1 LightWeight Ergonomic', 349000, 1, 'mouse.png', 'Komputer Salemba'),
(4, 'AQUA Elektronik Kulkas 2 Pintu 169 L AQR-D251', 2600000, 1, 'fridge.png', 'Elektronik Johar'),
(5, 'Frasser Kursi Kantor Jaring Kursi Staff', 260000, 1, 'chair.png', 'Toko Jati Surakarta'),
(6, 'Bilibili CN Exclusive KAITO Plushie', 500000, 1, 'kaito.jpg', 'Mercari'),
(8, 'Anima Doll Tori Himemiya', 375000, 0, 'tori_nui.jpeg', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `oauth_id` varchar(300) NOT NULL,
  `last_login` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `oauth_id`, `last_login`, `created_at`) VALUES
(3, 'Chelsea Vanianindya Putri', 'chelseavp2706@gmail.com', '', '116405823316920796261', '2024-11-01 06:01:48', '2024-10-31 17:49:18'),
(4, 'chelseaputri', 'chelseavp2706@gmail.com', '123', '', '0000-00-00 00:00:00', '2024-10-31 19:10:55'),
(5, 'kaitoluv', 'chelseavp2706@gmail.com', '123', '', '0000-00-00 00:00:00', '2024-10-31 20:06:34'),
(6, 'Chelsea Vanianindya Putri', 'chelseavp2706@gmail.com', '', '116405823316920796261', '2024-11-01 06:01:48', '2024-10-31 20:16:28'),
(7, 'chelsea', 'chelseaputri563@gmail.com', '123', '', '0000-00-00 00:00:00', '2024-10-31 20:28:16'),
(8, 'Chelsea Vanianindya Putri', 'chelseavp2706@gmail.com', '', '116405823316920796261', '2024-11-01 06:01:48', '2024-10-31 20:42:36'),
(9, 'Chelsea Vanianindya Putri', 'chelseavp2706@gmail.com', '', '116405823316920796261', '2024-11-01 06:01:48', '2024-10-31 20:43:23'),
(10, 'Chelsea Vanianindya Putri', 'chelseavp2706@gmail.com', '', '116405823316920796261', '2024-11-01 06:01:48', '2024-10-31 21:23:37'),
(11, 'Chelsea Vanianindya Putri', 'chelseavp2706@gmail.com', '', '116405823316920796261', '2024-11-01 06:01:48', '2024-10-31 21:35:16'),
(12, 'Chelsea Vanianindya Putri', 'chelseavp2706@gmail.com', '', '116405823316920796261', '2024-11-01 06:01:48', '2024-10-31 21:48:47'),
(13, 'Chelsea Vanianindya Putri', 'chelseavp2706@gmail.com', '', '116405823316920796261', '2024-11-01 06:01:48', '2024-10-31 21:58:48'),
(14, 'Chelsea Vanianindya Putri', 'chelseavp2706@gmail.com', '', '116405823316920796261', '2024-11-01 06:01:48', '2024-10-31 22:02:36'),
(15, 'Chelsea Vanianindya Putri', 'chelseavp2706@gmail.com', '', '116405823316920796261', '2024-11-01 06:01:48', '2024-10-31 22:02:45'),
(16, 'godg ss', 'godgss957@gmail.com', '', '107371693388114555047', '2024-11-01 06:00:41', '2024-10-31 22:22:50'),
(17, 'godg ss', 'godgss957@gmail.com', '', '107371693388114555047', '2024-11-01 06:00:41', '2024-10-31 22:26:44'),
(18, 'awoo', 'awooo@gmail.com', 'juanda', '', '0000-00-00 00:00:00', '2024-10-31 22:52:42'),
(19, 'admin', 'admin@admin.com', 'admin', '', '2024-10-31 23:59:28', '2024-10-31 23:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `johar` (`product_id`),
  ADD KEY `samba` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `johar` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `samba` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
