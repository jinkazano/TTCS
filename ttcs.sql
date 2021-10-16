-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2021 lúc 02:30 PM
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
  `dinhhuong1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dinhhuong`
--

INSERT INTO `dinhhuong` (`id`, `tengv`, `dinhhuong1`) VALUES
(13, 'giaovien1', 'dinh huong 3\r\ndinh huong 4'),
(18, 'Nguyễn văn ba bốn', 'dinh huong gv 7');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dkgiaovien`
--

CREATE TABLE `dkgiaovien` (
  `id` int(11) NOT NULL,
  `teacher` text NOT NULL,
  `slot` int(10) NOT NULL,
  `groupsv` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dkgiaovien`
--

INSERT INTO `dkgiaovien` (`id`, `teacher`, `slot`, `groupsv`) VALUES
(18, 'giaovien3', 3, ''),
(19, 'giaovien2', 3, ''),
(40, 'giaovien1', 1, '1,2,3'),
(43, 'giaovien4', 5, ''),
(44, 'giaovien5', 5, ''),
(45, 'giaovien6', 6, ''),
(50, 'Nguyễn văn ba bốn', 7, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsdetai`
--

CREATE TABLE `dsdetai` (
  `id` int(11) NOT NULL,
  `tengv` text NOT NULL,
  `nhom` text NOT NULL,
  `detai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dsdetai`
--

INSERT INTO `dsdetai` (`id`, `tengv`, `nhom`, `detai`) VALUES
(1, 'giaovien1', '1', 'detai1'),
(2, 'giaovien1', '2', 'detai1nhom2'),
(3, 'giaovien2', '0', 'nothin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsdetaisv`
--

CREATE TABLE `dsdetaisv` (
  `id` int(11) NOT NULL,
  `tengv` text NOT NULL,
  `nhom` text NOT NULL,
  `detai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dsdetaisv`
--

INSERT INTO `dsdetaisv` (`id`, `tengv`, `nhom`, `detai`) VALUES
(23, 'giaovien1', '1', 'detai3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `giaovien` text NOT NULL,
  `nhom` int(11) NOT NULL,
  `detai` text NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `giaovien`, `nhom`, `detai`, `feedback`) VALUES
(3, 'giaovien1', 1, 'detai2', 'del test 1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groupsv`
--

CREATE TABLE `groupsv` (
  `id` int(11) NOT NULL,
  `leader` text NOT NULL,
  `idsv1` text NOT NULL,
  `idsv2` text NOT NULL,
  `idsv3` text NOT NULL,
  `teacher_registration` int(3) NOT NULL,
  `topic_registration` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `groupsv`
--

INSERT INTO `groupsv` (`id`, `leader`, `idsv1`, `idsv2`, `idsv3`, `teacher_registration`, `topic_registration`) VALUES
(1, 'at01', 'at01', 'at02', 'at03', 40, 0),
(2, 'at04', 'at04', 'at05', 'at06', 40, 0),
(3, 'at07', 'at07', '', '', 40, 0),
(4, '', '', '', '', 0, 0),
(5, '', '', '', '', 0, 0),
(6, '', '', '', '', 0, 0),
(7, '', '', '', '', 0, 0),
(8, '', '', '', '', 0, 0),
(9, '', '', '', '', 0, 0),
(10, '', '', '', '', 0, 0),
(11, '', '', '', '', 0, 0),
(12, '', '', '', '', 0, 0),
(13, '', '', '', '', 0, 0),
(14, '', '', '', '', 0, 0),
(15, '', '', '', '', 0, 0),
(17, '', '', '', '', 0, 0),
(18, '', '', '', '', 0, 0);

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
(16, 'at04', 'e8059811450b854a7b77cc653761282d', 'Sinh viên 4', 924521456, 'at04@gmail.com', 'admin'),
(23, 'at11', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viên 11', 785371969, 'at11@gmail.com', 'student'),
(24, 'at12', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viên 12', 912927811, 'at12@gmail.com', 'student'),
(25, 'at13', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viên 13', 899888314, 'at13@gmail.com', 'student'),
(26, 'at14', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viên 14', 899888426, 'at14@gmail.com', 'student'),
(27, 'at15', '28c8edde3d61a0411511d3b1866f0636', 'Sinh viên 15', 941031282, 'at15@gmail.com', 'student'),
(31, 'admin3', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 123546789, 'test@gmail.com', 'admin'),
(32, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin1', 12456879, 'test@gmail.com', 'admin'),
(34, 'at01', 'e10adc3949ba59abbe56e057f20f883e', 'sv1', 123456798, 'test@gmail.com', 'student'),
(35, 'at02', 'c4ca4238a0b923820dcc509a6f75849b', 'sv2', 123456789, 'test@gmail.com', 'student'),
(36, 'at03', 'c4ca4238a0b923820dcc509a6f75849b', 'sv3', 123456789, 'test@gmail.com', 'student'),
(37, 'at04', 'c4ca4238a0b923820dcc509a6f75849b', 'sv4', 123, 'test@gmail.cm', 'student'),
(38, 'at05', 'c4ca4238a0b923820dcc509a6f75849b', 'sv 5', 123456789, 'test@gmail.com', 'student'),
(40, 'gv1', 'e10adc3949ba59abbe56e057f20f883e', 'giaovien1', 123456789, 'gv1@gmail.com', 'teacher'),
(41, 'gv2', 'e10adc3949ba59abbe56e057f20f883e', 'giaovien2', 123456879, 'gv2@gmail.com', 'teacher'),
(42, 'gv3', 'c4ca4238a0b923820dcc509a6f75849b', 'giaovien3', 123456789, 'gv3@gmail.com', 'teacher'),
(43, 'gv4', 'c4ca4238a0b923820dcc509a6f75849b', 'giaovien4', 123456789, 'test@gmail.com', 'teacher'),
(44, 'gv5', 'c4ca4238a0b923820dcc509a6f75849b', 'giaovien5', 123456789, 'test@gmail.com', 'teacher'),
(45, 'gv6', 'c4ca4238a0b923820dcc509a6f75849b', 'giaovien6', 123546789, 'test@gmail.com', 'teacher'),
(46, 'at05', 'c4ca4238a0b923820dcc509a6f75849b', 'sv5', 123456789, 'test@gmail.com', 'student'),
(47, 'at06', 'c4ca4238a0b923820dcc509a6f75849b', 'sv6', 123465789, 'test@gmail.com', 'student'),
(48, 'at07', 'c4ca4238a0b923820dcc509a6f75849b', 'Nguyễn văn một hai', 123456789, 'test1234567@gmail.com', 'student'),
(50, 'gv7', 'c4ca4238a0b923820dcc509a6f75849b', 'Nguyễn văn ba bốn', 123456789, 'test@gmail.com', 'teacher');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `dkgiaovien`
--
ALTER TABLE `dkgiaovien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `dsdetai`
--
ALTER TABLE `dsdetai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `dsdetaisv`
--
ALTER TABLE `dsdetaisv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `groupsv`
--
ALTER TABLE `groupsv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
