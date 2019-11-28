SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+07:00";


CREATE TABLE `khachhang` (
  `makh` int(10) UNSIGNED NOT NULL PRIMARY KEY,
  `hoten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sodt` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `loaisanpham` (
  `maloaisp` int(10) UNSIGNED NOT NULL PRIMARY KEY,
  `tenloaisp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `sanpham` (
  `masp` int(10) UNSIGNED NOT NULL PRIMARY KEY,
  `tensp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maloaisp` int(10) UNSIGNED DEFAULT NULL REFERENCES `loaisanpham`(`maloaisp`),
  `mota` text COLLATE utf8_unicode_ci,
  `gia` float DEFAULT NULL,
  `giakm` float DEFAULT NULL,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `moi` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `hoadon` (
  `mahd` int(10) UNSIGNED NOT NULL PRIMARY KEY,
  `makh` int(11) DEFAULT NULL REFERENCES `khachhang`(`makh`),
  `ngaydat` date DEFAULT NULL,
  `tongtien` float DEFAULT NULL COMMENT 'tổng tiền',
  `httt` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `ghichu` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `cthd` (
  `ma_cthd` int(10) UNSIGNED NOT NULL PRIMARY KEY,
  `mahd` int(10) NOT NULL REFERENCES `hoadon` (`mahd`),
  `masp` int(10) NOT NULL REFERENCES `sanpham`(`masp`),
  `soluong` int(11) NOT NULL COMMENT 'số lượng',
  `gia` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `donhang` (
  `madh` int(10) UNSIGNED NOT NULL PRIMARY KEY,
  `makh` int(11) DEFAULT NULL REFERENCES `khachhang`(`makh`),
  `ngaydat` date DEFAULT NULL,
  `tongtien` float DEFAULT NULL COMMENT 'tổng tiền',
  `httt` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `ghichu` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `ctdh` (
  `ma_ctdh` int(10) UNSIGNED NOT NULL PRIMARY KEY,
  `madh` int(10) NOT NULL REFERENCES `donhang` (`mahd`),
  `masp` int(10) NOT NULL REFERENCES `sanpham`(`masp`),
  `soluong` int(11) NOT NULL COMMENT 'số lượng',
  `gia` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `tintuc` (
  `matt` int(10) NOT NULL PRIMARY KEY,
  `tieude` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `noidung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `hinhanh` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `slide` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `link` varchar(100) NOT NULL,
  `hinhanh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `quyen` (
  `maquyen` int(10) UNSIGNED NOT NULL PRIMARY KEY,
  `tenquyen` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `users` (
  `matk` int(10) UNSIGNED NOT NULL PRIMARY KEY,
  `maquyen` int(10) REFERENCES `quyen`(`maquyen`),
  `tentk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `hoadon`
  MODIFY `mahd` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `cthd`
  MODIFY `ma_cthd` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `type_products`
--
ALTER TABLE `loaisanpham`
  MODIFY `maloaisp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `matk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `donhang`
  MODIFY `madh` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `ctdh`
  MODIFY `ma_ctdh` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

INSERT INTO `khachhang` (`makh`, `hoten`, `gioitinh`, `email`, `diachi`, `sodt`, `ghichu`, `created_at`, `updated_at`) VALUES
(15, 'ê', 'Nữ', 'huongnguyen@gmail.com', 'e', 'e', 'e', '2017-03-24 07:14:32', '2017-03-24 07:14:32'),
(14, 'hhh', 'nam', 'huongnguyen@gmail.com', 'Lê thị riêng', '99999999999999999', 'k', '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(13, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '23456789', 'Vui lòng giao hàng trước 5h', '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(12, 'Khoa phạm', 'Nam', 'khoapham@gmail.com', 'Lê thị riêng', '1234567890', 'Vui lòng chuyển đúng hạn', '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(11, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '234567890-', 'không chú', '2017-03-21 07:16:09', '2017-03-21 07:16:09');


INSERT INTO `loaisanpham` (`maloaisp`, `tenloaisp`, `created_at`, `updated_at`) VALUES
(1, 'Cà phê','2016-10-12 02:16:15', '2016-10-13 01:38:35'),
(2, 'Trà và Macchiato','2016-10-12 02:16:15', '2016-10-13 01:38:35'),
(3, 'Thức uống đá xay','2016-10-18 00:33:33', '2016-10-15 07:25:27'),
(4, 'Thức uống sinh tố','2016-10-26 03:29:19', '2016-10-26 02:22:22'),
(5, 'Bánh và Snack','2016-10-28 04:00:00', '2016-10-27 04:00:23');

INSERT INTO `sanpham` (`masp`, `tensp`, `maloaisp`, `mota`, `gia`, `giakm`, `hinhanh`, `dvt`, `moi`, `created_at`, `updated_at`) VALUES
(1, 'AMERICANO', 1, 'Americano được pha chế bằng cách thêm nước vào một hoặc hai shot Espresso để pha loãng độ đặc của cà phê, từ đó mang lại hương vị nhẹ nhàng, không gắt mạnh và vẫn thơm nồng nàn.', 39000, 37000, 'americano_39k.jpg', 'ly', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(2, 'BẠC SỈU', 1, 'Theo chân những người gốc Hoa đến định cư tại Sài Gòn, Bạc sỉu là cách gọi tắt của "Bạc tẩy sỉu phé" trong tiếng Quảng Đông, chính là: Ly sữa trắng kèm một chút cà phê.', 29000, 0, 'bacsiu_29k.jpg', 'ly', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(3, 'CÀ PHÊ ĐEN', 1, 'Một tách cà phê đen thơm ngào ngạt, phảng phất mùi cacao là món quà tự thưởng tuyệt vời nhất cho những ai mê đắm tinh chất nguyên bản nhất của cà phê. Một tách cà phê trầm lắng, thi vị giữa dòng đời vồn vã.', 29000, 0, 'cafeden_29k.jpg', 'ly', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(4, 'CÀ PHÊ SỮA', 1, 'Cà phê phin kết hợp cũng sữa đặc là một sáng tạo đầy tự hào của người Việt, được xem món uống thương hiệu của Việt Nam.', 29000, 0, 'cafesua_29k.jpg', 'ly', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(5, 'CAPPUCINNO', 1, 'Cappucino được gọi vui là thức uống "một-phần-ba" - 1/3 Espresso, 1/3 Sữa nóng, 1/3 Foam.', 45000, 0, 'cappucinno_45k.jpg', 'ly', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(6, 'CARAMEL MACCHIATO', 1, 'Vị thơm béo của bọt sữa và sữa tươi, vị đắng thanh thoát của cà phê Espresso hảo hạng, và vị ngọt đậm của sốt caramel.', 55000, 0, 'caramelmacchiato_55k.jpg', 'ly', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(7, 'COLD BREW CAM SẢ', 1, '', 45000, 42000, 'cold_brew_cam_sa_45k.jpg', 'ly', 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(8, 'COLD BREW PHÚC BỒN TỬ', 1, '', 50000, 0, 'coldbrewphucbontu_50k.png', 'ly', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(9, 'COLD BREW SỮA TƯƠI', 1, '', 50000, 0, 'coldbrewsuatuoi_50k.jpg', 'ly', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(11, 'COLD BREW SỮA TƯƠI MACCHIATO', 1, '', 50000, 45000, 'coldbresuatuoimacchiato_50k.jpg', 'ly', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(12, 'COLD BREW TRUYỀN THỐNG', 1, '', 45000, 0, 'coldbrewtruyenthong_45k.jpg', 'ly', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(13, 'ESPRESSO', 1, 'Một cốc Espresso nguyên bản được bắt đầu bởi những hạt Arabica chất lượng, phối trộn với tỉ lệ cân đối hạt Robusta, cho ra vị ngọt caramel, vị chua dịu và sánh đặc. Để đạt được sự kết hợp này, chúng tôi xay tươi hạt cà phê cho mỗi lần pha.', 35000, 0, 'espresso_35k.jpg', 'ly', 1, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(14, 'LATTE', 1, 'Khi chuẩn bị Latte, cà phê Espresso và sữa nóng được trộn lẫn vào nhau, bên trên vẫn là lớp foam nhưng mỏng và nhẹ hơn Cappucinno.', 45000, 0, 'latte_45k.jpg', 'ly', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(15, 'MOCHA', 1, 'Cà phê Mocha được ví von đơn giản là Sốt Sô cô la được pha cùng một tách Espresso.', 49000, 0, 'mocha_49k.jpg', 'ly', 1, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(16, 'SÔ-CÔ-LA ĐÁ', 1, 'Cacao nguyên chất hoà cùng sữa tươi béo ngậy. Vị ngọt tự nhiên, không gắt cổ, để lại một chút đắng nhẹ, cay cay trên đầu lưỡi.', 55000, 0, 'iced_chocolate_55k.jpg', 'ly', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(17, 'TRÀ CHERRY MACCHIATO', 2, '', 55000, 0, 'tracherrymacchiato_55k.jpg', 'ly', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(18, 'TRÀ ĐÀO CAM SẢ', 2, 'Vị thanh ngọt của đào Hy Lạp, vị chua dịu của Cam Vàng nguyên vỏ, vị chát của trà đen tươi được ủ mới mỗi 4 tiếng, cùng hương thơm nồng đặc trưng của sả chính là điểm sáng làm nên sức hấp dẫn của thức uống này. Sản phẩm hiện có 2 phiên bản Nóng và Lạnh phù hợp cho mọi thời gian trong năm.', 45000, 0, 'tradaocamsa_45k.jpg', 'ly', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(19, 'TRÀ ĐEN MACCHIATO', 2, 'Trà đen được ủ mới mỗi ngày, giữ nguyên được vị chát mạnh mẽ đặc trưng của lá trà, phủ bên trên là lớp Macchiato "homemade" bồng bềnh quyến rũ vị phô mai mặn mặn mà béo béo.', 42000, 0, 'tradenmacchiato_42k.jpg', 'ly', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(20, 'TRÀ GẠO RANG MACCHIATO', 2, 'Trà gạo rang, hay còn gọi là Genmaicha, hay Trà xanh gạo lứt có nguồn gốc từ Nhật Bản. Tại The Coffee House, chúng tôi nhấn nhá cho Genmaicha thêm lớp Macchiato để tăng thêm mùi vị cũng như trải nghiệm của chính bạn.', 48000, 0, 'tragaorangmacchiato_48k.jpg', 'ly', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(21, 'TRÀ MATCHA LATTE', 2, 'Với màu xanh mát mắt của bột trà Matcha, vị ngọt nhẹ nhàng, pha trộn cùng sữa tươi và lớp foam mềm mịn, Matcha Latte là thức uống yêu thích của tất cả mọi người khi ghé The Coffee House.', 59000, 53000, 'tramatchalatte_59k.jpg', 'ly', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(22, 'TRÀ MATCHA MACCHIATO', 2, 'Bột trà xanh Matcha thơm lừng hảo hạng cùng lớp Macchiato béo ngậy là một sự kết hợp tuyệt vời.', 45000, 0, 'tramatchamachiato_45k.jpg', 'ly', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(23, 'TRÀ OOLONG SEN AN NHIÊN', 2, '', 45000, 0, 'traoolongsenannhien_45k.jpg', 'ly', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(24, 'TRÀ OOLONG VẢI NHƯ Ý', 2, '', 45000, 40000, 'traoolongvainhuy_45k.jpg', 'ly', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(25, 'TRÀ PHÚC BỒN TỬ', 2, '', 49000, 0, 'traphucbontu_49k.png', 'ly', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(26, 'TRÀ XOÀI MACCHIATO', 2, '', 55000, 0, 'traxoaimachiato_55k.jpg', 'ly', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(27, 'TRÀ XOÀI MACCHIATO 2', 2, '', 55000, 45000, 'traxoaimachiato2_55k.jpg', 'ly', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(28, 'CHANH SẢ ĐÁ XAY', 3, '', 49000, 0, 'chanhsadaxay_49k.jpg', 'ly', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(29, 'CHOCOLATE ĐÁ XAY', 3, 'Vị đắng của cà phê kết hợp cùng vị cacao ngọt ngàocủa sô-cô-la, vị sữa tươi ngọt béo, đem đến trải nghiệm vị giác cực kỳ thú vị.', 59000, 0, 'chocolate_daxay_59k.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(30, 'COOKIES ĐÁ XAY', 3, 'Những mẩu bánh cookies giòn rụm kết hợp ăn ý với sữa tươi và kem tươi béo ngọt, đem đến cảm giác lạ miệng gây thích thú. Một món uống phá cách dễ thương.', 59000, 0, 'cookies_ice_blended_59k.jpg', 'ly', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(31, 'ĐÀO VIỆT QUẤT ĐÁ XAY', 3, '', 59000, 0, 'daovietquatdaxay_59k.jpg', 'ly', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(32, 'MATCHA ĐÁ XAY', 3, 'Matcha thanh, nhẫn, và đắng nhẹ được nhân đôi sảng khoái khi uống lạnh. Nhấn nhá thêm những nét bùi béo của kem và sữa. Gây thương nhớ vô cùng!', 59000, 0, 'matchadaxay_59k.jpg', 'ly', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(33, 'ỔI HỒNG VIỆT QUẤT ĐÁ XAY', 3, '', 59000, 50000, 'oihongvietquatdaxay_59k.jpg', 'ly', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(34, 'PHÚC BỒN TỬ CAM ĐÁ XAY', 3, '', 59000, 0, 'phucbontucamdaxay_59k.png', 'ly', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
 

(35, 'SINH TỐ CAM XOÀI', 4, 'Vị mứt cam xoài hòa trộn độc đáo với sữa chua, cho cảm giác chua ngọt rất sướng. Điểm nhấn là những mẩu bánh cookie giòn tan giúp sự thưởng thức thêm thú vị.', 59000, 43000, 'sinhtocamxoai_59k.jpg', 'ly', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(36, 'SINH TỐ VIỆT QUẤT', 4, 'Mứt Việt Quất chua thanh, ngòn ngọt, phối hợp nhịp nhàng với dòng sữa chua bổ dưỡng. Là món sinh tố thơm ngon mà cả đầu lưỡi và làn da đều thích.', 59000, 0, 'sinhtovietquat_59k.jpg', 'ly', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(37, 'BÁNH BÔNG LAN TRỨNG MUỐI', 5, '', 29000, 0, 'banhbonglantrungmuoi_29k.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(38, 'BÁNH CHOCOLATE', 5, '', 29000, 0, 'banhchocolate_29k.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(39, 'BÁNH CROISSANT BƠ TỎI', 5, '', 29000, 0, 'banhcroissantbotoi_29k.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(40, 'BÁNH GẤU CHOCOLATE', 5, '', 39000, 34000, 'banhgauchocolate_39k.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(41, 'BÁNH MATCHA', 5, '', 29000, 0, 'banhmatcha_29k.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(42, 'BÁNH MÌ CHÀ BÔNG PHÔ MAI', 5, '', 32000, 26000, 'banhmichabongphomai_32k.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(43, 'BÁNH PASSION CHEESE', 5, '', 29000, 0, 'banhpassioncheese_29k.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(44, 'BÁNH TIRAMISU', 5, '', 29000, 22000, 'banhtiramisu_29k.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00');

INSERT INTO `slide` (`id`, `link`, `hinhanh`) VALUES
(1, '', 'banner1.jpg'),
(2, '', 'banner2.jpg'),
(3, '', 'banner3.jpg'),
(4, '', 'banner4.jpg'),
(5, '', 'banner5.jpg'),
(6, '', 'banner6.jpg');