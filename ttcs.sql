-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2021 lúc 04:41 PM
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
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `fullname` text NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` text NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `phone`, `email`, `permission`) VALUES
(16, 'at04', 'e8059811450b854a7b77cc653761282d', 'Sinh viên 4', '924521456', 'at04@gmail.com', 'admin'),
(23, 'at11', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viên 11', '785371969', 'at11@gmail.com', 'student'),
(24, 'at12', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viên 12', '912927811', 'at12@gmail.com', 'student'),
(25, 'at13', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viên 13', '899888314', 'at13@gmail.com', 'student'),
(26, 'at14', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viên 14', '899888426', 'at14@gmail.com', 'student'),
(27, 'at15', '28c8edde3d61a0411511d3b1866f0636', 'Sinh viên 15', '941031282', 'at15@gmail.com', 'student'),
(31, 'admin3', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '123546789', 'test@gmail.com', 'admin'),
(32, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin1', '12456879', 'test@gmail.com', 'admin'),
(34, 'at01', 'e10adc3949ba59abbe56e057f20f883e', 'sv1', '123456798', 'test@gmail.com', 'student'),
(35, 'at02', 'c4ca4238a0b923820dcc509a6f75849b', 'sv2', '123456789', 'test@gmail.com', 'student'),
(36, 'at03', 'c4ca4238a0b923820dcc509a6f75849b', 'sv3', '123456789', 'test@gmail.com', 'student'),
(37, 'at04', 'c4ca4238a0b923820dcc509a6f75849b', 'sv4', '123', 'test@gmail.cm', 'student'),
(38, 'at05', 'c4ca4238a0b923820dcc509a6f75849b', 'sv 5', '123456789', 'test@gmail.com', 'student'),
(40, 'gv1', 'e10adc3949ba59abbe56e057f20f883e', 'giaovien1', '123456789', 'gv1@gmail.com', 'teacher'),
(41, 'gv2', 'e10adc3949ba59abbe56e057f20f883e', 'giaovien2', '123456879', 'gv2@gmail.com', 'teacher'),
(42, 'gv3', 'c4ca4238a0b923820dcc509a6f75849b', 'giaovien3', '123456789', 'gv3@gmail.com', 'teacher'),
(43, 'gv4', 'c4ca4238a0b923820dcc509a6f75849b', 'giaovien4', '123456789', 'test@gmail.com', 'teacher'),
(44, 'gv5', 'c4ca4238a0b923820dcc509a6f75849b', 'giaovien5', '123456789', 'test@gmail.com', 'teacher'),
(45, 'gv6', 'c4ca4238a0b923820dcc509a6f75849b', 'giaovien6', '123546789', 'test@gmail.com', 'teacher'),
(46, 'at05', 'c4ca4238a0b923820dcc509a6f75849b', 'sv5', '123456789', 'test@gmail.com', 'student'),
(47, 'at06', 'c4ca4238a0b923820dcc509a6f75849b', 'sv6', '123465789', 'test@gmail.com', 'student'),
(48, 'at07', 'c4ca4238a0b923820dcc509a6f75849b', 'Nguyễn văn một hai', '123456789', 'test1234567@gmail.com', 'student'),
(50, 'gv7', 'c4ca4238a0b923820dcc509a6f75849b', 'Nguyễn văn ba bốn', '123456789', 'test@gmail.com', 'teacher'),
(51, 'at08', 'c4ca4238a0b923820dcc509a6f75849b', 'sv8', '0123456789', 'sv8@gmail.com', 'student'),
(53, 'gv8', '47ec2dd791e31e2ef2076caf64ed9b3d', 'giao vien 8 ', '0123456789', 'testgv8@gmail.com', 'teacher'),
(54, 'gv9', '47ec2dd791e31e2ef2076caf64ed9b3d', 'Nguyễn văn chín', '0111111119', 'testgv9@gmail.com', 'teacher'),
(55, 'AT21', '47ec2dd791e31e2ef2076caf64ed9b3d', 'nguyễn văn hai mốt', '0123456021', 'testsv21@gmail.com', 'student'),
(56, 'gv10', '47ec2dd791e31e2ef2076caf64ed9b3d', 'Nguyen van muoi', '0123456710', 'testgv10@gmail.com', 'teacher'),
(57, 'AT31', '47ec2dd791e31e2ef2076caf64ed9b3d', 'nguyen van a', '0123456031', 'testsv@gmail.com', 'student'),
(58, 'AT32', '47ec2dd791e31e2ef2076caf64ed9b3d', 'nguyen van b', '0123456032', 'testsv32@gmail.com', 'student'),
(59, 'gv11', '47ec2dd791e31e2ef2076caf64ed9b3d', 'nguyen van muoi mot', '0123456711', 'testgv11@gmail.com', 'teacher'),
(60, 'AT41', '47ec2dd791e31e2ef2076caf64ed9b3d', 'nguyen van aa', '0123456041', 'testsv41@gmail.com', 'student'),
(61, 'AT42', '47ec2dd791e31e2ef2076caf64ed9b3d', 'nguyen van bb', '0123456042', 'testsv42@gmail.com', 'student'),
(62, 'gv12', '47ec2dd791e31e2ef2076caf64ed9b3d', 'nguyen van muoi hai', '0123456712', 'testgv12@gmail.com', 'teacher');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
