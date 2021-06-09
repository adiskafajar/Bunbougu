-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2021 at 01:09 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bunbougu`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand`, `image`) VALUES
(1, 'Faber-Castell', 'faber-castell.png'),
(2, 'Greebel', 'greebel.png'),
(6, 'Kenko', 'kenko.png'),
(7, 'Post-it', 'post-it.png'),
(15, 'Jokyo', 'jokyo.png'),
(18, 'sidu', 'sidu.png'),
(19, 'stabilo', 'stabilo.png'),
(20, 'fox', 'fox.png');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `user_id`, `product_id`, `quantity`, `note`) VALUES
(43, 36, 1, 1, ''),
(44, 36, 4, 1, ''),
(45, 36, 17, 1, ''),
(46, 36, 29, 1, ''),
(47, 36, 30, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`, `image`) VALUES
(1, 'pencil', 'pensil.jpg'),
(2, 'pulpen', 'pulpen.jpg'),
(3, 'penggaris', 'penggaris.jpg'),
(47, 'amplop', 'amplop.jpg\r\n'),
(48, 'buku tulis', 'buku-tulis.jpg'),
(49, 'gabus', 'gabus.jpg'),
(50, 'gunting', 'gunting.jpg'),
(51, 'kanvas.jpg\r\n', 'kertas.jpg\r\n'),
(52, 'lem', 'lem.jpg'),
(53, 'nota kwitansi', 'nota-kwitansi.jpg'),
(54, 'penggaris', 'penggaris.jpg'),
(55, 'penghapus', 'penghapus.jpg'),
(56, 'tinta print', 'tinta-print.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `couriers`
--

CREATE TABLE `couriers` (
  `courier_id` int(11) NOT NULL,
  `courier` varchar(100) NOT NULL,
  `courier_image` varchar(100) NOT NULL,
  `no_courier` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `couriers`
--

INSERT INTO `couriers` (`courier_id`, `courier`, `courier_image`, `no_courier`, `description`) VALUES
(1, 'j&t', 'j&t.png', 1234252, 'asdasasdasd'),
(2, 'jne', 'jne.png', 12235563, 'asdasasda'),
(3, 'pos', 'pos.png', 1234234, 'asdasdasd'),
(4, 'tiki', 'tiki.png', 1235534235, 'asdasdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `payment_image` varchar(100) NOT NULL,
  `no_payment` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment`, `payment_image`, `no_payment`, `description`) VALUES
