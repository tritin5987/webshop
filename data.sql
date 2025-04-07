-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: webshop
-- ------------------------------------------------------
-- Server version	8.0.40

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cauhinh`
--

DROP TABLE IF EXISTS `cauhinh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cauhinh` (
  `TenWebsite` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `MoTaWeb` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `Logo` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `DiaChi` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `SoDienThoai` varchar(11) COLLATE utf8mb3_unicode_ci NOT NULL,
  `PhiShip` int NOT NULL,
  `MienPhiShip` int NOT NULL,
  `QRNganHang` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `ChuTaiKhoan` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `SoTaiKhoan` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ApiKey` varchar(500) COLLATE utf8mb3_unicode_ci NOT NULL,
  `NganHang` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cauhinh`
--

LOCK TABLES `cauhinh` WRITE;
/*!40000 ALTER TABLE `cauhinh` DISABLE KEYS */;
INSERT INTO `cauhinh` VALUES ('LinhKienNhanh.VN','Website bán linh kiện máy tính trực tuyến','http://localhost/webshop/uploads/logo-hacom-since-20012.png','Q9','bdtcloner1@gmail','0988342551',30000,500000,'http://localhost/webshop/uploads/z5204981674939_cb87935e11dde5ee3dc2641f5eb6d604.jpg','BUI DUONG TRI','0988342551','AK_CS.dd0325a0088c11f097089522635f3f80.ihvGrRv9Peo7Euss1tg9qmmIk7AaJB6bT9eM8K5oBXAKvsfFMY54VjQAUogKqAQSruBWklYl','mbbank');
/*!40000 ALTER TABLE `cauhinh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chitiethoadon`
--

DROP TABLE IF EXISTS `chitiethoadon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chitiethoadon` (
  `MaChiTietHoaDon` int NOT NULL AUTO_INCREMENT,
  `MaHoaDon` int NOT NULL,
  `MaSanPham` int NOT NULL,
  `SoLuong` int NOT NULL,
  PRIMARY KEY (`MaChiTietHoaDon`),
  KEY `MaHoaDon` (`MaHoaDon`,`MaSanPham`),
  KEY `MaSanPham` (`MaSanPham`),
  CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`) ON DELETE CASCADE,
  CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`MaHoaDon`) REFERENCES `hoadon` (`MaHoaDon`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitiethoadon`
--

LOCK TABLES `chitiethoadon` WRITE;
/*!40000 ALTER TABLE `chitiethoadon` DISABLE KEYS */;
INSERT INTO `chitiethoadon` VALUES (59,28,4,1),(60,29,14,1),(61,30,4,1);
/*!40000 ALTER TABLE `chitiethoadon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chuyenmuc`
--

DROP TABLE IF EXISTS `chuyenmuc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chuyenmuc` (
  `MaChuyenMuc` int NOT NULL AUTO_INCREMENT,
  `TenChuyenMuc` varchar(500) COLLATE utf8mb3_unicode_ci NOT NULL,
  `DuongDan` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `HinhAnh` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `TrangThai` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`MaChuyenMuc`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chuyenmuc`
--

LOCK TABLES `chuyenmuc` WRITE;
/*!40000 ALTER TABLE `chuyenmuc` DISABLE KEYS */;
INSERT INTO `chuyenmuc` VALUES (1,'Thiết bị lưu trữ','thiet-bi-luu-tru','http://localhost/webshop/uploads/tim-hieu-ve-o-cung-ssd-va-hdd-3.jpg',1),(2,' CPU - Mainboard - VGA','cpu-mainboard-vga','http://localhost/webshop/uploads/mainboard-msi-x670e-gaming-plus-wifi-ddr5-4_8176196d83604635b791b19a0ac22f88_large.png',1),(3,'Màn Hình Máy Tính','man-hinh-may-tinh','http://localhost/webshop/uploads/man-hinh-may-tinh-redmi-rmmnt215nf__3_.jpg',1),(4,'Case - Tản - Nguồn','case-tan-nguon','http://localhost/webshop/uploads/tan-nhiet-pc-2.jpg',1);
/*!40000 ALTER TABLE `chuyenmuc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giaodien`
--

DROP TABLE IF EXISTS `giaodien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `giaodien` (
  `MaGiaoDien` int NOT NULL AUTO_INCREMENT,
  `MaChuyenMuc` int NOT NULL,
  `HinhAnh` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `LoaiGiaoDien` int NOT NULL,
  `TrangThai` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`MaGiaoDien`),
  KEY `MaChuyenMuc` (`MaChuyenMuc`),
  CONSTRAINT `giaodien_ibfk_1` FOREIGN KEY (`MaChuyenMuc`) REFERENCES `chuyenmuc` (`MaChuyenMuc`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giaodien`
--

LOCK TABLES `giaodien` WRITE;
/*!40000 ALTER TABLE `giaodien` DISABLE KEYS */;
/*!40000 ALTER TABLE `giaodien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hoadon` (
  `MaHoaDon` int NOT NULL AUTO_INCREMENT,
  `MaKhachHang` int DEFAULT NULL,
  `TongTien` int NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ThanhToan` int NOT NULL,
  `MaGiamGia` int DEFAULT NULL,
  `SoLuong` int NOT NULL,
  `DiaChi` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `TenKhachHang` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `SoDienThoai` varchar(11) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `MuaTaiQuan` int NOT NULL DEFAULT '0',
  `TrangThai` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`MaHoaDon`),
  KEY `MaKhachHang` (`MaKhachHang`),
  KEY `MaGiamGia` (`MaGiamGia`),
  CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MaGiamGia`) REFERENCES `magiamgia` (`MaGiamGia`),
  CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoadon`
--

LOCK TABLES `hoadon` WRITE;
/*!40000 ALTER TABLE `hoadon` DISABLE KEYS */;
INSERT INTO `hoadon` VALUES (28,4,40000,'2025-03-31 08:21:30',2,NULL,1,'Q9, Phường Tăng Nhơn Phú A, Quận 9, Thành phố Hồ Chí Minh',NULL,NULL,0,3),(29,4,1000000,'2025-03-31 08:23:33',1,NULL,1,'Q9, Phường Tăng Nhơn Phú A, Quận 9, Thành phố Hồ Chí Minh',NULL,NULL,0,3),(30,4,40000,'2025-03-31 10:28:57',0,NULL,1,'LVV, Phường 15, Quận Phú Nhuận, Thành phố Hồ Chí Minh',NULL,NULL,0,1);
/*!40000 ALTER TABLE `hoadon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `khachhang` (
  `MaKhachHang` int NOT NULL AUTO_INCREMENT,
  `HoTen` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `TaiKhoan` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `MatKhau` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `SoDienThoai` varchar(11) COLLATE utf8mb3_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `DiaChi` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `NgayThamGia` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TrangThai` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`MaKhachHang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khachhang`
--

LOCK TABLES `khachhang` WRITE;
/*!40000 ALTER TABLE `khachhang` DISABLE KEYS */;
INSERT INTO `khachhang` VALUES (4,'Dương Trí','bdtcloner1','c4ca4238a0b923820dcc509a6f75849b','0988342551','bdtcloner1@gmail.com','Q9','2025-03-31 08:01:55',1);
/*!40000 ALTER TABLE `khachhang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lichsunhap`
--

DROP TABLE IF EXISTS `lichsunhap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lichsunhap` (
  `MaLichSuNhap` int NOT NULL AUTO_INCREMENT,
  `MaSanPham` int NOT NULL,
  `MaNhanVien` int NOT NULL,
  `SoLuongCu` int NOT NULL,
  `SoLuongMoi` int NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`MaLichSuNhap`),
  KEY `MaSanPham` (`MaSanPham`,`MaNhanVien`),
  KEY `MaNhanVien` (`MaNhanVien`),
  CONSTRAINT `lichsunhap_ibfk_1` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`) ON DELETE CASCADE,
  CONSTRAINT `lichsunhap_ibfk_2` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lichsunhap`
--

LOCK TABLES `lichsunhap` WRITE;
/*!40000 ALTER TABLE `lichsunhap` DISABLE KEYS */;
INSERT INTO `lichsunhap` VALUES (1,5,1,0,5,'2025-03-07 16:40:32'),(2,5,1,5,7,'2025-03-07 16:40:38'),(3,11,1,0,15,'2025-03-12 22:10:38'),(4,9,1,0,20,'2025-03-12 22:11:03'),(5,13,1,-2,3,'2025-03-21 00:10:26'),(6,12,1,-2,3,'2025-03-21 00:10:31'),(7,13,1,4,9,'2025-04-22 15:52:06'),(8,14,1,0,150,'2025-10-18 01:20:59');
/*!40000 ALTER TABLE `lichsunhap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lienhe`
--

DROP TABLE IF EXISTS `lienhe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lienhe` (
  `MaLienHe` int NOT NULL AUTO_INCREMENT,
  `MaKhachHang` int NOT NULL,
  `TieuDe` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `NoiDung` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`MaLienHe`),
  KEY `MaKhachHang` (`MaKhachHang`),
  CONSTRAINT `lienhe_ibfk_1` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lienhe`
--

LOCK TABLES `lienhe` WRITE;
/*!40000 ALTER TABLE `lienhe` DISABLE KEYS */;
/*!40000 ALTER TABLE `lienhe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `magiamgia`
--

DROP TABLE IF EXISTS `magiamgia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `magiamgia` (
  `MaGiamGia` int NOT NULL AUTO_INCREMENT,
  `Code` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `SoLuong` int NOT NULL,
  `DaSuDung` int NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `GiaTriGiam` int NOT NULL,
  `TrangThai` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`MaGiamGia`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `magiamgia`
--

LOCK TABLES `magiamgia` WRITE;
/*!40000 ALTER TABLE `magiamgia` DISABLE KEYS */;
INSERT INTO `magiamgia` VALUES (1,'TRIDEPTRAI',20,9,'2026-03-13 00:00:00',10000,1),(2,'KHACHHANGMOI',50,5,'2026-04-25 00:00:00',20000,1);
/*!40000 ALTER TABLE `magiamgia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhanvien`
--

DROP TABLE IF EXISTS `nhanvien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nhanvien` (
  `MaNhanVien` int NOT NULL AUTO_INCREMENT,
  `HoTen` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `TaiKhoan` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `MatKhau` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `SoDienThoai` varchar(11) COLLATE utf8mb3_unicode_ci NOT NULL,
  `PhanQuyen` int NOT NULL DEFAULT '0',
  `TrangThai` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`MaNhanVien`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhanvien`
--

LOCK TABLES `nhanvien` WRITE;
/*!40000 ALTER TABLE `nhanvien` DISABLE KEYS */;
INSERT INTO `nhanvien` VALUES (1,'Bùi Dương Trí','admin','c4ca4238a0b923820dcc509a6f75849b','admin@gmail.com','0888999888',1,1),(2,'Nguyễn Văn Trí','bdtcloner1','c4ca4238a0b923820dcc509a6f75849b','bdtcloner1@gmail.com','0999666999',0,1);
/*!40000 ALTER TABLE `nhanvien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sanpham` (
  `MaSanPham` int NOT NULL AUTO_INCREMENT,
  `TenSanPham` varchar(500) COLLATE utf8mb3_unicode_ci NOT NULL,
  `DuongDan` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `GiaGoc` int NOT NULL,
  `GiaBan` int NOT NULL,
  `LoaiSanPham` int NOT NULL DEFAULT '1',
  `AnhChinh` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `HinhAnh` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `MoTaNgan` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `MoTaDai` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `MaChuyenMuc` int NOT NULL,
  `The` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `SoLuong` int NOT NULL,
  `TrangThai` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`MaSanPham`),
  KEY `MaChuyenMuc` (`MaChuyenMuc`),
  CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaChuyenMuc`) REFERENCES `chuyenmuc` (`MaChuyenMuc`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sanpham`
--

LOCK TABLES `sanpham` WRITE;
/*!40000 ALTER TABLE `sanpham` DISABLE KEYS */;
INSERT INTO `sanpham` VALUES (3,'Sản phẩm mẫu 1','san-pham-1',15000,10000,1,'http://localhost/webshop/uploads/0-02-06-a34e8d83e2a099153c1b46471f9c4c82f215479deb14a7108d83acbe062c9fbe_ccc2fc1010bf2933.jpg','http://localhost/webshop/uploads/z4617362741623_98c0302df70bfe02dd581fa8a0e35aa611.jpg#http://localhost/webshop/uploads/z4617362745335_4456bfd0f397a69bb165e385ba8916cb3.jpg#http://localhost/webshop/uploads/z4617362764788_9dae16f7c421e020eeb4418f62eeb52e10.jpg#http://localhost/webshop/uploads/z4617362804277_275c9f23eb1124b7f6a8496671f60b2519.jpg#http://localhost/webshop/uploads/z4617362817818_39cacdb57658e537cb0e22dc18e885d830.jpg','<p><strong>Thú bông voi con màu xám</strong> có thiết kế ngộ nghĩnh, dễ thương, sử dụng chất liệu bông an toàn cho sức khỏe của bé. Bề mặt vải bên ngoài mềm mại, không xổ lông, không gây ảnh hưởng tới hệ hô hấp của trẻ khi tiếp xúc gần, giúp ba mẹ an tâm khi con vui đùa.</p>','<p><strong>Thú bông voi con màu xám</strong> có thiết kế ngộ nghĩnh, dễ thương, sử dụng chất liệu bông an toàn cho sức khỏe của bé. Bề mặt vải bên ngoài mềm mại, không xổ lông, không gây ảnh hưởng tới hệ hô hấp của trẻ khi tiếp xúc gần, giúp ba mẹ an tâm khi con vui đùa.</p><figure class=\"image\"><img style=\"aspect-ratio:450/450;\" src=\"https://media.bibomart.com.vn/media/wysiwyg/2021/2022/0-02-06-a34e8d83e2a099153c1b46471f9c4c82f215479deb14a7108d83acbe062c9fbe_ccc2fc1010bf2933.jpg\" alt=\"thu-bong-voi-con-mau-xam\" width=\"450\" height=\"450\"></figure><p><i>Thú bông voi con màu xám</i></p><h3><strong>Đặc điểm nổi bật của sản phẩm</strong></h3><p>- Thú bông voi con màu xám sử dụng chất liệu bông êm ái, đàn hồi tốt và lớp vải ngoài mềm mại, không gây ngứa da, kích ứng cho bé khi tiếp xúc.</p><p>- Sản phẩm có tông màu xám trầm chủ đạo và thiết kế ngộ nghĩnh với chiếc vòi dài đặc trưng của voi con, kích thích trí tò mò của bé về thế giới động vật xung quanh.</p><p>- Ba mẹ có thể dành tặng thú bông cho bé như một món quà nhỏ hoặc sử dụng để trang trí cho căn phòng ngủ của con yêu.</p>',1,'sản phẩm, abc, def',32,0),(4,'Sản phẩm mẫu 2','mau-hai',19000,10000,3,'http://localhost/webshop/uploads/z4617362764788_9dae16f7c421e020eeb4418f62eeb52e.jpg','http://localhost/webshop/uploads/z4617362764788_9dae16f7c421e020eeb4418f62eeb52e.jpg','<p>Mô tả ngắn</p>','<p>abcde</p>',1,'abc,def',28,1),(5,'Màn hình MSI PRO MP251 E2 (24.5 inch/FHD/IPS/120Hz/1ms/Loa)','man-hinh-msi-pro-mp251-e2-245-inchfhdips120hz1msloa',6000000,5500000,3,'http://localhost/webshop/uploads/85408_man_hinh_msi_pro_mp251_e2_1.jpg','http://localhost/webshop/uploads/85408_man_hinh_msi_pro_mp251_e2_11.jpg#http://localhost/webshop/uploads/85408_man_hinh_msi_pro_mp251_e2_2.jpg#http://localhost/webshop/uploads/85408_man_hinh_msi_pro_mp251_e2_4.jpg#http://localhost/webshop/uploads/85408_man_hinh_msi_pro_mp251_e2_5.jpg','<p><strong>Màn hình MSI PRO MP251 E2 là một màn hình văn phòng đa phương tiện cao cấp.</strong></p><p><a href=\"https://hacom.vn/man-hinh-msi-pro-mp251-e2-24.5-inch-fhd-ips-120hz-1ms-loa\">Màn hình MSI PRO MP251 E2</a>&nbsp; được thiết kế dành riêng cho đối tượng trẻ với nhu cầu làm việc chuyên nghiệp, màn hình văn phòng tại nhà PerfectEdge 120Hz kết hợp thiết kế hiện đại và hiệu suất cao. Cho dù bạn hoàn thành các công việc văn phòng hàng ngày hay đắm mình trong trải nghiệm chơi game sống động, màn hình này sẽ mang lại trải nghiệm hình ảnh mang tính đột phá và dễ sử dụng.</p>','<h3><strong>Màn hình MSI PRO MP251 E2 là một màn hình văn phòng đa phương tiện cao cấp.</strong></h3><p><a href=\"https://hacom.vn/man-hinh-msi-pro-mp251-e2-24.5-inch-fhd-ips-120hz-1ms-loa\">Màn hình MSI PRO MP251 E2</a>&nbsp; được thiết kế dành riêng cho đối tượng trẻ với nhu cầu làm việc chuyên nghiệp, màn hình văn phòng tại nhà PerfectEdge 120Hz kết hợp thiết kế hiện đại và hiệu suất cao. Cho dù bạn hoàn thành các công việc văn phòng hàng ngày hay đắm mình trong trải nghiệm chơi game sống động, màn hình này sẽ mang lại trải nghiệm hình ảnh mang tính đột phá và dễ sử dụng.</p><figure class=\"image\"><img style=\"aspect-ratio:1020/570;\" src=\"https://hanoicomputercdn.com/media/lib/15-08-2024/vi-vn-msi-pro-mp251-24-5-inch-fhd-slider-2a.jpg\" width=\"1020\" height=\"570\"></figure><h3><strong>Kiểu dáng thiết kế</strong></h3><p>Lấy cảm hứng từ thế hệ trẻ theo đuổi sự đơn giản và hiệu quả, mặt sau của màn hình có hoa văn được chạm khắc tinh xảo. Thiết kế tinh tế này tượng trưng cho hiệu năng bất tận, khiến nó trở thành người bạn đồng hành hoàn hảo cho các bạn trẻ làm việc chuyên nghiệp.</p><figure class=\"image\"><img style=\"aspect-ratio:1020/570;\" src=\"https://hanoicomputercdn.com/media/lib/15-08-2024/vi-vn-msi-pro-mp251-24-5-inch-fhd-slider-2.jpg\" width=\"1020\" height=\"570\"></figure><p>Màn hình MSI PRO có trọng lượng 2.7 kg cùng kích thước rộng 55.7 cm, cao 42.1 cm. Dù chân đế được cấu thành từ nhựa nhưng vẫn tỏ rõ sự cứng cáp thiết kế gọn nhẹ, mang đến sự di động cho phép bạn di chuyển đến bất kỳ vị trí nào trên bàn làm việc hay bàn học một cách dễ dàng.</p><figure class=\"image\"><img style=\"aspect-ratio:1020/570;\" src=\"https://hanoicomputercdn.com/media/lib/07-06-2024/vi-vn-msi-pro-mp251-24-5-inch-fhd-slider-3.jpg\" width=\"1020\" height=\"570\"></figure><p>Thiết tương thích khung đạt chuẩn VESA cho phép bạn có thể gắn PC mini Cubi ở mặt sau hoặc trên tường để giữ cho không gian làm việc của bạn gọn gàng và ngăn nắp. MSI Power Link với HDMI™ CEC cho phép bạn khởi động nguồn cho chiếc PC mini của mình bằng một nút bấm trên màn hình, nâng cao hiệu quả và trải nghiệm cho người dùng.</p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/15-08-2024/power-link-main.jpg\" width=\"1024\"></figure><h3><strong>Hình ảnh chân thực, sắc nét</strong></h3><p>Kích thước màn hình rộng 24.5 inch cùng độ phân giải Full HD (1920 x 1080) sắc nét. Hỗ trợ 16.7 triệu màu giúp màu sắc của hình ảnh tái tạo lại một cách chân thực. Góc nhìn rộng 178 độ dọc và 178 độ ngang nhờ vào tấm nền IPS, cho phép hình ảnh hiển thị rõ nét, chân thật ở mọi góc nhìn.&nbsp;</p><figure class=\"image\"><img style=\"aspect-ratio:1020/570;\" src=\"https://hanoicomputercdn.com/media/lib/07-06-2024/vi-vn-msi-pro-mp251-24-5-inch-fhd-slider-4.jpg\" width=\"1020\" height=\"570\"></figure><h3><strong>Tần số quét cao 120Hz</strong></h3><p>Tốc độ quét lên tới 120Hz đảm bảo hình ảnh mượt mà hơn, giảm hiện tượng nhòe khi chuyển động và cải thiện khả năng phản hồi khi chơi game. Ngay cả trong lúc bạn làm việc, màn hình sẽ cuộn và chuyển tiếp mượt mà, tăng sự thoải mái và hiệu quả. Ngoài ra, màn hình cũng đáp ứng hoàn hảo với AIGC (Artificial Intelligence Generated Content - Nội dung được tạo bằng trí tuệ nhân tạo) cũng như hình ảnh và văn bản do AI điều khiển, cải thiện hơn nữa quy trình làm việc sáng tạo và biến nó thành một công cụ linh hoạt cho các bạn trẻ ưa thích sự hiện đại và chuyên nghiệp.</p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/15-08-2024/refresh-rate-main.jpg\" width=\"1024\"></figure><h3><strong>Công nghệ bảo vệ mắt</strong></h3><p>Công nghệ<strong>&nbsp;Lọc ánh sáng xanh&nbsp;</strong>làm giảm các thành phần ánh sáng màu xanh phát ra từ màn hình, bảo vệ thị lực của bạn trước những luồng&nbsp;ánh sáng mạnh đồng thời làm giảm tình trạng mệt mỏi hay khô mắt khi phải làm việc quá lâu với màn hình&nbsp;máy tính.</p><figure class=\"image\"><img style=\"aspect-ratio:1020/570;\" src=\"https://hanoicomputercdn.com/media/lib/07-06-2024/vi-vn-msi-pro-mp251-24-5-inch-fhd-slider-6.jpg\" width=\"1020\" height=\"570\"></figure><h3><strong>Kết nối tối giản</strong></h3><p>Hỗ trợ các kết nối đa dạng bao gồm&nbsp; DisplayPort, HDMI, VGA và cổng âm thanh 3.5mm. Với những tính năng và thiết kế tiện dụng, màn hình MSI PRO MP251 E2 là một lựa chọn tốt cho những người sử dụng cần một sản phẩm màn hình chất lượng với mức giá phải chăng.</p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/15-08-2024/io1.jpg\" width=\"1200\"></figure><p><br>&nbsp;</p>',3,'màn hình, màn hình MSI, màn hình 24 in',7,1),(6,'Nguồn  ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)','nguon-asus-rog-thor-1600t-gaming-titanium-1600w-mau-den80-plus-titanium-full-modular',8250000,7900000,3,'http://localhost/webshop/uploads/66952_rog_thor_1600t_02__2_.jpg','http://localhost/webshop/uploads/66952_rog_thor_1600t_01.jpg#http://localhost/webshop/uploads/66952_rog_thor_1600t_02__2_1.jpg#http://localhost/webshop/uploads/66952_rog_thor_1600t_02__3_.jpg#http://localhost/webshop/uploads/66952_rog_thor_1600t_02__4_.jpg','<p>Công suất 1600w</p><p>Chứng nhận hiệu chuẩn 80 Plus Titanium</p><p>Hiển thị OLED thông minh thông báo điện năng tiêu thụ</p><p>Khả năng đồng bộ led AURA SYNC</p>','<h3><strong>Nguồn&nbsp;&nbsp;ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/28-07-2022/rog-thor-1600w-ti--images-01.jpg\" alt=\"Nguồn  ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)\" width=\"100%\"></figure><h3><strong>Nguồn&nbsp;&nbsp;ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/28-07-2022/rog-thor-1600w-ti--images-02.jpg\" alt=\"Nguồn  ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)\" width=\"100%\"></figure><h3><strong>Nguồn&nbsp;&nbsp;ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/28-07-2022/rog-thor-1600w-ti--images-03.jpg\" alt=\"Nguồn&nbsp;&nbsp;ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)\" width=\"100%\"></figure><h3><strong>Nguồn&nbsp;&nbsp;ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/28-07-2022/rog-thor-1600w-ti--images-04.jpg\" alt=\"Nguồn&nbsp;&nbsp;ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)\" width=\"100%\"></figure><h3><strong>Nguồn&nbsp;&nbsp;ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/28-07-2022/rog-thor-1600w-ti--images-05.jpg\" alt=\"Nguồn&nbsp;&nbsp;ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)\" width=\"100%\"></figure><h3><strong>Nguồn&nbsp;&nbsp;ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/28-07-2022/rog-thor-1600w-ti--images-06.jpg\" alt=\"Nguồn&nbsp;&nbsp;ASUS ROG THOR - 1600T Gaming Titanium - 1600W ( Màu Đen/80 Plus Titanium / Full Modular)\" width=\"100%\"></figure>',4,'nguồn, asus rog thor, nguồn 1600w',0,1),(7,'Fan CPU Noctua NH-D15','fan-cpu-noctua-nh-d15',4000000,3900000,1,'http://localhost/webshop/uploads/47785_fan_cpu_noctua_nh_d15_0000_1__1_.jpg','http://localhost/webshop/uploads/47785_fan_cpu_noctua_nh_d15_0000_1__1_1.jpg#http://localhost/webshop/uploads/47785_fan_cpu_noctua_nh_d15_0007_1__3_.jpg','<p>Hỗ trợ Socket LGA1700</p><p>Mẫu tản nhiệt khí đến từ thương hiệu nổi tiếng Noctua</p><p>Hiệu năng tản nhiệt thuộc top đầu các tản nhiệt khí trên thị trường</p><p>Thiết kế dạng tháp đôi với 2 quạt chất lượng cao</p>','<p><strong>Fan CPU Noctua NH-D15</strong> là một trong những sản phẩm tản nhiệt khí dành cho CPU với hiệu năng vượt trội đến từ thương hiệu nổi tiếng <a href=\"https://hacom.vn/tim?q=t%E1%BA%A3n+nhi%E1%BB%87t+kh%C3%AD&amp;scat_id=327&amp;brand=noctua\"><strong>NOCTUA</strong></a><strong> </strong>đang được bán tại <strong>HACOM</strong></p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/product/47785_fanc663_001.JPG\" alt=\"Fan CPU Noctua NH-D15\" width=\"100%\"></figure><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/47785_NoctuaD15.jpg\" alt=\"Ảnh thực tế Fan CPU Noctua NH-D15 2\" width=\"100%\"></figure><h3><strong>Fan CPU Noctua NH-D15</strong></h3><p>Được xây dựng trên cơ sở của mẫu tản nhiệt NH-D14 huyền thoại và thực hiện nhiệm vụ cho hiệu suất làm mát kèm độ yên tĩnh tối đa, mẫu flagship Noctua NH-D15 là sản phẩm tản nhiệt tháp đôi có hiệu năng tốt nhất trên thị trường hiện nay.</p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/product/47785_fanc663_003.JPG\" alt=\"CPU Noctua NH - D15\" width=\"100%\"></figure><h3><strong>Fan CPU Noctua NH-D15</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/28-06-2022/nh-d15-1.jpg\" alt=\"Fan CPU Noctua NH-D15\" width=\"100%\"></figure><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/28-06-2022/nh-d15-4.jpg\" alt=\"Fan CPU Noctua NH-D15\" width=\"100%\"></figure>',2,'tản nhiệt, cpu, tản nhiệt khí',0,1),(8,'Màn hình Gaming LG 27GR75Q-B (27 inch/QHD/IPS/165Hz/1ms)','man-hinh-gaming-lg-27gr75q-b-27-inchqhdips165hz1ms',4500000,3900000,1,'http://localhost/webshop/uploads/76709_man_hinh_gaming_lg_27gr75q_b_850x850_3.jpg','http://localhost/webshop/uploads/76709_man_hinh_gaming_lg_27gr75q_b_850x850_1.jpg#http://localhost/webshop/uploads/76709_man_hinh_gaming_lg_27gr75q_b_850x850_31.jpg#http://localhost/webshop/uploads/76709_man_hinh_gaming_lg_27gr75q_b_850x850_5.jpg#http://localhost/webshop/uploads/76709_man_hinh_gaming_lg_27gr75q_b_850x850_6.jpg','<p><a href=\"https://hacom.vn/man-hinh-gaming-lg-27gr75q-b-27-inch-qhd-ips-165hz-1ms\">Màn hình LG 27GR75Q</a> không quá hầm hố với đa số các đối thủ trong cùng phân khúc. Màn hình gaming có độ phân giải cao 2K cùng nhiều công nghệ đi kèm. Góc nhìn cực rộng lên tới 178 độ cho phép trải nghiệm chơi game cùng bạn bè luôn trọn vẹn. Đây là một trong những chiếc màn hình gaming tầm trung xứng đáng có trong góc giải trí hàng ngày của game thủ.</p><p>Không những hỗ trợ cho các tác vụ giải trí, độ phủ màu của màn khá rộng, hỗ trợ phần nào đấy cho các tác vụ sáng tạo nội dung. Hình ảnh màn hình luôn được đồng bộ hóa trong suốt quá trình sử dụng, tương thích với hai dòng card AMD và Nvidia. Bên cạnh đó, tần số quét cao với độ trễ tín hiệu thấp giúp màn bắt kịp tốc độ chuyển động của hình ảnh.</p>','<h3><strong>Màn hình GAMING LG 27GR75Q trang bị nhiều tính năng cao cấp với mức giá hợp lý trong phân khúc tầm trung.</strong></h3><p><a href=\"https://hacom.vn/man-hinh-gaming-lg-27gr75q-b-27-inch-qhd-ips-165hz-1ms\">Màn hình LG 27GR75Q</a> không quá hầm hố với đa số các đối thủ trong cùng phân khúc. Màn hình gaming có độ phân giải cao 2K cùng nhiều công nghệ đi kèm. Góc nhìn cực rộng lên tới 178 độ cho phép trải nghiệm chơi game cùng bạn bè luôn trọn vẹn. Đây là một trong những chiếc màn hình gaming tầm trung xứng đáng có trong góc giải trí hàng ngày của game thủ.</p><p>Không những hỗ trợ cho các tác vụ giải trí, độ phủ màu của màn khá rộng, hỗ trợ phần nào đấy cho các tác vụ sáng tạo nội dung. Hình ảnh màn hình luôn được đồng bộ hóa trong suốt quá trình sử dụng, tương thích với hai dòng card AMD và Nvidia. Bên cạnh đó, tần số quét cao với độ trễ tín hiệu thấp giúp màn bắt kịp tốc độ chuyển động của hình ảnh.</p><figure class=\"image\"><img style=\"aspect-ratio:900/824;\" src=\"https://hanoicomputercdn.com/media/lib/09-04-2024/man-hinh-gaming-lg-27gr75q-b-mo-ta-1a.jpg\" width=\"900\" height=\"824\"></figure><h3><strong>&nbsp;LG 27GR75Q được thiết kế linh hoạt, dành cho game thủ</strong></h3><p>Trọng lượng tổng thể của màn là 6,19 kg cùng kích thước rộng 61,3 cm. Độ cao tùy chỉnh từ 45,9 đến 56,9 cm. Phần chân đế tạo hình chữ V tạo thế vững chắc đỡ toàn bộ màn hình ở phía trên.</p><figure class=\"image\"><img style=\"aspect-ratio:900/624;\" src=\"https://hanoicomputercdn.com/media/lib/09-04-2024/man-hinh-gaming-lg-27gr75q-b-mo-ta-2.jpg\" width=\"900\" height=\"624\"></figure><p>Chân đế được chế tạo linh hoạt tùy chỉnh nâng hạ, xoay dọc mang tới cảm giác trải nghiệm trọn vẹn. Màn hỗ trợ ngàm<a href=\"https://hacom.vn/gia-treo-man-hinh\">&nbsp;treo màn hình</a>&nbsp;tiêu chuẩn VESA 100x100mm, giúp màn hình linh hoạt trong việc tối ưu không gian sử dụng.</p><h3><strong>LG 27GR75Q-B sở hữu nội dung chân thực đến từng chi tiết</strong></h3><p>Độ bao phủ màu đạt sRGB 99%. Màu sắc hiển thị có độ chân thực cao để tái tạo bằng HDR10, giúp người chơi đắm chìm trong hình ảnh sống động. Game thủ có thể thấy những màu sắc đầy kịch tính theo ý định của nhà phát triển game dù ở bất cứ chiến trường nào.</p><figure class=\"image\"><img style=\"aspect-ratio:900/450;\" src=\"https://hanoicomputercdn.com/media/lib/10-04-2024/man-hinh-gaming-lg-27gr75q-b-mo-ta-3.jpg\" width=\"900\" height=\"450\"></figure><h3><strong>Công nghệ đồng bộ hình ảnh trên LG 27GR75Q-B</strong></h3><p>Màn hình đạt tương thích G-SYNC® đã được NVIDIA kiểm định và chứng nhận chính thức, hứa hẹn mang đến&nbsp; trải nghiệm chơi game tuyệt vời với khả năng hạn chế đáng kể hiện tượng xé hoặc giật hình. Ngoài ra, công nghệ FreeSync™ Premium, game thủ sẽ được trải nghiệm chuyển động liền mạch mượt mà trong những trò chơi có độ phân giải cao và nhịp độ nhanh. Công nghệ này giúp giảm đáng kể hiện tượng xé hoặc giật hình.</p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/10-10-2023/ultragear-32gr93u-07-1-gaming-technology-d.jpg\" alt=\"Màn hình Gaming LG 27GR75Q-B có công nghệ đồng bộ hình ảnh\" width=\"900\"></figure><h3><strong>LG 27GR75Q-B có kết nối thuận tiện</strong></h3><p>Cổng DisplayPort 1.4 và HDMI 2.0 trên LG 27GR75Q-B cho phép hiển thị tối đa độ phân giải cùng tần số quét cao. Cổng audio 3.5mm có thể kết nối với các thiết bị âm thanh ngoại vi như loa, tai nghe thuận tiện hơn.</p><figure class=\"image\"><img style=\"aspect-ratio:900/506;\" src=\"https://hanoicomputercdn.com/media/lib/10-04-2024/man-hinh-gaming-lg-27gr75q-b-mo-ta-4.jpg\" width=\"900\" height=\"506\"></figure>',3,'màn hình. LG 27 in, màn hình led',0,1),(9,'Ổ cứng HDD Seagate IronWolf 10TB 3.5 inch, 7200RPM ,SATA3, 256MB Cache (ST10000VN000)','o-cung-hdd-seagate-ironwolf-10tb-3.5-inch-7200rpm-sata3-256mb-cache-st10000vn000',8000000,7800000,1,'http://localhost/webshop/uploads/65339_o_cung_hdd_seagate_ironwolf_10tb_3_5_inch_st10000vn000__1_.jpg','http://localhost/webshop/uploads/65339_o_cung_hdd_seagate_ironwolf_10tb_3_5_inch_st10000vn000__1_1.jpg#http://localhost/webshop/uploads/65339_o_cung_hdd_seagate_ironwolf_10tb_3_5_inch_st10000vn000__2_.jpg#http://localhost/webshop/uploads/65339_o_cung_hdd_seagate_ironwolf_10tb_3_5_inch_st10000vn000__3_.jpg#http://localhost/webshop/uploads/65339_o_cung_hdd_seagate_ironwolf_10tb_3_5_inch_st10000vn000_s.jpg','<p>Dòng sản phẩm <strong>HDD Seagate IronWolf&nbsp; </strong>là một lựa chọn tuyệt vời cho việc nâng cấp các ổ cứng lưu trữ mạng(<strong>NAS</strong>).&nbsp;<strong>Seagate IronWolf&nbsp; </strong>kết hợp công nghệ flash NAND mới nhất&nbsp;với ổ cứng truyền thống&nbsp;cho hiệu năng và độ bền bỉ&nbsp;khi thực hiện tải công việc nặng nề.</p>','<h3><strong>Tính năng nổi bật của sản phẩm</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/35237_22_03.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"100%\"></figure><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/35237_22_02.jpg\" alt=\"Ổ cứng HDD Seagate IRONWOLF 2TB\" width=\"100%\"></figure><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/35237_22_04.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"100%\"></figure><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>Dòng sản phẩm <strong>HDD Seagate IronWolf&nbsp; </strong>là một lựa chọn tuyệt vời cho việc nâng cấp các ổ cứng lưu trữ mạng(<strong>NAS</strong>).&nbsp;<strong>Seagate IronWolf&nbsp; </strong>kết hợp công nghệ flash NAND mới nhất&nbsp;với ổ cứng truyền thống&nbsp;cho hiệu năng và độ bền bỉ&nbsp;khi thực hiện tải công việc nặng nề.</p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/04-07-2022/o-cung-hdd-seagate-ironwolf-pro-mota6.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"100%\"></figure><p><strong>Seagate IronWolf trang bị công nghệ AgileArray</strong></p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/04-07-2022/o-cung-hdd-seagate-ironwolf-pro-mota1.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"100%\"></figure><ul><li>&nbsp;Ổ cứng HDD Seagate IronWolf&nbsp; được trang bị công nghệ AgileArray giúp tối ưu hóa hệ thống NAS, trong đó có 3 tính năng chính là cân bằng ổ đĩa, phục hồi lỗi RAID và quản lý nguồn điện.</li><li>&nbsp;Công nghệ tiên tiến AgileArray tích hợp cảm biến cân bằng giúp ổ cứng nhận biết sự rung động của hệ thống NAS và điều chỉnh để hạn chế việc phát sinh lỗi đọc/ghi dữ liệu.</li></ul><p>Ngoài ra, việc tối ưu hệ thống RAID còn nhờ vào khả năng phục hồi lỗi, tăng hiệu suất và giúp đảm bảo tính nguyên vẹn của dữ liệu.</p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/04-07-2022/o-cung-hdd-seagate-ironwolf-pro-mota4.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"100%\"></figure><p>&nbsp;</p><p><br>Phần mềm tích hợp Health Management IronWolf giúp bảo vệ hệ thống lưu trữ NAS của bạn bằng việc phòng ngừa,can thiệp và phục hồi dữ liệu.</p><p>Dòng ổ cứng IronWolf Pro của Seagate được thiết kế nhằm phục vụ cho các hệ thống lưu trữ mạng NAS dành cho doanh nghiệp vừa và nhỏ cũng như đám mây cá nhân, hướng đến sự bền bỉ, khả năng mở rộng lưu trữ nhanh chóng cũng như môi trường làm việc liên tục.</p><p>Cảm biến quay vòng (RV). Đầu tiên trong lớp của ổ cứng để bao gồm cảm biến RV để duy trì hiệu suất cao trong hệ thống NAS</p><h3><strong>Seagate Rescue Data Recovery</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/04-07-2022/o-cung-hdd-seagate-ironwolf-pro-mota5.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"100%\"></figure><p>&nbsp;</p><p>Ổ cứng HDD Seagate IronWolf hỗ trợ với phầm mềm Phục hồi cứu hộ dữ liệu này tạo nên sự an tâm cho bất kỳ trường hợp nào gây hư hại đến hệ thống lưu trữ dữ liệu NAS với tỷ lệ thành công lên đến 90% trong phục hồi .</p><h3><strong>Ổ cứng Seagate Ironwolf Pro tuổi thọ cao</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/04-07-2022/o-cung-hdd-seagate-ironwolf-pro-mota2.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"100%\"></figure><ul><li>&nbsp;Seagate Ironwolf ổ cứng có tuổi thọ trung bình 1,2 triệu giờ MTBF, thời hạn bảo hành 5 năm .(TCO) trên ổ đĩa máy tính để bàn với chi phí bảo trì giảm.</li><li>&nbsp;Nhiều người dùng có thể tự tin tải lên và tải dữ liệu lên máy chủ NAS, IronWolf có thể xử lý khối lượng công việc, cho dù bạn là một chuyên gia sáng tạo một nhỏ.</li><li>&nbsp;Ổ cứng Seagate Ironwolf được thiết kế để luôn hoạt động trên 24×7 luôn hoạt động.</li></ul>',1,'ổ cứng, hdd, ổ cứng 10tb',18,1),(10,'Ổ cứng HDD Seagate IronWolf 8TB 3.5 inch, 7200RPM, SATA, 256MB Cache (ST8000VN004)','o-cung-hdd-seagate-ironwolf-8tb-3.5-inch-7200rpm-sata-256mb-cache-st8000vn004',4500000,4300000,1,'http://localhost/webshop/uploads/35240_hdd_seagate_ironwolf_nas_8tb_3_5_inch___7200rpm.jpg','http://localhost/webshop/uploads/35240_hdd_seagate_ironwolf_nas_8tb_3_5_inch___7200rpm1.jpg#http://localhost/webshop/uploads/35240_o_cung_hdd_seagate_ironwolf_8tb_3_5_inch_7200rpm_sata3_256mb_cache_st8000vn004_011.jpg#http://localhost/webshop/uploads/35240_o_cung_hdd_seagate_ironwolf_8tb_3_5_inch_7200rpm_sata3_256mb_cache_st8000vn004_022.jpg#http://localhost/webshop/uploads/35240_o_cung_hdd_seagate_ironwolf_8tb_3_5_inch_7200rpm_sata3_256mb_cache_st8000vn004_033.jpg','<p>Ổ cứng HDD Seagate IronWolf&nbsp; được trang bị công nghệ AgileArray giúp tối ưu hóa hệ thống NAS, trong đó có 3 tính năng chính là cân bằng ổ đĩa, phục hồi lỗi RAID và quản lý nguồn điện.</p><p>Công nghệ tiên tiến AgileArray tích hợp cảm biến cân bằng giúp ổ cứng nhận biết sự rung động của hệ thống NAS và điều chỉnh để hạn chế việc phát sinh lỗi đọc/ghi dữ liệu.</p>','<h3><strong>Tính năng nổi bật của sản phẩm</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/35237_22_03.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"800\"></figure><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/35237_22_02.jpg\" alt=\"Ổ cứng HDD Seagate IRONWOLF 2TB\" width=\"800\"></figure><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/35237_22_04.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"100%\"></figure><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>Dòng sản phẩm <strong>HDD Seagate IronWolf&nbsp; </strong>là một lựa chọn tuyệt vời cho việc nâng cấp các ổ cứng lưu trữ mạng(<strong>NAS</strong>).&nbsp;<strong>Seagate IronWolf&nbsp; </strong>kết hợp công nghệ flash NAND mới nhất&nbsp;với ổ cứng truyền thống&nbsp;cho hiệu năng và độ bền bỉ&nbsp;khi thực hiện tải công việc nặng nề.</p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/04-07-2022/o-cung-hdd-seagate-ironwolf-pro-mota6.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"800\"></figure><p><strong>Seagate IronWolf trang bị công nghệ AgileArray</strong></p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/04-07-2022/o-cung-hdd-seagate-ironwolf-pro-mota1.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"800\"></figure><ul><li>&nbsp;Ổ cứng HDD Seagate IronWolf&nbsp; được trang bị công nghệ AgileArray giúp tối ưu hóa hệ thống NAS, trong đó có 3 tính năng chính là cân bằng ổ đĩa, phục hồi lỗi RAID và quản lý nguồn điện.</li><li>&nbsp;Công nghệ tiên tiến AgileArray tích hợp cảm biến cân bằng giúp ổ cứng nhận biết sự rung động của hệ thống NAS và điều chỉnh để hạn chế việc phát sinh lỗi đọc/ghi dữ liệu.</li></ul><p>Ngoài ra, việc tối ưu hệ thống RAID còn nhờ vào khả năng phục hồi lỗi, tăng hiệu suất và giúp đảm bảo tính nguyên vẹn của dữ liệu.</p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/04-07-2022/o-cung-hdd-seagate-ironwolf-pro-mota4.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"800\"></figure><p>&nbsp;</p><p><br>Phần mềm tích hợp Health Management IronWolf giúp bảo vệ hệ thống lưu trữ NAS của bạn bằng việc phòng ngừa,can thiệp và phục hồi dữ liệu.</p><p>Dòng ổ cứng IronWolf Pro của Seagate được thiết kế nhằm phục vụ cho các hệ thống lưu trữ mạng NAS dành cho doanh nghiệp vừa và nhỏ cũng như đám mây cá nhân, hướng đến sự bền bỉ, khả năng mở rộng lưu trữ nhanh chóng cũng như môi trường làm việc liên tục.</p><p>Cảm biến quay vòng (RV). Đầu tiên trong lớp của ổ cứng để bao gồm cảm biến RV để duy trì hiệu suất cao trong hệ thống NAS</p><h3><strong>Seagate Rescue Data Recovery</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/04-07-2022/o-cung-hdd-seagate-ironwolf-pro-mota5.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"800\"></figure><p>&nbsp;</p><p>Ổ cứng HDD Seagate IronWolf hỗ trợ với phầm mềm Phục hồi cứu hộ dữ liệu này tạo nên sự an tâm cho bất kỳ trường hợp nào gây hư hại đến hệ thống lưu trữ dữ liệu NAS với tỷ lệ thành công lên đến 90% trong phục hồi .</p><h3><strong>Ổ cứng Seagate Ironwolf Pro tuổi thọ cao</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/04-07-2022/o-cung-hdd-seagate-ironwolf-pro-mota2.jpg\" alt=\"Ổ cứng HDD Seagate IronWolf \" width=\"800\"></figure><ul><li>&nbsp;Seagate Ironwolf là <a href=\"https://hacom.vn/o-cung-hdd-desktop\">ổ cứng hdd</a> có tuổi thọ trung bình 1,2 triệu giờ MTBF, thời hạn bảo hành 5 năm .(TCO) trên ổ đĩa máy tính để bàn với chi phí bảo trì giảm.</li><li>&nbsp;Nhiều người dùng có thể tự tin tải lên và tải dữ liệu lên máy chủ NAS, IronWolf có thể xử lý khối lượng công việc, cho dù bạn là một chuyên gia sáng tạo một nhỏ.</li><li>&nbsp;Ổ cứng Seagate Ironwolf được thiết kế để luôn hoạt động trên 24×7 luôn hoạt động.</li></ul><p><a href=\"javascript:void(0)\"><strong>Thu gọn</strong></a></p>',1,'ổ cứng, hdd, ổ cứng 8tb',0,1),(11,'Ram Desktop Adata XPG Spectrix D50 RGB White (AX4U32008G16A-SW50) 8GB (1x8GB) DDR4 3200Mhz','ram-desktop-adata-xpg-spectrix-d50-rgb-white-ax4u32008g16a-sw50-8gb-1x8gb-ddr4-3200mhz',1500000,900000,1,'http://localhost/webshop/uploads/67821_ram_desktop_adata_xpg_spectrix_d50_rgb_white_ax4u32008g16a_sw50_8gb_1x8gb_ddr4_3200mhz__3_.jpg','http://localhost/webshop/uploads/67821_ram_desktop_adata_xpg_spectrix_d50_rgb_white_ax4u32008g16a_sw50_8gb_1x8gb_ddr4_3200mhz__1_.jpg#http://localhost/webshop/uploads/67821_ram_desktop_adata_xpg_spectrix_d50_rgb_white_ax4u32008g16a_sw50_8gb_1x8gb_ddr4_3200mhz__2_.jpg#http://localhost/webshop/uploads/67821_ram_desktop_adata_xpg_spectrix_d50_rgb_white_ax4u32008g16a_sw50_8gb_1x8gb_ddr4_3200mhz__3_1.jpg','<p>Được sản xuất bằng chip và PCB chất lượng cao nhất, <a href=\"https://hacom.vn/ram-ddr4\">Ram Desktop</a> Adata XPG D50 cung cấp độ ổn định, độ tin cậy cao nhất và tốc độ lên đến 4800MHz. Hơn nữa, nó hỗ trợ các nền tảng Intel và AMD mới nhất.</p>','<h3><strong>Ram DDR4 tốc độ cao</strong></h3><p>Được sản xuất bằng chip và PCB chất lượng cao nhất, <a href=\"https://hacom.vn/ram-ddr4\">Ram Desktop</a> Adata XPG D50 cung cấp độ ổn định, độ tin cậy cao nhất và tốc độ lên đến 4800MHz. Hơn nữa, nó hỗ trợ các nền tảng Intel và AMD mới nhất.</p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/22-09-2022/ram-desktop-adata-xpg-spectrix-d50-rgb-white-ax4u32008g16a-sw50-8gb-1x8gb-ddr4-3200mhz-motaf.jpg\" alt=\"Ram Desktop Adata XPG Spectrix D50 RGB White (AX4U32008G16A-SW50) 8GB (1x8GB) DDR4 3200Mhz \" width=\"100%\"></figure><h3><strong>Thiết kế chắc chắn&nbsp;</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/22-09-2022/ram-desktop-adata-xpg-spectrix-d50-rgb-white-ax4u32008g16a-sw50-8gb-1x8gb-ddr4-3200mhz-mota3.jpg\" alt=\"Ram Desktop Adata XPG Spectrix D50 RGB White (AX4U32008G16A-SW50) 8GB (1x8GB) DDR4 3200Mhz \" width=\"100%\"></figure><p>D50 có một bộ tản nhiệt bằng kim loại dày 1,95mm được cấu tạo vững chắc không chỉ mang lại độ bền tuyệt vời mà còn tạo ra một không khí mạnh mẽ và hiệu suất cao.</p><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/22-09-2022/ram-desktop-adata-xpg-spectrix-d50-rgb-white-ax4u32008g16a-sw50-8gb-1x8gb-ddr4-3200mhz-mota1.jpg\" alt=\"Ram Desktop Adata XPG Spectrix D50 RGB White (AX4U32008G16A-SW50) 8GB (1x8GB) DDR4 3200Mhz\" width=\"100%\"></figure><h3><strong>Tùy chỉnh RGB theo cách của bạn</strong></h3><figure class=\"image\"><img src=\"https://hanoicomputercdn.com/media/lib/22-09-2022/ram-desktop-adata-xpg-spectrix-d50-rgb-white-ax4u32008g16a-sw50-8gb-1x8gb-ddr4-3200mhz-rgb.jpg\" alt=\"Ram Desktop Adata XPG Spectrix D50 RGB White (AX4U32008G16A-SW50) 8GB (1x8GB) DDR4 3200Mhz\" width=\"100%\"></figure><p>D50 có vẻ ngoài sang trọng,c ác đường nét hình học đơn giản và panel RGB hình tam giác, kết hợp cới ứng dụng XPG RGB Sync hoặc phần mềm RGB từ một thương hiệu bo mạch chủ lớn, hãy chuyển đổi giữa ba chế độ RGB được thiết lặp sẵn. Ngoài ba chế độ, bạn cũng có thể đặt chế độ này thành chế độ Âm nhạc để đồng bộ hóa với những giai điệu yêu thích của bạn.</p>',1,'ram, ram rgb, ram 8gb',1,1),(12,'Thùng máy Case Thermaltake CTE E600 MX Hydrangea Blue Mid Tower Chassis','thung-may-case-thermaltake-cte-e600-mx-hydrangea-blue-mid-tower-chassis',4300000,4000000,2,'http://localhost/webshop/uploads/ca-1y2-00mfwn-00_04_340961d6de8c45e2a59d5377e6946558_master.png','http://localhost/webshop/uploads/ca-1y2-00mfwn-00_04_340961d6de8c45e2a59d5377e6946558_master_(1).png#http://localhost/webshop/uploads/ca-1y2-00mfwn-00_02_2cc1b675f11647588cd5f5b3ef98e2a9_master.png#http://localhost/webshop/uploads/ca-1y2-00mfwn-00_03_dafeb3d6c769426480dbfaafe78b38d7_master.png#http://localhost/webshop/uploads/ca-1y2-00mfwn-00_04_340961d6de8c45e2a59d5377e6946558_master1.png','<ul><li><strong>Hãng sản xuất:</strong> Thermaltake</li><li><strong>Mã sản phẩm:</strong> Thermaltake CTE E600</li><li><strong>Bảo hành:</strong> 12 tháng</li><li><strong>Xem thêm:</strong><ul><li><a href=\"https://tinhocngoisao-1.myharavan.com/products/thung-may-case-thermaltake-cte-e600-mx-mid-tower-chassis-den-khong-kem-fan-ca-1y3-00m1wn-00\"><strong>Thermaltake CTE E600 MX Mid Tower Chassis</strong></a></li><li><a href=\"https://tinhocngoisao-1.myharavan.com/products/thung-may-case-thermaltake-cte-e600-mx-hydrangea-blue-mid-tower-chassis-xanh-khong-kem-fan-ca-1y3-00mfwn-00\"><strong>Thermaltake CTE E600 MX Snow Mid Tower Chassis</strong></a></li></ul></li></ul>','<ul><li><strong>Hãng sản xuất:</strong> Thermaltake</li><li><strong>Mã sản phẩm:</strong> Thermaltake CTE E600</li><li><strong>Bảo hành:</strong> 12 tháng</li><li><strong>Xem thêm:</strong><ul><li><a href=\"https://tinhocngoisao-1.myharavan.com/products/thung-may-case-thermaltake-cte-e600-mx-mid-tower-chassis-den-khong-kem-fan-ca-1y3-00m1wn-00\"><strong>Thermaltake CTE E600 MX Mid Tower Chassis</strong></a></li><li><a href=\"https://tinhocngoisao-1.myharavan.com/products/thung-may-case-thermaltake-cte-e600-mx-hydrangea-blue-mid-tower-chassis-xanh-khong-kem-fan-ca-1y3-00mfwn-00\"><strong>Thermaltake CTE E600 MX Snow Mid Tower Chassis</strong></a></li></ul></li></ul>',4,'vỏ case, led, blue case',4,1),(13,'Ram PC Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB) (KF432C16BB/8)','ram-pc-kingston-fury-beast-8gb-ddr4-3200mhz-1x-8gb-kf432c16bb',1300000,1000000,2,'http://localhost/webshop/uploads/ram_kingston_8gb.png','http://localhost/webshop/uploads/ram_kingston_8gb1.png#http://localhost/webshop/uploads/ram_kingston_8gb_1.png#http://localhost/webshop/uploads/ram_kingston_8gb_2.png#http://localhost/webshop/uploads/ram_kingston_8gb_3.png','<p><strong>RAM PC Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB)</strong> là lựa chọn tuyệt vời cho những người muốn nâng cấp hiệu năng và phong cách cho <a href=\"https://tinhocngoisao.com/collections/pc-may-tinh-de-ban\">PC</a> của mình. Sản phẩm mang đến hiệu suất vượt trội, giúp máy tính hoạt động mượt mà, đa nhiệm hiệu quả và xử lý các tác vụ nặng một cách trơn tru, đồng thời tô điểm thêm vẻ đẹp cho hệ thống PC.</p>','<p><strong>Đặc điểm nổi bật:</strong></p><ul><li><a href=\"https://tinhocngoisao.com/collections/bo-nho-ram\">RAM PC DDR4</a> với tốc độ 3200Mhz,&nbsp;xử lý đồ họa, chơi game&nbsp;mượt mà, tốc độ phản hồi nhanh chóng.</li><li>Dung lượng 8GB đáp ứng nhu cầu sử dụng phổ biến, phù hợp với đa số PC hiện nay.</li><li>Tích hợp hệ thống tản nhiệt hiện đại, thiết bị luôn hoạt động ổn định, kể cả khi tải nặng</li><li>Thiết kế độc đáo&nbsp;mang đến phong cách sang trọng cho hệ thống PC.</li></ul><h2><strong>RAM PC Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB): Hiệu năng mạnh mẽ, phong cách ấn tượng</strong></h2><p><strong>RAM PC Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB)</strong> là lựa chọn tuyệt vời cho những người muốn nâng cấp hiệu năng và phong cách cho <a href=\"https://tinhocngoisao.com/collections/pc-may-tinh-de-ban\">PC</a> của mình. Sản phẩm mang đến hiệu suất vượt trội, giúp máy tính hoạt động mượt mà, đa nhiệm hiệu quả và xử lý các tác vụ nặng một cách trơn tru, đồng thời tô điểm thêm vẻ đẹp cho hệ thống PC.</p><h3><strong>Hiệu suất vượt trội, đa nhiệm mượt mà</strong></h3><p><strong>RAM Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB)</strong> có&nbsp;tốc độ bus 3200Mhz, bạn có thể thoải mái làm mọi thứ, từ lướt web, xem phim đến làm việc và chơi game mà không gặp bất kỳ trở ngại nào. Không chỉ giup&nbsp;mọi tác vụ được xử lý nhanh chóng, chính xác, tốc độ bus 3200Mhz siêu nhanh giúp bạn luôn chiếm ưu thế trong mọi trận đấu, phản ứng tức thời với mọi tình huống.</p><p>Có thể thấy, so với RAM DDR4 thông thường với tốc độ 2400Mhz, sản phẩm này cho hiệu năng nhanh hơn đáng kể, phù hợp cho người dùng có nhu cầu hiệu suất cao.</p><figure class=\"image\"><img style=\"aspect-ratio:800/450;\" src=\"https://file.hstatic.net/200000420363/file/ram_kingston_8gb_3.jpg\" alt=\"RAM Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB) RAM Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB) có&nbsp;tốc độ bus 3200Mhz,&nbsp;mang đến hiệu năng vượt trội\" width=\"800\" height=\"450\"></figure><h3><strong>Dung lượng đáp ứng nhu cầu sử dụng</strong></h3><p>RAM Kingston Fury Beast&nbsp; với 8GB RAM - lựa chọn hoàn hảo cho hầu hết người dùng. So với 4GB, 8GB mang đến hiệu suất làm việc và giải trí tốt hơn đáng kể. Bạn sẽ cảm nhận được sự khác biệt rõ rệt khi sử dụng máy tính.</p><figure class=\"image\"><img style=\"aspect-ratio:800/450;\" src=\"https://file.hstatic.net/200000420363/file/ram_kingston_8gb_2.jpg\" alt=\"RAM Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB) có dung lượng 8GB là lựa chọn phổ biến cho đa số PC hiện nay\" width=\"800\" height=\"450\"></figure><h3><strong>Tương thích AMD Ryzen™, dễ dàng nâng cấp</strong></h3><p><strong>RAM PC Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB)</strong> được thiết kế tương thích với hầu hết các <a href=\"https://tinhocngoisao.com/collections/bo-mach-chu\">mainboard</a>&nbsp;hỗ trợ DDR4,&nbsp;AMD Ryzen™, giúp người dùng dễ dàng nâng cấp cho PC của mình. Sản phẩm có thiết kế nhỏ gọn, không chiếm nhiều diện tích trong PC, đảm bảo tương thích với nhiều loại case và hệ thống khác nhau.</p><figure class=\"image\"><img style=\"aspect-ratio:800/450;\" src=\"https://file.hstatic.net/200000420363/file/ram_kingston_8gb_1.jpg\" alt=\"RAM PC Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB) được thiết kế tương thích với hầu hết các mainboard&nbsp;hỗ trợ DDR4,&nbsp;AMD Ryzen™\" width=\"800\" height=\"450\"></figure><h3><strong>Tính năng XMP tối ưu hiệu năng</strong></h3><p>Một điểm cộng nữa là <strong>RAM Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB) </strong>được&nbsp;tích hợp tính năng XMP giúp dễ dàng ép xung, nâng hiệu năng tối đa cho hệ thống. Chỉ cần bật tính năng XMP trong BIOS, bạn có thể đẩy tốc độ hoạt động của <a href=\"https://tinhocngoisao.com/collections/bo-nho-ram\">RAM</a> lên 3200Mhz, mang đến hiệu suất tối ưu cho các tác vụ đòi hỏi hiệu năng cao như chơi game, thiết kế đồ họa, chỉnh sửa video. So với RAM thông thường, việc ép xung giúp nâng cao hiệu suất xử lý, mang lại trải nghiệm mượt mà hơn.</p><figure class=\"image\"><img style=\"aspect-ratio:800/450;\" src=\"https://file.hstatic.net/200000420363/file/ram_kingston_8gb.jpg\" alt=\"RAM Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB) được&nbsp;tích hợp tính năng XMP giúp dễ dàng ép xung, nâng hiệu năng tối đa cho hệ thống\" width=\"800\" height=\"450\"></figure><p><strong>RAM PC Kingston Fury Beast 8GB DDR4 3200Mhz (1x 8GB)</strong> là lựa chọn đáng giá cho người dùng muốn nâng cấp hiệu năng và phong cách cho PC của mình. Với tốc độ 3200Mhz, dung lượng 8GB, tản nhiệt hiệu quả và thiết kế độc đáo, sản phẩm này mang đến hiệu suất vượt trội, giúp máy tính hoạt động mượt mà, đa nhiệm hiệu quả, xử lý các tác vụ nặng một cách trơn tru, đồng thời tô điểm thêm vẻ đẹp cho hệ thống PC.</p>',1,'ram, lưu trữ, ssd',6,1),(14,'Màn Hình Dell HP 12050 24 in','man-hinh-dell-hp-12050-24-in',1500000,1000000,2,'http://localhost/webshop/uploads/hp-v24i-23-8-inch-fhd-thumb-600x600.jpg','http://localhost/webshop/uploads/3tfcafgr6uofb.jpg#http://localhost/webshop/uploads/250_8900_v24i__01_.jpg','<p>Công ty Duy Long chuyên cung cấp <strong>màn hình máy tính HP</strong> để bàn chất lượng cao mới dùng trong thiết kế đồ họa, giải trí cũng như văn phòng</p><p>Cung cấp màn hình HP chính hãng bảo hành dài</p><p><strong>Màn hình máy tính</strong> do Cty Duy Long bán ra luôn đảm bảo chất lượng cao và có nguồn gốc rõ dàng, chính hãng thương hiệu nổi tiếng như <strong>Dell</strong> - <strong>Hp compaq</strong> - <strong>SamSung</strong> - <strong>LG</strong> - <strong>Lenovo</strong> ..... Đây chính là những đối tác tin cậy và đã có UY TÍN hợp tác với Duy Long</p>','<h2><strong>Màn hình HP</strong></h2><figure class=\"image\"><img style=\"aspect-ratio:600/458;\" src=\"https://bizweb.dktcdn.net/thumb/grande/100/306/444/products/man-hinh-hp-p24v-g4-dellpc.jpg?v=1645101850247\" width=\"600\" height=\"458\"></figure><p>\"\"\"Sản phẩm mới&nbsp;chính hãng</p><p>Giá đã gồm VAT, CO, CQ</p><p>Bảo hành 36&nbsp;tháng tại nơi sử dụng trên toàn quốc</p><p>\"\"\"Màn hình HP cũng như Màn hình Dell - luôn là sản phẩm tuyệt vời nhất cho mọi nhu cầu, bởi đặc tính siêu bền, dùng 10 năm vẫn đẹp như mới, màu sắc sinh động và trung thực nhất, đặc biệt tốt nhất cho mắt để làm việc cả ngày quanh năm.</p><p>Kiểu dáng luôn sang trọng, khỏe khoắn, hiện đại, đẳng cấp cho mọi không gian làm việc, giải trí.</p>',3,'màn hình, hp, màn hình 24 in',148,1);
/*!40000 ALTER TABLE `sanpham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tintuc`
--

DROP TABLE IF EXISTS `tintuc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tintuc` (
  `MaTinTuc` int NOT NULL AUTO_INCREMENT,
  `TieuDe` varchar(500) COLLATE utf8mb3_unicode_ci NOT NULL,
  `NoiDung` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `DuongDan` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `The` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `MaNhanVien` int NOT NULL,
  `HinhAnh` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TrangThai` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`MaTinTuc`),
  KEY `MaNhanVien` (`MaNhanVien`),
  CONSTRAINT `tintuc_ibfk_1` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tintuc`
--

LOCK TABLES `tintuc` WRITE;
/*!40000 ALTER TABLE `tintuc` DISABLE KEYS */;
/*!40000 ALTER TABLE `tintuc` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-06 19:31:20
