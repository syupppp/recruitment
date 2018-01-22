-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2018 年 1 月 22 日 19:37
-- サーバのバージョン： 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recruitment`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `book`
--

CREATE TABLE `book` (
  `obj_id` int(11) NOT NULL COMMENT 'オブジェクトID',
  `path` text NOT NULL COMMENT 'ファイルパス',
  `item_type` enum('FRNT','BACK') NOT NULL COMMENT '表紙',
  `order` int(11) NOT NULL COMMENT 'オブジェクトの順番'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `circle`
--

CREATE TABLE `circle` (
  `id` int(11) NOT NULL COMMENT 'サークルID',
  `name` text NOT NULL COMMENT 'サークル名',
  `pref_id` text NOT NULL COMMENT '都道府県ID',
  `postal_code` char(7) NOT NULL COMMENT '郵便番号',
  `address_prefectures` text NOT NULL COMMENT '住所1',
  `address_municipality` text NOT NULL COMMENT '住所2',
  `address_other` text NOT NULL COMMENT '住所3',
  `phone_number` varchar(255) NOT NULL COMMENT '電話番号'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='サークルtbl';

--
-- テーブルのデータのダンプ `circle`
--

INSERT INTO `circle` (`id`, `name`, `pref_id`, `postal_code`, `address_prefectures`, `address_municipality`, `address_other`, `phone_number`) VALUES
(1, 'みんなのサークル', '27', '5740043', '大阪府', '大東市灰塚4丁目', '17-17', '09011112222');

-- --------------------------------------------------------

--
-- テーブルの構造 `object`
--

CREATE TABLE `object` (
  `id` int(11) NOT NULL COMMENT 'オブジェクトID',
  `name` text NOT NULL COMMENT 'オブジェクト名',
  `type` enum('FILE','FLDR','BOOK','') NOT NULL COMMENT 'オブジェクトタイプ',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  `circle_id` int(11) NOT NULL COMMENT 'サークルID',
  `parent_id` int(11) NOT NULL COMMENT '親階層ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='オブジェクトtbl';

--
-- テーブルのデータのダンプ `object`
--

INSERT INTO `object` (`id`, `name`, `type`, `user_id`, `circle_id`, `parent_id`) VALUES
(1, '風炉光さんのマイフォルダ', 'FLDR', 1, 1, 0),
(2, '夏コミ18', 'BOOK', 1, 1, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `sircle_member`
--

CREATE TABLE `sircle_member` (
  `sircle_id` int(11) NOT NULL COMMENT 'サークルID',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='サークルメンバーtbl';

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'ユーザID',
  `name` text NOT NULL COMMENT 'ユーザ名',
  `name_kana` text NOT NULL COMMENT 'ふりがな',
  `pref_id` int(11) NOT NULL COMMENT '都道府県ID',
  `postal_code` char(7) NOT NULL COMMENT '郵便番号',
  `address_prefectures` text NOT NULL COMMENT '住所1',
  `address_municipality` text NOT NULL COMMENT '住所2',
  `address_other` text NOT NULL COMMENT '住所3',
  `phone_number` varchar(255) NOT NULL COMMENT '電話番号',
  `mail` varchar(255) NOT NULL COMMENT 'メールアドレス',
  `sex` tinyint(1) NOT NULL COMMENT '性別',
  `password` varchar(255) NOT NULL COMMENT 'パスワード'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ユーザtbl';

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`id`, `name`, `name_kana`, `pref_id`, `postal_code`, `address_prefectures`, `address_municipality`, `address_other`, `phone_number`, `mail`, `sex`, `password`) VALUES
(1, '風炉 光', 'ふろ ひかる', 27, '5740043', '大阪府', '大東市灰塚4丁目', '17-17', '09011112222', 'Florlight.H@gmail.com', 1, 'furohikaru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`obj_id`,`order`);

--
-- Indexes for table `circle`
--
ALTER TABLE `circle`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- Indexes for table `object`
--
ALTER TABLE `object`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sircle_member`
--
ALTER TABLE `sircle_member`
  ADD PRIMARY KEY (`sircle_id`,`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `object`
--
ALTER TABLE `object`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'オブジェクトID', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ユーザID', AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
