-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2017 at 05:28 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `bao_cao`
--

CREATE TABLE `bao_cao` (
  `id` int(11) NOT NULL,
  `so_don_hang` int(11) NOT NULL,
  `doanh_thu` int(11) NOT NULL,
  `so_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int(11) NOT NULL,
  `ten_danh_muc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `ten_danh_muc`) VALUES
(1, '(Chưa được phân loại)'),
(10, 'Đồng hồ điện tử'),
(11, 'Đồng hồ đôi'),
(12, 'Đồng hồ trẻ em'),
(13, 'Đồng hồ nam'),
(14, 'Đồng hồ nữ');

-- --------------------------------------------------------

--
-- Table structure for table `donhang_sp`
--

CREATE TABLE `donhang_sp` (
  `id_sp` int(11) NOT NULL,
  `id_donhang` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `user_hoten` varchar(50) NOT NULL,
  `user_sdt` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_diachi` text NOT NULL,
  `trang_thai` tinyint(4) NOT NULL,
  `tong_gia` int(11) NOT NULL,
  `ngay_xuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nha_phan_phoi`
--

CREATE TABLE `nha_phan_phoi` (
  `id` int(11) NOT NULL,
  `ten_nha_phan_phoi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nha_phan_phoi`
--

INSERT INTO `nha_phan_phoi` (`id`, `ten_nha_phan_phoi`) VALUES
(1, '(Chưa rõ)'),
(2, 'Anh'),
(3, 'Nhật'),
(4, 'Đức'),
(5, 'Thụy Điển'),
(6, 'Trung Quốc'),
(7, 'Hà Lan'),
(8, 'Pháp');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `ten_san_pham` varchar(100) NOT NULL,
  `mo_ta_ngan` text,
  `mo_ta` text NOT NULL,
  `hinh_anh` text NOT NULL,
  `don_gia` int(11) NOT NULL,
  `id_danh_muc` int(11) NOT NULL,
  `id_thuong_hieu` int(11) NOT NULL,
  `id_nha_phan_phoi` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten_san_pham`, `mo_ta_ngan`, `mo_ta`, `hinh_anh`, `don_gia`, `id_danh_muc`, `id_thuong_hieu`, `id_nha_phan_phoi`, `status`, `available`) VALUES
