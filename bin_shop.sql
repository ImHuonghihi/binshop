-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 28, 2021 lúc 07:08 AM


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `binshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `admin_status`) VALUES
(1, 'admin', '25f9e794323b453885f5181f1b624d0b', 1),
(2, 'binadmin' ,  '25f9e794323b453885f5181f1b624d0b', 2),
(3, 'newadmin' ,  '0794cdac84dacfb9dfa15d6f2233f9c0', 13);


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_cart` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `code_cart` varchar(10) NOT NULL,
  `cart_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`id_cart`, `id_khachhang`, `code_cart`, `cart_status`) VALUES
(3, 1, '9281', 0),
(4, 1, '4458', 0),
(5, 8, '1632', 1),
(6, 8, '8138', 0),
(7, 1, '4175', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_details`
--

CREATE TABLE `tbl_cart_details` (
  `id_cart_details` int(11) NOT NULL,
  `code_cart` varchar(10) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart_details`
--

INSERT INTO `tbl_cart_details` (`id_cart_details`, `code_cart`, `id_sanpham`, `soluongmua`) VALUES
(7, '9281', 9, 3),
(8, '9281', 8, 1),
(9, '4458', 9, 3),
(10, '4458', 8, 1),
(11, '1632', 12, 5),
(12, '8138', 11, 5),
(13, '4175', 6, 2),
(14, '4175', 8, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `id_dangky` int(11) NOT NULL,
  `tenkhachhang` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `dienthoai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`id_dangky`, `tenkhachhang`, `email`, `diachi`, `matkhau`, `dienthoai`) VALUES
(8, 'abcdef', 'maxime80@example.net', 'landmark72 giao hang', '25f9e794323b453885f5181f1b624d0b', '0123456789');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tendanhmuc`, `thutu`) VALUES
(1, 'Apple', 1),
(2, 'Vivo', 2),
(3, 'Samsung', 3),
(4, 'Oppo', 4),
(5, 'Xiaomi', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(250) NOT NULL,
  `masp` varchar(100) NOT NULL,
  `giasp` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `tomtat` text NOT NULL,
  `noidung` text NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--



INSERT INTO `tbl_sanpham` 
    (`id_sanpham`, `tensanpham`, `masp`, `giasp`, `soluong`, `hinhanh`, `tomtat`, `noidung`, `tinhtrang`, `id_danhmuc`) VALUES
    (6, 'MacBook Pro', 'MBP001', 30000000, 5, 'i11.png', 'Laptop chuyên đồ họa', 'MacBook Pro là dòng laptop chuyên đồ họa của Apple với hiệu suất cao.', 1, 1),
    (7, 'Vivo X50 Pro', 'X50P001', 15000000, 8, 'vivo.jpg', 'Camera gimbal chống rung', 'Vivo X50 Pro là chiếc điện thoại với camera gimbal chống rung, chụp ảnh và quay video siêu ổn định.', 2, 2),
    (8, 'Samsung Galaxy Tab S7', 'S7TAB001', 12000000, 10, 's29.jpg', 'Tablet cao cấp', 'Samsung Galaxy Tab S7 là một tablet cao cấp với màn hình AMOLED và bút S Pen.', 3, 3),
    (9, 'Oppo Reno6', 'R6-001', 12000000, 7, 'oppo2.jpg', 'Máy ảnh chất lượng cao', 'Oppo Reno6 là chiếc điện thoại tập trung vào chụp ảnh với camera chất lượng cao.', 4, 4),
    (10, 'Xiaomi Mi 11', 'Mi11-001', 16000000, 12, 'x12.jpg', 'Chip Snapdragon 888', 'Xiaomi Mi 11 là một chiếc điện thoại cao cấp với chip Snapdragon 888 và màn hình 2K.', 5, 5),
    (13, 'iPhone 13 Pro Max', '006', '29990000', 5, 'i14.jpg', 'Flagship mới nhất của Apple', 'iPhone 13 Pro Max là chiếc điện thoại mạnh mẽ với camera chất lượng cao và màn hình OLED Super Retina XDR.', 1, 1),
    (14, 'Vivo X70 Pro', '007', '27990000', 8, 'vivo1.jpg', 'Sự kết hợp hoàn hảo giữa hiệu suất và camera', 'Vivo X70 Pro mang lại trải nghiệm chụp ảnh chuyên nghiệp với hệ thống camera Zeiss và hiệu suất ổn định.', 1, 2),
    (15, 'Samsung Galaxy Z Fold 3', '008', '36990000', 3, 'x13.jpg', 'Smartphone gập màn hình đỉnh cao', 'Galaxy Z Fold 3 là một sự đổi mới trong thiết kế với khả năng gập màn hình, mang lại trải nghiệm đa nhiệm độc đáo.', 1, 3),
    (16, 'Oppo Find X4 Pro', '009', '42990000', 7, 'Oppo1.jpg', 'Sự đẳng cấp trong thiết kế và hiệu suất', 'Oppo Find X4 Pro là một siêu phẩm với thiết kế sang trọng và hiệu suất mạnh mẽ.', 1, 4),
    (17, 'Xiaomi Mi 11 Ultra', '010', '32990000', 6, 'xiao.jpg', 'Camera siêu zoom 120x', 'Mi 11 Ultra là chiếc điện thoại với camera siêu zoom, màn hình AMOLED, và hiệu suất ổn định.', 1, 5);
--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Chỉ mục cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  ADD PRIMARY KEY (`id_cart_details`);

--
-- Chỉ mục cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`id_dangky`);

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  MODIFY `id_cart_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id_dangky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

