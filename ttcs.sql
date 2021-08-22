-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2018 at 10:15 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttcs`
--

-- --------------------------------------------------------

--
-- Table structure for table `dinhhuong`
--

CREATE TABLE `dinhhuong` (
  `id` int(11) NOT NULL,
  `tengv` text NOT NULL,
  `dinhhuong1` text NOT NULL,
  `dinhhuong2` text NOT NULL,
  `dinhhuong3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dinhhuong`
--

INSERT INTO `dinhhuong` (`id`, `tengv`, `dinhhuong1`, `dinhhuong2`, `dinhhuong3`) VALUES
(1, 'Nguyá»…n VÄƒn PhÃ¡c', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ há»‡ thá»‘ng thÃ´ng tin cho cÃ¡c dá»± Ã¡n pháº§n má»m', 'Kháº£o sÃ¡t, phÃ¢n tÃ­ch, thiáº¿t káº¿ website', 'XÃ¢y dá»±ng chÆ°Æ¡ng trÃ¬nh quáº£n lÃ½'),
(2, 'Nguyá»…n ÄÃ o TrÆ°á»ng', 'XÃ¢y dá»±ng cÃ¡c chÃ­nh sÃ¡ch báº£o máº­t dá»±a trÃªn káº¿t há»£p IDS, IPS vÃ  FIREWALL', 'XÃ¢y dá»±ng cÃ¡c giáº£i phÃ¡p chá»‘ng táº¥n cÃ´ng trÃªn máº¡ng (DoS, SQL Injection)', 'XÃ¢y dá»±ng, triá»ƒn khai giáº£i phÃ¡p chá»‘ng táº¥n cÃ´ng ngÆ°á»i Ä‘á»©ng giá»¯a (Man in the Midle) trong máº¡ng mÃ¡y tÃ­nh.'),
(3, 'Pháº¡m VÄƒn HÆ°á»Ÿng', 'Äáº£m báº£o an toÃ n, báº£o máº­t thÃ´ng tin trong IoT nhÆ°: smart home, smart city, thiáº¿t bá»‹ Android, Arduino, Raspberry, MQTT, v.v.', 'CÃ¡c há»‡ thá»‘ng há»— trá»£ ATTT nguá»“n má»Ÿ: VPN, IPS/IDS, firewall, há»‡ thá»‘ng giÃ¡m sÃ¡t, v.v.', 'PhÃ¡t triá»ƒn vÃ  Ä‘áº£m báº£o an toÃ n web (PHP, ASP.NET, MVC, v.v.)'),
(4, 'LÃª BÃ¡ CÆ°á»ng', 'phÃ¡t triá»ƒn pm, á»©ng dá»¥ng trÃªn mÃ´i trÆ°á»ng android', 'phÃ¡t triá»ƒn á»©ng dá»¥ng trÃªn ná»n java, .net', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ há»‡ thá»‘ng, kiá»ƒm thá»­'),
(5, 'Nguyá»…n Há»“ng Viá»‡t', 'NghiÃªn cá»©u tÃ¬m hiá»ƒu vÃ  triá»ƒn khai há»‡ thá»‘ng voip cho doanh nghiá»‡p.', 'NghiÃªn cá»©u tÃ¬m hiá»ƒu cÃ¡c giáº£i phÃ¡p cÃ¢n báº±ng táº£i há»‡ thá»‘ng', 'phÃ¡t triá»ƒn web trÃªn ná»n nguá»“n má»Ÿ: word press, ...'),
(6, 'LÃª Thá»‹ Há»“ng VÃ¢n', 'NghiÃªn cá»©u vÃ  triá»ƒn khai cÃ¡c cÃ´ng nghá»‡ káº¿t ná»‘i vÃ  má»Ÿ rá»™ng máº¡ng mÃ¡y tÃ­nh (LAN, WAN)', 'Triá»ƒn khai cÃ¡c dá»‹ch vá»¥ máº¡ng cÆ¡ báº£n (Web, Email, FTP) trÃªn Windows Server, Linux', 'NghiÃªn cá»©u vÃ  triá»ƒn khai cÃ¡c á»©ng dá»¥ng báº£o vá»‡ vÃ  phÃ¡t hiá»‡n xÃ¢m nháº­p, táº¥n cÃ´ng trÃªn máº¡ng: Firewall, IDS/IPS, ...'),
(7, 'LÃª Äá»©c Thuáº­n', 'PhÃ¡t triá»ƒn á»©ng dá»¥ng trÃªn ná»n táº£ng .NET', 'PhÆ°Æ¡ng phÃ¡p phÃ¡t hiá»‡n virus, trÃ­ch chá»n Ä‘áº·c trÆ°ng báº±ng phÆ°Æ¡ng phÃ¡p há»c mÃ¡y.', 'Nháº­n dáº¡ng, xá»­ lÃ½ áº£nh'),
(8, 'Nguyá»…n Äá»©c Hiáº¿u', 'PhÃ¢n tÃ­ch vÃ  hÃ¬nh dung hoÃ¡ dá»¯ liá»‡u: Google Data Studio, CartoCarto...', 'PhÆ°Æ¡ng phÃ¡p vÃ  cÃ¡c ká»¹ thuáº­t trong kiá»ƒm thá»­ há»™p Ä‘en', 'MÃ´ hÃ¬nh vÃ  cÃ¡c máº«u thiáº¿t káº¿ trong DA: MÃ´ hÃ¬nh UP, Creator, Information Expert, Low Coupling,Controller, High Cohesion...'),
(9, 'Cao Thanh Vinh', 'CÃ¡c há»‡ quáº£n trá»‹ cÆ¡ sá»Ÿ dá»¯ liá»‡u vÃ  á»©ng dá»¥ng cá»§a nÃ³ Ä‘á»ƒ giáº£i quyáº¿t cÃ¡c bÃ i toÃ¡n thá»±c táº¿ (phÃ¢n tÃ­ch, thiáº¿t káº¿, demo, viáº¿t chÆ°Æ¡ng trÃ¬nh táº¡o cÆ¡ sá»Ÿ dá»¯ liá»‡u sinh viÃªn, thÆ° viá»‡n, pháº§n má»m bÃ¡n hÃ ng,â€¦)', 'TÃ¬m hiá»ƒu vá» an toÃ n thÃ´ng tin trong cÆ¡ sá»Ÿ dá»¯ liá»‡u', 'TÃ¬m hiá»ƒu cÃ¡c phÆ°Æ¡ng phÃ¡p Ä‘á»ƒ thiáº¿t káº¿ website (tÃ¬m hiá»ƒu má»™t vÃ i phÆ°Æ¡ng phÃ¡p thiáº¿t káº¿ web, phÃ¢n tÃ­ch thiáº¿t káº¿ vá»›i bÃ i toÃ¡n cá»¥ thá»ƒ kÃ¨m theo demo chÆ°Æ¡ng trÃ¬nh)'),
(10, 'LÃª Anh Tiáº¿n', 'TÃ¬m hiá»ƒu vá» ontology, web ngá»¯ nghÄ©a vÃ  á»©ng dá»¥ng trong ATTT', 'TÃ¬m hiá»ƒu vá» cÃ¡c API máº¡ng xÃ£ há»™i Ã¡p dá»¥ng cho á»©ng dá»¥ng di Ä‘á»™ng Android', 'TÃ¬m hiá»ƒu vá» Crawler (á»©ng dá»¥ng láº¥y tin tá»± Ä‘á»™ng) vÃ  Ã¡p dá»¥ng trong ATTT '),
(12, 'ThÃ¡i Thá»‹ Thanh VÃ¢n', 'láº­p trÃ¬nh web', 'PhÃ¢n tÃ­ch á»©ng dá»¥ng', 'TÃ¬m hiá»ƒu vá» mÃ£ Ä‘á»™c');

-- --------------------------------------------------------

--
-- Table structure for table `dkgiaovien`
--

CREATE TABLE `dkgiaovien` (
  `id` int(11) NOT NULL,
  `teacher` text NOT NULL,
  `groupsv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dkgiaovien`
--

INSERT INTO `dkgiaovien` (`id`, `teacher`, `groupsv`) VALUES
(2, 'Nguyá»…n VÄƒn PhÃ¡c', 2),
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
-- Table structure for table `dsdetai`
--

CREATE TABLE `dsdetai` (
  `id` int(11) NOT NULL,
  `tengv` text NOT NULL,
  `nhom` text NOT NULL,
  `detai` text NOT NULL,
  `dinhhuong` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dsdetai`
