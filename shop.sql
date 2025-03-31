-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2024 at 01:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cauhinh`
--

CREATE TABLE `cauhinh` (
  `TenWebsite` varchar(255) NOT NULL,
  `MoTaWeb` text NOT NULL,
  `Logo` text NOT NULL,
  `DiaChi` text NOT NULL,
  `Email` varchar(255) NOT NULL,
  `SoDienThoai` varchar(11) NOT NULL,
  `PhiShip` int(11) NOT NULL,
  `MienPhiShip` int(11) NOT NULL,
  `QRNganHang` text NOT NULL,
  `ChuTaiKhoan` varchar(255) NOT NULL,
  `SoTaiKhoan` varchar(255) NOT NULL,
  `ApiKey` varchar(500) NOT NULL,
  `NganHang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cauhinh`
--

INSERT INTO `cauhinh` (`TenWebsite`, `MoTaWeb`, `Logo`, `DiaChi`, `Email`, `SoDienThoai`, `PhiShip`, `MienPhiShip`, `QRNganHang`, `ChuTaiKhoan`, `SoTaiKhoan`, `ApiKey`, `NganHang`) VALUES
('LinhKienNhanh.VN', 'Website bán linh kiện máy tính trực tuyến', 'http://localhost/webshop/uploads/logo-hacom-since-2001.png', 'Hà Nội', 'bdtcloner1@gmail', '0988342551', 30000, 500000, 'http://localhost/webshop/uploads/z5204981674939_cb87935e11dde5ee3dc2641f5eb6d604.jpg', 'BUI DUONG TRI', '0988342551', 'AK_CS.dd0325a0088c11f097089522635f3f80.ihvGrRv9Peo7Euss1tg9qmmIk7AaJB6bT9eM8K5oBXAKvsfFMY54VjQAUogKqAQSruBWklYl', 'MB BANK');

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaChiTietHoaDon` int(11) NOT NULL,
  `MaHoaDon` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaChiTietHoaDon`, `MaHoaDon`, `MaSanPham`, `SoLuong`) VALUES
(7, 7, 13, 1),
(8, 7, 12, 1),
(9, 8, 13, 1),
(10, 8, 12, 1),
(11, 8, 11, 3),
(12, 8, 3, 2),
(13, 9, 11, 1),
(14, 10, 9, 2),
(15, 10, 11, 1),
(16, 11, 12, 1),
(17, 11, 11, 1),
(18, 11, 13, 1),
(19, 12, 11, 2),
(20, 13, 11, 1),
(21, 14, 11, 2),
(22, 14, 13, 1),
(23, 14, 4, 6),
(26, 17, 11, 1),
(27, 18, 11, 1),
(31, 24, 11, 1),
(32, 25, 11, 1),
(33, 26, 14, 1),
(34, 26, 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `chuyenmuc`
--

CREATE TABLE `chuyenmuc` (
  `MaChuyenMuc` int(11) NOT NULL,
  `TenChuyenMuc` varchar(500) NOT NULL,
  `DuongDan` text NOT NULL,
  `HinhAnh` text NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chuyenmuc`
--

