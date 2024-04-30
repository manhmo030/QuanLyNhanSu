-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 11:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlns`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `MaNV` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `MaNV`) VALUES
(1, 'admin1@gmail.com', '$2y$12$3JKWq41QOKClrrKsWOHThuEdx2fnmcoiD9x1raysgf/muofvmyZte', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bangluong`
--

CREATE TABLE `bangluong` (
  `MaLuong` bigint(20) NOT NULL,
  `MaNV` bigint(20) NOT NULL,
  `NgayNhanLuong` datetime NOT NULL,
  `TongLuongCB` float NOT NULL,
  `TongLuongTC` float NOT NULL,
  `TongBHXH` int(11) NOT NULL,
  `TongBHYT` int(11) NOT NULL,
  `TongBHTN` int(11) NOT NULL,
  `TongPhuCap` int(11) NOT NULL,
  `TongThue` int(11) NOT NULL,
  `LuongThucLinh` int(11) NOT NULL,
  `GhiChu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calam`
--

CREATE TABLE `calam` (
  `MaCa` bigint(20) NOT NULL,
  `TenCa` enum('Hành Chính','Sáng','Chiều','Tối') NOT NULL,
  `LoaiCa` enum('Cố Định','Linh Hoạt') NOT NULL,
  `GioBatDau` varchar(10) NOT NULL,
  `GioKetThuc` varchar(10) NOT NULL,
  `SoGioLamViec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calam`
--

INSERT INTO `calam` (`MaCa`, `TenCa`, `LoaiCa`, `GioBatDau`, `GioKetThuc`, `SoGioLamViec`) VALUES
(1, 'Hành Chính', 'Cố Định', '8:00 ', '17:30', 8),
(2, 'Sáng', 'Linh Hoạt', '8:00', '12:00', 4),
(3, 'Chiều', 'Linh Hoạt', '13:30', '17:30', 4),
(4, 'Tối', 'Linh Hoạt', '18:00', '22:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `MaCV` bigint(20) NOT NULL,
  `TenCV` varchar(50) NOT NULL,
  `CapBac` int(11) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `MaPB` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`MaCV`, `TenCV`, `CapBac`, `updated_at`, `MaPB`) VALUES
(1, 'Giám đốc điều hành', 1, NULL, 1),
(2, 'Giám đốc kinh doanh', 1, NULL, 1),
(3, 'Trưởng phòng nhân sự', 2, NULL, 1),
(4, 'Trưởng phòng kế toán', 2, NULL, 1),
(5, 'Trưởng phòng lễ tân', 2, NULL, 1),
(6, 'Trưởng phòng kinh doanh', 2, NULL, 1),
(7, 'Trưởng phòng kiểm soát nội bộ', 2, NULL, 1),
(8, 'Trưởng phòng vận hành', 2, NULL, 1),
(9, 'Thư ký nhân sự', 3, NULL, 1),
(10, 'Thư ký kế toán', 3, NULL, 1),
(11, 'Thư ký kinh doanh', 3, NULL, 1),
(12, 'Thư ký vận hành', 3, NULL, 1),
(13, 'Thư ký', 2, NULL, 1),
(14, 'Nhân viên', 4, '2024-04-29', 2),
(18, 'Nhân Viên', 1, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `dieuchuyennhanvien`
--

CREATE TABLE `dieuchuyennhanvien` (
  `MaPhieu` bigint(20) NOT NULL,
  `TenPhieu` varchar(50) NOT NULL,
  `MaNV` bigint(20) NOT NULL,
  `CVHienTai` bigint(20) NOT NULL,
  `CVChuyenDen` bigint(20) NOT NULL,
  `NgayKT` date NOT NULL,
  `NgayBD` date NOT NULL,
  `NgayDuyet` date DEFAULT NULL,
  `TrangThai` enum('Đã Duyệt','Đang Chờ','Từ Chối') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dieuchuyennhanvien`
--

INSERT INTO `dieuchuyennhanvien` (`MaPhieu`, `TenPhieu`, `MaNV`, `CVHienTai`, `CVChuyenDen`, `NgayKT`, `NgayBD`, `NgayDuyet`, `TrangThai`) VALUES
(1, 'ĐCPB - 01', 5, 5, 4, '2024-04-19', '2024-04-22', '2024-04-20', 'Từ Chối'),
(5, 'aaaa', 2, 11, 9, '2024-04-09', '2024-04-25', NULL, 'Đang Chờ');

-- --------------------------------------------------------

--
-- Table structure for table `hopdong`
--

CREATE TABLE `hopdong` (
  `MaHD` bigint(20) NOT NULL,
  `TenHD` varchar(50) NOT NULL,
  `MaLoaiHD` bigint(20) NOT NULL,
  `NgayKy` date NOT NULL,
  `NgayBatDau` date DEFAULT NULL,
  `NgayKetThuc` date DEFAULT NULL,
  `MaNV` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hopdong`
--

INSERT INTO `hopdong` (`MaHD`, `TenHD`, `MaLoaiHD`, `NgayKy`, `NgayBatDau`, `NgayKetThuc`, `MaNV`) VALUES
(1, 'HDTV - 01', 3, '2023-05-10', '2023-05-15', '2023-07-15', 2),
(2, 'HDKTH - 01', 3, '2023-10-21', '2023-10-23', '2024-04-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `khenthuongkiluat`
--

CREATE TABLE `khenthuongkiluat` (
  `MaKTKL` bigint(20) NOT NULL,
  `MaNV` bigint(20) NOT NULL,
  `MucKTKL` int(11) NOT NULL,
  `ThoiGian` datetime NOT NULL,
  `LyDo` varchar(50) NOT NULL,
  `SoTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khenthuongkiluat`
--

INSERT INTO `khenthuongkiluat` (`MaKTKL`, `MaNV`, `MucKTKL`, `ThoiGian`, `LyDo`, `SoTien`) VALUES
(1, 1, 1, '2024-04-19 15:58:06', 'Có những đóng góp giúp cho công ty thu hút khách h', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `loaihopdong`
--

CREATE TABLE `loaihopdong` (
  `MaLoaiHD` bigint(20) NOT NULL,
  `TenLoaiHD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loaihopdong`
--

INSERT INTO `loaihopdong` (`MaLoaiHD`, `TenLoaiHD`) VALUES
(1, 'Hợp đồng lao động không thời hạn'),
(2, 'Hợp đồng lao động có thời hạn'),
(3, 'Hợp đồng thử việc');

-- --------------------------------------------------------

--
-- Table structure for table `ngaynghi`
--

CREATE TABLE `ngaynghi` (
  `MaNgayNghi` bigint(20) NOT NULL,
  `TenNgayNghi` varchar(50) NOT NULL,
  `NgayBatDau` datetime NOT NULL,
  `NgayKetThuc` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ngaynghi`
--

INSERT INTO `ngaynghi` (`MaNgayNghi`, `TenNgayNghi`, `NgayBatDau`, `NgayKetThuc`) VALUES
(1, 'Ngày Chiến thắng 30/4 và ngày Quốc tế lao động 01/', '2024-04-27 15:39:37', '2024-05-01 15:39:37'),
(2, 'Ngày Quốc Khánh', '2024-08-31 15:48:24', '2024-09-03 15:48:24'),
(3, 'Tết Nguyên Đán', '2024-02-08 15:52:52', '2024-02-14 15:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` bigint(20) NOT NULL,
  `Hoten` varchar(50) DEFAULT NULL,
  `GioiTinh` varchar(10) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `DiaChi` varchar(100) DEFAULT NULL,
  `SoDienThoai` varchar(20) DEFAULT NULL,
  `SoCCCD` bigint(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `QueQuan` varchar(50) DEFAULT NULL,
  `MaCV` bigint(20) NOT NULL,
  `MaNgayNghi` bigint(20) DEFAULT NULL,
  `anh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `Hoten`, `GioiTinh`, `NgaySinh`, `DiaChi`, `SoDienThoai`, `SoCCCD`, `Email`, `QueQuan`, `MaCV`, `MaNgayNghi`, `anh`) VALUES
(1, 'Nguyễn Kiên Cường', 'nam', '1985-06-20', 'Ngõ 90, Thanh Xuân Trung, Thanh Xuân, Hà Nội', '0989746945', 38083000385, 'cuongnk@gmail.com', 'Hà Nội', 5, 0, 'anh1.jpg'),
(2, 'Nguyễn Thị Hồng Nhung', 'nữ', '1989-09-10', NULL, '0899845934', NULL, 'nhungnguyen@gmail.com', 'Khánh Hoà', 3, NULL, NULL),
(3, 'Trần Thị Mỹ Anh', 'nữ', '1990-10-06', NULL, '0988747922', NULL, 'myanh@gmail.com', 'Thái Bình', 4, NULL, NULL),
(4, 'Nguyễn Văn Được', 'nam', '1987-04-11', NULL, '0890483764', NULL, 'duocnv@gmail.com', 'Ninh Bình', 10, NULL, NULL),
(5, 'Lê Thu Nhung', 'nữ', '1990-10-21', NULL, '0998497235', NULL, 'nhungthu@gmail.com', 'Hà Nội', 5, NULL, NULL),
(6, 'Phạm Thị Duyên', 'nữ', '1989-11-29', NULL, '0928497456', NULL, 'duyenpt@gmail.com', 'Bắc Ninh', 6, NULL, NULL),
(7, 'Nguyễn Thị Thuỳ Dung', 'nữ', '1990-02-26', NULL, '0898973946', NULL, 'thuydung@gmail.com', 'Hà Nội', 11, NULL, NULL),
(8, 'Trần Văn Nam', 'nam', '1990-05-19', NULL, '0975743987', NULL, 'namtv@gmail.com', 'Ninh Bình', 7, NULL, NULL),
(9, 'Trần Văn Minh', 'Nữ', '1986-05-19', 'bắc ninh', '0998595349', 435465, 'minhtran@gmail.com', 'Hà Nội', 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien_calam`
--

CREATE TABLE `nhanvien_calam` (
  `Id` bigint(20) NOT NULL,
  `MaNV` bigint(20) NOT NULL,
  `MaCa` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `sogiolamhanhchinh` float DEFAULT NULL,
  `sogiotangca` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phongban`
--

CREATE TABLE `phongban` (
  `MaPB` bigint(20) NOT NULL,
  `TenPB` varchar(50) NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phongban`
--

INSERT INTO `phongban` (`MaPB`, `TenPB`, `updated_at`) VALUES
(1, 'Hành chính - Nhân sự', NULL),
(2, 'Kế toán', NULL),
(3, 'Lễ tân', NULL),
(4, 'Kinh doanh', NULL),
(5, 'Kiểm soát nội bộ', NULL),
(6, 'Vận hành', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bangluong`
--
ALTER TABLE `bangluong`
  ADD PRIMARY KEY (`MaLuong`),
  ADD KEY `fk_nhanvien_luong` (`MaNV`);

--
-- Indexes for table `calam`
--
ALTER TABLE `calam`
  ADD PRIMARY KEY (`MaCa`);

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`MaCV`),
  ADD KEY `fk_phongban_` (`MaPB`);

--
-- Indexes for table `dieuchuyennhanvien`
--
ALTER TABLE `dieuchuyennhanvien`
  ADD PRIMARY KEY (`MaPhieu`),
  ADD KEY `fk_nhanvien_dieuchuyen` (`MaNV`),
  ADD KEY `fk_chucvu1` (`CVHienTai`),
  ADD KEY `fk_chucvu2` (`CVChuyenDen`);

--
-- Indexes for table `hopdong`
--
ALTER TABLE `hopdong`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `fk_loai_hopdong` (`MaLoaiHD`),
  ADD KEY `fk_nhanvien_` (`MaNV`);

--
-- Indexes for table `khenthuongkiluat`
--
ALTER TABLE `khenthuongkiluat`
  ADD PRIMARY KEY (`MaKTKL`),
  ADD KEY `fk_nhanvien_ktkl` (`MaNV`);

--
-- Indexes for table `loaihopdong`
--
ALTER TABLE `loaihopdong`
  ADD PRIMARY KEY (`MaLoaiHD`);

--
-- Indexes for table `ngaynghi`
--
ALTER TABLE `ngaynghi`
  ADD PRIMARY KEY (`MaNgayNghi`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD KEY `fk_nhanvien_chucvu` (`MaCV`);

--
-- Indexes for table `nhanvien_calam`
--
ALTER TABLE `nhanvien_calam`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_nhanvien` (`MaNV`),
  ADD KEY `fk_calam` (`MaCa`);

--
-- Indexes for table `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`MaPB`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bangluong`
--
ALTER TABLE `bangluong`
  MODIFY `MaLuong` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calam`
--
ALTER TABLE `calam`
  MODIFY `MaCa` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `MaCV` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `dieuchuyennhanvien`
--
ALTER TABLE `dieuchuyennhanvien`
  MODIFY `MaPhieu` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hopdong`
--
ALTER TABLE `hopdong`
  MODIFY `MaHD` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `khenthuongkiluat`
--
ALTER TABLE `khenthuongkiluat`
  MODIFY `MaKTKL` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loaihopdong`
--
ALTER TABLE `loaihopdong`
  MODIFY `MaLoaiHD` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ngaynghi`
--
ALTER TABLE `ngaynghi`
  MODIFY `MaNgayNghi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNV` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nhanvien_calam`
--
ALTER TABLE `nhanvien_calam`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phongban`
--
ALTER TABLE `phongban`
  MODIFY `MaPB` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bangluong`
--
ALTER TABLE `bangluong`
  ADD CONSTRAINT `fk_nhanvien_luong` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MANV`);

--
-- Constraints for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD CONSTRAINT `fk_phongban_` FOREIGN KEY (`MaPB`) REFERENCES `phongban` (`MaPB`);

--
-- Constraints for table `dieuchuyennhanvien`
--
ALTER TABLE `dieuchuyennhanvien`
  ADD CONSTRAINT `fk_chucvu1` FOREIGN KEY (`CVHienTai`) REFERENCES `chucvu` (`MaCV`),
  ADD CONSTRAINT `fk_chucvu2` FOREIGN KEY (`CVChuyenDen`) REFERENCES `chucvu` (`MaCV`),
  ADD CONSTRAINT `fk_nhanvien_dieuchuyen` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MANV`);

--
-- Constraints for table `hopdong`
--
ALTER TABLE `hopdong`
  ADD CONSTRAINT `fk_loai_hopdong` FOREIGN KEY (`MaLoaiHD`) REFERENCES `loaihopdong` (`MaLoaiHD`),
  ADD CONSTRAINT `fk_nhanvien_` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Constraints for table `khenthuongkiluat`
--
ALTER TABLE `khenthuongkiluat`
  ADD CONSTRAINT `fk_nhanvien_ktkl` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MANV`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `fk_nhanvien_chucvu` FOREIGN KEY (`MaCV`) REFERENCES `chucvu` (`MaCV`);

--
-- Constraints for table `nhanvien_calam`
--
ALTER TABLE `nhanvien_calam`
  ADD CONSTRAINT `fk_calam` FOREIGN KEY (`MaCa`) REFERENCES `calam` (`MaCa`),
  ADD CONSTRAINT `fk_nhanvien` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MANV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