(7, 'alfamart', 'alfamart.png', 93483838, 'asdasdasd'),
(8, 'gopay', 'gopay.png', 2345234, 'asdasdasd'),
(9, 'mastercard', 'mastercard.png', 12355555, 'asdasdasd'),
(10, 'ovo', 'ovo.png', 123552121, 'asdasdasdasd'),
(11, 'virtual', 'virtual.png', 234633, 'asdasdasd'),
(12, 'visa', 'visa.png', 124522, 'asdasdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `price` int(100) NOT NULL,
  `description` text NOT NULL,
  `stock` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product`, `category_id`, `brand_id`, `price`, `description`, `stock`) VALUES
(32, 'amplop-pastel', 47, 1, 20000, 'asdasd', 1),
(33, 'buku-tulis-nusantara', 48, 1, 200, 'asd', 2),
(35, 'deli-gule-stick', 52, 2, 123, 'asd', 1),
(37, 'epson-664-tinta-printer', 56, 1, 123, 'asd', 22),
(38, 'gabus-warna', 49, 2, 123, 'asd', 33),
(39, 'gunting-kertas', 50, 2, 123, 'asd', 22),
(42, 'lem-fox-150g', 52, 1, 123, 'asd', 123),
(43, 'papatan-canvas-a3', 51, 1, 123, 'asd', 123),
(44, 'penghapus-staedtler', 55, 1, 123, 'asd', 123),
(45, 'pensil-faber-castel', 1, 1, 123, 'asd', 123),
(48, 'sinar-dunia-kuitansi', 53, 1, 1233, 'asd', 123);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `product_image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `main` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`product_image_id`, `product_id`, `image`, `main`) VALUES
(55, 32, 'amplop-pastel.png', 'true'),
(56, 33, 'buku-tulis-nusantara.png', 'true'),
(57, 34, 'cat-akrilik.png', 'true'),
(63, 35, 'deli-gule-stick.png', 'true'),
(64, 36, 'double-tape-hitam.png', 'true'),
(65, 37, 'epson-664-tinta-printer.png', 'true'),
(66, 38, 'gabus-warna.png', 'true'),
(67, 39, 'gunting-kertas.png', 'true'),
(68, 40, 'ice-bear-backpack.png', 'true'),
(69, 41, 'jokyo-shinku-oil.png', 'true'),
(70, 42, 'lem-fox-150g.png', 'true'),
(71, 43, 'papatan-canvas-a3.png', 'true'),
(72, 44, 'penghapus-staedtler.png', 'true'),
(73, 45, 'pensil-faber-castel.png', 'true'),
(74, 46, 'post-it-3m.png', 'true'),
(75, 47, 'rautan-karakter.png', 'true'),
(76, 48, 'sinar-dunia-kuitansi.png', 'true'),
(77, 49, 'stabilo.png', 'true'),
(78, 50, 'sticker-abjad.png', 'true'),
(95, 32, '60a4ee1e24ee7.png', 'false'),
(96, 32, '60a4f1173eb80.png', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `courier_id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` varchar(255) NOT NULL,
  `total_price` int(255) NOT NULL,
  `proof_payment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `user_id`, `payment_id`, `courier_id`, `address`, `status`, `total_price`, `proof_payment`) VALUES
(6, 19, 8, 1, 'jl. jalan road', 'awaiting', 20323, ''),
(7, 19, 7, 3, 'jl. jalan road', 'shipping', 40815, ''),
(8, 19, 7, 2, 'jl. jalan road', 'processed', 20492, ''),
(10, 19, 8, 4, 'jl. jalan road', 'payment', 20323, ''),
(11, 19, 8, 1, 'jl. jalan road', 'payment', 20815, ''),
(12, 19, 9, 1, 'jl. jalan road', 'payment', 123, '');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `transaction_detail_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`transaction_detail_id`, `transaction_id`, `product_id`, `quantity`) VALUES
(1, 6, 32, 1),
(2, 6, 33, 1),
(3, 6, 37, 1),
(4, 7, 32, 2),
(5, 7, 33, 1),
(6, 7, 35, 5),
(7, 8, 32, 1),
(8, 8, 35, 1),
(9, 8, 39, 1),
(10, 8, 43, 1),
(11, 8, 48, 1),
(12, 9, 38, 1),
(13, 9, 39, 1),
(14, 9, 45, 1),
(15, 10, 32, 1),
(16, 10, 33, 1),
(17, 10, 35, 1),
(18, 11, 32, 1),
(19, 11, 33, 1),
(20, 11, 35, 1),
(21, 11, 37, 1),
(22, 11, 38, 1),
(23, 11, 39, 1),
(24, 11, 42, 1),
(25, 12, 44, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact` int(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `username`, `password`, `address`, `gender`, `contact`, `image`, `role`) VALUES
(1, 'admin', 'admin@admin.admin', 'admin', 'admin', 'jl. admin', 'wanita', 0, '602a2bb311641.png', 'admin'),
(19, 'bambang', 'bambang@bambang.bambang', 'qqq', 'qqq', 'jl. jalan road', 'pria', 89988, '604652883899e.jpg', 'user'),
(24, 'myname', 'myemail', 'myusername', 'mypassword', 'myaddress', 'on', 4, '', 'user'),
(25, 'asdasd', 'dddd', 'ddddd', 'wwwww', 'dddd', 'wanita', 5, '604c6d5cae67a.jpg', 'user'),
(26, 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'pria', 3, '604c41554fc81.jpg', 'user'),
(36, 'www', 'www', 'www', 'www', 'asd', 'pria', 5, '604c405180046.jpg', 'user'),
(38, 'rty', 'rty', 'ert', 'rty', 'ert', 'pria', 3, '604c3ca7bbd4f.jpg', 'user'),
(39, 'erter', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'pria', 6, '604c6ce01741b.jpg', 'user'),
(40, 'auth', 'auth', 'auth', 'auth', '', 'pria', 0, '', 'user'),
(41, 'yui', 'yui', 'yui', 'yui', '', 'wanita', 0, '', 'user'),
(42, '', '', 'asd', 'asd', '', '', 0, '', 'user'),
(43, 'bambang123', 'bambang123@bambang123', 'bambang123', 'bambang123', '', '', 0, '', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `wishlist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`wishlist_id`, `user_id`, `product_id`) VALUES
(41, 26, 17),
(42, 26, 29),
(43, 36, 30),
(81, 19, 36),
(83, 36, 4),
(84, 36, 1),
(116, 19, 34),
(135, 19, 38),
(144, 19, 32),
(146, 19, 33),
(147, 19, 37),
(148, 19, 35),
(149, 19, 45),
(150, 19, 39);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `couriers`
--
ALTER TABLE `couriers`
  ADD PRIMARY KEY (`courier_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`product_image_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`transaction_detail_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `couriers`
--
ALTER TABLE `couriers`
  MODIFY `courier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `product_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `transaction_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
