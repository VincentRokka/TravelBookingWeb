-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 27, 2021 lúc 05:48 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Cơ sở dữ liệu: `tourdulich`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmsanpham`
--

CREATE TABLE `dmsanpham` (
  `id_dm` int(10) NOT NULL,
  `ten_dm` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dmsanpham`
--

INSERT INTO `dmsanpham` (`id_dm`, `ten_dm`) VALUES
(1, 'Tour trong nước'),
(2, 'Tour ngoài nước');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id_tkkh` int(11) NOT NULL,
  `hoten` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ten_sp` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `gia_sp` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orrders`
--

CREATE TABLE `orrders` (
  `id_kh` int(11) NOT NULL,
  `hoten` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `diachi` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(10) NOT NULL,
  `id_dm` int(10) NOT NULL,
  `ten_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anh_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gia_sp` int(10) NOT NULL,
  `khuyen_mai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chi_tiet_sp` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `id_dm`, `ten_sp`, `anh_sp`, `gia_sp`, `khuyen_mai`, `chi_tiet_sp`) VALUES
(1, 1, 'Tour Hạ Long 1N', 'VinhHaLong.jpg', 3000000, 'có', 'Được UNESCO công nhận là di sản thiên nhiên thế giới, mỗi năm, Vịnh Hạ Long vẫn luôn đón tiếp hàng triệu du khách cả trong và ngoài nước đến khám phá vẻ đẹp lộng lẫy nơi đây. Hiện nay có rất nhiều dịch vụ giúp du khách dễ dàng tham quan vịnh Hạ Long và một trong những dịch vụ mới nhất và cao cấp nhất là bay ngắm cẳnh bằng thủy phi cơ để chiêm ngưỡng vịnh Hạ Long từ trên cao, cảm nhận hết bức tranh vịnh Hạ Long khổng lồ và vô cùng sống động'),
(2, 1, 'Tour Bà Nà Hill 1N', 'BaNaHill.jpeg', 1200000, 'không', 'Bà Nà được mệnh danh là “Lá phổi xanh” của miền Trung của Việt Nam…Với vẻ đẹp lung linh, cùng khí hậu trong lành, thời tiết bốn mùa trong một ngày làm say đắm lòng người. Đến với tour Bà Nà Hills 1 ngày, Quý khách sẽ thỏa thích vui chơi tại Bà Nà Hills Fantasy Park – khu vui chơi giải trí trong nhà với diện tích 21.000m2 đẳng cấp quốc tế. Đáp ứng nhu cầu vui chơi giải trí của mọi lứa tuổi bằng các trò chơi vui nhộn phù hợp với trẻ em cũng như những trò chơi cảm giác mạnh cho người lớn.'),
(3, 2, 'Tour Dubai - Abu Dhabi 7N', 'Dubai.jpg', 24500000, 'không', 'Du lịch Dubai từ Hà Nội khám phá những công trình kiến trúc vĩ đại, những tòa nhà chọc trời, trung tâm thương mại sầm uất, khách sạn 7 sao xa hoa tráng lệ… Bên cạnh đó, tour Dubai còn là cơ hội cho du khách trải nghiệm nền văn hóa đa dạng gắn liền với những khu phố cổ, pháo đài, viện bảo tàng, chợ Vàng…'),
(4, 2, 'TOUR NHẬT BẢN 6N5Đ: TOKYO - OSAKA', 'Japan.jpg', 26000000, 'không', 'Văn hóa Nhật Bản luôn chứa đựng sự huyền bí đặc trưng của văn hóa phương Đông, đồng thời cũng có những nét đặc trưng riêng biệt với những nền văn hóa khác. Đó cũng chính là một trong những điểm hấp dẫn du khách Thế giới đến với Nhật Bản để khám phá những nét đặc trung và huyền bí của Đất nước Mặt trời mọc.'),
(5, 2, 'Tour Singapore 4N3D', 'Singapo.jpg', 8000000, 'có', 'Tham quan đảo quốc sư tử Singapore với các địa danh nổi tiếng: Merlion Park, Gardens by the Bay, Đảo Sentosa, Resorts World.'),
(6, 2, 'TOUR du lịch Thái Lan', 'ThaiLand.jpg', 6500000, 'không', 'Du lịch Rome chỉ cần mang theo sách hướng du lịch như Lonely Planet là đủ. Bản đồ thành phố được phát miễn phí ở sân bay và khách sạn. Người dân ở đây cũng nói tiếng Anh giỏi.'),
(7, 1, 'Tour Cao Bằng Hồ Ba Bể 1N', 'HoBaBe.jpg', 1500000, 'có', 'Hành trình theo chân Bác năm xưa trở về với non nước Cao bằng thăm Pắc pó, đến với danh thắng Thác Bản Giốc, quý khách du trên thuyền ngắm hồ Ba Bể như một bức tranh thủy mặc khổng lồ.'),
(8, 2, 'TOUR du lịch Rome, Italy', 'Rome.jpg', 30000000, 'có', 'Du lịch Rome chỉ cần mang theo sách hướng du lịch như Lonely Planet là đủ. Bản đồ thành phố được phát miễn phí ở sân bay và khách sạn. Người dân ở đây cũng nói tiếng Anh giỏi.'),
(9, 1, 'Tour Nha Trang 3N: City Tour Nha Trang', 'NhaTrang.jpg', 3150000, 'không', 'Thành phố Nha Trang đẹp như một bức tuyệt tác của tự nhiên và con người với nhiều địa điểm du lịch nổi tiếng. Cảnh quan thiên nhiên đa dạng đã làm nên sức hút khó cưỡng của những hoạt động du lịch nơi đây, cùng với nền ẩm thực phong phú và con người thân thiện – nơi đây như đã chiếm trọn trái tim du khách muôn phương. Các bãi biển dọc chiều dài thành phố và trên các đảo thuộc Vịnh Nha Trang thu hút du khách trong và ngoài nước'),
(10, 1, 'Tour Tràng An Ninh Bình 2N1D', 'TrangAnNinhBinh.jpg', 2000000, 'có', 'Khu Du Lịch Tràng An là một quần thể danh thắng thuộc tỉnh Ninh Bình gồm hệ thống dãy núi đá vôi ngập nước tạo ra các hồ, đầm thông nhau bằng những hang động xuyên thủy. Trong danh thắng này còn có nhiều hệ sinh thái rừng ngập nước, rừng trên núi đá vôi và các di tích lịch sử thuộc thành nam của cố đô Hoa Lư Khu sinh thái Tràng An hiện là đại diện của Việt Nam ứng cử di sản thiên nhiên thế giới với những giá trị nổi bật về cảnh quan thiên nhiên, đa dạng sinh thái và kiến tạo địa chất, là địa danh được đầu tư để trở thành một khu du lịch tầm cỡ quốc tế'),
(11, 1, 'Tour Sóc Sơn Hà Nội 1N1D', 'SocSonHaNoi.jpg', 1000000, 'không', 'Sóc Sơn là một huyện nằm ở phía Bắc thành phố Hà Nội, khoảng cách từ trung tâm thành phố đến Sóc Sơn vào khoảng hơn 40km. Sóc Sơn với vẻ đẹp hoang sơ tự nhiên cùng nhiều địa điểm du lịch nổi tiếng thu hút hàng nghìn du khách ghé thăm mỗi năm.');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dmsanpham`
--
ALTER TABLE `dmsanpham`
  ADD PRIMARY KEY (`id_dm`);

--
-- Chỉ mục cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id_tkkh`);

--
-- Chỉ mục cho bảng `orrders`
--
ALTER TABLE `orrders`
  ADD PRIMARY KEY (`id_kh`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_dm` (`id_dm`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dmsanpham`
--
ALTER TABLE `dmsanpham`
  MODIFY `id_dm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id_tkkh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orrders`
--
ALTER TABLE `orrders`
  MODIFY `id_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_dm`) REFERENCES `dmsanpham` (`id_dm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
