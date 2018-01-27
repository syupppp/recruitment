-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2018 年 1 月 27 日 23:25
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
-- テーブルの構造 `bd_method`
--

CREATE TABLE `bd_method` (
  `id` int(11) NOT NULL COMMENT '主キー',
  `name` varchar(255) NOT NULL COMMENT '綴じ方法名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='綴じ方法tbl' ROW_FORMAT=COMPACT;

--
-- テーブルのデータのダンプ `bd_method`
--

INSERT INTO `bd_method` (`id`, `name`) VALUES
(1, '中綴じ'),
(3, '平綴じ'),
(2, '無線綴じ'),
(4, '糸綴じ');

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
-- テーブルの構造 `book_property`
--

CREATE TABLE `book_property` (
  `id` int(11) NOT NULL COMMENT '主キー',
  `al_pp_size` int(11) NOT NULL COMMENT '紙サイズ',
  `al_bd_direction` enum('RIGHT','LEFT') NOT NULL COMMENT '綴じ方向',
  `al_bd_method` int(11) NOT NULL COMMENT '綴じ方法',
  `al_pp_direction` enum('VERTI','HORIZ') NOT NULL COMMENT '紙方向',
  `al_bk_num` int(11) NOT NULL COMMENT '部数',
  `al_pp_num` int(11) NOT NULL COMMENT '総ページ数',
  `fr_clorbw` enum('COLOR','BANDW') NOT NULL COMMENT '表紙カラー',
  `fr_pp_type` int(11) NOT NULL COMMENT '表紙紙質',
  `in_clorbw` enum('COLOR','BANDW') NOT NULL COMMENT '本文用紙カラー',
  `in_pp_type` int(11) NOT NULL COMMENT '本文用紙紙質',
  `obj_id` int(11) NOT NULL COMMENT 'オブジェクトID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ブック注文仕様tbl';

--
-- テーブルのデータのダンプ `book_property`
--

INSERT INTO `book_property` (`id`, `al_pp_size`, `al_bd_direction`, `al_bd_method`, `al_pp_direction`, `al_bk_num`, `al_pp_num`, `fr_clorbw`, `fr_pp_type`, `in_clorbw`, `in_pp_type`, `obj_id`) VALUES
(1, 1, 'LEFT', 2, 'VERTI', 50, 0, 'COLOR', 1, 'BANDW', 3, 4);

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
  `delivery_name` text NOT NULL COMMENT 'お届け先氏名',
  `phone_number` varchar(255) NOT NULL COMMENT '電話番号'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='サークルtbl';

--
-- テーブルのデータのダンプ `circle`
--

INSERT INTO `circle` (`id`, `name`, `pref_id`, `postal_code`, `address_prefectures`, `address_municipality`, `address_other`, `delivery_name`, `phone_number`) VALUES
(1, 'みんなのサークル', '27', '5740043', '大阪府', '大阪市北区XXX', 'XX-XX', '風炉 光', '09011112222');

-- --------------------------------------------------------

--
-- テーブルの構造 `circle_member`
--

CREATE TABLE `circle_member` (
  `circle_id` int(11) NOT NULL COMMENT 'サークルID',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='サークルメンバーtbl' ROW_FORMAT=COMPACT;

--
-- テーブルのデータのダンプ `circle_member`
--

INSERT INTO `circle_member` (`circle_id`, `user_id`) VALUES
(1, 1);

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
(1, '風炉光さんのマイフォルダ', 'FLDR', 1, 0, 0),
(2, 'ああいえばこういう', 'BOOK', 1, 0, 1),
(3, 'test.jpg', 'FILE', 1, 0, 1),
(4, '夏コミ18', 'BOOK', 0, 1, 0),
(5, 'もしも.txt', 'FILE', 0, 1, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `order_book`
--

CREATE TABLE `order_book` (
  `id` int(11) NOT NULL COMMENT '主キー',
  `date` datetime NOT NULL COMMENT '注文日付',
  `al_pp_size` text NOT NULL COMMENT '紙サイズ',
  `al_bd_direction` enum('RIGHT','LEFT') NOT NULL COMMENT '綴じ方向',
  `al_bd_method` text NOT NULL COMMENT '綴じ方法',
  `al_pp_direction` enum('VERTI','HORIZ') NOT NULL COMMENT '紙方向',
  `al_bk_num` int(11) NOT NULL COMMENT '部数',
  `al_pp_num` int(11) NOT NULL COMMENT '総ページ数',
  `fr_clobw` enum('COLOR','BANDW','','') NOT NULL COMMENT '表紙カラー',
  `fr_pp_type` text NOT NULL COMMENT '表紙紙質',
  `in_clorbw` enum('COLOR','BANDW') NOT NULL COMMENT '本文用紙カラー',
  `in_pp_type` text NOT NULL COMMENT '本文用紙紙質',
  `obj_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `paper_size`
--

CREATE TABLE `paper_size` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `paper_size`
--

INSERT INTO `paper_size` (`id`, `name`) VALUES
(1, 'A4'),
(2, 'A3'),
(3, 'B5'),
(4, 'B4');

-- --------------------------------------------------------

--
-- テーブルの構造 `paper_type`
--

CREATE TABLE `paper_type` (
  `id` int(11) NOT NULL COMMENT '主キー',
  `name` varchar(255) NOT NULL COMMENT '紙質名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='紙質tbl';

--
-- テーブルのデータのダンプ `paper_type`
--

INSERT INTO `paper_type` (`id`, `name`) VALUES
(1, '白上質紙　70kg'),
(2, '淡クリームキンマリ72.5kg'),
(3, 'コミック紙ホワイト'),
(4, 'コミック紙クリーム'),
(5, 'コミック紙ラフ'),
(6, '白上質紙　110kg'),
(7, '白上質紙　90kg');

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
  `password` varchar(255) NOT NULL COMMENT 'パスワード',
  `credit_company` text NOT NULL COMMENT 'クレジットカード会社名',
  `credit_name` text NOT NULL COMMENT 'クレジット名義人名',
  `credit_date` text NOT NULL COMMENT 'クレジット有効期限'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ユーザtbl';

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`id`, `name`, `name_kana`, `pref_id`, `postal_code`, `address_prefectures`, `address_municipality`, `address_other`, `phone_number`, `mail`, `sex`, `password`, `credit_company`, `credit_name`, `credit_date`) VALUES
(1, '風炉 光', 'ふろ ひかる', 27, '5740043', '大阪府', '大東市灰塚4丁目', '17-17', '09011112222', 'Florlight.H@gmail.com', 1, 'furohikaru', 'MasterCard', 'HIKARU FURO', '10月2018年');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bd_method`
--
ALTER TABLE `bd_method`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`obj_id`,`order`);

--
-- Indexes for table `book_property`
--
ALTER TABLE `book_property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `circle`
--
ALTER TABLE `circle`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- Indexes for table `circle_member`
--
ALTER TABLE `circle_member`
  ADD PRIMARY KEY (`circle_id`,`user_id`);

--
-- Indexes for table `object`
--
ALTER TABLE `object`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_book`
--
ALTER TABLE `order_book`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `date` (`date`);

--
-- Indexes for table `paper_size`
--
ALTER TABLE `paper_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paper_type`
--
ALTER TABLE `paper_type`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bd_method`
--
ALTER TABLE `bd_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主キー', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `book_property`
--
ALTER TABLE `book_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主キー', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `object`
--
ALTER TABLE `object`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'オブジェクトID', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order_book`
--
ALTER TABLE `order_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主キー', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `paper_size`
--
ALTER TABLE `paper_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `paper_type`
--
ALTER TABLE `paper_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主キー', AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ユーザID', AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
