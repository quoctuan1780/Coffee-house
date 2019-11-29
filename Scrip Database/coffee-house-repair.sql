-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2019 lúc 10:53 AM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `coffee-house-repair`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctdh`
--

CREATE TABLE `ctdh` (
  `ma_ctdh` int(10) UNSIGNED NOT NULL,
  `madh` int(10) NOT NULL,
  `masp` int(10) NOT NULL,
  `soluong` int(11) NOT NULL COMMENT 'số lượng',
  `gia` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `ctdh`
--

INSERT INTO `ctdh` (`ma_ctdh`, `madh`, `masp`, `soluong`, `gia`, `created_at`, `updated_at`) VALUES
(7, 11, 13, 1, 35000, '2019-11-27 07:40:59', '2019-11-27 07:40:59'),
(8, 11, 7, 1, 42000, '2019-11-27 07:40:59', '2019-11-27 07:40:59'),
(9, 12, 15, 1, 49000, '2019-11-27 13:48:52', '2019-11-27 13:48:52'),
(10, 12, 11, 1, 45000, '2019-11-27 13:48:52', '2019-11-27 13:48:52'),
(11, 13, 7, 4, 10500, '2019-11-28 08:23:39', '2019-11-28 08:23:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthd`
--

CREATE TABLE `cthd` (
  `ma_cthd` int(10) UNSIGNED NOT NULL,
  `mahd` int(10) NOT NULL,
  `masp` int(10) NOT NULL,
  `soluong` int(11) NOT NULL COMMENT 'số lượng',
  `gia` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `madh` int(10) UNSIGNED NOT NULL,
  `makh` int(11) DEFAULT NULL,
  `ngaydat` date DEFAULT NULL,
  `tongtien` float DEFAULT NULL COMMENT 'tổng tiền',
  `httt` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `ghichu` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`madh`, `makh`, `ngaydat`, `tongtien`, `httt`, `ghichu`, `created_at`, `updated_at`) VALUES
(13, 20, '2019-11-28', 168000, 'COD', NULL, '2019-11-28 08:23:39', '2019-11-28 08:23:39'),
(12, 20, '2019-11-27', 94000, 'COD', 'Giao nhanh nha', '2019-11-27 13:48:52', '2019-11-27 13:48:52'),
(11, 19, '2019-11-27', 77000, 'COD', 'Hello', '2019-11-27 07:40:59', '2019-11-27 07:40:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `mahd` int(10) UNSIGNED NOT NULL,
  `makh` int(11) DEFAULT NULL,
  `ngaydat` date DEFAULT NULL,
  `tongtien` float DEFAULT NULL COMMENT 'tổng tiền',
  `httt` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `ghichu` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` int(10) UNSIGNED NOT NULL,
  `hoten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sodt` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `matk` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makh`, `hoten`, `gioitinh`, `email`, `diachi`, `sodt`, `ghichu`, `created_at`, `updated_at`, `matk`) VALUES
(17, 'Tachibana Yuuta', 'Nam', 'admin@gmail.com', 'TP-HCM', '0359554019', NULL, '2019-11-26 13:34:56', '2019-11-26 13:34:56', 17),
(18, 'Hồ Quốc Tuấn', 'Nam', 'admin123@gmail.com', 'TP-HCM', '0359554019', NULL, '2019-11-26 14:29:36', '2019-11-26 14:29:36', 18),
(19, 'Hồ Quốc Tuấn', 'Nam', 'admin1780@gmail.com', 'TP-HCM', '0359554019', NULL, '2019-11-27 01:45:18', '2019-11-27 01:45:18', 21),
(20, 'Trần Quốc Tuấn', 'nam', 'Quoctuan1780@gmail.com', 'Đà Lạt', '01659554018', NULL, '2019-11-27 13:48:40', '2019-11-27 13:48:40', NULL),
(21, 'Hồ Quốc Tuấn', 'Nam', 'quoctuan1780@gmail.com', 'TP-HCM', '0359554019', NULL, '2019-11-28 17:00:18', '2019-11-28 17:00:18', NULL),
(22, 'Tachibana Yuuta', 'Nam', 'quoctuanlyoko@gmail.com', 'TP-HCM', '0359554019', NULL, '2019-11-28 17:09:47', '2019-11-28 17:09:47', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `maloaisp` int(10) UNSIGNED NOT NULL,
  `tenloaisp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`maloaisp`, `tenloaisp`, `mota`, `hinhanh`, `created_at`, `updated_at`) VALUES
(1, 'Cà phê', NULL, NULL, '2016-10-11 19:16:15', '2016-10-12 18:38:35'),
(2, 'Trà và Macchiato', NULL, NULL, '2016-10-11 19:16:15', '2016-10-12 18:38:35'),
(3, 'Thức uống đá xay', NULL, NULL, '2016-10-17 17:33:33', '2016-10-15 00:25:27'),
(4, 'Thức uống sinh tố', NULL, NULL, '2016-10-25 20:29:19', '2016-10-25 19:22:22'),
(5, 'Bánh và Snack', NULL, NULL, '2016-10-27 21:00:00', '2016-10-26 21:00:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `maquyen` int(10) UNSIGNED NOT NULL,
  `tenquyen` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(10) UNSIGNED NOT NULL,
  `tensp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maloaisp` int(10) UNSIGNED DEFAULT NULL,
  `mota` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` float DEFAULT NULL,
  `giakm` float DEFAULT NULL,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `moi` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `maloaisp`, `mota`, `gia`, `giakm`, `hinhanh`, `dvt`, `moi`, `created_at`, `updated_at`) VALUES
