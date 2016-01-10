-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2016 at 07:11 PM
-- Server version: 5.6.27-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test_propertyguru`
--

-- --------------------------------------------------------

--
-- Table structure for table `builder`
--

CREATE TABLE IF NOT EXISTS `builder` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `builder`
--

INSERT INTO `builder` (`id`, `name`) VALUES
(4, 'Ardente'),
(3, 'Brigade Enterprises Ltd'),
(1, 'DeFINER Ventures'),
(2, 'Golden Gate Properties'),
(5, 'Gopalan Enterprises'),
(6, 'HM Group'),
(7, 'Mahalaxmi Group'),
(8, 'Shubh-Labh Associates'),
(9, 'Sobha Developers'),
(10, 'Vajra Constructions');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'Pune'),
(2, 'Ahmedabad'),
(3, 'Mumbai'),
(4, 'Delhi');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(1, 'Blue'),
(5, 'Brown'),
(2, 'Light Pink'),
(3, 'Magento'),
(6, 'Olive'),
(8, 'Red'),
(7, 'Sky Blue'),
(4, 'White');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `property` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `url`, `property`) VALUES
(3, 'https://is1-2.housingcdn.com/012c1500/e406c80ab7e6005d1bc2afec94237ecf/v2/_m.jpg', 1),
(4, 'https://is1-3.housingcdn.com/012c1500/226421218ca9bff1d29e6c0050bf3c1b/v2/_m.jpg', 1),
(5, 'https://is1-2.housingcdn.com/012c1500/1796bb54e0f4ca71ef81d22fa77fdbd0/v2/_m.jpg', 1),
(8, 'https://is1-2.housingcdn.com/01c16c28/d01f86ba1f7b54f69985b3c796661aa7/v1/fs.jpg', 2),
(9, 'https://is1-3.housingcdn.com/01c16c28/c1467416c9ca81a48c78f32092cc1f75/v1/fs.jpg', 2),
(10, 'https://is1-2.housingcdn.com/01c16c28/f1be3f36fa144298441df5a3de960c77/v1/fs.jpg', 2),
(11, 'https://is1-3.housingcdn.com/91aba65c/0db58096afd7ca1c9b98266cde0da7f3/v2/fs.jpg', 3),
(14, 'https://is1-3.housingcdn.com/012c1500/3df2efb32b04dd2bc9971dbc8687b4b7/v2/_m.jpg', 4),
(15, 'https://is1-2.housingcdn.com/012c1500/a7925e63250d18018b81daa70b5b64d4/v2/_m.jpg', 4),
(16, 'https://is1-2.housingcdn.com/012c1500/d2b302a3feb9bbfbf8bba455b4e95cbb/v2/_m.jpg', 4),
(17, 'http://bungalowidaman.com/gallery/22.jpg', 5),
(18, 'https://is1-2.housingcdn.com/4f2250e8/948c37b99f05251a99fb12d9c320e825/v1/_l.jpg', 7),
(19, 'https://is1-2.housingcdn.com/4f2250e8/36fa8e392425d46535d0aab6adb5cb17/v1/_l.jpg', 6),
(20, 'https://is1-2.housingcdn.com/4f2250e8/36fa8e392425d46535d0aab6adb5cb17/v1/_l.jpg', 7),
(21, 'https://is1-2.housingcdn.com/4f2250e8/30241a67c19fe285e50bbea6873d153d/v2/_l.jpg', 8),
(22, 'https://is1-2.housingcdn.com/4f2250e8/9230404c961981583cfca75a6cfbf046/v2/_l.jpg', 8),
(23, 'https://is1-3.housingcdn.com/4f2250e8/a1d3cd90ef5eab5359f76e4d97fdb877/v1/_l.jpg', 9),
(24, 'https://is1-3.housingcdn.com/4f2250e8/8ec8f928f1091d741e3301d229fc25b8/v1/_l.jpg', 9),
(25, 'https://is1-2.housingcdn.com/4f2250e8/c39eb2292c8ce9636bc05d08861d531d/v1/_l.jpg', 10),
(26, 'https://is1-3.housingcdn.com/4f2250e8/57407e744bc03d51fa1eae7ab3263eec/v3/_l.jpg', 10),
(27, 'https://is1-2.housingcdn.com/4f2250e8/9230404c961981583cfca75a6cfbf046/v2/_l.jpg', 11),
(28, 'https://is1-2.housingcdn.com/4f2250e8/9230404c961981583cfca75a6cfbf046/v2/_l.jpg', 11),
(29, 'https://is1-3.housingcdn.com/4f2250e8/a1d3cd90ef5eab5359f76e4d97fdb877/v1/_l.jpg', 12),
(30, 'https://is1-2.housingcdn.com/4f2250e8/36fa8e392425d46535d0aab6adb5cb17/v1/_l.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `kind` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `buildup_area` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `builder_id` int(11) DEFAULT NULL,
  `has_pool` tinyint(1) NOT NULL,
  `has_gym` tinyint(1) NOT NULL,
  `has_community_hall` tinyint(1) NOT NULL,
  `has_play_area` tinyint(1) NOT NULL,
  `has_power_backup` tinyint(1) NOT NULL,
  `has_lift` tinyint(1) NOT NULL,
  `lat_lng` varchar(50) NOT NULL,
  `bhk` tinyint(4) DEFAULT NULL,
  `address` text,
  `city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `type`, `kind`, `title`, `price`, `buildup_area`, `created_at`, `description`, `color_id`, `builder_id`, `has_pool`, `has_gym`, `has_community_hall`, `has_play_area`, `has_power_backup`, `has_lift`, `lat_lng`, `bhk`, `address`, `city_id`) VALUES
