-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 03:08 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlydathang`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `MSHH` int(11) NOT NULL,
  `SoDonDH` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL DEFAULT 1,
  `GiaDatHang` decimal(15,2) NOT NULL,
  `GiamGia` decimal(2,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chitietdathang`
--

INSERT INTO `chitietdathang` (`MSHH`, `SoDonDH`, `SoLuong`, `GiaDatHang`, `GiamGia`) VALUES
(1, 1, 1, '26000000.00', NULL),
(2, 1, 1, '300000.00', NULL),
(7, 1, 2, '1000000.00', NULL),
(8, 1, 1, '8000000.00', NULL),
(6, 3, 1, '22000000.00', NULL),
(9, 6, 1, '17000000.00', NULL),
(10, 7, 1, '22000000.00', NULL),
(11, 7, 1, '7000000.00', NULL),
(12, 7, 1, '4600000.00', NULL);

--
-- Triggers `chitietdathang`
--
DELIMITER $$
CREATE TRIGGER `INSERT_ChiTietDatHang` BEFORE INSERT ON `chitietdathang` FOR EACH ROW BEGIN
	DECLARE sl_hh INT; -- S? lu?ng h?ng h?a
	SELECT HH.SoLuongHang INTO sl_hh FROM HangHoa AS HH
	WHERE NEW.MSHH = HH.MSHH;
	
	IF NEW.SoLuong >= sl_hh
	THEN
		SIGNAL SQLSTATE '45000'
   		SET MESSAGE_TEXT = 'so luong trong chi tiet dat hang > so luong trong bang hang hoa';
	END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSKH` int(11) NOT NULL,
  `MSNV` int(11) DEFAULT NULL,
  `NgayDH` date NOT NULL DEFAULT current_timestamp(),
  `NgayGH` date DEFAULT NULL CHECK (`NgayDH` <= `NgayGH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `NgayGH`) VALUES
