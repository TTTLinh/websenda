-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 26, 2021 lúc 03:25 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_price` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(10) NOT NULL,
  `total_price` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_code` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `catname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`categoryid`, `catname`) VALUES
(1, 'Sen đá'),
(2, 'Xương rồng'),
(3, 'Thêm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pmode` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `products` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `amount_paid` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xacnhan` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `pmode`, `products`, `amount_paid`, `xacnhan`) VALUES
(18, 'loan huynh', 'hloan4266@gmail.com', '0333435607', '123 Hội An', 'cod', 'Bữa sáng(1), Bữa trưa(1)', '140000', 1),
(21, 'Trần Thị Thùy Linh', 'bui15062000@gmail.com', '0778573094', '15', 'cod', 'Sen đá nâu(3), Sandwich(1)', '109000', 0),
(22, 'user', 'aaa@gmail.com', '14275325', '15', 'netbanking', 'Sen đá Phật Bà(3)', '57000', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_amount` int(11) NOT NULL,
  `product_price` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_qty` int(11) NOT NULL DEFAULT 1,
  `product_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_code` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `categoryid`, `product_name`, `product_amount`, `product_price`, `product_qty`, `product_image`, `product_code`) VALUES
(1, 1, 'Sandwich', 10, '70000', 1, 'upload/brocollibeef_1539096616_1539097842.jpg', 'p1000'),
(91, 1, 'Sen đá nâu', 1, '13000', 1, 'https://homegift.vn/img/cms/Blog-CMS/garden/Cay-sen-da/c%C3%A2y-sen-%C4%91%C3%A1-n%C3%A2u---Homegift-vn.jpg', 'p2000'),
(92, 1, 'Sen đá Phật Bà', 11, '19000', 1, 'https://homegift.vn/img/cms/Blog-CMS/garden/Cay-sen-da/sen-%C4%91%C3%A1-ph%E1%BA%ADt-b%C3%A0-quan-%C3%A2m.jpg', 'p1001'),
(93, 1, 'Sen đá Dù ', 20, '27000', 1, 'https://homegift.vn/img/cms/Blog-CMS/garden/Cay-sen-da/Sen-%C4%91%C3%A1-d%C3%B9-kim---d%C3%B9-xanh.jpg', 'p1002'),
(94, 1, 'Sen Thạch Ngọc', 20, '21', 1, 'https://homegift.vn/img/cms/Blog-CMS/garden/Cay-sen-da/Sen-%C4%91%C3%A1-th%E1%BA%A1ch-ng%E1%BB%8Dc---Sedum-rubrotinctum.jpg', 'p2001'),
(95, 1, 'Sen Thạch Bích', 11, '30000', 1, 'https://homegift.vn/img/cms/Blog-CMS/garden/Cay-sen-da/Sen-%C4%91%C3%A1-Th%E1%BA%A1ch-B%C3%ADch---sen-Ph%E1%BB%89-Th%C3%BAy---sen-may-m%E1%BA%AFn.jpg', 'p1003'),
(96, 1, 'Sen đá Thái ', 20, '60000', 1, 'https://homegift.vn/img/cms/Blog-CMS/garden/Cay-sen-da/Sen-%C4%91%C3%A1-Th%C3%A1i---sen-%C4%91%C3%A1-Xanh.jpg', 'p2005'),
(97, 1, 'Sen đá móng rồng', 11, '25000', 1, 'https://homegift.vn/img/cms/Blog-CMS/garden/Cay-sen-da/H%C3%ACnh-%E1%BA%A3nh-c%C3%A2y-sen-%C4%91%C3%A1-m%C3%B3ng-r%E1%BB%93ng.jpg', 'p1005'),
(98, 1, 'Sen đá vàng', 20, '35000', 1, 'https://homegift.vn/img/cms/Blog-CMS/garden/Cay-sen-da/Sen-%C4%91%C3%A1-v%C3%A0ng.jpg', 'p2009'),
(99, 2, 'Xương Rồng Tai Thỏ', 11, '90000', 1, 'https://cayxinh.vn/wp-content/uploads/2018/04/xuong_rong_tai_tho_vang_180320_03.jpg', 'p2010'),
(100, 2, 'Xương Rồng Thanh Sơn', 20, '120000', 1, 'https://cayxinh.vn/wp-content/uploads/2018/06/xuong_rong_thanh_son_260320_02.jpg', 'p1011'),
(101, 2, 'Xương Rồng Bánh Sinh Nhật', 40, '80000', 1, 'https://cayxinh.vn/wp-content/uploads/2017/11/xuong-rong-banh-sinh-nhat.jpg', 'p2066');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(1, 0, '123', '123', '2020-12-23 08:03:52'),
(2, 1, '123', '123', '2020-12-23 08:03:57'),
(3, 0, 'loooo', 'loan', '2020-12-28 14:40:22'),
(4, 3, '12', 'h', '2020-12-28 14:40:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `createdate` datetime NOT NULL,
  `is_block` tinyint(4) NOT NULL DEFAULT 0,
  `permision` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `fullname`, `createdate`, `is_block`, `permision`) VALUES
(6, 'admin', '123', 'loan@gmail.com', 'loanhuynh', '2020-12-13 00:16:36', 0, 2),
(14, 'user', '1', 'user@gmail.com', 'user', '2021-08-20 13:48:12', 0, 0),
(15, 'user1', '1', 'bui15062000@gmail.com', 'User', '2021-08-20 19:03:54', 0, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code_2` (`product_code`),
  ADD KEY `product_code` (`product_code`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `category` (`categoryid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