(1, 'rent', 'tenement', 'Ambience', 35000, 1020, '2016-01-09 07:31:14', 'Sardar Heights is a project which offers blissful living experience. With all the possible facilities the residence is the perfect choice for you to live a peaceful life. It is a shining blend of open to living, world class residents and nature-accommodating unwinding way of life. It is made remembering current way of life and guarantees an open to living background for its occupants.The structure has an outstanding floor design & unique apartments. The latest of the technology is used to create a land mark structure. The life size window allows ample sunlight & keeps the rooms well ventilated at Sardar Heights.', 2, 3, 1, 1, 1, 0, 1, 1, '18.445452,73.898374', 2, 'Katraj Undri Road, Near Khadi Machine Chowk, Pisoli, Kondhwa Budruk, Pune', 1),
(2, 'sell', 'apartment', '2 BHK Apartment', 2900000, 600, '2016-01-09 14:23:20', '', 5, 2, 0, 0, 1, 0, 1, 1, '22.303914,70.753556', 2, 'Rajya Road, Near Kalapi Juice Ice Cream,, Dharam Nagar, Rajkot', 3),
(3, 'sell', 'apartment', 'Rajyog Annexe', 5500000, 1250, '2016-01-10 11:21:00', 'Rajyog Annexe invites you to the fine balance of luxury and serenity, style and functionality, modernity and nature. A classy assortment of luxurious residencies, the project can be everything you wanted your home to be- spacious, cheery, urbane and comforting. Let your eyes take in the open skies and greenery around, fill your lungs with the clean, healthy air and enjoy the sounds of Nature at Rajyog Annexe', 6, 5, 1, 1, 1, 1, 1, 1, '18.463093,73.805611', 3, '26/4 & 31/2+2,Nanded City, Off. Singhad Road, Pune', 1),
(4, 'sell', 'bungalow', 'Oxy Gold', 6500000, 1600, '2016-01-10 11:26:24', 'A place that has a story to tell about itself and a story to merge with yours is the home of Oxy Gold. With the concept of a laid back life, every brick and mortar has been placed to ensure your comfort first and a mellow feeling throughout. Beautiful interiors that are carved majestically and an eye healing sight of green planted on the exterior, life is bound to take a good turn to health and happiness here', 8, 3, 1, 0, 0, 1, 1, 0, '18.817867,74.366195', 3, '1148/2+3, Opposite Datta Mandir, Near Ganga Grand Restaurent, Pune', 1),
(5, 'sell', 'bungalow', 'Viva', 8500000, 1550, '2016-01-10 11:36:18', 'Viva lets you look at life afresh. It offers you a world of luxury where you can reconnect with the Nature. It is a project where grey cityscapes are replaced by green landscapes and noise by a delightful calm. Live the life you always dreamed of at Viva. Surrounded on all sides by nature''s beauty, snuggled with the hills, the homes are cocoon of unforgettable serenity', 7, 4, 1, 1, 1, 1, 1, 0, '18.51,73.707', 3, 'S. No. 273, Next to Aditya Nisarga, Pirangut , Off Paud Road, Pune', 1),
(6, 'sell', 'apartment', 'Wind Song', 4550000, 1150, '2016-01-10 12:00:09', 'Viva lets you look at life afresh. It offers you a world of luxury where you can reconnect with the Nature. It is a project where grey cityscapes are replaced by green landscapes and noise by a delightful calm. Live the life you always dreamed of at Viva. Surrounded on all sides by nature''s beauty, snuggled with the hills, the homes are cocoon of unforgettable serenity', 3, 3, 1, 1, 0, 1, 1, 1, '12.921701,77.533434', 3, '1636 Virginia Street, Lombard, IL 60148', 1),
(7, 'buy', 'tenement', 'Brigade Exotica', 1540000, 750, '2016-01-10 12:03:55', 'Shreeram Villa offers an exotic modern lifestyle and a fine blend of elegance, comfort and luxury living. Each apartment reflects the vibrant and varied home designs and architectural elements. All the homes will be crafted to perfection and interiors will dazzle with spacious, flowing designs, finest selection of features and finishes that impart elegance to your home', 8, 6, 0, 1, 0, 1, 0, 1, '13.043635,77.745212', 2, '2631 Green Street, Smithville, TN 37166', 2),
(8, 'buy', 'apartment', 'Olympia', 3448000, 854, '2016-01-10 12:09:20', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus efficitur sagittis finibus. Maecenas commodo rhoncus massa ac accumsan. Suspendisse fringilla porta mauris, quis ornare felis hendrerit eu. Morbi condimentum, diam vel vehicula consectetur, sapien dolor ullamcorper nulla', 6, 7, 1, 1, 1, 0, 0, 0, '12.868923,77.438126', 2, '1690 Jody Road, Philadelphia, PA 19103', 4),
(9, 'sell', 'pent_house', 'Vajra Pleasant', 4100000, 1740, '2016-01-10 12:13:35', 'Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla tempus fermentum laoreet. Donec ac enim interdum, dapibus purus tempor, ornare risus. Ut eu posuere arcu. Sed aliquam quis tortor quis lacinia. Quisque porttitor, diam in ullamcorper commodo, ipsum enim rhoncus quam, nec tristique purus justo ac metus. Mauris ultricies enim a risus accumsan elementum. Nunc mollis odio non quam pellentesque lobortis.', 2, 9, 0, 0, 1, 1, 1, 0, '12.908972,77.520385', 3, '2442 Oakway Lane, Santa Monica, CA 90404', 1),
(10, 'sell', 'row_house', 'The Presidential Tower', 243000000, 2000, '2016-01-10 12:18:28', 'Curabitur cursus velit a sapien cursus, quis luctus tellus viverra. Nulla fringilla quam nunc, sit amet iaculis diam molestie eu. Pellentesque nec tincidunt lectus. Donec quis laoreet lorem, vehicula tempus urna. Mauris malesuada ullamcorper nibh sed porta. Nunc et accumsan odio. Integer sed luctus mi, in varius urna. In facilisis risus a nulla facilisis auctor. Aliquam ante tellus, dapibus in feugiat id, eleifend vitae eros', 3, 10, 1, 1, 0, 0, 1, 1, '13.027811,77.546348', 3, '2368 Charter Street, Kansas City, KS 66109', 2),
(11, 'sell', 'pent_house', 'HM Tropical Tree', 34000000, 2100, '2016-01-10 12:21:57', 'Mauris vitae auctor turpis. Fusce sed posuere augue. Nulla laoreet lacus ut varius varius. Etiam nec fermentum lorem. Nulla tempus mi id congue pharetra. Duis et erat efficitur, rutrum odio in, porttitor tortor. Vestibulum mollis viverra elit, nec hendrerit dui accumsan id. Nulla id eros ac urna commodo commodo. Curabitur auctor tellus convallis ligula ullamcorper, at rutrum nisl dignissim. Etiam congue libero ornare, fringilla eros sed, volutpat erat. Maecenas nec malesuada dolor. Pellentesque convallis dolor eget ligula scelerisque, quis pulvinar sapien rhoncus.', 4, 6, 1, 1, 1, 1, 1, 1, '13.020837,77.594751', 3, '1234 Hamill Avenue, San Diego, CA 92121', 4),
(12, 'sell', 'apartment', 'Shubh-Labh Homes', 4080000, 1080, '2016-01-10 12:35:18', 'Donec ac mi quam. Vestibulum risus nibh, porta nec ipsum non, condimentum sagittis augue. Proin dapibus est non quam suscipit, eu tempor lectus lacinia. Aenean at faucibus metus. Nam at odio quis enim suscipit eleifend. Vivamus volutpat eros ac ligula maximus, sit amet mattis urna finibus. Vivamus vel accumsan quam. Integer mattis aliquam ante, tristique suscipit eros fringilla vitae.', 3, 8, 1, 1, 1, 0, 0, 1, '13.908972,78.520385', 2, 'Vestibulum ligula erat, bibendum eget turpis ac', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `builder`
--
ALTER TABLE `builder`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`), ADD KEY `property` (`property`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`), ADD KEY `price` (`price`), ADD KEY `floor_size` (`buildup_area`), ADD KEY `created_at` (`created_at`), ADD KEY `color` (`color_id`), ADD KEY `type` (`type`), ADD KEY `has_pool` (`has_pool`), ADD KEY `has_gym` (`has_gym`), ADD KEY `has_community_hall` (`has_community_hall`), ADD KEY `has_play_area` (`has_play_area`), ADD KEY `has_power_backup` (`has_power_backup`), ADD KEY `has_lift` (`has_lift`), ADD KEY `builder_id` (`builder_id`), ADD KEY `bhk` (`bhk`), ADD KEY `locality` (`city_id`), ADD KEY `kind` (`kind`), ADD FULLTEXT KEY `title` (`title`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `builder`
--
ALTER TABLE `builder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`property`) REFERENCES `property` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property`
--
ALTER TABLE `property`
ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
ADD CONSTRAINT `property_ibfk_2` FOREIGN KEY (`builder_id`) REFERENCES `builder` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
ADD CONSTRAINT `property_ibfk_3` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