--

INSERT INTO `dsdetai` (`id`, `tengv`, `nhom`, `detai`, `dinhhuong`) VALUES
(1, 'Nguyá»…n VÄƒn PhÃ¡c', '13', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ pháº§n má»m X9', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ há»‡ thá»‘ng thÃ´ng tin cho cÃ¡c dá»± Ã¡n pháº§n má»m'),
(2, 'Nguyá»…n VÄƒn PhÃ¡c', '3', 'PhÃ¢n tÃ­ch thiáº¿t káº¿ pháº§n má»m X1', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ há»‡ thá»‘ng thÃ´ng tin cho cÃ¡c dá»± Ã¡n pháº§n má»m'),
(3, 'Nguyá»…n VÄƒn PhÃ¡c', '2', 'PhÃ¢n tÃ­ch thiáº¿t káº¿ website bÃ¡n hÃ ng', 'Kháº£o sÃ¡t, phÃ¢n tÃ­ch, thiáº¿t káº¿ website'),
(4, 'Nguyá»…n VÄƒn PhÃ¡c', '4', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ pháº§n má»m X2', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ há»‡ thá»‘ng thÃ´ng tin cho cÃ¡c dá»± Ã¡n pháº§n má»m'),
(5, 'Nguyá»…n VÄƒn PhÃ¡c', '5', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ pháº§n má»m X3', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ há»‡ thá»‘ng thÃ´ng tin cho cÃ¡c dá»± Ã¡n pháº§n má»m'),
(6, 'Nguyá»…n VÄƒn PhÃ¡c', '6', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ pháº§n má»m X3', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ há»‡ thá»‘ng thÃ´ng tin cho cÃ¡c dá»± Ã¡n pháº§n má»m'),
(7, 'Nguyá»…n VÄƒn PhÃ¡c', '7', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ pháº§n má»m X4', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ há»‡ thá»‘ng thÃ´ng tin cho cÃ¡c dá»± Ã¡n pháº§n má»m'),
(8, 'Nguyá»…n VÄƒn PhÃ¡c', '8', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ pháº§n má»m X3', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ há»‡ thá»‘ng thÃ´ng tin cho cÃ¡c dá»± Ã¡n pháº§n má»m'),
(9, 'Nguyá»…n VÄƒn PhÃ¡c', '9', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ pháº§n má»m X5', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ há»‡ thá»‘ng thÃ´ng tin cho cÃ¡c dá»± Ã¡n pháº§n má»m'),
(10, 'Nguyá»…n VÄƒn PhÃ¡c', '10', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ pháº§n má»m X6', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ há»‡ thá»‘ng thÃ´ng tin cho cÃ¡c dá»± Ã¡n pháº§n má»m'),
(11, 'Nguyá»…n VÄƒn PhÃ¡c', '11', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ pháº§n má»m X7', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ há»‡ thá»‘ng thÃ´ng tin cho cÃ¡c dá»± Ã¡n pháº§n má»m'),
(12, 'Nguyá»…n VÄƒn PhÃ¡c', '12', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ pháº§n má»m X8', 'PhÃ¢n tÃ­ch, thiáº¿t káº¿ há»‡ thá»‘ng thÃ´ng tin cho cÃ¡c dá»± Ã¡n pháº§n má»m'),
(13, 'ThÃ¡i Thá»‹ Thanh VÃ¢n', '14', 'PhÃ¢n tÃ­ch thiáº¿t káº¿ xÃ¢y dá»±ng web Ä‘Äƒng kÃ½ thá»±c táº­p cÆ¡ sá»Ÿ chuyÃªn ngÃ nh', 'láº­p trÃ¬nh web');

-- --------------------------------------------------------

--
-- Table structure for table `dsdetaisv`
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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `giaovien` text NOT NULL,
  `nhom` int(11) NOT NULL,
  `dinhhuong` text NOT NULL,
  `detai` text NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `giaovien`, `nhom`, `dinhhuong`, `detai`, `feedback`) VALUES
(2, 'ThÃ¡i Thá»‹ Thanh VÃ¢n', 14, 'láº­p trÃ¬nh web', 'PhÃ¢n tÃ­ch thiáº¿t káº¿ web bÃ¡n hÃ ng', 'Web bÃ¡n hÃ ng ráº¥t nhiá»u sinh viÃªn lÃ m rá»“i. Cáº§n Ã½ tÆ°á»Ÿng má»›i.');

-- --------------------------------------------------------

--
-- Table structure for table `groupsv`
--

CREATE TABLE `groupsv` (
  `id` int(11) NOT NULL,
  `idsv1` text NOT NULL,
  `idsv2` text NOT NULL,
  `idsv3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groupsv`
--

INSERT INTO `groupsv` (`id`, `idsv1`, `idsv2`, `idsv3`) VALUES
(2, 'at04', '', ''),
(3, 'at05', '', ''),
(4, 'at06', '', ''),
(5, 'at07', '', ''),
(6, 'at08', '', ''),
(7, 'at09', '', ''),
(8, 'at10', '', ''),
(9, 'at11', '', ''),
(10, 'at12', '', ''),
(11, 'at13', '', ''),
(12, 'at14', '', ''),
(13, 'at15', '', ''),
(14, 'at01', 'at02', 'at03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `phone`, `email`, `permission`) VALUES
(1, 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'Admin', 123456789, 'admin@gmail.com', 'admin'),
(2, 'nvphac', 'bc554ecf2b33458ff1f152433cd4c813', 'Nguyá»…n VÄƒn PhÃ¡c', 973045668, 'nvphac@gmail.com', 'teacher'),
(3, 'truongnguyendao', 'c4ca4238a0b923820dcc509a6f75849b', 'Nguyá»…n ÄÃ o TrÆ°á»ng', 946562168, 'truongnguyendao@gmail.com', 'teacher'),
(4, 'huongpv', 'c4ca4238a0b923820dcc509a6f75849b', 'Pháº¡m VÄƒn HÆ°á»Ÿng', 902122010, 'huongpv@gmail.com', 'teacher'),
(5, 'thanhvan0110', 'c4ca4238a0b923820dcc509a6f75849b', 'ThÃ¡i Thá»‹ Thanh VÃ¢n', 932320886, 'thanhvan0110@gmail.com', 'teacher'),
(6, 'cuonglb304', 'c4ca4238a0b923820dcc509a6f75849b', 'LÃª BÃ¡ CÆ°á»ng', 974087348, 'cuonglb304@gmail.com', 'teacher'),
(7, 'vietnh1684', 'c4ca4238a0b923820dcc509a6f75849b', 'Nguyá»…n Há»“ng Viá»‡t', 936888487, 'vietnh1684@gmail.com', 'teacher'),
(8, 'lethihongvan86', 'c4ca4238a0b923820dcc509a6f75849b', 'LÃª Thá»‹ Há»“ng VÃ¢n', 978173755, 'lethihongvan86@gmail.com', 'teacher'),
(9, 'leducthuan255', 'c4ca4238a0b923820dcc509a6f75849b', 'LÃª Äá»©c Thuáº­n', 973356627, 'leducthuan255@gmail.com', 'teacher'),
(10, 'nguyenduchieu247', 'c4ca4238a0b923820dcc509a6f75849b', 'Nguyá»…n Äá»©c Hiáº¿u', 913945065, 'nguyenduchieu247@gmail.com', 'teacher'),
(11, 'caovinh226', 'c4ca4238a0b923820dcc509a6f75849b', 'Cao Thanh Vinh', 968815386, 'caovinh226@gmail.com', 'teacher'),
(12, 'tienla.ict', 'c4ca4238a0b923820dcc509a6f75849b', 'LÃª Anh Tiáº¿n', 984431993, 'tienla.ict@gmail.com', 'teacher'),
(13, 'at03', 'c4ca4238a0b923820dcc509a6f75849b', 'Tráº§n ÄÃ¬nh Ngá»c', 934690925, 'khangtb@gmail.com', 'student'),
(14, 'at02', 'c4ca4238a0b923820dcc509a6f75849b', 'Trá»‹nh Äáº¯c Quyáº¿t', 899318998, 'dacquyettrinh@gmail.com', 'student'),
(15, 'at01', 'c4ca4238a0b923820dcc509a6f75849b', 'Kiá»u Cao Long', 1688130297, 'klongg@gmail.com', 'student'),
(16, 'at04', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viÃªn 4', 924521456, 'at04@gmail.com', 'student'),
(17, 'at05', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viÃªn 5', 922013345, 'at05@gmail.com', 'student'),
(18, 'at06', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viÃªn 6', 912872360, 'at06@gmail.com', 'student'),
(19, 'at07', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viÃªn 7', 912802844, 'sv7@gmail.com', 'student'),
(20, 'at08', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viÃªn 8', 784271969, 'at08@gmail.com', 'student'),
(21, 'at09', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viÃªn 9', 912927749, 'at09@gmail.com', 'student'),
(22, 'at10', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viÃªn 10', 912927652, 'at10@gmail.com', 'student'),
(23, 'at11', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viÃªn 11', 785371969, 'at11@gmail.com', 'student'),
(24, 'at12', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viÃªn 12', 912927811, 'at12@gmail.com', 'student'),
(25, 'at13', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viÃªn 13', 899888314, 'at13@gmail.com', 'student'),
(26, 'at14', '40f5888b67c748df7efba008e7c2f9d2', 'Sinh viÃªn 14', 899888426, 'at14@gmail.com', 'student'),
(27, 'at15', '28c8edde3d61a0411511d3b1866f0636', 'Sinh viÃªn 15', 941031282, 'at15@gmail.com', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dinhhuong`
--
ALTER TABLE `dinhhuong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dkgiaovien`
--
ALTER TABLE `dkgiaovien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsdetai`
--
ALTER TABLE `dsdetai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsdetaisv`
--
ALTER TABLE `dsdetaisv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupsv`
--
ALTER TABLE `groupsv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dinhhuong`
--
ALTER TABLE `dinhhuong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dkgiaovien`
--
ALTER TABLE `dkgiaovien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dsdetai`
--
ALTER TABLE `dsdetai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dsdetaisv`
--
ALTER TABLE `dsdetaisv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groupsv`
--
ALTER TABLE `groupsv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