(5, 'Aries Gold AG-G1009', '<p>Tư vấn v&agrave; đặt h&agrave;ng: 0962.255.096</p>\r\n<p>Thanh to&aacute;n: Trực tiếp khi nhận sản phẩm</p>', '<p>H&atilde;ng:&nbsp;Đồng hồ Aries Gold</p>\r\n<p>Loại:&nbsp;Đồng hồ nam</p>\r\n<p>M&aacute;y:&nbsp; Nhật</p>\r\n<p>Đường k&iacute;nh vỏ: 36 mm&nbsp;</p>\r\n<p>Độ chịu nước: 5 ATM</p>\r\n<p>Chất liệu vỏ: Th&eacute;p kh&ocirc;ng gỉ&nbsp;</p>\r\n<p>Chất liệu d&acirc;y: Th&eacute;p kh&ocirc;ng gỉ&nbsp;</p>\r\n<p>Bảo h&agrave;nh: 10 năm</p>\r\n<p>Mặt k&iacute;nh: Sapphire</p>', '225229768_AG-G1009-G-RW.jpg', 4725000, 13, 3, 3, 1, 120),
(6, 'Diamond D DM3594L', '<p>Bảo h&agrave;nh trọn đời đối với thương hiệu Diamond D</p>\r\n<p>Tư vấn v&agrave; đặt h&agrave;ng: 0962.255.096</p>\r\n<p>Thanh to&aacute;n: Trực tiếp khi nhận sản phẩm</p>', '<p>Thương hiệu:&nbsp;Đồng hồ nữ Diamond D</p>\r\n<p>Kiểu d&aacute;ng:&nbsp;Đồng hồ nữ</p>\r\n<p>M&aacute;y:&nbsp;Quazt</p>\r\n<p>Chất liệu vỏ:&nbsp;Stainless Steel</p>\r\n<p>Chất liệu d&acirc;y:&nbsp;Stainless Steel</p>\r\n<p>Chống nước: 5 ATM</p>\r\n<p>Mặt k&iacute;nh:&nbsp;Saphia</p>\r\n<p>Bảo h&agrave;nh:&nbsp;Trọn đời</p>\r\n<p>Thương hiệu:&nbsp;Anh</p>\r\n<p>M&aacute;y:&nbsp;Japan Myota citizen Quazt</p>', '1503373735_DM3594L-15IG.jpg', 8667000, 14, 4, 2, 1, 200),
(7, 'Atlantic 62347+22347', '<p>Bảo h&agrave;nh trọn đời đối với thương hiệu Diamond D</p>\r\n<p>Tư vấn v&agrave; đặt h&agrave;ng: 0962.255.096</p>\r\n<p>Thanh to&aacute;n: Trực tiếp khi nhận sản phẩm</p>', '<p>H&atilde;ng sản xuất:&nbsp;Atlantic</p>\r\n<p>Chất liệu d&acirc;y:&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L mạ v&agrave;ng PVD</p>\r\n<p>Chất liệu mặt:&nbsp;&nbsp;Sapphire</p>\r\n<p>Chất liệu vỏ :Th&eacute;p kh&ocirc;ng gỉ 316L mạ v&agrave;ng PVD</p>\r\n<p>Đường k&iacute;nh vỏ : 40mm(nam) / 28mm(nữ)</p>\r\n<p>Chống nước: 5 bar(nam) / 3bar (nữ)</p>\r\n<p>Bảo h&agrave;nh: 10 năm</p>\r\n<p>Năng lượng sử dụng:&nbsp;Quazt</p>\r\n<p>Xuất xứ:&nbsp;Thụy Sỹ</p>', '1669628741_62347.45.21+22347.45.21.jpg', 23060000, 11, 7, 5, 1, 10),
(8, 'Bruno sohnle BS-17', '<p>Bảo h&agrave;nh: 10 năm</p>\r\n<p>Tư vấn v&agrave; đặt h&agrave;ng: 098.668.1189</p>', '<p>H&atilde;ng sản xuất:&nbsp;Đồng hồ&nbsp;Bruno Sohnle</p>\r\n<p>Loại đồng hồ:&nbsp;Đồng hồ nữ</p>\r\n<p>Chất liệu mặt:&nbsp; Sapphire</p>\r\n<p>Chất liệu vỏ : Th&eacute;p kh&ocirc;ng gỉ</p>\r\n<p>Chất liệu d&acirc;y:&nbsp;Th&eacute;p kh&ocirc;ng gỉ</p>\r\n<p>Năng lượng sử dụng: Quartz</p>\r\n<p>Đường k&iacute;nh: 34 mm</p>\r\n<p>Chống nước: 3ATM</p>\r\n<p>Xuất xứ: Đức</p>', '911968541_BS-17-23162-244.jpg', 8667000, 14, 5, 4, 1, 8),
(9, 'QQ-VQ96J014Y', '<p>Bảo h&agrave;nh: 10 năm</p>\r\n<p>Tư vấn kh&aacute;ch h&agrave;ng: 0962.255.096</p>\r\n<p>Vận chuyển: Miễn ph&iacute; to&agrave;n quốc</p>', '<p>H&atilde;ng sản xuất: QQ Brand - Citizen Nhật bản</p>\r\n<p>Thương hiệu: Đồng hồ Q&amp;Q</p>\r\n<p>Loại đồng hồ: Đồng hồ trẻ em</p>\r\n<p>Xuất xử: Nhật bản</p>\r\n<p>Năng lượng sử dụng: Đồng hồ điện tử (Quartz)</p>\r\n<p>Đường k&iacute;nh mặt: 36mm</p>\r\n<p>Chất liệu vỏ: Vỏ nhựa</p>\r\n<p>Chất liệu d&acirc;y: D&acirc;y nhựa</p>\r\n<p>Chất liệu k&iacute;nh: Mineral Glass (Mặt k&iacute;nh cứng)</p>\r\n<p>Độ chịu nước: 10ATM</p>', 'VQ96J014Y.jpg', 529000, 12, 8, 3, 1, 25),
(10, 'Aries Gold AG-L503', '<p>Tư vấn v&agrave; đặt h&agrave;ng: 0962.255.096</p>\r\n<p>Bảo h&agrave;nh: 10 năm</p>', '<p>H&atilde;ng:&nbsp;Đồng hồ Aries Gold</p>\r\n<p>Loại:&nbsp;Đồng hồ nam</p>\r\n<p>M&aacute;y:&nbsp; Nhật</p>\r\n<p>Đường k&iacute;nh vỏ: 26 mm&nbsp;</p>\r\n<p>Độ chịu nước: 5 ATM</p>\r\n<p>Chất liệu vỏ: Th&eacute;p kh&ocirc;ng gỉ&nbsp;</p>\r\n<p>Chất liệu d&acirc;y: Da</p>\r\n<p>Mặt k&iacute;nh: Sapphire</p>', '895720007_2222.jpg', 4975000, 14, 3, 3, 2, 0),
(11, 'Bruno sohnle 17-13158', '<p>Tư vấn v&agrave; đặt h&agrave;ng: 0962.255.096</p>\r\n<p>Thanh to&aacute;n: Trực tiếp khi nhận sản phẩm</p>\r\n<p>&nbsp;</p>', '<p>H&atilde;ng sản xuất:&nbsp;<a href=\"http://www.dangquangwatch.vn/sp/Bruno-Sohnle-Glashutte/560-0-0-0-0-0-0.html\">Đồng hồ&nbsp;Bruno Sohnle</a></p>\r\n<p>Loại đồng hồ:&nbsp;<a href=\"http://www.dangquangwatch.vn/sp/t-1/Dong-ho-nam.html\">Đồng hồ nam</a></p>\r\n<p>Chất liệu d&acirc;y: D&acirc;y da</p>\r\n<p>Chất liệu mặt:&nbsp; Sapphire</p>\r\n<p>Chất liệu vỏ : Th&eacute;p kh&ocirc;ng gỉ</p>\r\n<p>Năng lượng sử dụng: Quartz</p>\r\n<p>Đường k&iacute;nh: 42 mm</p>\r\n<p>Xuất xứ: Đức</p>\r\n<p>Bảo h&agrave;nh: 10 năm</p>\r\n<p>&nbsp;</p>', '465107302_dong-ho-bruno-BS-17-13158-241 web.jpg', 1383000, 13, 5, 4, 1, 100),
(12, 'QQ M143J003Y', '<p>Tư vấn v&agrave; đặt h&agrave;ng: 0962.255.096</p>\r\n<p>Thanh to&aacute;n: Trực tiếp khi nhận sản phẩm</p>\r\n<p>Vận chuyển: Miễn ph&iacute; to&agrave;n quốc</p>\r\n<p>&nbsp;</p>', '<p>H&atilde;ng sản xuất: QQ Brand - Citizen Nhật bản</p>\r\n<p>Thương hiệu: Đồng hồ Q&amp;Q</p>\r\n<p>Loại đồng hồ: Đồng hồ nam</p>\r\n<p>Xuất xử: Nhật bản</p>\r\n<p>Năng lượng sử dụng: Đồng hồ điện tử (Quartz)</p>\r\n<p>Đường k&iacute;nh mặt: 45mm</p>\r\n<p>Chất liệu vỏ: Vỏ nhựa</p>\r\n<p>Chất liệu d&acirc;y: D&acirc;y nhựa</p>\r\n<p>Chất liệu k&iacute;nh: Mineral Glass (Mặt k&iacute;nh cứng)</p>\r\n<p>Độ chịu nước: 10 ATM</p>', '914394796_Untitled-1.jpg', 1357000, 10, 8, 3, 1, 32),
(13, 'Bruno Sohnle 1736+1733', '<p>Tư vấn v&agrave; đặt h&agrave;ng: 0962.255.096</p>\r\n<p>Thanh to&aacute;n: Trực tiếp khi nhận sản phẩm</p>', '<p>H&atilde;ng sản xuất: Đồng hồ Bruno Sohnle</p>\r\n<p>Loại đồng hồ: Đồng hồ đ&ocirc;i</p>\r\n<p>Chất liệu mặt: Sapphire</p>\r\n<p>Năng lượng sử dụng: Quartz</p>\r\n<p>Đ&ocirc;̣ chịu nước : 10 ATM</p>\r\n<p>Xuất xứ: Đức</p>', '1872085379_63.jpg', 25560000, 11, 5, 4, 1, 1),
(14, 'Bruno Sohnle 17-33', '<p>H&atilde;ng sản xuất:&nbsp;Đồng hồ&nbsp;Bruno Sohnle</p>\r\n<p>Loại đồng hồ:&nbsp;Đồng hồ nữ</p>\r\n<p>Chất liệu d&acirc;y: D&acirc;y da</p>\r\n<p>Chất liệu mặt:&nbsp; Sapphire</p>\r\n<p>Chất liệu vỏ : Th&eacute;p kh&ocirc;ng gỉ</p>\r\n<p>Năng lượng sử dụng: Quartz</p>\r\n<p>Đ&ocirc;̣ chịu nước : 3 ATM</p>\r\n<p>Đường k&iacute;nh:&nbsp; 29 mm</p>\r\n<p>Bảo h&agrave;nh: 10 năm</p>\r\n<p>Xuất xứ: Đức</p>', '<p><br />Tư vấn v&agrave; đặt h&agrave;ng: 0962.255.096</p>\r\n<p>Thanh to&aacute;n: Trực tiếp khi nhận sản phẩm, chuyển khoản hoặc COD</p>', '1992587027_dong-ho-bruno-sohnle-17-33045-971.png', 12250000, 14, 5, 4, 1, 79);

