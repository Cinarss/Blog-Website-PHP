-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 09 Ağu 2022, 18:11:15
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog_share`
--

CREATE TABLE `blog_share` (
  `blog_id` int(11) NOT NULL,
  `blog_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `blog_title` varchar(150) COLLATE utf8mb4_turkish_ci NOT NULL,
  `blog_subject` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `blog_text` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `blog_seourl` varchar(150) COLLATE utf8mb4_turkish_ci NOT NULL,
  `blog_status` enum('0','1') COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '1',
  `blog_url` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `blog_share`
--

INSERT INTO `blog_share` (`blog_id`, `blog_time`, `blog_title`, `blog_subject`, `blog_text`, `blog_seourl`, `blog_status`, `blog_url`) VALUES
(1, '2022-08-09 12:52:06', 'dneeme bloh', 'konu yok', '<p><strong>Lorem Ipsum</strong>, dizgi ve baskı end&uuml;strisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak &uuml;zere bir yazı galerisini alarak karıştırdığı 1500&#39;lerden beri end&uuml;stri standardı sahte metinler olarak kullanılmıştır. Beşy&uuml;z yıl boyunca varlığını s&uuml;rd&uuml;rmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sı&ccedil;ramıştır. 1960&#39;larda Lorem Ipsum pasajları da i&ccedil;eren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum s&uuml;r&uuml;mleri i&ccedil;eren masa&uuml;st&uuml; yayıncılık yazılımları ile pop&uuml;ler olmuştur.</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/5175b8dc-6bc3-4ecd-bc8d-45a4f0637f62\" width=\"750\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>\r\n', 'dneeme-bloh', '1', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_username` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `user_mail` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `user_password` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `user_gsm` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `user_status` enum('0','1') COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '1',
  `user_access` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`user_id`, `user_time`, `user_username`, `user_mail`, `user_password`, `user_name`, `user_gsm`, `user_status`, `user_access`) VALUES
(1, '2022-08-09 12:08:35', 'cinarsak       ', 'deneme1@gmail.com', '123456', 'Yasin', '05487891156       ', '1', '1'),
(2, '2022-08-08 09:14:47', 'cinarsak', 'cinarsak1@gmail.com', '123456', '', '', '1', '1'),
(4, '2022-08-09 13:03:17', 'cinarsakadmin', 'sakcinar123@gmail.com', '123456', 'Çınar Sak', '05545648871', '1', '5');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `blog_share`
--
ALTER TABLE `blog_share`
  ADD PRIMARY KEY (`blog_id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `blog_share`
--
ALTER TABLE `blog_share`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
