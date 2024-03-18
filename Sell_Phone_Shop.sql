-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 17, 2024 lúc 12:28 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(22, 'iPhone'),
(23, 'Samsung'),
(24, 'Xiaomi'),
(25, 'OPPO'),
(26, 'Vivo'),
(27, 'Asus');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `body`) VALUES
(1, 'Elvis sighted', 'elvis-sighted', 'Elvis was sighted at the Podunk internet cafe. It looked like he was writing a CodeIgniter app.'),
(2, 'Say it isn\'t so!', 'say-it-isnt-so', 'Scientists conclude that some programmers have a sense of humor.'),
(3, 'Caffeination, Yes!', 'caffeination-yes', 'World\'s largest coffee shop open onsite nested coffee shop for staff only.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `order_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `total` int(255) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `orderde_id` int(15) NOT NULL,
  `order_id` int(15) NOT NULL,
  `product_id` int(15) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(12) NOT NULL,
  `product_quantity` int(12) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_detail` varchar(1000) NOT NULL,
  `product_category_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_img`, `product_detail`, `product_category_id`) VALUES
(41, 'iPhone 15 PM 256GB', 32690000, 5, 'iPhone 15 PM 256GB01.16.24vn_iphone_15_pro_white_titanium_pdp_image_position-1a_white_titanium_color.webp', 'iPhone 15 Pro Max thiết kế mới với chất liệu titan chuẩn hàng không vũ trụ bền bỉ, trọng lượng nhẹ, đồng thời trang bị nút Action và cổng sạc USB-C tiêu chuẩn giúp nâng cao tốc độ sạc. Khả năng chụp ảnh đỉnh cao của iPhone 15 bản Pro Max đến từ camera chính 48MP, camera UltraWide 12MP và camera telephoto có khả năng zoom quang học đến 5x. Bên cạnh đó, iPhone 15 ProMax sử dụng chip A17 Pro mới mạnh mẽ.', 22),
(42, 'iPhone 15 128GB', 22090000, 12, 'iPhone 15 128GB01.16.24vn_iphone_15_yellow_pdp_image_position-1a_yellow_color_1_4.webp', 'iPhone 15 128GB được trang bị màn hình Dynamic Island kích thước 6.1 inch với công nghệ hiển thị Super Retina XDR màn lại trải nghiệm hình ảnh vượt trội. Điện thoại với mặt lưng kính nhám chống bám mồ hôi cùng 5 phiên bản màu sắc lựa chọn: Hồng, Vàng, Xanh lá, Xanh dương và đen. Camera trên iPhone 15 series cũng được nâng cấp lên cảm biến 48MP cùng tính năng chụp zoom quang học tới 2x.', 22),
(43, 'iPhone 14 PM 128GB', 26990000, 12, 'iPhone 14 PM 128GB01.16.24iphone-14-pro_2__5.webp', 'iPhone 14 Pro Max sở hữu thiết kế màn hình Dynamic Island ấn tượng cùng màn hình OLED 6,7 inch hỗ trợ always-on display và hiệu năng vượt trội với chip A16 Bionic. Bên cạnh đó máy còn sở hữu nhiều nâng cấp về camera với cụm camera sau 48MP, camera trước 12MP dùng bộ nhớ RAM 6GB đa nhiệm vượt trội.', 22),
(44, 'iPhone 14 Plus 128GB', 21190000, 14, 'iPhone 14 Plus 128GB01.16.24photo_2022-09-28_21-58-56_5.webp', 'iPhone 14 Plus sở hữu màn hình Super Retina XDR OLED thiết kế tai thỏ, kích thước 6.7 inch, kết hợp công nghệ True Tone, HDR, Haptic Touch, Không chỉ vậy, sản phẩm còn trang bị chip A15 Bionic mạnh mẽ, RAM 6GB, bộ nhớ trong 128GB và chạy trên hệ điều hành iOS 16. Camera kép 12MP cải thiện khả năng chụp thiếu sáng, camera trước True Depth 12MP tự động lấy nét.', 22),
(46, 'Samsung Galaxy A23 5G', 4650000, 8, 'Samsung Galaxy A23 5G01.17.241_292.jpg', 'Samsung A23 5G được trang bị cấu hình vượt trội với con chip Snapdragon 695 5G cùng viên pin 5000 mAh thoải mái trải nghiệm. Màn hình 6.6 inch LCD mang lại khả năng hiển thị rõ nét. Điểm đặc biệt, mẫu điện thoại Samsung này còn được trang bị kết nối 5G đầy tiện lợi.', 23),
(47, 'Samsung Galaxy S21 5G', 30990000, 7, 'Samsung Galaxy S21 5G01.17.24samsung-galaxy-s21-ultra.png', 'Điện thoại Samsung Galaxy S21 Ultra - Đón đầu xu hướng công nghệ Galaxy S21 Ultra với những cải tiến đáng kể về hiệu năng của máy cực kỳ mạnh mẽ cùng với thiết kế sang trọng cao cấp. Samsung đã mang đến cho người dùng một trải nghiệm hoàn toàn mới, đây hứa hẹn sẽ là chiếc smartphone đi đầu trên thế giới về các xu hướng công nghệ lẫn hiệu năng vượt trội đáng sở hữu nhất vào thời điểm ra mắt. ', 23),
(48, 'Samsung Galaxy Flip4 256GB', 11490000, 10, 'Samsung Galaxy Flip4 256GB01.17.24samsung-galaxy-z-flip-4_1.webp', 'Ngoại hình thời trang - cầm nắm cực sang với thiết kế gập vỏ sò độc đáo. Công nghệ màn hình hàng đầu đến từ Samsung - 6.7 inch, tấm nền Dynamic AMOLED 2X. Trang bị camera chất lượng - Bộ đôi camera có cùng độ phân giải 12 MP, chống rung, chụp đêm. Hiệu năng mạnh mẽ đến từ dòng chip cao cấp của Qualcomm - Snapdragon 8+ Gen 1', 23),
(49, 'Xiaomi 13T 12GB 256GB', 11990000, 15, 'Xiaomi 13T 12GB 256GB01.17.24xiaomi-13t_1_2.webp', 'Xiaomi 13T đem tới trải nghiệm siêu mượt mà cho người dùng khi được trang bị chipset mạnh mẽ MediaTek Dimensity 8200-Ultra. Màn hình AMOLED thế hệ mới với tần số quét 144Hz giúp chất lượng hiển thị được sắc nét và chân thực trong từng điểm ảnh. Hệ thống quay chụp của máy cũng cực kỳ ấn tượng với cảm biến camera lên tới 50MP. Đồng thời, viên pin lên tới 5000mAh kết hợp với sạc nhanh 67W giúp nâng cao thời lượng sử dụng của người dùng.', 24),
(50, 'Xiaomi Redmi 13C 6GB 128GB', 3290000, 14, 'Xiaomi Redmi 13C 6GB 128GB01.17.24xiaomi-redmi-13c_21__1.webp', 'Xiaomi Redmi 13C được trang bị màn hình IPS LCD 6,74 inches cùng độ phân giải 1600x720 pixels cho độ chi tiết vừa phải và độ chân thực cao. Sản phẩm được trang bị con chip MediaTek Helio G85cùng bộ nhớ RAM 6GB mang lại hiệu năng ổn định. Hơn nữa, mẫu điện thoại Xiaomi Redmi 13C này còn sở hữu camera chính 50 MP và viên pin với dung lượng lên đến 5.000 mAh.', 24),
(51, 'Xiaomi 13 8GB 256GB', 18090000, 11, 'Xiaomi 13 8GB 256GB01.17.24pms_1670745756.94572133.webp', 'Xiaomi 13 là sản phẩm mới được trang bị màn hình OLED kích thước 6.36 inch cùng tần số quét lên đến 120Hz. Bên trong Xiaomi 13 là con chip Snapdragon 8 Gen 2 mới nhất cùng bộ nhớ RAM 8GB vượt trội. Điện thoại cũng đáp ứng tốt khả năng nhiếp ảnh với camera Leica 50MP.', 24),
(52, 'ASUS ROG Phone 5', 18990000, 10, 'ASUS ROG Phone 501.17.24asus-rog-phone-5_0000_3-rog-phone-5display-16153751648.webp', 'Với những game thủ chuyên nghiệp mong muốn sở hữu một chiếc smartphone gaming có hiệu năng \"siêu cấp\" cho những tựa game MOBA hoặc sinh tồn đình đám hiện nay thì ROG Phone 5 sẽ là chiếc điện thoại có thể giúp bạn thoải mái chiến game mượt mà với cấu hình cực đại.', 27),
(53, 'OPPO Reno8 T 4G 256GB', 6690000, 14, 'OPPO Reno8 T 4G 256GB01.17.24oppo-reno-8t-4g-256gb.webp', 'OPPO Reno8 T 4G đã chính thức ra mắt người dùng, những thông số về chiếc điện thoại này đã được hé lộ, hứa hẹn sẽ mang đến nhiều trải nghiệm cho người dùng. Không những sở hữu màn hình lớn Full HD+ mà smartphone còn có những cải tiến về camera với độ phân giải lên đến 100 MP. Cạnh đó, con chip nhà MediaTek, RAM 8 GB và bộ nhớ trong 256 GB cũng sẽ giúp cho OPPO Reno8 T hoạt động mượt mà và ổn định hơn.', 25),
(54, 'OPPO Find N2 Flip', 16990000, 15, 'OPPO Find N2 Flip01.17.24n2_flip_-_combo_product_-_black_1.webp', 'OPPO Find N2 Flip dự kiến sẽ là chiếc điện thoại khiến nhiều tín đồ công nghệ quan tâm khi sở hữu thiết kế bắt mắt, cùng màn hình ấn tượng. Đi cùng với đó là hệ thống camera của thiết bị cũng cao cấp không kém khi tích hợp đầy đủ các cảm biến, cùng đa dạng tính năng chụp ảnh.', 25),
(55, 'OPPO A77s', 5190000, 5, 'OPPO A77s01.17.24combo_a77s-_xanh_1_1.webp', 'OPPO A77s là chiếc smartphone tầm trung chạy trên hệ điều hành Android 12, bộ nhớ ROM 128GB cùng RAM 8GB. A77s còn mang đến khả năng xử lý ổn định với Chipset Snapdragon 680 4G, màn hình 6.56 inches kiểu giọt nước, tần số quét 90Hz, trọng lượng nhẹ chỉ 187 gram. Sản phẩm hoàn thiện bằng khung viền kính, mặt lưng kim loại, cảm ứng vân tay ở cạnh bên cùng cụm camera có ống kính chính 50MP.', 25),
(56, 'vivo V29E 8GB 256GB', 8690000, 17, 'vivo V29E 8GB 256GB01.17.24vivo-v29e-den.webp', 'vivo V29e sở hữu màn hình kích thước 6.67 inch cùng tần số quét 120Hz, dải màu DCI-P3 1.07 tỷ màu mang lại khả năng hiển thị rõ nét và sống động. Điện thoại ẩn chứa camera chính 64MP cùng cảm biến siêu rộng 8MP. So với thế hệ tiền nhiệm, dòng vivo V29e được hãng ưu ái trang bị bộ chipset Snapdragon 695 kết hợp cùng bộ nhớ RAM 8GB để mang đến hiệu suất tối đa. Mặt khác, hãng còn tích hợp viên pin 4800 mAh “siêu khủng” cùng công nghệ sạc nhanh 44W.', 26),
(57, 'Vivo Y22S 8GB 128GB', 4790000, 8, 'Vivo Y22S 8GB 128GB01.17.24542434226.webp', 'Vivo Y22s là sản phẩm điện thoại Vivo giá rẻ sở hữu màn hình kích thước 6.55 inches với tần số quét 90Hz hiển thị rõ nét cùng mặt lưng họa tiết lông vũ thời trang. Bên trong máy là một cấu hình ổn định với con chip Snapdragon 680 cùng bộ nhớ RAM lên đến 8GB (có thể mở rộng) giúp mang lại trải nghiệm dùng ổn định. Vivo Y22s cũng đáp ứng tốt các trải nghiệm nhiếp ảnh với camera chính 50MP.', 26),
(58, 'Vivo Y02t 4GB 64GB', 2990000, 6, 'Vivo Y02t 4GB 64GB01.17.24vivo-y02t_2.webp', 'Vivo Y02t cung cấp hiệu suất xử lý cực kỳ ổn định thông qua chipset Helio P35 cùng khả năng hiển thị chân thực trên tấm nền LCD 6.51 inch thế hệ mới. Với hệ thống máy ảnh sắc nét, lên tới 8MP cho cảm biến sau và 5MP cho camera selfie, Y02t giúp đáp ứng được mọi nhu cầu chụp ảnh, call video thông thường của người dùng. Ngoài ra, máy còn sở hữu viên pin 5000mAh cùng sạc nhanh 10W, nâng cao trải nghiệm ngày dài của người sử dụng.', 26),
(59, 'Xiaomi 13 8GB 256GB', 18090000, 14, 'Xiaomi 13 8GB 256GB01.17.24pms_1670745783.80967984_1.webp', 'Xiaomi 13 là sản phẩm mới được trang bị màn hình OLED kích thước 6.36 inch cùng tần số quét lên đến 120Hz. Bên trong Xiaomi 13 là con chip Snapdragon 8 Gen 2 mới nhất cùng bộ nhớ RAM 8GB vượt trội. Điện thoại cũng đáp ứng tốt khả năng nhiếp ảnh với camera Leica 50MP.', 24);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(30) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`orderde_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `orderde_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