-- --------------------------------------------------------

--
-- Table structure for table `thuong_hieu`
--

CREATE TABLE `thuong_hieu` (
  `id` int(11) NOT NULL,
  `ten_thuong_hieu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thuong_hieu`
--

INSERT INTO `thuong_hieu` (`id`, `ten_thuong_hieu`) VALUES
(1, '(Chưa rõ)'),
(2, 'Epos Swiss'),
(3, 'Aries Gold'),
(4, 'Diamond D'),
(5, 'Bruno Sohnle Glashutte'),
(6, 'Casio'),
(7, 'Atlantic Swiss'),
(8, 'QQ Cityzen');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `sdt` varchar(30) NOT NULL,
  `dia_chi` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `gioi_tinh` tinyint(4) NOT NULL,
  `trang_thai` tinyint(4) NOT NULL,
  `quyen` tinyint(4) NOT NULL,
  `ngay_dang_ki` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `ho_ten`, `sdt`, `dia_chi`, `email`, `gioi_tinh`, `trang_thai`, `quyen`, `ngay_dang_ki`) VALUES
('sa', '21232f297a57a5a743894a0e4a801fc3', 'Nguyễn Anh Quân', '0962255096', 'Hà Nội', 'sa@gmail.com', 0, 1, 0, '2017-10-10'),
('test', 'abc', 'abc', '123', '123', '123', 1, 1, 1, '2017-10-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bao_cao`
--
ALTER TABLE `bao_cao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donhang_sp`
--
ALTER TABLE `donhang_sp`
  ADD PRIMARY KEY (`id_sp`,`id_donhang`),
  ADD KEY `checkout_id` (`id_donhang`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `nha_phan_phoi`
--
ALTER TABLE `nha_phan_phoi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_danh_muc` (`id_danh_muc`),
  ADD KEY `id_thuong_hieu` (`id_thuong_hieu`),
  ADD KEY `id_nha_phan_phoi` (`id_nha_phan_phoi`);

--
-- Indexes for table `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bao_cao`
--
ALTER TABLE `bao_cao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nha_phan_phoi`
--
ALTER TABLE `nha_phan_phoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `donhang_sp`
--
ALTER TABLE `donhang_sp`
  ADD CONSTRAINT `donhang_sp_ibfk_2` FOREIGN KEY (`id_donhang`) REFERENCES `don_hang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`username`);

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`id_danh_muc`) REFERENCES `danh_muc` (`id`),
  ADD CONSTRAINT `san_pham_ibfk_2` FOREIGN KEY (`id_thuong_hieu`) REFERENCES `thuong_hieu` (`id`),
  ADD CONSTRAINT `san_pham_ibfk_3` FOREIGN KEY (`id_nha_phan_phoi`) REFERENCES `nha_phan_phoi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
