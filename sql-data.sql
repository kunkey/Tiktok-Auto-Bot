-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th5 29, 2020 lúc 12:40 PM
-- Phiên bản máy phục vụ: 10.3.23-MariaDB
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fansubhd_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bot_comment`
--

CREATE TABLE `bot_comment` (
  `id` int(255) NOT NULL,
  `username` varchar(999) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(999) COLLATE utf8mb4_bin NOT NULL,
  `noidung` varchar(999) COLLATE utf8mb4_bin NOT NULL,
  `status` varchar(999) COLLATE utf8mb4_bin NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Đang đổ dữ liệu cho bảng `bot_comment`
--

INSERT INTO `bot_comment` (`id`, `username`, `password`, `noidung`, `status`, `time`) VALUES
(3, 'Choulinng', '01635912116@Aa', 'Video Hay lắm ạ! 😜😀😊😃\nHay Vl!  😜😀😊😃\nNhìn thích vl ạ :D ! 😜😀😊😃', 'true', 1590729822);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bot_follow`
--

CREATE TABLE `bot_follow` (
  `id` int(255) NOT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bot_follow`
--

INSERT INTO `bot_follow` (`id`, `username`, `password`, `time`) VALUES
(4, 'Choulinng', '01635912116@Aa', 1590727667);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bot_tha_tym`
--

CREATE TABLE `bot_tha_tym` (
  `id` int(255) NOT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bot_tha_tym`
--

INSERT INTO `bot_tha_tym` (`id`, `username`, `password`, `time`) VALUES
(13, 'Choulinng', '01635912116@Aa', 1590690192);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history`
--

CREATE TABLE `history` (
  `id` int(255) NOT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `history`
--

INSERT INTO `history` (`id`, `username`, `action`, `text`, `time`) VALUES
(2, 'kunkey3', 'bot_tha_tym', 'Bạn vừa thả tim video 6830592066733624578', 1590683082),
(3, 'kunkey3', 'bot_tha_tym', 'Bạn vừa thả tim video 6825094551892413698', 1590683082),
(4, 'kunkey3', 'bot_tha_tym', 'Bạn vừa thả tim video 6828406427623771394', 1590683082),
(5, 'kunkey3', 'bot_tha_tym', 'Bạn vừa thả tim video 6831787260250164485', 1590683082),
(6, 'kunkey3', 'bot_tha_tym', 'Bạn vừa thả tim video 6828905865878244610', 1590683082),
(16, 'Choulinng', 'bot_comment', 'Bạn vừa bình luận video <a href=\'https://t.tiktok.com/i18n/share/video/6831829205706083585\' target=\'_blank\'>6831829205706083585</a>', 1590692559),
(17, 'Choulinng', 'bot_comment', 'Bạn vừa bình luận video <a href=\'https://t.tiktok.com/i18n/share/video/6831865979337805058\' target=\'_blank\'>6831865979337805058</a>', 1590692559),
(18, 'Choulinng', 'bot_comment', 'Bạn vừa bình luận video <a href=\'https://t.tiktok.com/i18n/share/video/6817006482895244546\' target=\'_blank\'>6817006482895244546</a>', 1590692559),
(12, 'Choulinng', 'bot_tha_tym', 'Bạn vừa thả tim video <a href=\'https://t.tiktok.com/i18n/share/video/6824865944125410561\' target=\'_blank\'>6824865944125410561</a>', 1590686615),
(13, 'Choulinng', 'bot_tha_tym', 'Bạn vừa thả tim video <a href=\'https://t.tiktok.com/i18n/share/video/6828077843503713537\' target=\'_blank\'>6828077843503713537</a>', 1590686713),
(14, 'Choulinng', 'bot_tha_tym', 'Bạn vừa thả tim video <a href=\'https://t.tiktok.com/i18n/share/video/6823586749575335169\' target=\'_blank\'>6823586749575335169</a>', 1590686713),
(15, 'Choulinng', 'bot_tha_tym', 'Bạn vừa thả tim video <a href=\'https://t.tiktok.com/i18n/share/video/6817320932726689026\' target=\'_blank\'>6817320932726689026</a>', 1590686713),
(19, 'Choulinng', 'bot_comment', 'Bạn vừa bình luận video <a href=\'https://t.tiktok.com/i18n/share/video/6824429063210306818\' target=\'_blank\'>6824429063210306818</a>', 1590692775),
(20, 'Choulinng', 'bot_comment', 'Bạn vừa bình luận video <a href=\'https://t.tiktok.com/i18n/share/video/6828531824126364930\' target=\'_blank\'>6828531824126364930</a>', 1590692775),
(21, 'Choulinng', 'bot_comment', 'Bạn vừa bình luận video <a href=\'https://t.tiktok.com/i18n/share/video/6827030551107587329\' target=\'_blank\'>6827030551107587329</a>', 1590692775),
(22, 'Choulinng', 'bot_comment', 'Bạn vừa bình luận video <a href=\'https://t.tiktok.com/i18n/share/video/6831542474649996546\' target=\'_blank\'>6831542474649996546</a>', 1590692789),
(23, 'Choulinng', 'bot_comment', 'Bạn vừa bình luận video <a href=\'https://t.tiktok.com/i18n/share/video/6827409348235365634\' target=\'_blank\'>6827409348235365634</a>', 1590692789),
(24, 'Choulinng', 'bot_comment', 'Bạn vừa bình luận video <a href=\'https://t.tiktok.com/i18n/share/video/6831702247919897858\' target=\'_blank\'>6831702247919897858</a>', 1590692789),
(25, 'Choulinng', 'bot_follow', 'Bạn vừa follow <a href=\'https://www.tiktok.com/@giang.xinh\' target=\'_blank\'>Giang Nguyễn</a>', 1590728581),
(26, 'Choulinng', 'bot_follow', 'Bạn vừa follow <a href=\'https://www.tiktok.com/@nguyenlanhdan95\' target=\'_blank\'>lảnh khiểng</a>', 1590728982),
(27, 'Choulinng', 'bot_follow', 'Bạn vừa follow <a href=\'https://www.tiktok.com/@denisdang\' target=\'_blank\'>Denis Dang</a>', 1590729024),
(30, 'Choulinng', 'bot_comment', 'Bạn vừa bình luận video <a href=\'https://t.tiktok.com/i18n/share/video/6831839070398745858\' target=\'_blank\'>6831839070398745858</a>', 1590729854),
(31, 'Choulinng', 'bot_comment', 'Bạn vừa bình luận video <a href=\'https://t.tiktok.com/i18n/share/video/6831384639047863553\' target=\'_blank\'>6831384639047863553</a>', 1590729854),
(32, 'Choulinng', 'bot_comment', 'Bạn vừa cmt video <a href=\'https://t.tiktok.com/i18n/share/video/6831576240898559233\' target=\'_blank\'>6831576240898559233</a>', 1590729854);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `admin` int(255) NOT NULL,
  `name` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `follow_count` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `time` int(255) NOT NULL,
  `time_expired` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `admin`, `name`, `username`, `password`, `follow_count`, `avatar`, `money`, `ip`, `time`, `time_expired`) VALUES
(194, 0, 'Duy Lực Vũ', 'choulinng', '01635912116@Aa', '3315', 'http://p16-sg-default.akamaized.net/aweme/720x720/tiktok-obj/cfdeb7d1f75964a7ac2452d97f1c0cd5.webp', '0', '14.163.88.73', 1590584047, 1590843247),
(195, 0, 'ixz04296', 'kunkey3', '01635912116@Aa', '0', 'http://p16-sg-default.akamaized.net/aweme/720x720/tiktok-obj/1665788628609025.webp', '0', '14.163.88.73', 1590590959, 1590850159);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bot_comment`
--
ALTER TABLE `bot_comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bot_follow`
--
ALTER TABLE `bot_follow`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bot_tha_tym`
--
ALTER TABLE `bot_tha_tym`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bot_comment`
--
ALTER TABLE `bot_comment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `bot_follow`
--
ALTER TABLE `bot_follow`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `bot_tha_tym`
--
ALTER TABLE `bot_tha_tym`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `history`
--
ALTER TABLE `history`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
