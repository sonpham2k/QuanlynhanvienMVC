-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2021 lúc 06:41 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlynhanvien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `MACV` varchar(50) NOT NULL,
  `TENCV` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`MACV`, `TENCV`) VALUES
('GD', 'Giám đốc'),
('NVKD', 'Nhân viên kinh doanh'),
('NVKT', 'Nhân viên kế toán'),
('NVNS', 'Nhân viên nhân sự'),
('TPKD', 'Trưởng phòng kinh doanh'),
('TPKT', 'Trưởng phòng kế toán'),
('TPNS', 'Trưởng phòng nhân sự');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luong`
--

CREATE TABLE `luong` (
  `BACLUONG` varchar(50) NOT NULL,
  `LUONGCOBAN` varchar(50) NOT NULL,
  `HESOLUONG` varchar(50) NOT NULL,
  `HESOPHUCAP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `luong`
--

INSERT INTO `luong` (`BACLUONG`, `LUONGCOBAN`, `HESOLUONG`, `HESOPHUCAP`) VALUES
('1', '10000000', '10000000', '0.2'),
('2', '20000000', '10000000', '0.3'),
('3', '30000000', '10000000', '0.4'),
('4', '40000000', '10000000', '0.5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MANV` varchar(50) NOT NULL,
  `HOTEN` varchar(50) NOT NULL,
  `DANTOC` varchar(50) NOT NULL,
  `SODIENTHOAI` varchar(50) NOT NULL,
  `QUEQUAN` varchar(50) NOT NULL,
  `NGAYSINH` varchar(50) NOT NULL,
  `MACV` varchar(50) NOT NULL,
  `MATDHV` varchar(50) NOT NULL,
  `MAPB` varchar(50) NOT NULL,
  `BACLUONG` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MANV`, `HOTEN`, `DANTOC`, `SODIENTHOAI`, `QUEQUAN`, `NGAYSINH`, `MACV`, `MATDHV`, `MAPB`, `BACLUONG`) VALUES
('1GD', 'Phạm Ngọc Sơn', 'Kinh', '0355914168', 'Hưng Yên', '2000-10-14', 'GD', 'DH', 'CT', '4'),
('1KD', 'Trần Văn C', 'Kinh', '111222475', 'Hải Dương', '1997-1-1', 'NVKD', 'TCN', 'KD', '1'),
('1KT', 'Trần Văn F', 'Kinh', '111222475', 'Hải Phòng', '1996-1-1', 'NVKT', 'TCN', 'KT', '1'),
('1NS', 'Trần Văn J', 'Kinh', '111222475', 'Nghệ An', '1999-1-1', 'NVNS', 'TCN', 'NS', '1'),
('2KD', 'Nguyễn Văn B', 'Kinh', '413244891', 'Hà Nội', '1995-1-1', 'NVKD', 'CD', 'KD', '2'),
('2KT', 'Nguyễn Văn E', 'Kinh', '413244891', 'Hà Nam', '1995-1-1', 'NVKT', 'CD', 'KT', '2'),
('2NS', 'Nguyễn Văn H', 'Kinh', '413244891', 'Thanh Hóa', '2000-1-1', 'NVNS', 'CD', 'NS', '2'),
('3KD', 'Phạm Ngọc A', 'Kinh', '159753654', 'Hưng Yên', '1990-1-1', 'TPKD', 'DH', 'KD', '3'),
('3KT', 'Phạm Ngọc D', 'Kinh', '111232547', 'Cao Bằng', '1991-1-1', 'TPKT', 'DH', 'KT', '3'),
('3NS', 'Phạm Ngọc G', 'Kinh', '986532741', 'Quảng Ninh', '1989-1-1', 'TPNS', 'DH', 'NS', '3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongban`
--

CREATE TABLE `phongban` (
  `MAPB` varchar(50) NOT NULL,
  `TENPB` varchar(50) NOT NULL,
  `DIACHI` varchar(50) NOT NULL,
  `SDTPHONGBAN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phongban`
--

INSERT INTO `phongban` (`MAPB`, `TENPB`, `DIACHI`, `SDTPHONGBAN`) VALUES
('CT', 'Công ty', '1GD', '888888888'),
('KD', 'Kinh doanh', '1KD', '123123123'),
('KT', 'Kế toán', '1KT', '456456456'),
('NS', 'Nhân sự', '1NS', '789789789');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thoigiancongtac`
--

CREATE TABLE `thoigiancongtac` (
  `MANV` varchar(50) NOT NULL,
  `MACV` varchar(50) NOT NULL,
  `NGAYNHAMCHUC` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thoigiancongtac`
--

INSERT INTO `thoigiancongtac` (`MANV`, `MACV`, `NGAYNHAMCHUC`) VALUES
('1GD', 'GD', '2010-1-1'),
('1KD', 'NVKD', '2017-1-1'),
('1KT', 'NVKT', '2017-1-1'),
('1NS', 'NVNS', '2017-1-1'),
('2KD', 'NVKD', '2016-1-1'),
('2KT', 'NVKT', '2016-1-1'),
('2NS', 'NVNS', '2016-1-1'),
('3KD', 'TPKD', '2015-1-1'),
('3KT', 'TPKT', '2015-1-1'),
('3NS', 'TPNS', '2015-1-1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trinhdohocvan`
--

CREATE TABLE `trinhdohocvan` (
  `MATDHV` varchar(50) NOT NULL,
  `TENTRINHDO` varchar(50) NOT NULL,
  `CHUYENNGANH` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `trinhdohocvan`
--

INSERT INTO `trinhdohocvan` (`MATDHV`, `TENTRINHDO`, `CHUYENNGANH`) VALUES
('CD', 'Cao đăng', 'Kế toán'),
('DH', 'Đại học', 'Kinh doanh'),
('TCN', 'Trung cấp nghề', 'Kĩ thuật');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`MACV`);

--
-- Chỉ mục cho bảng `luong`
--
ALTER TABLE `luong`
  ADD PRIMARY KEY (`BACLUONG`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MANV`),
  ADD KEY `NHANVIENBACLUONG` (`BACLUONG`),
  ADD KEY `NHANVIENTRINHDO` (`MATDHV`),
  ADD KEY `NHANVIENPHONGBAN` (`MAPB`);

--
-- Chỉ mục cho bảng `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`MAPB`);

--
-- Chỉ mục cho bảng `thoigiancongtac`
--
ALTER TABLE `thoigiancongtac`
  ADD PRIMARY KEY (`MANV`,`MACV`),
  ADD KEY `CHUCVUTHOIGIAN` (`MACV`);

--
-- Chỉ mục cho bảng `trinhdohocvan`
--
ALTER TABLE `trinhdohocvan`
  ADD PRIMARY KEY (`MATDHV`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `NHANVIENBACLUONG` FOREIGN KEY (`BACLUONG`) REFERENCES `luong` (`BACLUONG`),
  ADD CONSTRAINT `NHANVIENPHONGBAN` FOREIGN KEY (`MAPB`) REFERENCES `phongban` (`MAPB`),
  ADD CONSTRAINT `NHANVIENTRINHDO` FOREIGN KEY (`MATDHV`) REFERENCES `trinhdohocvan` (`MATDHV`);

--
-- Các ràng buộc cho bảng `thoigiancongtac`
--
ALTER TABLE `thoigiancongtac`
  ADD CONSTRAINT `CHUCVUTHOIGIAN` FOREIGN KEY (`MACV`) REFERENCES `chucvu` (`MACV`),
  ADD CONSTRAINT `NHANVIENTHOIGIAN` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