INSERT INTO `chuyenmuc` (`MaChuyenMuc`, `TenChuyenMuc`, `DuongDan`, `HinhAnh`, `TrangThai`) VALUES
(1, 'Thiết bị lưu trữ', 'thiet-bi-luu-tru', 'http://localhost/webshop/uploads/tim-hieu-ve-o-cung-ssd-va-hdd-3.jpg', 1),
(2, ' CPU - Mainboard - VGA', 'cpu-mainboard-vga', 'http://localhost/webshop/uploads/mainboard-msi-x670e-gaming-plus-wifi-ddr5-4_8176196d83604635b791b19a0ac22f88_large.png', 1),
(3, 'Màn Hình Máy Tính', 'man-hinh-may-tinh', 'http://localhost/webshop/uploads/man-hinh-may-tinh-redmi-rmmnt215nf__3_.jpg', 1),
(4, 'Case - Tản - Nguồn', 'case-tan-nguon', 'http://localhost/webshop/uploads/tan-nhiet-pc-2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `giaodien`
--

CREATE TABLE `giaodien` (
  `MaGiaoDien` int(11) NOT NULL,
  `MaChuyenMuc` int(11) NOT NULL,
  `HinhAnh` text NOT NULL,
  `LoaiGiaoDien` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giaodien`
--

INSERT INTO `giaodien` (`MaGiaoDien`, `MaChuyenMuc`, `HinhAnh`, `LoaiGiaoDien`, `TrangThai`) VALUES
(1, 2, 'http://localhost/webshop/uploads/463444171_1087446530050969_6710249304565684775_n.jpg', 1, 1),
(2, 2, 'http://localhost/webshop/uploads/Sieu-Sale-9_9-Khuyen-mai-Linh-kien-Phu-ken-May-tinh-Laptop-Song-Phuong.jpg', 2, 1),
(3, 2, 'http://localhost/webshop/uploads/banner-may-tinh-vung-tau-1-2.jpg', 4, 1),
(4, 1, 'http://localhost/webshop/uploads/462494604_1079623454166610_888441090265921655_n.jpg', 1, 1),
(5, 2, 'http://localhost/webshop/uploads/banner-may-tinh-vung-tau-1-21.jpg', 1, 1),
(6, 2, 'http://localhost/webshop/uploads/ctkmt5-1920x900.jpg', 3, 1),
(7, 2, 'http://localhost/webshop/uploads/455838145_1615072425890049_7130438528081949197_n.png', 3, 1),
(8, 2, 'http://localhost/webshop/uploads/341629054_786072509311877_8715297716069261317_n1.jpg', 3, 1),
(9, 1, 'http://localhost/webshop/uploads/462703446_1081104570685165_1363878676470806644_n.jpg', 1, 1),
(10, 2, 'http://localhost/webshop/uploads/341629054_786072509311877_8715297716069261317_n.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHoaDon` int(11) NOT NULL,
  `MaKhachHang` int(11) DEFAULT NULL,
  `TongTien` int(11) NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT current_timestamp(),
  `ThanhToan` int(11) NOT NULL,
  `MaGiamGia` int(11) DEFAULT NULL,
  `SoLuong` int(11) NOT NULL,
  `DiaChi` text NOT NULL,
  `TenKhachHang` varchar(255) DEFAULT NULL,
  `SoDienThoai` varchar(11) DEFAULT NULL,
  `MuaTaiQuan` int(11) NOT NULL DEFAULT 0,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHoaDon`, `MaKhachHang`, `TongTien`, `ThoiGian`, `ThanhToan`, `MaGiamGia`, `SoLuong`, `DiaChi`, `TenKhachHang`, `SoDienThoai`, `MuaTaiQuan`, `TrangThai`) VALUES
(7, 1, 54000, '2024-03-25 22:19:10', 1, NULL, 2, 'a, a, ab, ab', NULL, NULL, 0, 3),
(8, 1, 54000, '2024-03-10 18:50:19', 1, 2, 7, '07, Trần Bình, Mai Dịch, Cầu Giấy, Hà Nội', NULL, NULL, 0, 3),
(9, 3, 40000, '2024-03-28 14:15:12', 2, NULL, 1, 'Tầng 2, Tòa ABC, Mai Dịch, Cầu Giấy, Hà Nội', NULL, NULL, 0, 1),
(10, 3, 60000, '2024-03-28 15:45:05', 2, NULL, 3, 'Tầng 2, Tòa ABC, Mai Dịch, Cầu Giấy, Hà Nội', NULL, NULL, 0, 1),
(11, 3, 64000, '2024-03-28 15:56:12', 1, NULL, 3, 'Tầng 2, Tòa ABC, Quận XYZ1, Mai Dịch, Cầu Giấy, Hà Nội', NULL, NULL, 0, 3),
(12, 3, 50000, '2024-04-10 16:39:11', 1, NULL, 2, 'Tầng 2, Tòa ABC, Quận XYZ1, Mai Dịch, Cầu Giấy, Hà Nội', NULL, NULL, 0, 4),
(13, 3, 40000, '2024-04-10 16:43:55', 1, NULL, 1, 'Tầng 2, Tòa ABC, Quận XYZ1, Mai Dịch, Cầu Giấy, Hà Nội', NULL, NULL, 0, 3),
(14, 3, 70000, '2024-04-22 16:03:36', 1, 2, 9, 'Số nhà 7, Tòa ABC, Đường Mai Dịch, Mai Dịch, Cầu Giấy, Hà Nội', NULL, NULL, 0, 0),
(17, 3, 40000, '2024-09-29 14:10:45', 1, NULL, 1, 'Tầng 2 số nhà 3, Ngõ ABC, Đường XYZ, Phường Giảng Võ, Quận Ba Đình, Thành phố Hà Nội', NULL, NULL, 0, 1),
(18, 3, 40000, '2024-09-29 14:27:56', 2, NULL, 1, 'Tầng 2 số nhà 3, Ngõ ABC, Đường XYZ, Phường Phú Diễn, Quận Bắc Từ Liêm, Thành phố Hà Nội', NULL, NULL, 0, 1),
(24, 3, 5000, '2024-09-29 16:48:01', 2, NULL, 1, 'Tầng 2 số nhà 3, Ngõ ABC, Đường XYZ, Xã Duyên Hà, Huyện Thanh Trì, Thành phố Hà Nội', NULL, NULL, 0, 1),
(25, 3, 5000, '2024-09-29 16:49:26', 2, NULL, 1, 'Tầng 2 số nhà 3, Ngõ ABC, Đường XYZ, Phường Tràng Tiền, Quận Hoàn Kiếm, Thành phố Hà Nội', NULL, NULL, 0, 1),
(26, 3, 3000000, '2024-10-18 15:04:55', 0, NULL, 3, 'Tầng 2 số nhà 3, Ngõ ABC, Đường XYZ, Thị trấn Cần Thạnh, Huyện Cần Giờ, Thành phố Hồ Chí Minh', NULL, NULL, 0, 1),
(27, NULL, 0, '2024-12-16 17:21:45', 0, NULL, 0, 'Tầng 2 số nhà 3, Ngõ ABC, Đường XYZ', 'Nguyen Van G', '0379962045', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKhachHang` int(11) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `TaiKhoan` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `SoDienThoai` varchar(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `DiaChi` text NOT NULL,
  `NgayThamGia` datetime NOT NULL DEFAULT current_timestamp(),
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `HoTen`, `TaiKhoan`, `MatKhau`, `SoDienThoai`, `Email`, `DiaChi`, `NgayThamGia`, `TrangThai`) VALUES
(1, 'Nguyễn Văn Tâm', 'test', '21232f297a57a5a743894a0e4a801fc3', '0999888999', 'nguyenvantest@gmail.com', 'Hà Nội', '2024-03-05 18:35:52', 1),
(2, 'Nguyễn Văn Bình', 'nguyenvanb', '21232f297a57a5a743894a0e4a801fc3', '0999888999', 'nguyenvanb@gmail.com', 'Hà Nội', '2024-03-05 20:40:51', 1),
(3, 'Nguyễn Tiến Hoàn', 'nguyentienhoan', '206dcce3f82cf8981d316e7900dc8e06', '0379962045', 'chuminhnamma@gmail.com', 'Tầng 2, Tòa ABC, Quận XYZ1', '2024-03-21 15:56:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lichsunhap`
--

CREATE TABLE `lichsunhap` (
  `MaLichSuNhap` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `MaNhanVien` int(11) NOT NULL,
  `SoLuongCu` int(11) NOT NULL,
  `SoLuongMoi` int(11) NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lichsunhap`
--

INSERT INTO `lichsunhap` (`MaLichSuNhap`, `MaSanPham`, `MaNhanVien`, `SoLuongCu`, `SoLuongMoi`, `ThoiGian`) VALUES
(1, 5, 1, 0, 5, '2024-03-07 16:40:32'),
(2, 5, 1, 5, 7, '2024-03-07 16:40:38'),
(3, 11, 1, 0, 15, '2024-03-12 22:10:38'),
(4, 9, 1, 0, 20, '2024-03-12 22:11:03'),
(5, 13, 1, -2, 3, '2024-03-21 00:10:26'),
(6, 12, 1, -2, 3, '2024-03-21 00:10:31'),
(7, 13, 1, 4, 9, '2024-04-22 15:52:06'),
(8, 14, 1, 0, 150, '2024-10-18 01:20:59');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `MaLienHe` int(11) NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  `TieuDe` text NOT NULL,
  `NoiDung` text NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`MaLienHe`, `MaKhachHang`, `TieuDe`, `NoiDung`, `ThoiGian`) VALUES
(1, 1, 'Đây là liên hệ mẫu', 'Abcde', '2024-03-05 18:36:18'),
(2, 3, 'Liên hệ mẫu', 'Đây là liên hệ mẫu', '2024-03-11 16:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `magiamgia`
--

CREATE TABLE `magiamgia` (
  `MaGiamGia` int(11) NOT NULL,
  `Code` varchar(255) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DaSuDung` int(11) NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT current_timestamp(),
  `GiaTriGiam` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `magiamgia`
--

INSERT INTO `magiamgia` (`MaGiamGia`, `Code`, `SoLuong`, `DaSuDung`, `ThoiGian`, `GiaTriGiam`, `TrangThai`) VALUES
(1, 'NAMDEPTRAI', 20, 9, '2024-03-13 00:00:00', 10000, 1),
(2, 'KHACHHANGMOI', 50, 5, '2024-04-25 00:00:00', 20000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` int(11) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `TaiKhoan` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `SoDienThoai` varchar(11) NOT NULL,
  `PhanQuyen` int(11) NOT NULL DEFAULT 0,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNhanVien`, `HoTen`, `TaiKhoan`, `MatKhau`, `Email`, `SoDienThoai`, `PhanQuyen`, `TrangThai`) VALUES
(1, 'Nguyễn Văn An', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin@gmail.com', '0888999888', 1, 1),
(2, 'Nguyễn Văn Trí', 'nguyenvanb', '23280a0ad9238d00c62b0272af265c57', 'bdtcloner1@gmail.com', '0999666999', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(500) NOT NULL,
  `DuongDan` text NOT NULL,
  `GiaGoc` int(11) NOT NULL,
  `GiaBan` int(11) NOT NULL,
  `LoaiSanPham` int(11) NOT NULL DEFAULT 1,
  `AnhChinh` text NOT NULL,
  `HinhAnh` text NOT NULL,
  `MoTaNgan` text NOT NULL,
  `MoTaDai` text NOT NULL,
  `MaChuyenMuc` int(11) NOT NULL,
  `The` text NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `DuongDan`, `GiaGoc`, `GiaBan`, `LoaiSanPham`, `AnhChinh`, `HinhAnh`, `MoTaNgan`, `MoTaDai`, `MaChuyenMuc`, `The`, `SoLuong`, `TrangThai`) VALUES
(3, 'Sản phẩm mẫu 1', 'san-pham-1', 15000, 10000, 1, 'http://localhost/webshop/uploads/0-02-06-a34e8d83e2a099153c1b46471f9c4c82f215479deb14a7108d83acbe062c9fbe_ccc2fc1010bf2933.jpg', 'http://localhost/webshop/uploads/z4617362741623_98c0302df70bfe02dd581fa8a0e35aa611.jpg#http://localhost/webshop/uploads/z4617362745335_4456bfd0f397a69bb165e385ba8916cb3.jpg#http://localhost/webshop/uploads/z4617362764788_9dae16f7c421e020eeb4418f62eeb52e10.jpg#http://localhost/webshop/uploads/z4617362804277_275c9f23eb1124b7f6a8496671f60b2519.jpg#http://localhost/webshop/uploads/z4617362817818_39cacdb57658e537cb0e22dc18e885d830.jpg', '<p><strong>Thú bông voi con màu xám</strong> có thiết kế ngộ nghĩnh, dễ thương, sử dụng chất liệu bông an toàn cho sức khỏe của bé. Bề mặt vải bên ngoài mềm mại, không xổ lông, không gây ảnh hưởng tới hệ hô hấp của trẻ khi tiếp xúc gần, giúp ba mẹ an tâm khi con vui đùa.</p>', '<p><strong>Thú bông voi con màu xám</strong> có thiết kế ngộ nghĩnh, dễ thương, sử dụng chất liệu bông an toàn cho sức khỏe của bé. Bề mặt vải bên ngoài mềm mại, không xổ lông, không gây ảnh hưởng tới hệ hô hấp của trẻ khi tiếp xúc gần, giúp ba mẹ an tâm khi con vui đùa.</p><figure class=\"image\"><img style=\"aspect-ratio:450/450;\" src=\"https://media.bibomart.com.vn/media/wysiwyg/2021/2022/0-02-06-a34e8d83e2a099153c1b46471f9c4c82f215479deb14a7108d83acbe062c9fbe_ccc2fc1010bf2933.jpg\" alt=\"thu-bong-voi-con-mau-xam\" width=\"450\" height=\"450\"></figure><p><i>Thú bông voi con màu xám</i></p><h3><strong>Đặc điểm nổi bật của sản phẩm</strong></h3><p>- Thú bông voi con màu xám sử dụng chất liệu bông êm ái, đàn hồi tốt và lớp vải ngoài mềm mại, không gây ngứa da, kích ứng cho bé khi tiếp xúc.</p><p>- Sản phẩm có tông màu xám trầm chủ đạo và thiết kế ngộ nghĩnh với chiếc vòi dài đặc trưng của voi con, kích thích trí tò mò của bé về thế giới động vật xung quanh.</p><p>- Ba mẹ có thể dành tặng thú bông cho bé như một món quà nhỏ hoặc sử dụng để trang trí cho căn phòng ngủ của con yêu.</p>', 1, 'sản phẩm, abc, def', 32, 0),
(4, 'Sản phẩm mẫu 2', 'mau-hai', 19000, 10000, 3, 'http://localhost/webshop/uploads/z4617362764788_9dae16f7c421e020eeb4418f62eeb52e.jpg', 'http://localhost/webshop/uploads/z4617362764788_9dae16f7c421e020eeb4418f62eeb52e.jpg', '<p>Mô tả ngắn</p>', '<p>abcde</p>', 1, 'abc,def', 30, 1),
(5, 'Màn hình MSI PRO MP251 E2 (24.5 inch/FHD/IPS/120Hz/1ms/Loa)', 'man-hinh-msi-pro-mp251-e2-245-inchfhdips120hz1msloa', 6000000, 5500000, 3, 'http://localhost/webshop/uploads/85408_man_hinh_msi_pro_mp251_e2_1.jpg', 'http://localhost/webshop/uploads/85408_man_hinh_msi_pro_mp251_e2_11.jpg#http://localhost/webshop/uploads/85408_man_hinh_msi_pro_mp251_e2_2.jpg#http://localhost/webshop/uploads/85408_man_hinh_msi_pro_mp251_e2_4.jpg#http://localhost/webshop/uploads/85408_man_hinh_msi_pro_mp251_e2_5.jpg', '<p><strong>Màn hình MSI PRO MP251 E2 là một màn hình văn phòng đa phương tiện cao cấp.</strong></p><p><a href=\"https://hacom.vn/man-hinh-msi-pro-mp251-e2-24.5-inch-fhd-ips-120hz-1ms-loa\">Màn hình MSI PRO MP251 E2</a>&nbsp; được thiết kế dành riêng cho đối tượng trẻ với nhu cầu làm việc chuyên nghiệp, màn hình văn phòng tại nhà PerfectEdge 120Hz kết hợp thiết kế hiện đại và hiệu suất cao. Cho dù bạn hoàn thành các công việc văn phòng hàng ngày hay đắm mình trong trải nghiệm chơi game sống động, màn hình này sẽ mang lại trải nghiệm hình ảnh mang tính đột phá và dễ sử dụng.</p>', '<h3><strong>Màn hình MSI PRO MP251 E2 là một màn hình văn phòng đa phương tiện cao cấp.</strong></h3><p><a href=\"https://hacom.vn/man-hinh-msi-pro-mp251-e2-24.5-inch-fhd-ips-120hz-1ms-loa\">Màn hình MSI PRO MP251 E2</a>&nbsp; được thiết kế dành riêng cho đối tượng trẻ với nhu cầu làm việc chuyên nghiệp, màn hình văn phòng tại nhà PerfectEdge 120Hz kết hợp thiết kế hiện đại và hiệu suất cao. Cho dù bạn hoàn thành các công việc văn phòng hàng ngày hay đắm mình trong trải nghiệm chơi game sống động, màn hình này sẽ mang lại trải nghiệm hình ảnh mang tính đột phá và dễ sử dụng.</p><figure class=\"image\"><img style=\"aspect-ratio:1020/570;\" src=\"https://hanoicomputercdn.com/media/lib/15-08-2024/vi-vn-msi-pro-mp251-24-5-inch-fhd-slider-2a.jpg\" width=\"1020\" height=\"570\"></figure><h3><strong>Kiểu dáng thiết kế</strong></h3><p>Lấy cảm hứng từ thế hệ trẻ theo đuổi sự đơn giản và hiệu quả, mặt sau của màn hình có hoa văn được chạm khắc tinh xảo. Thiết kế tinh tế này tượng trưng cho hiệu năng bất tận, khiến nó trở thành người bạn đồng hành hoàn hảo cho các bạn trẻ làm việc chuyên nghiệp.</p><figure class=\"image\"><img style=\"aspect-ratio:1020/570;\" src=\"https://hanoicomputercdn.com/media/lib/15-08-2024/vi-vn-msi-pro-mp251-24-5-inch-fhd-slider-2.jpg\" width=\"1020\" height=\"570\"></figure><p>Màn hình MSI PRO có trọng lượng 2.7 kg cùng kích thước rộng 55.7 cm, cao 42.1 cm. Dù chân đế được cấu thành từ nhựa nhưng vẫn tỏ rõ sự cứng cáp thiết kế gọn nhẹ, mang đến sự di động cho phép bạn di chuyển đến bất kỳ vị trí nào trên bàn làm việc hay bàn học một cách dễ dàng.</p><figure class=\"image\"><img style=\"aspect-ratio:1020/570;\" src=\"https://hanoicomputercdn.com/media/lib/07-06-2024/vi-vn-msi-pro-mp251-24-5-inch-fhd-slider-3.jpg\" width=\"1020\" height=\"570\"></figure><p>Thiết tương thích khung đạt chuẩn VESA cho phép bạn có thể gắn PC mini Cubi ở mặt sau hoặc trên tường để giữ cho không gian làm việc của bạn gọn gàng và ngăn nắp. MSI Power Link với HDMI™ CEC cho phép bạn khởi động nguồn cho chiếc PC mini của mình bằng một nút bấm trên màn hình, nâng cao hiệu quả và trải nghiệm cho người dùng.</p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/15-08-2024/power-link-main.jpg\" width=\"1024\"></figure><h3><strong>Hình ảnh chân thực, sắc nét</strong></h3><p>Kích thước màn hình rộng 24.5 inch cùng độ phân giải Full HD (1920 x 1080) sắc nét. Hỗ trợ 16.7 triệu màu giúp màu sắc của hình ảnh tái tạo lại một cách chân thực. Góc nhìn rộng 178 độ dọc và 178 độ ngang nhờ vào tấm nền IPS, cho phép hình ảnh hiển thị rõ nét, chân thật ở mọi góc nhìn.&nbsp;</p><figure class=\"image\"><img style=\"aspect-ratio:1020/570;\" src=\"https://hanoicomputercdn.com/media/lib/07-06-2024/vi-vn-msi-pro-mp251-24-5-inch-fhd-slider-4.jpg\" width=\"1020\" height=\"570\"></figure><h3><strong>Tần số quét cao 120Hz</strong></h3><p>Tốc độ quét lên tới 120Hz đảm bảo hình ảnh mượt mà hơn, giảm hiện tượng nhòe khi chuyển động và cải thiện khả năng phản hồi khi chơi game. Ngay cả trong lúc bạn làm việc, màn hình sẽ cuộn và chuyển tiếp mượt mà, tăng sự thoải mái và hiệu quả. Ngoài ra, màn hình cũng đáp ứng hoàn hảo với AIGC (Artificial Intelligence Generated Content - Nội dung được tạo bằng trí tuệ nhân tạo) cũng như hình ảnh và văn bản do AI điều khiển, cải thiện hơn nữa quy trình làm việc sáng tạo và biến nó thành một công cụ linh hoạt cho các bạn trẻ ưa thích sự hiện đại và chuyên nghiệp.</p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/15-08-2024/refresh-rate-main.jpg\" width=\"1024\"></figure><h3><strong>Công nghệ bảo vệ mắt</strong></h3><p>Công nghệ<strong>&nbsp;Lọc ánh sáng xanh&nbsp;</strong>làm giảm các thành phần ánh sáng màu xanh phát ra từ màn hình, bảo vệ thị lực của bạn trước những luồng&nbsp;ánh sáng mạnh đồng thời làm giảm tình trạng mệt mỏi hay khô mắt khi phải làm việc quá lâu với màn hình&nbsp;máy tính.</p><figure class=\"image\"><img style=\"aspect-ratio:1020/570;\" src=\"https://hanoicomputercdn.com/media/lib/07-06-2024/vi-vn-msi-pro-mp251-24-5-inch-fhd-slider-6.jpg\" width=\"1020\" height=\"570\"></figure><h3><strong>Kết nối tối giản</strong></h3><p>Hỗ trợ các kết nối đa dạng bao gồm&nbsp; DisplayPort, HDMI, VGA và cổng âm thanh 3.5mm. Với những tính năng và thiết kế tiện dụng, màn hình MSI PRO MP251 E2 là một lựa chọn tốt cho những người sử dụng cần một sản phẩm màn hình chất lượng với mức giá phải chăng.</p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/15-08-2024/io1.jpg\" width=\"1200\"></figure><p><br>&nbsp;</p>', 3, 'màn hình, màn hình MSI, màn hình 24 in', 7, 1),
(6, 'Nguồn  ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)', 'nguon-asus-rog-thor-1600t-gaming-titanium-1600w-mau-den80-plus-titanium-full-modular', 8250000, 7900000, 3, 'http://localhost/webshop/uploads/66952_rog_thor_1600t_02__2_.jpg', 'http://localhost/webshop/uploads/66952_rog_thor_1600t_01.jpg#http://localhost/webshop/uploads/66952_rog_thor_1600t_02__2_1.jpg#http://localhost/webshop/uploads/66952_rog_thor_1600t_02__3_.jpg#http://localhost/webshop/uploads/66952_rog_thor_1600t_02__4_.jpg', '<p>Công suất 1600w</p><p>Chứng nhận hiệu chuẩn 80 Plus Titanium</p><p>Hiển thị OLED thông minh thông báo điện năng tiêu thụ</p><p>Khả năng đồng bộ led AURA SYNC</p>', '<h3><strong>Nguồn&nbsp;&nbsp;ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/28-07-2022/rog-thor-1600w-ti--images-01.jpg\" alt=\"Nguồn  ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)\" width=\"100%\"></figure><h3><strong>Nguồn&nbsp;&nbsp;ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/28-07-2022/rog-thor-1600w-ti--images-02.jpg\" alt=\"Nguồn  ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)\" width=\"100%\"></figure><h3><strong>Nguồn&nbsp;&nbsp;ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/28-07-2022/rog-thor-1600w-ti--images-03.jpg\" alt=\"Nguồn&nbsp;&nbsp;ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)\" width=\"100%\"></figure><h3><strong>Nguồn&nbsp;&nbsp;ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/28-07-2022/rog-thor-1600w-ti--images-04.jpg\" alt=\"Nguồn&nbsp;&nbsp;ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)\" width=\"100%\"></figure><h3><strong>Nguồn&nbsp;&nbsp;ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/28-07-2022/rog-thor-1600w-ti--images-05.jpg\" alt=\"Nguồn&nbsp;&nbsp;ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)\" width=\"100%\"></figure><h3><strong>Nguồn&nbsp;&nbsp;ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/28-07-2022/rog-thor-1600w-ti--images-06.jpg\" alt=\"Nguồn&nbsp;&nbsp;ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)\" width=\"100%\"></figure>', 4, 'nguồn, asus rog thor, nguồn 1600w', 0, 1),
(7, 'Fan CPU Noctua NH-D15', 'fan-cpu-noctua-nh-d15', 4000000, 3900000, 1, 'http://localhost/webshop/uploads/47785_fan_cpu_noctua_nh_d15_0000_1__1_.jpg', 'http://localhost/webshop/uploads/47785_fan_cpu_noctua_nh_d15_0000_1__1_1.jpg#http://localhost/webshop/uploads/47785_fan_cpu_noctua_nh_d15_0007_1__3_.jpg', '<p>Hỗ trợ Socket LGA1700</p><p>Mẫu tản nhiệt khí đến từ thương hiệu nổi tiếng Noctua</p><p>Hiệu năng tản nhiệt thuộc top đầu các tản nhiệt khí trên thị trường</p><p>Thiết kế dạng tháp đôi với 2 quạt chất lượng cao</p>', '<p><strong>Fan CPU Noctua NH-D15</strong> là một trong những sản phẩm tản nhiệt khí dành cho CPU với hiệu năng vượt trội đến từ thương hiệu nổi tiếng <a href=\"https://hacom.vn/tim?q=t%E1%BA%A3n+nhi%E1%BB%87t+kh%C3%AD&amp;scat_id=327&amp;brand=noctua\"><strong>NOCTUA</strong></a><strong> </strong>đang được bán tại <strong>HACOM</strong></p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/product/47785_fanc663_001.JPG\" alt=\"Fan CPU Noctua NH-D15\" width=\"100%\"></figure><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/47785_NoctuaD15.jpg\" alt=\"Ảnh thực tế Fan CPU Noctua NH-D15 2\" width=\"100%\"></figure><h3><strong>Fan CPU Noctua NH-D15</strong></h3><p>Được xây dựng trên cơ sở của mẫu tản nhiệt NH-D14 huyền thoại và thực hiện nhiệm vụ cho hiệu suất làm mát kèm độ yên tĩnh tối đa, mẫu flagship Noctua NH-D15 là sản phẩm tản nhiệt tháp đôi có hiệu năng tốt nhất trên thị trường hiện nay.</p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/product/47785_fanc663_003.JPG\" alt=\"CPU Noctua NH - D15\" width=\"100%\"></figure><h3><strong>Fan CPU Noctua NH-D15</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/28-06-2022/nh-d15-1.jpg\" alt=\"Fan CPU Noctua NH-D15\" width=\"100%\"></figure><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/28-06-2022/nh-d15-4.jpg\" alt=\"Fan CPU Noctua NH-D15\" width=\"100%\"></figure>', 2, 'tản nhiệt, cpu, tản nhiệt khí', 0, 1),
(8, 'Màn hình Gaming LG 27GR75Q-B (27 inch/QHD/IPS/165Hz/1ms)', 'man-hinh-gaming-lg-27gr75q-b-27-inchqhdips165hz1ms', 4500000, 3900000, 1, 'http://localhost/webshop/uploads/76709_man_hinh_gaming_lg_27gr75q_b_850x850_3.jpg', 'http://localhost/webshop/uploads/76709_man_hinh_gaming_lg_27gr75q_b_850x850_1.jpg#http://localhost/webshop/uploads/76709_man_hinh_gaming_lg_27gr75q_b_850x850_31.jpg#http://localhost/webshop/uploads/76709_man_hinh_gaming_lg_27gr75q_b_850x850_5.jpg#http://localhost/webshop/uploads/76709_man_hinh_gaming_lg_27gr75q_b_850x850_6.jpg', '<p><a href=\"https://hacom.vn/man-hinh-gaming-lg-27gr75q-b-27-inch-qhd-ips-165hz-1ms\">Màn hình LG 27GR75Q</a> không quá hầm hố với đa số các đối thủ trong cùng phân khúc. Màn hình gaming có độ phân giải cao 2K cùng nhiều công nghệ đi kèm. Góc nhìn cực rộng lên tới 178 độ cho phép trải nghiệm chơi game cùng bạn bè luôn trọn vẹn. Đây là một trong những chiếc màn hình gaming tầm trung xứng đáng có trong góc giải trí hàng ngày của game thủ.</p><p>Không những hỗ trợ cho các tác vụ giải trí, độ phủ màu của màn khá rộng, hỗ trợ phần nào đấy cho các tác vụ sáng tạo nội dung. Hình ảnh màn hình luôn được đồng bộ hóa trong suốt quá trình sử dụng, tương thích với hai dòng card AMD và Nvidia. Bên cạnh đó, tần số quét cao với độ trễ tín hiệu thấp giúp màn bắt kịp tốc độ chuyển động của hình ảnh.</p>', '<h3><strong>Màn hình GAMING LG 27GR75Q trang bị nhiều tính năng cao cấp với mức giá hợp lý trong phân khúc tầm trung.</strong></h3><p><a href=\"https://hacom.vn/man-hinh-gaming-lg-27gr75q-b-27-inch-qhd-ips-165hz-1ms\">Màn hình LG 27GR75Q</a> không quá hầm hố với đa số các đối thủ trong cùng phân khúc. Màn hình gaming có độ phân giải cao 2K cùng nhiều công nghệ đi kèm. Góc nhìn cực rộng lên tới 178 độ cho phép trải nghiệm chơi game cùng bạn bè luôn trọn vẹn. Đây là một trong những chiếc màn hình gaming tầm trung xứng đáng có trong góc giải trí hàng ngày của game thủ.</p><p>Không những hỗ trợ cho các tác vụ giải trí, độ phủ màu của màn khá rộng, hỗ trợ phần nào đấy cho các tác vụ sáng tạo nội dung. Hình ảnh màn hình luôn được đồng bộ hóa trong suốt quá trình sử dụng, tương thích với hai dòng card AMD và Nvidia. Bên cạnh đó, tần số quét cao với độ trễ tín hiệu thấp giúp màn bắt kịp tốc độ chuyển động của hình ảnh.</p><figure class=\"image\"><img style=\"aspect-ratio:900/824;\" src=\"https://hanoicomputercdn.com/media/lib/09-04-2024/man-hinh-gaming-lg-27gr75q-b-mo-ta-1a.jpg\" width=\"900\" height=\"824\"></figure><h3><strong>&nbsp;LG 27GR75Q được thiết kế linh hoạt, dành cho game thủ</strong></h3><p>Trọng lượng tổng thể của màn là 6,19 kg cùng kích thước rộng 61,3 cm. Độ cao tùy chỉnh từ 45,9 đến 56,9 cm. Phần chân đế tạo hình chữ V tạo thế vững chắc đỡ toàn bộ màn hình ở phía trên.</p><figure class=\"image\"><img style=\"aspect-ratio:900/624;\" src=\"https://hanoicomputercdn.com/media/lib/09-04-2024/man-hinh-gaming-lg-27gr75q-b-mo-ta-2.jpg\" width=\"900\" height=\"624\"></figure><p>Chân đế được chế tạo linh hoạt tùy chỉnh nâng hạ, xoay dọc mang tới cảm giác trải nghiệm trọn vẹn. Màn hỗ trợ ngàm<a href=\"https://hacom.vn/gia-treo-man-hinh\">&nbsp;treo màn hình</a>&nbsp;tiêu chuẩn VESA 100x100mm, giúp màn hình linh hoạt trong việc tối ưu không gian sử dụng.</p><h3><strong>LG 27GR75Q-B sở hữu nội dung chân thực đến từng chi tiết</strong></h3><p>Độ bao phủ màu đạt sRGB 99%. Màu sắc hiển thị có độ chân thực cao để tái tạo bằng HDR10, giúp người chơi đắm chìm trong hình ảnh sống động. Game thủ có thể thấy những màu sắc đầy kịch tính theo ý định của nhà phát triển game dù ở bất cứ chiến trường nào.</p><figure class=\"image\"><img style=\"aspect-ratio:900/450;\" src=\"https://hanoicomputercdn.com/media/lib/10-04-2024/man-hinh-gaming-lg-27gr75q-b-mo-ta-3.jpg\" width=\"900\" height=\"450\"></figure><h3><strong>Công nghệ đồng bộ hình ảnh trên LG 27GR75Q-B</strong></h3><p>Màn hình đạt tương thích G-SYNC® đã được NVIDIA kiểm định và chứng nhận chính thức, hứa hẹn mang đến&nbsp; trải nghiệm chơi game tuyệt vời với khả năng hạn chế đáng kể hiện tượng xé hoặc giật hình. Ngoài ra, công nghệ FreeSync™ Premium, game thủ sẽ được trải nghiệm chuyển động liền mạch mượt mà trong những trò chơi có độ phân giải cao và nhịp độ nhanh. Công nghệ này giúp giảm đáng kể hiện tượng xé hoặc giật hình.</p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/10-10-2023/ultragear-32gr93u-07-1-gaming-technology-d.jpg\" alt=\"Màn hình Gaming LG 27GR75Q-B có công nghệ đồng bộ hình ảnh\" width=\"900\"></figure><h3><strong>LG 27GR75Q-B có kết nối thuận tiện</strong></h3><p>Cổng DisplayPort 1.4 và HDMI 2.0 trên LG 27GR75Q-B cho phép hiển thị tối đa độ phân giải cùng tần số quét cao. Cổng audio 3.5mm có thể kết nối với các thiết bị âm thanh ngoại vi như loa, tai nghe thuận tiện hơn.</p><figure class=\"image\"><img style=\"aspect-ratio:900/506;\" src=\"https://hanoicomputercdn.com/media/lib/10-04-2024/man-hinh-gaming-lg-27gr75q-b-mo-ta-4.jpg\" width=\"900\" height=\"506\"></figure>', 3, 'màn hình. LG 27 in, màn hình led', 0, 1),
(9, 'Ổ cứng HDD Seagate IronWolf 10TB 3.5 inch, 7200RPM ,SATA3, 256MB Cache (ST10000VN000)', 'o-cung-hdd-seagate-ironwolf-10tb-3.5-inch-7200rpm-sata3-256mb-cache-st10000vn000', 8000000, 7800000, 1, 'http://localhost/webshop/uploads/65339_o_cung_hdd_seagate_ironwolf_10tb_3_5_inch_st10000vn000__1_.jpg', 'http://localhost/webshop/uploads/65339_o_cung_hdd_seagate_ironwolf_10tb_3_5_inch_st10000vn000__1_1.jpg#http://localhost/webshop/uploads/65339_o_cung_hdd_seagate_ironwolf_10tb_3_5_inch_st10000vn000__2_.jpg#http://localhost/webshop/uploads/65339_o_cung_hdd_seagate_ironwolf_10tb_3_5_inch_st10000vn000__3_.jpg#http://localhost/webshop/uploads/65339_o_cung_hdd_seagate_ironwolf_10tb_3_5_inch_st10000vn000_s.jpg', '<p>Dòng sản phẩm <strong>HDD Seagate IronWolf&nbsp; </strong>là một lựa chọn tuyệt vời cho việc nâng cấp các ổ cứng lưu trữ mạng(<strong>NAS</strong>).&nbsp;<strong>Seagate IronWolf&nbsp; </strong>kết hợp công nghệ flash NAND mới nhất&nbsp;với ổ cứng truyền thống&nbsp;cho hiệu năng và độ bền bỉ&nbsp;khi thực hiện tải công việc nặng nề.</p>', '<h3><strong>Tính năng nổi bật của sản phẩm</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/35237_22_03.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"100%\"></figure><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/35237_22_02.jpg\" alt=\"Ổ cứng HDD Seagate IRONWOLF 2TB\" width=\"100%\"></figure><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/35237_22_04.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"100%\"></figure><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>Dòng sản phẩm <strong>HDD Seagate IronWolf&nbsp; </strong>là một lựa chọn tuyệt vời cho việc nâng cấp các ổ cứng lưu trữ mạng(<strong>NAS</strong>).&nbsp;<strong>Seagate IronWolf&nbsp; </strong>kết hợp công nghệ flash NAND mới nhất&nbsp;với ổ cứng truyền thống&nbsp;cho hiệu năng và độ bền bỉ&nbsp;khi thực hiện tải công việc nặng nề.</p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/04-07-2022/o-cung-hdd-seagate-ironwolf-pro-mota6.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"100%\"></figure><p><strong>Seagate IronWolf trang bị công nghệ AgileArray</strong></p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/04-07-2022/o-cung-hdd-seagate-ironwolf-pro-mota1.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"100%\"></figure><ul><li>&nbsp;Ổ cứng HDD Seagate IronWolf&nbsp; được trang bị công nghệ AgileArray giúp tối ưu hóa hệ thống NAS, trong đó có 3 tính năng chính là cân bằng ổ đĩa, phục hồi lỗi RAID và quản lý nguồn điện.</li><li>&nbsp;Công nghệ tiên tiến AgileArray tích hợp cảm biến cân bằng giúp ổ cứng nhận biết sự rung động của hệ thống NAS và điều chỉnh để hạn chế việc phát sinh lỗi đọc/ghi dữ liệu.</li></ul><p>Ngoài ra, việc tối ưu hệ thống RAID còn nhờ vào khả năng phục hồi lỗi, tăng hiệu suất và giúp đảm bảo tính nguyên vẹn của dữ liệu.</p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/04-07-2022/o-cung-hdd-seagate-ironwolf-pro-mota4.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"100%\"></figure><p>&nbsp;</p><p><br>Phần mềm tích hợp Health Management IronWolf giúp bảo vệ hệ thống lưu trữ NAS của bạn bằng việc phòng ngừa,can thiệp và phục hồi dữ liệu.</p><p>Dòng ổ cứng IronWolf Pro của Seagate được thiết kế nhằm phục vụ cho các hệ thống lưu trữ mạng NAS dành cho doanh nghiệp vừa và nhỏ cũng như đám mây cá nhân, hướng đến sự bền bỉ, khả năng mở rộng lưu trữ nhanh chóng cũng như môi trường làm việc liên tục.</p><p>Cảm biến quay vòng (RV). Đầu tiên trong lớp của ổ cứng để bao gồm cảm biến RV để duy trì hiệu suất cao trong hệ thống NAS</p><h3><strong>Seagate Rescue Data Recovery</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/04-07-2022/o-cung-hdd-seagate-ironwolf-pro-mota5.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"100%\"></figure><p>&nbsp;</p><p>Ổ cứng HDD Seagate IronWolf hỗ trợ với phầm mềm Phục hồi cứu hộ dữ liệu này tạo nên sự an tâm cho bất kỳ trường hợp nào gây hư hại đến hệ thống lưu trữ dữ liệu NAS với tỷ lệ thành công lên đến 90% trong phục hồi .</p><h3><strong>Ổ cứng Seagate Ironwolf Pro tuổi thọ cao</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/04-07-2022/o-cung-hdd-seagate-ironwolf-pro-mota2.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"100%\"></figure><ul><li>&nbsp;Seagate Ironwolf ổ cứng có tuổi thọ trung bình 1,2 triệu giờ MTBF, thời hạn bảo hành 5 năm .(TCO) trên ổ đĩa máy tính để bàn với chi phí bảo trì giảm.</li><li>&nbsp;Nhiều người dùng có thể tự tin tải lên và tải dữ liệu lên máy chủ NAS, IronWolf có thể xử lý khối lượng công việc, cho dù bạn là một chuyên gia sáng tạo một nhỏ.</li><li>&nbsp;Ổ cứng Seagate Ironwolf được thiết kế để luôn hoạt động trên 24×7 luôn hoạt động.</li></ul>', 1, 'ổ cứng, hdd, ổ cứng 10tb', 18, 1),
(10, 'Ổ cứng HDD Seagate IronWolf 8TB 3.5 inch, 7200RPM, SATA, 256MB Cache (ST8000VN004)', 'o-cung-hdd-seagate-ironwolf-8tb-3.5-inch-7200rpm-sata-256mb-cache-st8000vn004', 4500000, 4300000, 1, 'http://localhost/webshop/uploads/35240_hdd_seagate_ironwolf_nas_8tb_3_5_inch___7200rpm.jpg', 'http://localhost/webshop/uploads/35240_hdd_seagate_ironwolf_nas_8tb_3_5_inch___7200rpm1.jpg#http://localhost/webshop/uploads/35240_o_cung_hdd_seagate_ironwolf_8tb_3_5_inch_7200rpm_sata3_256mb_cache_st8000vn004_011.jpg#http://localhost/webshop/uploads/35240_o_cung_hdd_seagate_ironwolf_8tb_3_5_inch_7200rpm_sata3_256mb_cache_st8000vn004_022.jpg#http://localhost/webshop/uploads/35240_o_cung_hdd_seagate_ironwolf_8tb_3_5_inch_7200rpm_sata3_256mb_cache_st8000vn004_033.jpg', '<p>Ổ cứng HDD Seagate IronWolf&nbsp; được trang bị công nghệ AgileArray giúp tối ưu hóa hệ thống NAS, trong đó có 3 tính năng chính là cân bằng ổ đĩa, phục hồi lỗi RAID và quản lý nguồn điện.</p><p>Công nghệ tiên tiến AgileArray tích hợp cảm biến cân bằng giúp ổ cứng nhận biết sự rung động của hệ thống NAS và điều chỉnh để hạn chế việc phát sinh lỗi đọc/ghi dữ liệu.</p>', '<h3><strong>Tính năng nổi bật của sản phẩm</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/35237_22_03.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"800\"></figure><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/35237_22_02.jpg\" alt=\"Ổ cứng HDD Seagate IRONWOLF 2TB\" width=\"800\"></figure><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/35237_22_04.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"100%\"></figure><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>Dòng sản phẩm <strong>HDD Seagate IronWolf&nbsp; </strong>là một lựa chọn tuyệt vời cho việc nâng cấp các ổ cứng lưu trữ mạng(<strong>NAS</strong>).&nbsp;<strong>Seagate IronWolf&nbsp; </strong>kết hợp công nghệ flash NAND mới nhất&nbsp;với ổ cứng truyền thống&nbsp;cho hiệu năng và độ bền bỉ&nbsp;khi thực hiện tải công việc nặng nề.</p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/04-07-2022/o-cung-hdd-seagate-ironwolf-pro-mota6.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"800\"></figure><p><strong>Seagate IronWolf trang bị công nghệ AgileArray</strong></p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/04-07-2022/o-cung-hdd-seagate-ironwolf-pro-mota1.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"800\"></figure><ul><li>&nbsp;Ổ cứng HDD Seagate IronWolf&nbsp; được trang bị công nghệ AgileArray giúp tối ưu hóa hệ thống NAS, trong đó có 3 tính năng chính là cân bằng ổ đĩa, phục hồi lỗi RAID và quản lý nguồn điện.</li><li>&nbsp;Công nghệ tiên tiến AgileArray tích hợp cảm biến cân bằng giúp ổ cứng nhận biết sự rung động của hệ thống NAS và điều chỉnh để hạn chế việc phát sinh lỗi đọc/ghi dữ liệu.</li></ul><p>Ngoài ra, việc tối ưu hệ thống RAID còn nhờ vào khả năng phục hồi lỗi, tăng hiệu suất và giúp đảm bảo tính nguyên vẹn của dữ liệu.</p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/04-07-2022/o-cung-hdd-seagate-ironwolf-pro-mota4.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"800\"></figure><p>&nbsp;</p><p><br>Phần mềm tích hợp Health Management IronWolf giúp bảo vệ hệ thống lưu trữ NAS của bạn bằng việc phòng ngừa,can thiệp và phục hồi dữ liệu.</p><p>Dòng ổ cứng IronWolf Pro của Seagate được thiết kế nhằm phục vụ cho các hệ thống lưu trữ mạng NAS dành cho doanh nghiệp vừa và nhỏ cũng như đám mây cá nhân, hướng đến sự bền bỉ, khả năng mở rộng lưu trữ nhanh chóng cũng như môi trường làm việc liên tục.</p><p>Cảm biến quay vòng (RV). Đầu tiên trong lớp của ổ cứng để bao gồm cảm biến RV để duy trì hiệu suất cao trong hệ thống NAS</p><h3><strong>Seagate Rescue Data Recovery</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/04-07-2022/o-cung-hdd-seagate-ironwolf-pro-mota5.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"800\"></figure><p>&nbsp;</p><p>Ổ cứng HDD Seagate IronWolf hỗ trợ với phầm mềm Phục hồi cứu hộ dữ liệu này tạo nên sự an tâm cho bất kỳ trường hợp nào gây hư hại đến hệ thống lưu trữ dữ liệu NAS với tỷ lệ thành công lên đến 90% trong phục hồi .</p><h3><strong>Ổ cứng Seagate Ironwolf Pro tuổi thọ cao</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/04-07-2022/o-cung-hdd-seagate-ironwolf-pro-mota2.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"800\"></figure><ul><li>&nbsp;Seagate Ironwolf là <a href=\"https://hacom.vn/o-cung-hdd-desktop\">ổ cứng hdd</a> có tuổi thọ trung bình 1,2 triệu giờ MTBF, thời hạn bảo hành 5 năm .(TCO) trên ổ đĩa máy tính để bàn với chi phí bảo trì giảm.</li><li>&nbsp;Nhiều người dùng có thể tự tin tải lên và tải dữ liệu lên máy chủ NAS, IronWolf có thể xử lý khối lượng công việc, cho dù bạn là một chuyên gia sáng tạo một nhỏ.</li><li>&nbsp;Ổ cứng Seagate Ironwolf được thiết kế để luôn hoạt động trên 24×7 luôn hoạt động.</li></ul><p><a href=\"javascript:void(0)\"><strong>Thu gọn</strong></a></p>', 1, 'ổ cứng, hdd, ổ cứng 8tb', 0, 1),
(11, 'Ram Desktop Adata XPG Spectrix D50 RGB White (AX4U32008G16A-SW50) 8GB (1x8GB) DDR4 3200Mhz', 'ram-desktop-adata-xpg-spectrix-d50-rgb-white-ax4u32008g16a-sw50-8gb-1x8gb-ddr4-3200mhz', 1500000, 900000, 1, 'http://localhost/webshop/uploads/67821_ram_desktop_adata_xpg_spectrix_d50_rgb_white_ax4u32008g16a_sw50_8gb_1x8gb_ddr4_3200mhz__3_.jpg', 'http://localhost/webshop/uploads/67821_ram_desktop_adata_xpg_spectrix_d50_rgb_white_ax4u32008g16a_sw50_8gb_1x8gb_ddr4_3200mhz__1_.jpg#http://localhost/webshop/uploads/67821_ram_desktop_adata_xpg_spectrix_d50_rgb_white_ax4u32008g16a_sw50_8gb_1x8gb_ddr4_3200mhz__2_.jpg#http://localhost/webshop/uploads/67821_ram_desktop_adata_xpg_spectrix_d50_rgb_white_ax4u32008g16a_sw50_8gb_1x8gb_ddr4_3200mhz__3_1.jpg', '<p>Được sản xuất bằng chip và PCB chất lượng cao nhất, <a href=\"https://hacom.vn/ram-ddr4\">Ram Desktop</a> Adata XPG D50 cung cấp độ ổn định, độ tin cậy cao nhất và tốc độ lên đến 4800MHz. Hơn nữa, nó hỗ trợ các nền tảng Intel và AMD mới nhất.</p>', '<h3><strong>Ram DDR4 tốc độ cao</strong></h3><p>Được sản xuất bằng chip và PCB chất lượng cao nhất, <a href=\"https://hacom.vn/ram-ddr4\">Ram Desktop</a> Adata XPG D50 cung cấp độ ổn định, độ tin cậy cao nhất và tốc độ lên đến 4800MHz. Hơn nữa, nó hỗ trợ các nền tảng Intel và AMD mới nhất.</p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/22-09-2022/ram-desktop-adata-xpg-spectrix-d50-rgb-white-ax4u32008g16a-sw50-8gb-1x8gb-ddr4-3200mhz-motaf.jpg\" alt=\"Ram Desktop Adata XPG Spectrix D50 RGB White (AX4U32008G16A-SW50) 8GB (1x8GB) DDR4 3200Mhz \" width=\"100%\"></figure><h3><strong>Thiết kế chắc chắn&nbsp;</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/22-09-2022/ram-desktop-adata-xpg-spectrix-d50-rgb-white-ax4u32008g16a-sw50-8gb-1x8gb-ddr4-3200mhz-mota3.jpg\" alt=\"Ram Desktop Adata XPG Spectrix D50 RGB White (AX4U32008G16A-SW50) 8GB (1x8GB) DDR4 3200Mhz \" width=\"100%\"></figure><p>D50 có một bộ tản nhiệt bằng kim loại dày 1,95mm được cấu tạo vững chắc không chỉ mang lại độ bền tuyệt vời mà còn tạo ra một không khí mạnh mẽ và hiệu suất cao.</p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/22-09-2022/ram-desktop-adata-xpg-spectrix-d50-rgb-white-ax4u32008g16a-sw50-8gb-1x8gb-ddr4-3200mhz-mota1.jpg\" alt=\"Ram Desktop Adata XPG Spectrix D50 RGB White (AX4U32008G16A-SW50) 8GB (1x8GB) DDR4 3200Mhz\" width=\"100%\"></figure><h3><strong>Tùy chỉnh RGB theo cách của bạn</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/22-09-2022/ram-desktop-adata-xpg-spectrix-d50-rgb-white-ax4u32008g16a-sw50-8gb-1x8gb-ddr4-3200mhz-rgb.jpg\" alt=\"Ram Desktop Adata XPG Spectrix D50 RGB White (AX4U32008G16A-SW50) 8GB (1x8GB) DDR4 3200Mhz\" width=\"100%\"></figure><p>D50 có vẻ ngoài sang trọng,c ác đường nét hình học đơn giản và panel RGB hình tam giác, kết hợp cới ứng dụng XPG RGB Sync hoặc phần mềm RGB từ một thương hiệu bo mạch chủ lớn, hãy chuyển đổi giữa ba chế độ RGB được thiết lặp sẵn. Ngoài ba chế độ, bạn cũng có thể đặt chế độ này thành chế độ Âm nhạc để đồng bộ hóa với những giai điệu yêu thích của bạn.</p>', 1, 'ram, ram rgb, ram 8gb', 1, 1),
(12, 'Thùng máy Case Thermaltake CTE E600 MX Hydrangea Blue Mid Tower Chassis', 'thung-may-case-thermaltake-cte-e600-mx-hydrangea-blue-mid-tower-chassis', 4300000, 4000000, 2, 'http://localhost/webshop/uploads/ca-1y2-00mfwn-00_04_340961d6de8c45e2a59d5377e6946558_master.png', 'http://localhost/webshop/uploads/ca-1y2-00mfwn-00_04_340961d6de8c45e2a59d5377e6946558_master_(1).png#http://localhost/webshop/uploads/ca-1y2-00mfwn-00_02_2cc1b675f11647588cd5f5b3ef98e2a9_master.png#http://localhost/webshop/uploads/ca-1y2-00mfwn-00_03_dafeb3d6c769426480dbfaafe78b38d7_master.png#http://localhost/webshop/uploads/ca-1y2-00mfwn-00_04_340961d6de8c45e2a59d5377e6946558_master1.png', '<ul><li><strong>Hãng sản xuất:</strong> Thermaltake</li><li><strong>Mã sản phẩm:</strong> Thermaltake CTE E600</li><li><strong>Bảo hành:</strong> 12 tháng</li><li><strong>Xem thêm:</strong><ul><li><a href=\"https://tinhocngoisao-1.myharavan.com/products/thung-may-case-thermaltake-cte-e600-mx-mid-tower-chassis-den-khong-kem-fan-ca-1y3-00m1wn-00\"><strong>Thermaltake CTE E600 MX Mid Tower Chassis</strong></a></li><li><a href=\"https://tinhocngoisao-1.myharavan.com/products/thung-may-case-thermaltake-cte-e600-mx-hydrangea-blue-mid-tower-chassis-xanh-khong-kem-fan-ca-1y3-00mfwn-00\"><strong>Thermaltake CTE E600 MX Snow Mid Tower Chassis</strong></a></li></ul></li></ul>', '<ul><li><strong>Hãng sản xuất:</strong> Thermaltake</li><li><strong>Mã sản phẩm:</strong> Thermaltake CTE E600</li><li><strong>Bảo hành:</strong> 12 tháng</li><li><strong>Xem thêm:</strong><ul><li><a href=\"https://tinhocngoisao-1.myharavan.com/products/thung-may-case-thermaltake-cte-e600-mx-mid-tower-chassis-den-khong-kem-fan-ca-1y3-00m1wn-00\"><strong>Thermaltake CTE E600 MX Mid Tower Chassis</strong></a></li><li><a href=\"https://tinhocngoisao-1.myharavan.com/products/thung-may-case-thermaltake-cte-e600-mx-hydrangea-blue-mid-tower-chassis-xanh-khong-kem-fan-ca-1y3-00mfwn-00\"><strong>Thermaltake CTE E600 MX Snow Mid Tower Chassis</strong></a></li></ul></li></ul>', 4, 'vỏ case, led, blue case', 4, 1),
(13, 'Ram PC Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB) (KF432C16BB/8)', 'ram-pc-kingston-fury-beast-8gb-ddr4-3200mhz-1x-8gb-kf432c16bb', 1300000, 1000000, 2, 'http://localhost/webshop/uploads/ram_kingston_8gb.png', 'http://localhost/webshop/uploads/ram_kingston_8gb1.png#http://localhost/webshop/uploads/ram_kingston_8gb_1.png#http://localhost/webshop/uploads/ram_kingston_8gb_2.png#http://localhost/webshop/uploads/ram_kingston_8gb_3.png', '<p><strong>RAM PC Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB)</strong> là lựa chọn tuyệt vời cho những người muốn nâng cấp hiệu năng và phong cách cho <a href=\"https://tinhocngoisao.com/collections/pc-may-tinh-de-ban\">PC</a> của mình. Sản phẩm mang đến hiệu suất vượt trội, giúp máy tính hoạt động mượt mà, đa nhiệm hiệu quả và xử lý các tác vụ nặng một cách trơn tru, đồng thời tô điểm thêm vẻ đẹp cho hệ thống PC.</p>', '<p><strong>Đặc điểm nổi bật:</strong></p><ul><li><a href=\"https://tinhocngoisao.com/collections/bo-nho-ram\">RAM PC DDR4</a> với tốc độ 3200Mhz,&nbsp;xử lý đồ họa, chơi game&nbsp;mượt mà, tốc độ phản hồi nhanh chóng.</li><li>Dung lượng 8GB đáp ứng nhu cầu sử dụng phổ biến, phù hợp với đa số PC hiện nay.</li><li>Tích hợp hệ thống tản nhiệt hiện đại, thiết bị luôn hoạt động ổn định, kể cả khi tải nặng</li><li>Thiết kế độc đáo&nbsp;mang đến phong cách sang trọng cho hệ thống PC.</li></ul><h2><strong>RAM PC Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB): Hiệu năng mạnh mẽ, phong cách ấn tượng</strong></h2><p><strong>RAM PC Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB)</strong> là lựa chọn tuyệt vời cho những người muốn nâng cấp hiệu năng và phong cách cho <a href=\"https://tinhocngoisao.com/collections/pc-may-tinh-de-ban\">PC</a> của mình. Sản phẩm mang đến hiệu suất vượt trội, giúp máy tính hoạt động mượt mà, đa nhiệm hiệu quả và xử lý các tác vụ nặng một cách trơn tru, đồng thời tô điểm thêm vẻ đẹp cho hệ thống PC.</p><h3><strong>Hiệu suất vượt trội, đa nhiệm mượt mà</strong></h3><p><strong>RAM Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB)</strong> có&nbsp;tốc độ bus 3200Mhz, bạn có thể thoải mái làm mọi thứ, từ lướt web, xem phim đến làm việc và chơi game mà không gặp bất kỳ trở ngại nào. Không chỉ giup&nbsp;mọi tác vụ được xử lý nhanh chóng, chính xác, tốc độ bus 3200Mhz siêu nhanh giúp bạn luôn chiếm ưu thế trong mọi trận đấu, phản ứng tức thời với mọi tình huống.</p><p>Có thể thấy, so với RAM DDR4 thông thường với tốc độ 2400Mhz, sản phẩm này cho hiệu năng nhanh hơn đáng kể, phù hợp cho người dùng có nhu cầu hiệu suất cao.</p><figure class=\"image\"><img style=\"aspect-ratio:800/450;\" src=\"https://file.hstatic.net/200000420363/file/ram_kingston_8gb_3.jpg\" alt=\"RAM Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB) RAM Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB) có&nbsp;tốc độ bus 3200Mhz,&nbsp;mang đến hiệu năng vượt trội\" width=\"800\" height=\"450\"></figure><h3><strong>Dung lượng đáp ứng nhu cầu sử dụng</strong></h3><p>RAM Kingston Fury Beast&nbsp; với 8GB RAM - lựa chọn hoàn hảo cho hầu hết người dùng. So với 4GB, 8GB mang đến hiệu suất làm việc và giải trí tốt hơn đáng kể. Bạn sẽ cảm nhận được sự khác biệt rõ rệt khi sử dụng máy tính.</p><figure class=\"image\"><img style=\"aspect-ratio:800/450;\" src=\"https://file.hstatic.net/200000420363/file/ram_kingston_8gb_2.jpg\" alt=\"RAM Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB) có dung lượng 8GB là lựa chọn phổ biến cho đa số PC hiện nay\" width=\"800\" height=\"450\"></figure><h3><strong>Tương thích AMD Ryzen™, dễ dàng nâng cấp</strong></h3><p><strong>RAM PC Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB)</strong> được thiết kế tương thích với hầu hết các <a href=\"https://tinhocngoisao.com/collections/bo-mach-chu\">mainboard</a>&nbsp;hỗ trợ DDR4,&nbsp;AMD Ryzen™, giúp người dùng dễ dàng nâng cấp cho PC của mình. Sản phẩm có thiết kế nhỏ gọn, không chiếm nhiều diện tích trong PC, đảm bảo tương thích với nhiều loại case và hệ thống khác nhau.</p><figure class=\"image\"><img style=\"aspect-ratio:800/450;\" src=\"https://file.hstatic.net/200000420363/file/ram_kingston_8gb_1.jpg\" alt=\"RAM PC Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB) được thiết kế tương thích với hầu hết các mainboard&nbsp;hỗ trợ DDR4,&nbsp;AMD Ryzen™\" width=\"800\" height=\"450\"></figure><h3><strong>Tính năng XMP tối ưu hiệu năng</strong></h3><p>Một điểm cộng nữa là <strong>RAM Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB) </strong>được&nbsp;tích hợp tính năng XMP giúp dễ dàng ép xung, nâng hiệu năng tối đa cho hệ thống. Chỉ cần bật tính năng XMP trong BIOS, bạn có thể đẩy tốc độ hoạt động của <a href=\"https://tinhocngoisao.com/collections/bo-nho-ram\">RAM</a> lên 3200Mhz, mang đến hiệu suất tối ưu cho các tác vụ đòi hỏi hiệu năng cao như chơi game, thiết kế đồ họa, chỉnh sửa video. So với RAM thông thường, việc ép xung giúp nâng cao hiệu suất xử lý, mang lại trải nghiệm mượt mà hơn.</p><figure class=\"image\"><img style=\"aspect-ratio:800/450;\" src=\"https://file.hstatic.net/200000420363/file/ram_kingston_8gb.jpg\" alt=\"RAM Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB) được&nbsp;tích hợp tính năng XMP giúp dễ dàng ép xung, nâng hiệu năng tối đa cho hệ thống\" width=\"800\" height=\"450\"></figure><p><strong>RAM PC Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB)</strong> là lựa chọn đáng giá cho người dùng muốn nâng cấp hiệu năng và phong cách cho PC của mình. Với tốc độ 3200Mhz, dung lượng 8GB, tản nhiệt hiệu quả và thiết kế độc đáo, sản phẩm này mang đến hiệu suất vượt trội, giúp máy tính hoạt động mượt mà, đa nhiệm hiệu quả, xử lý các tác vụ nặng một cách trơn tru, đồng thời tô điểm thêm vẻ đẹp cho hệ thống PC.</p>', 1, 'ram, lưu trữ, ssd', 6, 1),
(14, 'Màn Hình Dell HP 12050 24 in', 'man-hinh-dell-hp-12050-24-in', 1500000, 1000000, 2, 'http://localhost/webshop/uploads/hp-v24i-23-8-inch-fhd-thumb-600x600.jpg', 'http://localhost/webshop/uploads/3tfcafgr6uofb.jpg#http://localhost/webshop/uploads/250_8900_v24i__01_.jpg', '<p>Công ty Duy Long chuyên cung cấp <strong>màn hình máy tính HP</strong> để bàn chất lượng cao mới dùng trong thiết kế đồ họa, giải trí cũng như văn phòng</p><p>Cung cấp màn hình HP chính hãng bảo hành dài</p><p><strong>Màn hình máy tính</strong> do Cty Duy Long bán ra luôn đảm bảo chất lượng cao và có nguồn gốc rõ dàng, chính hãng thương hiệu nổi tiếng như <strong>Dell</strong> - <strong>Hp compaq</strong> - <strong>SamSung</strong> - <strong>LG</strong> - <strong>Lenovo</strong> ..... Đây chính là những đối tác tin cậy và đã có UY TÍN hợp tác với Duy Long</p>', '<h2><strong>Màn hình HP</strong></h2><figure class=\"image\"><img style=\"aspect-ratio:600/458;\" src=\"https://bizweb.dktcdn.net/thumb/grande/100/306/444/products/man-hinh-hp-p24v-g4-dellpc.jpg?v=1645101850247\" width=\"600\" height=\"458\"></figure><p>\"\"\"Sản phẩm mới&nbsp;chính hãng</p><p>Giá đã gồm VAT, CO, CQ</p><p>Bảo hành 36&nbsp;tháng tại nơi sử dụng trên toàn quốc</p><p>\"\"\"Màn hình HP cũng như Màn hình Dell - luôn là sản phẩm tuyệt vời nhất cho mọi nhu cầu, bởi đặc tính siêu bền, dùng 10 năm vẫn đẹp như mới, màu sắc sinh động và trung thực nhất, đặc biệt tốt nhất cho mắt để làm việc cả ngày quanh năm.</p><p>Kiểu dáng luôn sang trọng, khỏe khoắn, hiện đại, đẳng cấp cho mọi không gian làm việc, giải trí.</p>', 3, 'màn hình, hp, màn hình 24 in', 149, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `MaTinTuc` int(11) NOT NULL,
  `TieuDe` varchar(500) NOT NULL,
  `NoiDung` text NOT NULL,
  `DuongDan` text NOT NULL,
  `The` text NOT NULL,
  `MaNhanVien` int(11) NOT NULL,
  `HinhAnh` text NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT current_timestamp(),
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`MaTinTuc`, `TieuDe`, `NoiDung`, `DuongDan`, `The`, `MaNhanVien`, `HinhAnh`, `ThoiGian`, `TrangThai`) VALUES
(1, 'Tin tức 1', '<p>Loại đồ chơi phổ biến của trẻ em vừa bị phát hiện chứa hàn the quá mức cho phép, trẻ nhiễm độc có thể bị đau đầu, nôn mửa, thậm chí hôn mê.</p><p>Chỉ 10 trong số 30 sản phẩm bán chạy nhất của loại đồ chơi \"chất nhờn ma quái\" ở Trung Quốc đáp ứng tiêu chuẩn của Liên minh châu Âu (EU), theo một báo cáo công bố Ngày Quyền của người tiêu dùng thế giới 15/3. Mức độ hàn the - một chất kết tinh thường được sử dụng trong tẩy rửa thực phẩm, gốm sứ, mỹ phẩm - cao gấp 7 lần tiêu chuẩn của EU.</p><p>Báo cáo được công bố bởi <i>Toxics-Free Corps,</i> tổ chức phi lợi nhuận ở Thâm Quyến. Theo đó, trẻ em chơi <a href=\"https://vnexpress.net/tag/slime-979102\">slime </a>có chứa hàm lượng hàn the hòa tan quá mức cho phép, có nguy cơ bị ngộ độc, đặc biệt nếu tay trẻ có vết xước, hoặc chạm vào miệng. Tùy vào mức độ nhiễm độc có thể gây đau đầu, nôn mửa, buồn nôn và thậm chí dẫn đến hôn mê.</p><figure class=\"image\"><picture><source srcset=\"https://i1-giadinh.vnecdn.net/2023/03/18/102552633-hi048201955-jpeg-9304-1679155712.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=j23cYpY6j-PtQlWQLjtAxw 1x, https://i1-giadinh.vnecdn.net/2023/03/18/102552633-hi048201955-jpeg-9304-1679155712.jpg?w=1020&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=brE343Ef3xOGFHQz1ibN9Q 1.5x, https://i1-giadinh.vnecdn.net/2023/03/18/102552633-hi048201955-jpeg-9304-1679155712.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=2&amp;fit=crop&amp;s=yVazuwGJNDhG_Y6HC0zDDg 2x\"><img src=\"https://i1-giadinh.vnecdn.net/2023/03/18/102552633-hi048201955-jpeg-9304-1679155712.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=j23cYpY6j-PtQlWQLjtAxw\" alt=\"Slime là đồ chơi phổ biến với trẻ em ở nhiều quốc gia trên thế giới. Ảnh: Asianparent\" width=\"680\" height=\"383\"></picture></figure><p>Slime là đồ chơi phổ biến với trẻ em ở nhiều quốc gia trên thế giới. Ảnh:<i> Asianparent</i></p><p>Wu Huixian, một trong các tác giả nghiên cứu và là mẹ của một cậu con trai 5 tuổi, nói rằng đã biết slime từ năm 2021 khi mua sắm cùng con. Sau đó, cô bắt đầu nghiên cứu các đồ chơi trên thị trường Trung Quốc để tìm hiểu thêm về thành phần hóa học của chúng.</p><p>\"Một cuộc tìm kiếm nhanh trên mạng cho thấy tôi đã đúng. Tôi đã ngăn con trai chơi slime ngay khi biết về khả năng nhiễm độc hàn the\", Wu nói.</p><p>Cũng theo chuyên gia này, việc không có tiêu chuẩn hàn the đối với<a href=\"https://vnexpress.net/tag/do-choi-tre-em-53661\"> đồ chơi trẻ em</a> ở Trung Quốc là trở ngại chính cho việc điều tiết thị trường. Quốc gia này đã đặt ra tiêu chuẩn lây nhiễm cho 8 loại hóa chất trong đồ chơi, nhưng hàn the không nằm trong số đó. Vì lý do này, <i>Toxics-Free Corps</i> đã sử dụng các tiêu chuẩn của EU cho nghiên cứu của họ.</p><p>Một tìm kiếm trên trang thương mại điện tử <i>Taobao</i> về loại đồ chơi này cho ra hàng nghìn sản phẩm, nhiều cửa hàng có đến 5.000 đơn đặt hàng mỗi tháng. Báo cáo cũng cho biết nhà bán lẻ trực tuyến, gồm JD.com và Tmall, đã đưa ra tiêu chuẩn kiểm tra sơ bộ chất lượng mặt hàng đồ chơi này từ các nhà cung cấp. Nhưng họ cũng thừa nhận có \"kiến thức chuyên môn hạn chế\" về vấn đề này.</p><p>\"Với rất nhiều đồ chơi được bán trên thị trường, cha mẹ và các nền tảng thương mại khó phân biệt được loại nào độc hại. Cần có một tiêu chuẩn rõ ràng\", Wu cho biết.</p><p>Năm 2018, cơ quan An ninh y tế quốc gia Pháp (ANSES) khuyến cáo, slime chứa nhiều chất độc hại, gây dị ứng, bỏng, chàm hóa da (eczema), ảnh hưởng tới thần kinh và khả năng sinh sản.</p><p>Giáo sư Gérard Lasfargues - Giám đốc trung tâm Khoa học giám định của ANSES nói rằng cơ quan này mỗi năm ghi nhận hàng chục trẻ em bị tác dụng phụ khi tiếp xúc với các loại đồ chơi là chất dẻo và nhờn.</p>', 'tin-tuc-1', 'tin tức, tin tức mới', 1, 'http://localhost/webshop/uploads/z4617362741623_98c0302df70bfe02dd581fa8a0e35aa6.jpg', '2024-03-05 17:32:24', 1),
(4, 'Samsung Q4/2019: Lợi nhuận giảm 34% nhưng vẫn cao hơn dự báo, triển vọng tích cực hơn trong năm 2020?', '<h2>Dù kết quả kinh doanh sụt giảm, nhưng các nhà đầu tư vẫn lạc quan vào tương lai của Samsung khi dự báo nhu cầu chip toàn cầu sẽ phục hồi và tăng trưởng trong năm 2020.</h2><p>Samsung vừa công bố các kết quả sơ bộ về hoạt động kinh doanh trong quý 4 của năm 2019 và nó cho thấy các dấu hiệu tích cực bắt đầu xuất hiện. Trong 3 tháng cuối năm 2019, lợi nhuận hoạt động của nhà sản xuất chip nhớ lớn nhất thế giới giảm 34% so với cùng kỳ năm ngoái, xuống còn 7,1 nghìn tỷ Won (khoảng 6,1 tỷ USD). Tuy vậy, kết quả này cũng vượt qua dự báo bi quan của các nhà phân tích khi con số ước tính chỉ ở mức 6,49 nghìn tỷ Won.</p><p>Doanh thu trong quý tài chính này đạt 59 nghìn tỷ Won, thấp hơn một chút so với ước tính 60,9 nghìn tỷ Won của các nhà phân tích. Tuy nhiên, Samsung không công bố chi tiết doanh thu và lợi nhuận của từng bộ phận kinh doanh trong bản kết quả sơ bộ này.</p><figure class=\"image\"><img style=\"aspect-ratio:1200/675;\" src=\"https://genk.mediacdn.vn/thumb_w/660/2020/1/8/1x-1-1-15784729173771397957896.jpg\" alt=\"Samsung Q4/2019: Lợi nhuận giảm 34% nhưng vẫn cao hơn dự báo, triển vọng tích cực hơn trong năm 2020 - Ảnh 1.\" width=\"1200\" height=\"675\"></figure><p>Các dự báo lạc quan về nhu cầu chip đã giúp cổ phiếu Samsung tăng 44% trong năm 2019, dù kết quả kinh doanh sụt giảm.</p><p>Cổ phiếu công ty đã tăng 1,4% trong khi mới bắt đầu giao dịch sau khi báo cáo thu nhập được công bố. Có nhiều yếu tố tác động đến kết quả tích cực này của Samsung trong quý vừa qua.</p><p>Giá chip toàn cầu – yếu tố lớn nhất tác động đến hoạt động kinh doanh của Samsung – cho thấy sự hồi phục và thoát khỏi sự suy giảm kéo dài. Điều này có được nhờ việc giảm căng thẳng thương mại Mỹ-Trung, giúp gia tăng đơn hàng cho các nhà vận hành trung tâm dữ liệu. Nhu cầu chip nhớ DRAM sử dụng trong smartphone và máy chủ cũng được dự báo tăng khi các&nbsp; tiến bộ công nghệ đang cần đến nhiều bán dẫn hơn nữa.</p><p>Trong khi đó, phố Wall cũng dự báo về sự phục hồi của nhu cầu bán dẫn với dự kiến thị trường cho các linh kiện máy tính và smartphone sẽ bắt đầu tăng trưởng trở lại trong nửa sau của năm 2020. Tháng trước, hãng Micron Technology cũng nói với các nhà đầu tư rằng điều tồi tệ nhất đã qua với ngành công nghiệp chip nhớ.</p><p>Giá cổ phiếu Samsung đã tăng 44% trong năm 2019 dựa trên các dự báo về nhu cầu gia tăng trong năm 2020. Theo CW Chung, người đứng đầu bộ phận nghiên cứu đầu tư của hãng Nomura International tại Seoul, việc thế giới chuyển dịch sang công nghệ không dây 5G và điện toán đám mây sẽ thúc đẩy tăng trưởng cho hoạt động kinh doanh chip.</p><figure class=\"image\"><img style=\"aspect-ratio:1200/800;\" src=\"https://genk.mediacdn.vn/thumb_w/660/2020/1/8/1200x800-1578473051982129776132.jpg\" alt=\"Samsung Q4/2019: Lợi nhuận giảm 34% nhưng vẫn cao hơn dự báo, triển vọng tích cực hơn trong năm 2020 - Ảnh 2.\" width=\"1200\" height=\"800\"></figure><p>Galaxy Fold</p><p>Trong khi lợi nhuận từ màn hình OLED di động của Samsung Display dự kiến sẽ suy giảm do nhu cầu yếu, công ty đang chi tiêu nhiều cho việc phát triển các tấm nền OLED dẻo dành cho smartphone với hy vọng sẽ duy trì vai trò dẫn đầu trên thị trường màn hình điện thoại.</p><p>Trong mảng kinh doanh thiết bị di động, dự kiến lượng xuất xưởng smartphone của Samsung trong Quý 4 sẽ thấp hơn kỳ vọng nhưng giá bán trung bình có thể sẽ gia tăng nhờ vào sự xuất hiện của Galaxy Fold, smartphone màn hình gập có giá đến 1.980 USD.</p><p>Dự kiến đến ngày 11 tháng Hai tới đây, Samsung sẽ ra mắt thiết bị màn hình gập thứ hai của mình, với thiết kế gập vỏ sò tương tự như chiếc Motorola Razr mới ra mắt. Cũng trong sự kiện này, có thể công ty sẽ giới thiệu flagship đầu tiên của họ trong năm 2020 – Galaxy S11, nhưng có tin đồn cho rằng nó sẽ chuyển thành Galaxy S20.</p><p>Mới đây Samsung cũng cho biết, tính đến tháng 11 năm 2019, lượng smartphone 5G của họ hiện chiếm 54% thị phần toàn cầu sau khi công ty xuất xưởng được hơn 6,7 triệu Galaxy 5G.</p><p> </p><p><i>Tham khảo Bloomberg</i></p>', 'samsung-q42019-loi-nhuan-giam-34-nhung-van-cao-hon-du-bao-trien-vong-tich-cuc-hon-trong-nam-2020', 'apple, iphone 14, iphone', 1, 'http://localhost/webshop/uploads/samsung-galaxy-a25-5g-xanh-1-750x500.jpg', '2024-03-05 17:50:23', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MaChiTietHoaDon`),
  ADD KEY `MaHoaDon` (`MaHoaDon`,`MaSanPham`),
  ADD KEY `MaSanPham` (`MaSanPham`);

--
-- Indexes for table `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  ADD PRIMARY KEY (`MaChuyenMuc`);

--
-- Indexes for table `giaodien`
--
ALTER TABLE `giaodien`
  ADD PRIMARY KEY (`MaGiaoDien`),
  ADD KEY `MaChuyenMuc` (`MaChuyenMuc`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHoaDon`),
  ADD KEY `MaKhachHang` (`MaKhachHang`),
  ADD KEY `MaGiamGia` (`MaGiamGia`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKhachHang`);

--
-- Indexes for table `lichsunhap`
--
ALTER TABLE `lichsunhap`
  ADD PRIMARY KEY (`MaLichSuNhap`),
  ADD KEY `MaSanPham` (`MaSanPham`,`MaNhanVien`),
  ADD KEY `MaNhanVien` (`MaNhanVien`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`MaLienHe`),
  ADD KEY `MaKhachHang` (`MaKhachHang`);

--
-- Indexes for table `magiamgia`
--
ALTER TABLE `magiamgia`
  ADD PRIMARY KEY (`MaGiamGia`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNhanVien`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `MaChuyenMuc` (`MaChuyenMuc`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`MaTinTuc`),
  ADD KEY `MaNhanVien` (`MaNhanVien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `MaChiTietHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  MODIFY `MaChuyenMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `giaodien`
--
ALTER TABLE `giaodien`
  MODIFY `MaGiaoDien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lichsunhap`
--
ALTER TABLE `lichsunhap`
  MODIFY `MaLichSuNhap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `MaLienHe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `magiamgia`
--
ALTER TABLE `magiamgia`
  MODIFY `MaGiamGia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `MaTinTuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`MaHoaDon`) REFERENCES `hoadon` (`MaHoaDon`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `giaodien`
--
ALTER TABLE `giaodien`
  ADD CONSTRAINT `giaodien_ibfk_1` FOREIGN KEY (`MaChuyenMuc`) REFERENCES `chuyenmuc` (`MaChuyenMuc`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MaGiamGia`) REFERENCES `magiamgia` (`MaGiamGia`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `lichsunhap`
--
ALTER TABLE `lichsunhap`
  ADD CONSTRAINT `lichsunhap_ibfk_1` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `lichsunhap_ibfk_2` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD CONSTRAINT `lienhe_ibfk_1` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaChuyenMuc`) REFERENCES `chuyenmuc` (`MaChuyenMuc`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_ibfk_1` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