(1, 1, 1, '2021-06-08', '2021-06-10'),
(3, 3, 4, '2021-06-08', '2021-06-09'),
(6, 1, NULL, '2021-06-08', NULL),
(7, 7, NULL, '2021-06-08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `diachikh`
--

CREATE TABLE `diachikh` (
  `MaDC` int(11) NOT NULL,
  `DiaChi` varchar(30) CHARACTER SET utf8 NOT NULL,
  `MSKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diachikh`
--

INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
(1, 'An Giang', 1),
(2, 'Cần Thơ', 2),
(3, 'Hồ Chí Minh', 3),
(6, 'an giang', 1),
(7, 'hà nội', 7);

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` int(11) NOT NULL,
  `TenHH` varchar(30) CHARACTER SET utf8 NOT NULL,
  `QuyCach` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gia` decimal(15,2) NOT NULL,
  `SoLuongHang` int(11) NOT NULL,
  `MaLoaiHang` int(11) NOT NULL,
  `Location` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GhiChu` varchar(128) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `QuyCach`, `Gia`, `SoLuongHang`, `MaLoaiHang`, `Location`, `GhiChu`) VALUES
(1, 'Dell Inspirion N5502A ', 'New', '26000000.00', 3, 1, 'images/dell15.jpg', 'CPU: Intel® Core™ i7-1165G7 (upto 4.70GHz, 12MB)\r\nRAM: 8GB (1x8GB) DDR4 3200MHz ( 2 khe )\r\nỔ cứng: 512GB M.2 PCIe NVMe SSD\r\nVGA:'),
(2, 'Tai nghe Gaming', 'new', '300000.00', 5, 3, 'images/taynghe.jpg', 'Micro Pro 6mm đẳng cấp\r\nMàng loa Pro-G 50mm\r\nĐiều khiển âm thanh trên dây\r\nTùy chọn kết nối bằng USB hoặc jack 3.5mm\r\nDùng được '),
(3, 'Asus RogStrix G512', 'new', '25000000.00', 5, 1, 'images/asusrogstrix.jpg', 'CPU: Intel® Core™ I5-10300H (2.50GHz upto 4.50GHz, 8MB)\r\nRAM: 8GB DDR4 3200MHz (2 khe, tối đa 32GB)\r\nỔ cứng: 512G M.2 NVMe™ PCIe'),
(4, 'SSD 512GB', 'new', '1000000.00', 5, 2, 'images/ssd.jpg', 'Kích thước: 2.5\"\r\nGiao diện: SATA 3.0 (6Gb/giây)\r\nDung lượng: 512GB\r\nTốc độ đọc/ghi: 550/520MB/s'),
(5, 'Dell XPS 13', 'new', '37890000.00', 5, 1, 'images/dellxps13.jpg', 'CPU: Intel Core i5-1135G7 (tối đa 4.20 GHz, 8MB)\r\nRAM: 8GB LPDDR4x 4267MHz( onboard)\r\nỔ cứng: 512GB M.2 PCIe NVMe\r\nVGA: Intel® I'),
(6, 'Màn hình Dell', 'new', '22000000.00', 10, 3, 'images/manhinhdell.jpg', 'Loại màn hình: Màn hình cong\r\nTỉ lệ: 21:9\r\nKích thước: 34.1 inch\r\nTấm nền: IPS'),
(7, 'Ram 8GB', 'new', '1000000.00', 6, 2, 'images/ram.jpg', 'Capacity: 8GB\r\nMemory Type: DDR4\r\nModule Type/Form Factor: 288-pin UDIMM\r\nDesign Specification: JEDEC R/C'),
(8, 'Chuột ASUS', 'new', '8000000.00', 7, 3, 'images/chuot.jpg', 'Chuột ASUS ROG Strix Impact II\r\nKết cấu nhẹ giúp game thủ thoải mái khi sư rdungj\r\nNút bấm siêu nhanh\r\nCảm biến quang 6200 dpi'),
(9, 'Thùng Máy Asus', 'new', '17000000.00', 8, 3, 'images/thungmayasus.jpg', 'CPU: Intel Core i7-10700 (2.90GHz Upto 4.80GHz, 8 Cores 16 Threads, 16MB Cache)\r\nRAM: 8GB DDR4 U-DIMM\r\nỔ cứng: 256GB M.2 NVMe™ P'),
(10, 'Laptop HP Envy', 'new', '22000000.00', 5, 1, 'images/hpenvy.jpg', 'CPU: Intel® Core™ i5-1135G7 (4.20GHz, 8MB)\r\nRAM: 8GB DDR4 3200MHz (Onboard)\r\nỔ cứng: 256GB PCIe® NVMe™ M.2 SSD\r\nVGA: Intel Iris '),
(11, 'Card đồ họa', 'new', '7000000.00', 5, 2, 'images/carddohoa.jpg', 'Nvidia GeForce GTX 960 GPU (Kiến trúc Maxwell mới nhất)\r\nGiao tiếp : PCI Express x16 ver 3.0\r\nCuda core: 1024\r\nMemory: 2GB GDDR5'),
(12, 'Ổ cứng HDD', 'new', '4600000.00', 5, 2, 'images/hdd.png', 'Dung lượng: 6TB\r\nTốc độ vòng quay: 5400rpm\r\nBộ nhớ đệm: 256MB Cache\r\nKích thước: 3.5”');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` int(11) NOT NULL,
  `HoTenKH` varchar(50) CHARACTER SET utf8 NOT NULL,
  `TenCongTy` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `SoDienThoai` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `Email`) VALUES
(1, 'Mai Ngyuyễn Tấn Anh', 'Khoa Học Máy Tính', '0369344656', 'anhB1812326@student.ctu.edu.vn'),
(2, 'Nguyễn Văn Test', 'test', '147852369', 'test@gmail.com'),
(3, 'Trần Văn Test', 'test2', '789654123', 'test2@gmail.com'),
(4, 'Nguyễn Văn B', 'Đại Học Cần Thơ', '1475858888', 'vanb@gmail.com'),
(7, 'tan anh 2', 'ABC', '123123', 'asdasdasd@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHangHoa` int(11) NOT NULL,
  `TenLoaiHangHoa` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHangHoa`, `TenLoaiHangHoa`) VALUES
(1, 'Laptop'),
(2, 'Linh Kiện'),
(3, 'Phụ Kiện');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` int(11) NOT NULL,
  `HoTenNV` varchar(30) CHARACTER SET utf8 NOT NULL,
  `ChucVu` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `DiaChi` varchar(30) CHARACTER SET utf8 NOT NULL,
  `SoDienThoai` char(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`) VALUES
(1, 'Mai Nguyễn Tấn Anh', 'Nhân Viên', 'An Giang', '0369344656'),
(2, 'test', 'Nhân Viên', 'Cần Thơ', '1231'),
(3, '', '', '', ''),
(4, 'test', 'Nhân Viên', 'Cần Thơ', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`SoDonDH`,`MSHH`),
  ADD KEY `fk_MSHH` (`MSHH`);

--
-- Indexes for table `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `MSKH` (`MSKH`),
  ADD KEY `MSNV` (`MSNV`);

--
-- Indexes for table `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`MaDC`),
  ADD KEY `MSKH` (`MSKH`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `FK_MaLoaiHang` (`MaLoaiHang`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`),
  ADD UNIQUE KEY `SoDienThoai` (`SoDienThoai`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHangHoa`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`),
  ADD UNIQUE KEY `SoDienThoai` (`SoDienThoai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `diachikh`
--
ALTER TABLE `diachikh`
  MODIFY `MaDC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MSHH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  MODIFY `MaLoaiHangHoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MSNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `fk_MSHH` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`),
  ADD CONSTRAINT `fk_SoDonDH` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`);

--
-- Constraints for table `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`),
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`);

--
-- Constraints for table `diachikh`
--
ALTER TABLE `diachikh`
  ADD CONSTRAINT `diachikh_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`);

--
-- Constraints for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `FK_MaLoaiHang` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihanghoa` (`MaLoaiHangHoa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