(1, 'AMERICANO', 1, 'Americano được pha chế bằng cách thêm nước vào một hoặc hai shot Espresso để pha loãng độ đặc của cà phê, từ đó mang lại hương vị nhẹ nhàng, không gắt mạnh và vẫn thơm nồng nàn.', 39000, 37000, 'americano_39k.jpg', 'ly', 0, '2016-10-25 20:00:16', '2016-10-24 15:11:00'),
(2, 'BẠC SỈU', 1, 'Theo chân những người gốc Hoa đến định cư tại Sài Gòn, Bạc sỉu là cách gọi tắt của \"Bạc tẩy sỉu phé\" trong tiếng Quảng Đông, chính là: Ly sữa trắng kèm một chút cà phê.', 29000, 0, 'bacsiu_29k.jpg', 'ly', 0, '2016-10-25 20:00:16', '2016-10-24 15:11:00'),
(3, 'CÀ PHÊ ĐEN', 1, 'Một tách cà phê đen thơm ngào ngạt, phảng phất mùi cacao là món quà tự thưởng tuyệt vời nhất cho những ai mê đắm tinh chất nguyên bản nhất của cà phê. Một tách cà phê trầm lắng, thi vị giữa dòng đời vồn vã.', 29000, 0, 'cafeden_29k.jpg', 'ly', 0, '2016-10-25 20:00:16', '2016-10-24 15:11:00'),
(4, 'CÀ PHÊ SỮA', 1, 'Cà phê phin kết hợp cũng sữa đặc là một sáng tạo đầy tự hào của người Việt, được xem món uống thương hiệu của Việt Nam.', 29000, 0, 'cafesua_29k.jpg', 'ly', 0, '2016-10-25 20:00:16', '2016-10-24 15:11:00'),
(5, 'CAPPUCINNO', 1, 'Cappucino được gọi vui là thức uống \"một-phần-ba\" - 1/3 Espresso, 1/3 Sữa nóng, 1/3 Foam.', 45000, 0, 'cappucinno_45k.jpg', 'ly', 0, '2016-10-25 20:00:16', '2016-10-24 15:11:00'),
(6, 'CARAMEL MACCHIATO', 1, 'Vị thơm béo của bọt sữa và sữa tươi, vị đắng thanh thoát của cà phê Espresso hảo hạng, và vị ngọt đậm của sốt caramel.', 55000, 0, 'caramelmacchiato_55k.jpg', 'ly', 0, '2016-10-25 20:00:16', '2016-10-24 15:11:00'),
(7, 'COLD BREW CAM SẢ', 1, '', 45000, 42000, 'cold_brew_cam_sa_45k.jpg', 'ly', 1, '2016-10-25 20:00:16', '2016-10-24 15:11:00'),
(8, 'COLD BREW PHÚC BỒN TỬ', 1, '', 50000, 0, 'coldbrewphucbontu_50k.png', 'ly', 0, '2016-10-25 20:00:16', '2016-10-24 15:11:00'),
(9, 'COLD BREW SỮA TƯƠI', 1, '', 50000, 0, 'coldbrewsuatuoi_50k.jpg', 'ly', 0, '2016-10-25 20:00:16', '2016-10-24 15:11:00'),
(11, 'COLD BREW SỮA TƯƠI MACCHIATO', 1, '', 50000, 45000, 'coldbresuatuoimacchiato_50k.jpg', 'ly', 0, '2016-10-11 19:00:00', '2016-10-26 19:24:00'),
(12, 'COLD BREW TRUYỀN THỐNG', 1, '', 45000, 0, 'coldbrewtruyenthong_45k.jpg', 'ly', 0, '2016-10-11 19:00:00', '2016-10-26 19:24:00'),
(13, 'ESPRESSO', 1, 'Một cốc Espresso nguyên bản được bắt đầu bởi những hạt Arabica chất lượng, phối trộn với tỉ lệ cân đối hạt Robusta, cho ra vị ngọt caramel, vị chua dịu và sánh đặc. Để đạt được sự kết hợp này, chúng tôi xay tươi hạt cà phê cho mỗi lần pha.', 35000, 0, 'espresso_35k.jpg', 'ly', 1, '2016-10-11 19:00:00', '2016-10-26 19:24:00'),
(14, 'LATTE', 1, 'Khi chuẩn bị Latte, cà phê Espresso và sữa nóng được trộn lẫn vào nhau, bên trên vẫn là lớp foam nhưng mỏng và nhẹ hơn Cappucinno.', 45000, 0, 'latte_45k.jpg', 'ly', 0, '2016-10-11 19:00:00', '2016-10-26 19:24:00'),
(15, 'MOCHA', 1, 'Cà phê Mocha được ví von đơn giản là Sốt Sô cô la được pha cùng một tách Espresso.', 49000, 0, 'mocha_49k.jpg', 'ly', 1, '2016-10-11 19:00:00', '2016-10-26 19:24:00'),
(16, 'SÔ-CÔ-LA ĐÁ', 1, 'Cacao nguyên chất hoà cùng sữa tươi béo ngậy. Vị ngọt tự nhiên, không gắt cổ, để lại một chút đắng nhẹ, cay cay trên đầu lưỡi.', 55000, 0, 'iced_chocolate_55k.jpg', 'ly', 0, '2016-10-11 19:00:00', '2016-10-26 19:24:00'),
(17, 'TRÀ CHERRY MACCHIATO', 2, '', 55000, 0, 'tracherrymacchiato_55k.jpg', 'ly', 0, '2016-10-11 19:00:00', '2016-10-26 19:24:00'),
(18, 'TRÀ ĐÀO CAM SẢ', 2, 'Vị thanh ngọt của đào Hy Lạp, vị chua dịu của Cam Vàng nguyên vỏ, vị chát của trà đen tươi được ủ mới mỗi 4 tiếng, cùng hương thơm nồng đặc trưng của sả chính là điểm sáng làm nên sức hấp dẫn của thức uống này. Sản phẩm hiện có 2 phiên bản Nóng và Lạnh phù hợp cho mọi thời gian trong năm.', 45000, 0, 'tradaocamsa_45k.jpg', 'ly', 0, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(19, 'TRÀ ĐEN MACCHIATO', 2, 'Trà đen được ủ mới mỗi ngày, giữ nguyên được vị chát mạnh mẽ đặc trưng của lá trà, phủ bên trên là lớp Macchiato \"homemade\" bồng bềnh quyến rũ vị phô mai mặn mặn mà béo béo.', 42000, 0, 'tradenmacchiato_42k.jpg', 'ly', 1, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(20, 'TRÀ GẠO RANG MACCHIATO', 2, 'Trà gạo rang, hay còn gọi là Genmaicha, hay Trà xanh gạo lứt có nguồn gốc từ Nhật Bản. Tại The Coffee House, chúng tôi nhấn nhá cho Genmaicha thêm lớp Macchiato để tăng thêm mùi vị cũng như trải nghiệm của chính bạn.', 48000, 0, 'tragaorangmacchiato_48k.jpg', 'ly', 0, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(21, 'TRÀ MATCHA LATTE', 2, 'Với màu xanh mát mắt của bột trà Matcha, vị ngọt nhẹ nhàng, pha trộn cùng sữa tươi và lớp foam mềm mịn, Matcha Latte là thức uống yêu thích của tất cả mọi người khi ghé The Coffee House.', 59000, 53000, 'tramatchalatte_59k.jpg', 'ly', 0, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(22, 'TRÀ MATCHA MACCHIATO', 2, 'Bột trà xanh Matcha thơm lừng hảo hạng cùng lớp Macchiato béo ngậy là một sự kết hợp tuyệt vời.', 45000, 0, 'tramatchamachiato_45k.jpg', 'ly', 1, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(23, 'TRÀ OOLONG SEN AN NHIÊN', 2, '', 45000, 0, 'traoolongsenannhien_45k.jpg', 'ly', 0, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(24, 'TRÀ OOLONG VẢI NHƯ Ý', 2, '', 45000, 40000, 'traoolongvainhuy_45k.jpg', 'ly', 0, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(25, 'TRÀ PHÚC BỒN TỬ', 2, '', 49000, 0, 'traphucbontu_49k.png', 'ly', 0, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(26, 'TRÀ XOÀI MACCHIATO', 2, '', 55000, 0, 'traxoaimachiato_55k.jpg', 'ly', 0, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(27, 'TRÀ XOÀI MACCHIATO 2', 2, '', 55000, 45000, 'traxoaimachiato2_55k.jpg', 'ly', 0, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(28, 'CHANH SẢ ĐÁ XAY', 3, '', 49000, 0, 'chanhsadaxay_49k.jpg', 'ly', 1, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(29, 'CHOCOLATE ĐÁ XAY', 3, 'Vị đắng của cà phê kết hợp cùng vị cacao ngọt ngàocủa sô-cô-la, vị sữa tươi ngọt béo, đem đến trải nghiệm vị giác cực kỳ thú vị.', 59000, 0, 'chocolate_daxay_59k.jpg', 'hộp', 0, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(30, 'COOKIES ĐÁ XAY', 3, 'Những mẩu bánh cookies giòn rụm kết hợp ăn ý với sữa tươi và kem tươi béo ngọt, đem đến cảm giác lạ miệng gây thích thú. Một món uống phá cách dễ thương.', 59000, 0, 'cookies_ice_blended_59k.jpg', 'ly', 1, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(31, 'ĐÀO VIỆT QUẤT ĐÁ XAY', 3, '', 59000, 0, 'daovietquatdaxay_59k.jpg', 'ly', 0, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(32, 'MATCHA ĐÁ XAY', 3, 'Matcha thanh, nhẫn, và đắng nhẹ được nhân đôi sảng khoái khi uống lạnh. Nhấn nhá thêm những nét bùi béo của kem và sữa. Gây thương nhớ vô cùng!', 59000, 0, 'matchadaxay_59k.jpg', 'ly', 0, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(33, 'ỔI HỒNG VIỆT QUẤT ĐÁ XAY', 3, '', 59000, 50000, 'oihongvietquatdaxay_59k.jpg', 'ly', 1, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(34, 'PHÚC BỒN TỬ CAM ĐÁ XAY', 3, '', 59000, 0, 'phucbontucamdaxay_59k.png', 'ly', 1, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(35, 'SINH TỐ CAM XOÀI', 4, 'Vị mứt cam xoài hòa trộn độc đáo với sữa chua, cho cảm giác chua ngọt rất sướng. Điểm nhấn là những mẩu bánh cookie giòn tan giúp sự thưởng thức thêm thú vị.', 59000, 43000, 'sinhtocamxoai_59k.jpg', 'ly', 1, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(36, 'SINH TỐ VIỆT QUẤT', 4, 'Mứt Việt Quất chua thanh, ngòn ngọt, phối hợp nhịp nhàng với dòng sữa chua bổ dưỡng. Là món sinh tố thơm ngon mà cả đầu lưỡi và làn da đều thích.', 59000, 0, 'sinhtovietquat_59k.jpg', 'ly', 0, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(37, 'BÁNH BÔNG LAN TRỨNG MUỐI', 5, '', 29000, 0, 'banhbonglantrungmuoi_29k.jpg', 'cái', 1, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(38, 'BÁNH CHOCOLATE', 5, '', 29000, 0, 'banhchocolate_29k.jpg', 'cái', 0, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(39, 'BÁNH CROISSANT BƠ TỎI', 5, '', 29000, 0, 'banhcroissantbotoi_29k.jpg', 'cái', 0, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(40, 'BÁNH GẤU CHOCOLATE', 5, '', 39000, 34000, 'banhgauchocolate_39k.jpg', 'cái', 0, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(41, 'BÁNH MATCHA', 5, '', 29000, 0, 'banhmatcha_29k.jpg', 'cái', 0, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(42, 'BÁNH MÌ CHÀ BÔNG PHÔ MAI', 5, '', 32000, 26000, 'banhmichabongphomai_32k.jpg', 'cái', 0, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(43, 'BÁNH PASSION CHEESE', 5, '', 29000, 0, 'banhpassioncheese_29k.jpg', 'cái', 1, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(44, 'BÁNH TIRAMISU', 5, '', 29000, 22000, 'banhtiramisu_29k.jpg', 'cái', 0, '2016-10-12 19:20:00', '2016-10-18 20:20:00'),
(63, 'Trà sữa trân châu đường đen', 2, 'Trà sữa chưa hết “hot”, mùa hè này lại rộ lên “phiên bản” mới với những nguyên liệu không hề mới mẻ - Trà sữa trân châu đường đen song lại rất đắt khách', 26000, 0, 'tra-sua-tran-chau-duong-den_36k.jpg', 'Ly', 0, NULL, NULL),
(64, 'Snack Curd', 5, 'Snack Curd là một loại snack ngọt làm từ pho mát sữa đông, phổ biến ở vùng Baltic, Nó là một loại sữa pho mát phổ biến ở các nước vùng Balkans, được làm từ sữa cừu, dê hoặc sữa bò.', 20000, 18000, 'Curd-Snack_20k.jpg', 'Cái', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `hinhanh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `link`, `hinhanh`) VALUES
(1, '', 'banner1.jpg'),
(2, '', 'banner2.jpg'),
(3, '', 'banner3.jpg'),
(4, '', 'banner4.jpg'),
(5, '', 'banner5.jpg'),
(6, '', 'banner6.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `matt` int(10) NOT NULL,
  `tieude` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `noidung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `hinhanh` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `tentk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `maquyen` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `tentk`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `maquyen`) VALUES
(1, 'Yuuta', 'admin@gmail.com', '$2y$10$uLvNSU1W6mdobj2NgrxeuOSBTZC2fFMdYphLYmae1Yi9KM1W8Gu9e', NULL, '2019-11-26 13:34:56', '2019-11-26 13:34:56', 2),
(18, 'Yuuta', 'admin123@gmail.com', '$2y$10$Uu6QkXJ8pBHJsA.0MuBs5eHcARFyxjlvMN87cfcPG2RaBP3Gi553m', NULL, '2019-11-26 14:29:36', '2019-11-26 14:29:36', 2),
(21, 'Yuuta', 'admin1780@gmail.com', '$2y$10$Hfb666GFeByGWp7AProKi.XZqiMsJ5H5TcotQo9h3rwmUTsmy6gl6', NULL, '2019-11-27 01:45:18', '2019-11-27 01:45:18', NULL),
(22, 'Quốc Tuấn', 'quoctuan1780@gmail.com', '$2y$10$Q/XQP0eEnBHN6ciR14h22elhh3Io/HKUpUZnr.7Ym.GS46NFie.hO', NULL, '2019-11-28 17:00:18', '2019-11-28 17:00:18', NULL),
(23, 'Yuuta', 'quoctuanlyoko@gmail.com', '$2y$10$y6qbjdlpxodZ8FWfyh1H7ORv5i0EP6UaKX/ZfBisdMn8jUJpkKjNe', NULL, '2019-11-28 17:09:47', '2019-11-28 17:09:47', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ctdh`
--
ALTER TABLE `ctdh`
  ADD PRIMARY KEY (`ma_ctdh`);

--
-- Chỉ mục cho bảng `cthd`
--
ALTER TABLE `cthd`
  ADD PRIMARY KEY (`ma_cthd`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`madh`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahd`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`maloaisp`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`maquyen`);

--
-- Chỉ mục cho bảng `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`matt`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ctdh`
--
ALTER TABLE `ctdh`
  MODIFY `ma_ctdh` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `cthd`
--
ALTER TABLE `cthd`
  MODIFY `ma_cthd` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `madh` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `mahd` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `maloaisp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
