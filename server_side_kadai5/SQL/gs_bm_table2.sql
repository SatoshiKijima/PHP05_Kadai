-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-01-24 08:30:06
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `kadai_php4`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table2`
--

CREATE TABLE `gs_bm_table2` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `url` text NOT NULL,
  `content` text NOT NULL,
  `type` text NOT NULL,
  `img` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `time` datetime NOT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table2`
--

INSERT INTO `gs_bm_table2` (`id`, `name`, `url`, `content`, `type`, `img`, `time`, `update_time`) VALUES
(5, '鬼滅の刃222222', 'http://books.google.co.jp/books?id=QlmenQAACAAJ&dq=%E9%AC%BC%E6%BB%85&hl=&source=gbs_api', 'In', '趣味・文芸書', NULL, '2023-01-04 17:29:44', '2023-01-22 14:45:33'),
(6, '鬼滅の刃', 'http://books.google.co.jp/books?id=13gDwgEACAAJ&dq=%E9%AC%BC%E6%BB%85&hl=&source=gbs_api', '立ち寄った村で、禰豆子と年の近しい花嫁の晴れ姿を見た炭治郎。妹の倖せを思い、ある言い伝えを持つ幻の花を一人で探しにいくのだが...。その他、善逸、伊之助ら鬼殺隊の本編では語られなかった物語を収録!そして大好評番外編『キメツ学園』小説版も!!', 'マンガ', NULL, '2023-01-04 16:03:28', '2023-01-22 14:45:33'),
(9, 's', 'zz', 'zz', 'マンガ', '20230118160630_IMG_4213.JPG', '2023-01-19 00:06:30', '2023-01-22 14:45:33'),
(10, 'sss', 'xd', 'xxx', 'マンガ', '20230118160646_IMG_4213.JPG', '2023-01-19 00:06:46', '2023-01-22 14:45:33'),
(11, 'xxx', 'xxx', 'xxxx', '趣味・文芸書', '20230118162348_IMG_4206.PNG', '2023-01-19 00:23:48', '2023-01-22 14:45:33'),
(12, 'x', 'x', 'x', 'マンガ', '', '2023-01-19 00:26:21', '2023-01-23 22:51:46'),
(14, 'dｄｄｄｄｄｄｄｄｄｄｄ', 'c', 'd', 'ビジネス書', '', '2023-01-20 11:47:45', '2023-01-23 23:26:13'),
(16, 'ｄｄｆｆ', 'ｆｆｆ', 'ｓｄｄｄｃｃｃｃ', '趣味・文芸書', '', '2023-01-23 23:27:22', '2023-01-23 23:29:16'),
(17, 'd', 'cc', 'cccc', 'マンガ', '20230123153540_IMG_4213.JPG', '2023-01-23 23:35:40', NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_table2`
--
ALTER TABLE `gs_bm_table2`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_bm_table2`
--
ALTER TABLE `gs_bm_table2`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
