-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 09, 2021 lúc 09:05 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ttcs`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dinhhuong`
--

CREATE TABLE `dinhhuong` (
  `id` int(11) NOT NULL,
  `tengv` text NOT NULL,
  `dinhhuong1` text NOT NULL,
  `dinhhuong2` text NOT NULL,
  `dinhhuong3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dinhhuong`
--

INSERT INTO `dinhhuong` (`id`, `tengv`, `dinhhuong1`, `dinhhuong2`, `dinhhuong3`) VALUES
(1, 'Nguyễn Văn Phác', 'Phân tích, thiết kế hệ thống thông tin cho các dự án phần mềm', 'Khảo sát, phân tích, thiết kế website', 'Xây dựng chương trình quản lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dkgiaovien`
--

CREATE TABLE `dkgiaovien` (
  `id` int(11) NOT NULL,
  `teacher` text NOT NULL,
  `groupsv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dkgiaovien`
--

INSERT INTO `dkgiaovien` (`id`, `teacher`, `groupsv`) VALUES
(2, 'Nguyễn Văn Phác', 2),
(3, 'Nguyá»…n VÄƒn PhÃ¡c', 3),
(4, 'Nguyá»…n VÄƒn PhÃ¡c', 4),
(5, 'Nguyá»…n VÄƒn PhÃ¡c', 5),
(6, 'Nguyá»…n VÄƒn PhÃ¡c', 6),
(7, 'Nguyá»…n VÄƒn PhÃ¡c', 7),
(8, 'Nguyá»…n VÄƒn PhÃ¡c', 8),
(9, 'Nguyá»…n VÄƒn PhÃ¡c', 9),
(10, 'Nguyá»…n VÄƒn PhÃ¡c', 10),
(11, 'Nguyá»…n VÄƒn PhÃ¡c', 11),
(12, 'Nguyá»…n VÄƒn PhÃ¡c', 12),
(13, 'Nguyá»…n VÄƒn PhÃ¡c', 13),
(14, 'ThÃ¡i Thá»‹ Thanh VÃ¢n', 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsdetai`
--

CREATE TABLE `dsdetai` (
  `id` int(11) NOT NULL,
  `tengv` text NOT NULL,
  `nhom` text NOT NULL,
  `detai` text NOT NULL,
  `dinhhuong` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dsdetai`
--

INSERT INTO `dsdetai` (`id`, `tengv`, `nhom`, `detai`, `dinhhuong`) VALUES
(1, 'Nguyễn Văn Phác', '13', 'Phân tích, thiết kế phần mềm X9', 'Phân tích, thiết kế hệ thống thông tin cho các dự án phần mềm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsdetaisv`
--

CREATE TABLE `dsdetaisv` (
  `id` int(11) NOT NULL,
  `tengv` text NOT NULL,
  `nhom` text NOT NULL,
  `detai` text NOT NULL,
  `dinhhuong` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `giaovien` text NOT NULL,
  `nhom` int(11) NOT NULL,
  `dinhhuong` text NOT NULL,
  `detai` text NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groupsv`
--

CREATE TABLE `groupsv` (
  `id` int(11) NOT NULL,
  `leader` text NOT NULL,
  `idsv1` text NOT NULL,
  `idsv2` text NOT NULL,
  `idsv3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `groupsv`
--

INSERT INTO `groupsv` (`id`, `leader`, `idsv1`, `idsv2`, `idsv3`) VALUES
(1, 'at01', 'at01', 'at02', 'at03'),
(2, 'at04', 'at04', 'at05', ''),
(3, '', '', '', ''),
(4, '', '', '', ''),
(5, '', '', '', ''),
(6, '', '', '', ''),
(7, '', '', '', ''),
(8, '', '', '', ''),
(9, '', '', '', ''),
(10, '', '', '', ''),
(11, '', '', '', ''),
(12, '', '', '', ''),
(13, '', '', '', ''),
(14, '', '', '', ''),
(15, '', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `fullname` text NOT NULL,
  `phone` int(11) NOT NULL,
  `email` text NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `phone`, `email`, `permission`) VALUES
(16, 'at04', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viên 4', 924521456, 'at04@gmail.com', 'student'),
(23, 'at11', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viên 11', 785371969, 'at11@gmail.com', 'student'),
(24, 'at12', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viên 12', 912927811, 'at12@gmail.com', 'student'),
(25, 'at13', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viên 13', 899888314, 'at13@gmail.com', 'student'),
(26, 'at14', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viên 14', 899888426, 'at14@gmail.com', 'student'),
(27, 'at15', '28c8edde3d61a0411511d3b1866f0636', 'Sinh viên 15', 941031282, 'at15@gmail.com', 'student'),
(31, 'admin3', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 123546789, 'test@gmail.com', 'admin'),
(32, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin1', 12456879, 'test@gmail.com', 'admin'),
(33, 'gv1', 'd41d8cd98f00b204e9800998ecf8427e', 'gv1', 123456789, 'gv1@gmail.com', 'teacher'),
(34, 'at01', 'e10adc3949ba59abbe56e057f20f883e', 'sv1', 123456798, 'test@gmail.com', 'student'),
(35, 'at02', 'c4ca4238a0b923820dcc509a6f75849b', 'sv2', 123456789, 'test@gmail.com', 'student'),
(36, 'at03', 'c4ca4238a0b923820dcc509a6f75849b', 'sv3', 123456789, 'test@gmail.com', 'student'),
(37, 'at04', 'c4ca4238a0b923820dcc509a6f75849b', 'sv4', 123, '', 'admin'),
(38, 'at05', 'c4ca4238a0b923820dcc509a6f75849b', 'sv 5', 123456789, 'test@gmail.com', 'student');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dinhhuong`
--
ALTER TABLE `dinhhuong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dkgiaovien`
--
ALTER TABLE `dkgiaovien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dsdetai`
--
ALTER TABLE `dsdetai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dsdetaisv`
--
ALTER TABLE `dsdetaisv`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `groupsv`
--
ALTER TABLE `groupsv`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dinhhuong`
--
ALTER TABLE `dinhhuong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `dkgiaovien`
--
ALTER TABLE `dkgiaovien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `dsdetai`
--
ALTER TABLE `dsdetai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `dsdetaisv`
--
ALTER TABLE `dsdetaisv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `groupsv`
--
ALTER TABLE `groupsv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
