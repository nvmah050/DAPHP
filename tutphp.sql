-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 17, 2019 lúc 04:31 PM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tutphp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `level` tinyint(4) DEFAULT '1',
  `avatar` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `email`, `password`, `phone`, `status`, `level`, `avatar`, `created_at`, `updated_at`) VALUES
(3, 'TranSang', '71 chế lan viên tây thạnh tân phú hcm', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', '01224614173', 1, 1, NULL, NULL, '2019-03-16 12:21:08'),
(4, 'sang', 'ádsad', '123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123', 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `images` varchar(100) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `home` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `images`, `banner`, `home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'IPhone', 'iphone', NULL, NULL, 1, 1, '2019-03-15 07:44:23', '2019-03-16 16:25:40'),
(2, 'SAMSUNG', 'samsung', NULL, NULL, 1, 1, '2019-03-15 09:19:11', '2019-03-15 12:34:28'),
(3, 'OPPO', 'oppo', NULL, NULL, 1, 1, '2019-03-15 09:49:44', '2019-03-16 06:28:11'),
(4, 'NOKIA', 'nokia', NULL, NULL, 1, 1, '2019-03-15 10:31:41', '2019-03-16 16:23:22'),
(5, 'HUAWEI', 'huawei', NULL, NULL, 1, 1, '2019-03-15 10:32:40', '2019-03-16 16:23:24'),
(6, 'XIAOMI', 'xiaomi', NULL, NULL, 1, 1, '2019-03-15 10:32:58', '2019-03-16 16:23:26'),
(7, 'VIVO', 'vivo', NULL, NULL, 1, 1, '2019-03-15 10:33:14', '2019-03-16 16:23:28'),
(8, 'ASUS', 'asus', NULL, NULL, 1, 1, '2019-03-15 10:33:42', '2019-03-16 16:23:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 15, 1, 11000000, '2019-03-17 08:46:43', '2019-03-17 08:46:43'),
(2, 3, 16, 1, 25641000, '2019-03-17 08:54:46', '2019-03-17 08:54:46'),
(3, 4, 16, 1, 25641000, '2019-03-17 08:58:11', '2019-03-17 08:58:11'),
(4, 5, 2, 1, 29600000, '2019-03-17 10:17:26', '2019-03-17 10:17:26'),
(5, 6, 16, 1, 25641000, '2019-03-17 10:19:03', '2019-03-17 10:19:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT '0',
  `thunbar` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `content` text,
  `number` int(11) NOT NULL DEFAULT '0',
  `head` int(11) DEFAULT '0',
  `view` int(11) DEFAULT '0',
  `HOT` tinyint(4) DEFAULT '0',
  `pay` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `sale`, `thunbar`, `category_id`, `content`, `number`, `head`, `view`, `HOT`, `pay`, `created_at`, `updated_at`) VALUES
(1, 'iPhone Xs Max 512GB.', 'iphone-xs-max-512gb', 43000000, 20, 'iphone-xs-max-512gb-gold-600x600.jpg', 1, 'Màn hình: 6.5\", Super Retina\r\nHĐH: iOS 12\r\nCPU: Apple A12 Bionic 6 nhân\r\nRAM: 4 GB, ROM: 512 GB\r\nCamera: Chính 12 MP & Phụ 12 MP, Selfie: 7 MP\r\nPIN: 3174 mAh', 3, 0, 0, 0, 0, NULL, '2019-03-16 12:47:15'),
(2, 'iPhone Xs Max 256GB', 'iphone-xs-max-256gb', 37000000, 20, 'iphone-xs-max-256gb-white-600x600.jpg', 1, 'Màn hình: 6.5\", Super Retina\r\nHĐH: iOS 12\r\nCPU: Apple A12 Bionic 6 nhân\r\nRAM: 4 GB, ROM: 512 GB\r\nCamera: Chính 12 MP & Phụ 12 MP, Selfie: 7 MP\r\nPIN: 3174 mAh', 2, 0, 0, 0, 1, NULL, '2019-03-17 10:17:39'),
(3, 'iPhone X 256GB', 'iphone-x-256gb', 27990000, 20, 'iphone-x-256gb-20-600x600.jpg', 1, 'Màn hình:OLED, 5.8\", Super Retina\r\nHệ điều hành:	iOS 12\r\nCamera sau:	2 camera 12 MP\r\nCamera trước:7 MP\r\nCPU:Apple A11 Bionic 6 nhân\r\nRAM:3 GB\r\nBộ nhớ trong:	256 GB', 3, 0, 0, 0, 0, NULL, '2019-03-16 07:00:41'),
(14, 'IphoneX1', 'iphonex1', 999999, 0, 'iphone-xr-256gb-white-600x600.jpg', 1, 'a', 6, 0, 0, 0, 0, NULL, '2019-03-17 06:51:14'),
(15, 'IphoneX2', 'iphonex2', 11111111, 1, 'iphone-xr-black-600x600.jpg', 1, 'a', 1, 0, 0, 0, 0, NULL, '0000-00-00 00:00:00'),
(16, 'Samsung Galaxy Note 9', 'samsung-galaxy-note-9', 28490000, 10, 'samsung-galaxy-note-9-512gb-blue-400x460.png', 2, 'Giảm 4.000.000đ', 3, 0, 0, 0, 1, NULL, '2019-03-17 10:19:23'),
(18, 'TEST', 'test', 0, 0, 'samsung-galaxy-s10-plus-512gb-ceramic-black-600x600.jpg', 2, '*', 1, 0, 0, 0, 0, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `amount` int(4) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `users_id`, `status`, `created_at`, `updated_at`, `note`) VALUES
(5, 31080000, 11, 1, '2019-03-17 10:17:26', '2019-03-17 10:17:38', ''),
(6, 26923050, 11, 1, '2019-03-17 10:19:03', '2019-03-17 10:19:23', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `token` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `avatar`, `status`, `token`, `created_at`, `updated_at`) VALUES
(10, '1', '1@gmail.com', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 1, NULL, NULL, NULL),
(11, 'admin', 'admin@gmail.com', '0923635200', '+', '21232f297a57a5a743894a0e4a801fc3', NULL, 1, NULL, NULL, NULL),
(14, 'sang', '1@gmail.com', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 1, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
