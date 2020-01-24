-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 23, 2020 at 12:31 PM
-- Server version: 10.0.38-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vridhiso_tour`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_on_price`
--

CREATE TABLE `add_on_price` (
  `ID` int(11) NOT NULL,
  `package_id` varchar(255) NOT NULL,
  `pricing_id` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `final_price` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_on_price`
--

INSERT INTO `add_on_price` (`ID`, `package_id`, `pricing_id`, `city`, `price`, `final_price`, `created_at`, `updated_at`) VALUES
(1, '', '1', '673', '2500', '', '2020-01-07 09:40:58', '2020-01-07 09:42:34'),
(2, '', '1', '643', '1590', '', '2020-01-07 09:40:58', '2020-01-07 10:01:03'),
(6, '', '2', '669', '1750', '', '2020-01-07 10:06:22', '2020-01-07 10:44:19'),
(7, '', '2', '617', '3550', '', '2020-01-07 10:06:22', '2020-01-07 10:44:19'),
(9, '', '3', '668', '1750', '', '2020-01-07 10:46:24', '2020-01-08 09:58:15'),
(11, '', '3', '664', '1592', '', '2020-01-07 10:46:24', '2020-01-08 09:51:35'),
(13, '', '3', '661', '4500', '', '2020-01-09 04:35:11', '2020-01-09 04:37:09'),
(14, '24', '4', '649', '8000', '', '2020-01-16 09:07:28', '2020-01-16 09:07:28'),
(15, '24', '4', '348', '7000', '', '2020-01-16 09:07:28', '2020-01-16 09:07:28'),
(16, '24', '4', '240', '8500', '', '2020-01-16 09:07:28', '2020-01-16 09:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `book_now`
--

CREATE TABLE `book_now` (
  `ID` int(11) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `package_id` varchar(255) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `tour_name` varchar(255) NOT NULL,
  `tour_facility` varchar(255) NOT NULL,
  `tour_total_price` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `from_city` varchar(255) NOT NULL,
  `to_city` varchar(255) NOT NULL,
  `traveller_rooms` varchar(255) NOT NULL,
  `travel_date` varchar(255) NOT NULL,
  `terms_conditions` tinyint(4) NOT NULL COMMENT '1 = read & 0 = not read',
  `active` tinyint(4) NOT NULL,
  `e_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `localIP` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_now`
--

INSERT INTO `book_now` (`ID`, `category_id`, `package_id`, `userID`, `tour_name`, `tour_facility`, `tour_total_price`, `email`, `phone`, `from_city`, `to_city`, `traveller_rooms`, `travel_date`, `terms_conditions`, `active`, `e_date`, `localIP`) VALUES
(41, '', '20', '7769725', 'Exotic Kullu ', '\"1,3,2\"', '13499.00', 'sam@gmail.com', '9876456454', 'Khan Market,New Delhi', 'DLF Phase 1, Gurgaon', '[\"1\",\"1\",\"1\",\"1\"]', '31-12-2019', 1, 1, '2019-12-30 05:29:50', '182.64.61.67'),
(42, '', '20', '8070606', 'Exotic Kullu ', '\"1,3,2\"', '13499.00', 'sam@fgmail.com', '9876543210', '3', '', '[\"1\",\"1\",\"1\",\"1\"]', '29-01-2020', 1, 1, '2020-01-02 06:34:26', '::1'),
(43, '', '17', '9561290', 'Exotic Shimla To Mussorie', '\"1,3\"', '', 'sam34234@gmail.com', '9876453453', '9,668,17', '', '[\"3\",\"1\",\"0\",\"0\"]', '30-01-2020', 1, 1, '2020-01-10 12:19:48', '182.64.167.34');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `top_category` varchar(255) NOT NULL,
  `brandID` varchar(255) NOT NULL,
  `parantID` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `narration` longtext NOT NULL,
  `image` text NOT NULL,
  `adventure_package` tinyint(4) NOT NULL,
  `most_popular` tinyint(4) NOT NULL,
  `icon` text NOT NULL,
  `e_date` datetime NOT NULL,
  `u_date` datetime NOT NULL,
  `active` tinyint(4) NOT NULL,
  `dataset` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `top_category`, `brandID`, `parantID`, `name`, `slug`, `narration`, `image`, `adventure_package`, `most_popular`, `icon`, `e_date`, `u_date`, `active`, `dataset`) VALUES
(1, '', '', '0', 'indian tour', 'indian-tour', '<p>Incredible India! This one-word describes it so well. One of the rarest countries in the world where you can cherish 5 seasons. The only country which has The TAJ MAHAL-one of the seven wonders in this world. You need to cross many oceans to see Paris, Switzerland, or London. But in India, we have Mini Switzerland, Mini Israel, Mini Paris, and diverse fauna and flora that you can see only here. So just get ready for the breathtaking memories, for the laughing out loud tales, and for the spell-bounding Himalayas. Indian tour packages are waiting for you. And, to be a part of this enthralling trip you don&rsquo;t need to google it, think of the tickets or anything. Just block the dates, book your holiday package, and get ready for the trip that you are going to cherish all your life. So what are you waiting for? The Hawa Mahal is calling you, the Forts are seen by the fortunes, the oceans, seas, are splendid. Let&rsquo;s just start the kick-ass journey with Hills Traveller. Trips to remember life long are here. Check out our packages</p>\r\n', '', 0, 0, '', '2019-05-19 01:33:34', '2019-12-31 04:35:53', 1, '{\"route\":\"category\",\"ed\":\"1\",\"p_cat\":\"0\",\"cat_name\":\"indian tour\",\"old_cat_image\":\"\",\"narration\":\"<p>Incredible India! This one-word describes it so well. One of the rarest countries in the world where you can cherish 5 seasons. The only country which has The TAJ MAHAL-one of the seven wonders in this world. You need to cross many oceans to see Paris, Switzerland, or London. But in India, we have Mini Switzerland, Mini Israel, Mini Paris, and diverse fauna and flora that you can see only here. So just get ready for the breathtaking memories, for the laughing out loud tales, and for the spell-bounding Himalayas. Indian tour packages are waiting for you. And, to be a part of this enthralling trip you don&rsquo;t need to google it, think of the tickets or anything. Just block the dates, book your holiday package, and get ready for the trip that you are going to cherish all your life. So what are you waiting for? The Hawa Mahal is calling you, the Forts are seen by the fortunes, the oceans, seas, are splendid. Le'),
(2, '', '', '0', 'international tour', 'international-tour', '<p>There was a time when only our mind could reach any place. Not now Hills Traveler is here to make you travel the whole world. You might have always heard the story of any international place from your friends but the story is different when you as a Traveler are there. So book a date, pack your bags and rest will be a History that you snapshots will tell by being a perfect storyteller. There is a lot to see in this world so why to stick to your own country. Travel Abroad! The Pyramids of Giza are waiting, the mysterious Sphinx or the remnants in the city of Alexandria might take your heart. There are beautiful bounties to discover on the Islands, near the waterfalls. Have you seen the 7 wonders of the world? You should. Or have you seen the alluring Alps and other mountains? There are so many sacred temples and spiritual destinations to understand the culture in this world. Take a tour of international packages and don&rsquo;t catch the glimpses of the existing alluring beauties of the world. Just unwind happiness, lifelong memories, and an experience that can soothe your soul forever!<br />\r\nCheck out the packages here!</p>\r\n', '', 0, 0, '', '2019-11-04 06:20:51', '2019-12-31 04:08:24', 1, '{\"route\":\"category\",\"ed\":\"2\",\"p_cat\":\"0\",\"cat_name\":\"international tour\",\"old_cat_image\":\"\",\"narration\":\"<p>There was a time when only our mind could reach any place. Not now Hills Traveler is here to make you travel the whole world. You might have always heard the story of any international place from your friends but the story is different when you as a Traveler are there. So book a date, pack your bags and rest will be a History that you snapshots will tell by being a perfect storyteller. There is a lot to see in this world so why to stick to your own country. Travel Abroad! The Pyramids of Giza are waiting, the mysterious Sphinx or the remnants in the city of Alexandria might take your heart. There are beautiful bounties to discover on the Islands, near the waterfalls. Have you seen the 7 wonders of the world? You should. Or have you seen the alluring Alps and other mountains? There are so many sacred temples and spiritual destinations to understand the culture in this world. Take a tour of international '),
(3, '', '', '0', 'honeymoon special', 'honeymoon-special', '<p>After taking the vows together to cherish each other for life you need to start the new beginnings by embracing each other.And we know you wontlike the last minute hustles. So when you are ready to collect memories, not things or just pictures. When you are ready to make it a lifetime experience. When you wish to get an adrenaline rush with your bae. Hill traveller is here to make you go through the best honeymoon packages. So experience the bliss on earth. Choose any place from domestic destinations to overseas. We will always oblige you with our warm services and competitive prices.<br />\r\nWhere you wish to go? From Manali to the Maldives, Andaman to America, Srinagar to Singapore, Phuket to Paris we offer honeymoon packages for all places. So get ready for the Honeymoon Diaries. Connect with one another. As love is going to be in the air where you are going to leave your impressions. And not to worry if you are the adventurous couples we are your buddies too. Just think of basking more of the Sun near the seaside or just get absorbed in the beautiful hills or just take a leap more towards each other at some sooting and peaceful place.</p>\r\n', '', 0, 0, '', '2019-11-04 06:21:02', '2019-12-31 04:09:54', 1, '{\"route\":\"category\",\"ed\":\"3\",\"p_cat\":\"0\",\"cat_name\":\"honeymoon special\",\"old_cat_image\":\"\",\"narration\":\"<p>After taking the vows together to cherish each other for life you need to start the new beginnings by embracing each other. &nbsp;And we know you won&rsquo;t like the last minute hustles. So when you are ready to collect memories, not things or just pictures. When you are ready to make it a lifetime experience. When you wish to get an adrenaline rush with your bae. Hill traveller is here to make you go through the best honeymoon packages. So experience the bliss on earth. Choose any place from domestic destinations to overseas. We will always oblige you with our warm services and competitive prices.<br />\r\nWhere you wish to go? From Manali to the Maldives, Andaman to America, Srinagar to Singapore, Phuket to Paris we offer honeymoon packages for all places. So get ready for the Honeymoon Diaries. Connect with one another. As love is going to be in the air where you are going to leave your impressions. An'),
(6, '', '', '1', 'himachal tour package', 'himachal-tour-package', 'The Himachal Pradesh is now Indias just a hop, skip and jump away and hereï¿½s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you wonï¿½t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If youï¿½re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '1573714959catImage984476845.jpg', 0, 0, '', '2019-11-04 06:30:26', '2019-12-17 01:17:19', 1, '{\"route\":\"category\",\"ed\":\"6\",\"p_cat\":\"1\",\"cat_name\":\"himachal tour package\",\"old_cat_image\":\"1573714959catImage984476845.jpg\",\"narration\":\"The india is now just a hop, skip and jump away and hereufffds how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you wonufffdt have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will d'),
(7, '', '', '1', 'kashmir tour package ', 'kashmir-tour-package-', 'The India is now just a hop, skip and jump away and hereï¿½s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you wonï¿½t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If youï¿½re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '1573715012catImage1516606684.jpg', 0, 0, '', '2019-11-04 06:31:56', '2019-11-14 12:33:32', 1, '{\"route\":\"category\",\"ed\":\"7\",\"p_cat\":\"1\",\"cat_name\":\"kashmir tour package \",\"old_cat_image\":\"\",\"narration\":\"The India is now just a hop, skip and jump away and hereufffds how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you wonufffdt have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from '),
(8, '', '', '1', 'uttarakhand tour package ', 'uttarakhand-tour-package-', 'The India is now just a hop, skip and jump away and hereï¿½s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you wonï¿½t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If youï¿½re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '1573715231catImage1250317785.jpg', 0, 0, '', '2019-11-04 06:32:33', '2019-11-14 12:37:11', 1, '{\"route\":\"category\",\"ed\":\"8\",\"p_cat\":\"1\",\"cat_name\":\"uttarakhand tour package \",\"old_cat_image\":\"\",\"narration\":\"The India is now just a hop, skip and jump away and hereufffds how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you wonufffdt have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose f'),
(9, '', '', '1', 'goa tour package ', 'goa-tour-package-', 'The India is now just a hop, skip and jump away and hereï¿½s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you wonï¿½t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If youï¿½re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '1573715273catImage1815565425.webp', 0, 0, '', '2019-11-04 06:33:29', '2019-11-14 12:37:53', 1, '{\"route\":\"category\",\"ed\":\"9\",\"p_cat\":\"1\",\"cat_name\":\"goa tour package \",\"old_cat_image\":\"\",\"narration\":\"The India is now just a hop, skip and jump away and hereufffds how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you wonufffdt have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the '),
(10, '', '', '1', 'kerala tour package ', 'kerala-tour-package-', 'The India is now just a hop, skip and jump away and hereï¿½s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you wonï¿½t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If youï¿½re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '1573715100catImage1166597083.jpg', 0, 0, '', '2019-11-04 06:34:19', '2019-11-14 12:35:00', 1, '{\"route\":\"category\",\"ed\":\"10\",\"p_cat\":\"1\",\"cat_name\":\"kerala tour package \",\"old_cat_image\":\"\",\"narration\":\"The India is now just a hop, skip and jump away and hereufffds how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you wonufffdt have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from '),
(11, '', '', '1', 'andaman tour packages', 'andaman-tour-packages', 'The India is now just a hop, skip and jump away and here’s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you won’t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If you’re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '', 0, 0, '', '2019-11-04 06:34:44', '0000-00-00 00:00:00', 1, '{\"route\":\"category\",\"p_cat\":\"1\",\"cat_name\":\"Andaman Tour Packages\",\"old_cat_image\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::9GN9  PyywtZQ1SOngS 8EKp06O4z dPKcLBb4tPHNoHIig6tjHiTpVlXi479Brt::2\",\"PHPSESSID\":\"5fffa17db3fdd35db5ce4136147e49ac\",\"TawkConnectionTime\":\"0\"}'),
(12, '', '', '1', 'rajasthan tour package ', 'rajasthan-tour-package-', 'Beautiful forts and Havelis, melodious folk music, myriad tales of chivalry, colourful turbans, golden\r\ndeserts, artistic handicrafts, camels and delicious food are the trademarks of the culturally rich Rajasthan. The land is unparalleled when it comes to being a centre stage for culture and heritage in India. Rajasthan is known for its heart-warming hospitality, luxurious stays and unforgettable experiences and is befitting to travellers of all age-groups. In other words, a Rajasthan Holiday is an eye-opener to acquaint ourselves with rich culture, history, wildlife, adventure and beauty of a place that is so exceptional.\r\n\r\nSOTC brings you vibrant Rajasthan Tour Packages to experience the grandeur of this vibrant state. The colours of the royal state are impossible to ignore and the effect of emerald green, canary yellow and bright red turbans and saris are simply dazzling. Little wonder so many fashion designers find their inspiration and raw materials here.', '1573714911catImage1207995610.jpg', 0, 0, '', '2019-11-04 06:35:16', '2019-12-17 02:50:11', 1, '{\"route\":\"category\",\"ed\":\"12\",\"p_cat\":\"1\",\"cat_name\":\"rajasthan tour package \",\"old_cat_image\":\"1573714911catImage1207995610.jpg\",\"narration\":\"Beautiful forts and Havelis, melodious folk music, myriad tales of chivalry, colourful turbans, golden\r\ndeserts, artistic handicrafts, camels and delicious food are the trademarks of the culturally rich Rajasthan. The land is unparalleled when it comes to being a centre stage for culture and heritage in India. Rajasthan is known for its heart-warming hospitality, luxurious stays and unforgettable experiences and is befitting to travellers of all age-groups. In other words, a Rajasthan Holiday is an eye-opener to acquaint ourselves with rich culture, history, wildlife, adventure and beauty of a place that is so exceptional.\r\n\r\nSOTC brings you vibrant Rajasthan Tour Packages to experience the grandeur of this vibrant state. The colours of the royal state are impossible to ignore and the effect of emerald green, canary yellow and bright red turbans and saris are simply da'),
(14, '', '', '1', 'ladahk tour package ', 'ladahk-tour-package-', 'The India is now just a hop, skip and jump away and here’s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you won’t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If you’re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '', 0, 0, '', '2019-11-04 10:15:52', '0000-00-00 00:00:00', 1, '{\"route\":\"category\",\"p_cat\":\"1\",\"cat_name\":\"Ladahk tour package \",\"old_cat_image\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::9GN9  PyywtZQ1SOngS 8EKp06O4z dPKcLBb4tPHNoHIig6tjHiTpVlXi479Brt::2\",\"TawkConnectionTime\":\"0\",\"PHPSESSID\":\"893a3e7015bcbbaa22909a41d2ef38c5\"}'),
(15, '', '', '1', 'north east tour package ', 'north-east-tour-package-', 'The India is now just a hop, skip and jump away and here’s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you won’t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If you’re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '', 0, 0, '', '2019-11-04 10:16:27', '0000-00-00 00:00:00', 1, '{\"route\":\"category\",\"p_cat\":\"1\",\"cat_name\":\"North East Tour Package \",\"old_cat_image\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::9GN9  PyywtZQ1SOngS 8EKp06O4z dPKcLBb4tPHNoHIig6tjHiTpVlXi479Brt::2\",\"PHPSESSID\":\"893a3e7015bcbbaa22909a41d2ef38c5\",\"TawkConnectionTime\":\"0\"}'),
(16, '', '', '1', 'gujarat tour package ', 'gujarat-tour-package-', 'The India is now just a hop, skip and jump away and hereï¿½s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you wonï¿½t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If youï¿½re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '1573715138catImage1837902583.jpg', 0, 0, '', '2019-11-04 10:21:10', '2019-11-14 12:35:38', 1, '{\"route\":\"category\",\"ed\":\"16\",\"p_cat\":\"1\",\"cat_name\":\"gujarat tour package \",\"old_cat_image\":\"\",\"narration\":\"The India is now just a hop, skip and jump away and hereufffds how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you wonufffdt have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from'),
(17, '', '', '1', 'sikkim tour package ', 'sikkim-tour-package-', 'The India is now just a hop, skip and jump away and here’s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you won’t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If you’re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '', 0, 0, '', '2019-11-04 10:21:42', '0000-00-00 00:00:00', 1, '{\"route\":\"category\",\"p_cat\":\"1\",\"cat_name\":\"Sikkim Tour Package \",\"old_cat_image\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::9GN9  PyywtZQ1SOngS 8EKp06O4z dPKcLBb4tPHNoHIig6tjHiTpVlXi479Brt::2\",\"PHPSESSID\":\"893a3e7015bcbbaa22909a41d2ef38c5\",\"TawkConnectionTime\":\"0\"}'),
(18, '', '', '1', 'karnataka tour package ', 'karnataka-tour-package-', 'The India is now just a hop, skip and jump away and here’s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you won’t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If you’re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '', 0, 0, '', '2019-11-04 10:23:16', '0000-00-00 00:00:00', 1, '{\"route\":\"category\",\"p_cat\":\"1\",\"cat_name\":\"Karnataka Tour Package \",\"old_cat_image\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::9GN9  PyywtZQ1SOngS 8EKp06O4z dPKcLBb4tPHNoHIig6tjHiTpVlXi479Brt::2\",\"PHPSESSID\":\"893a3e7015bcbbaa22909a41d2ef38c5\",\"TawkConnectionTime\":\"0\"}'),
(20, '', '', '1', 'nepal tour package', 'nepal-tour-package', 'The India is now just a hop, skip and jump away and here’s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you won’t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If you’re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '', 0, 0, '', '2019-11-04 10:57:30', '0000-00-00 00:00:00', 1, '{\"route\":\"category\",\"p_cat\":\"1\",\"cat_name\":\"Nepal Tour Package\",\"old_cat_image\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::9GN9  PyywtZQ1SOngS 8EKp06O4z dPKcLBb4tPHNoHIig6tjHiTpVlXi479Brt::2\",\"TawkConnectionTime\":\"0\",\"PHPSESSID\":\"9c006e10d147c7175f7b3135b05d9870\"}'),
(21, '', '', '1', 'bhutan tour package', 'bhutan-tour-package', 'The India is now just a hop, skip and jump away and here’s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you won’t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If you’re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '', 0, 0, '', '2019-11-04 10:57:39', '0000-00-00 00:00:00', 1, '{\"route\":\"category\",\"p_cat\":\"1\",\"cat_name\":\"Bhutan Tour Package\",\"old_cat_image\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::9GN9  PyywtZQ1SOngS 8EKp06O4z dPKcLBb4tPHNoHIig6tjHiTpVlXi479Brt::2\",\"TawkConnectionTime\":\"0\",\"PHPSESSID\":\"9c006e10d147c7175f7b3135b05d9870\"}'),
(23, '', '', '1', 'north india tour package ', 'north-india-tour-package-', '', '', 0, 0, '', '2019-11-04 10:58:40', '0000-00-00 00:00:00', 1, '{\"route\":\"category\",\"p_cat\":\"1\",\"cat_name\":\"North India Tour Package \",\"old_cat_image\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::9GN9  PyywtZQ1SOngS 8EKp06O4z dPKcLBb4tPHNoHIig6tjHiTpVlXi479Brt::2\",\"PHPSESSID\":\"9c006e10d147c7175f7b3135b05d9870\",\"TawkConnectionTime\":\"0\"}'),
(24, '', '', '1', 'delhi tour package', 'delhi-tour-package', ' new-delhi-india-gate-14762336684p  new-delhi-india-gate-147623366844-new-delhi-india-gate-147623366844', '1573715573catImage1901424780.jpg', 0, 0, '', '2019-11-04 10:59:14', '2019-11-14 12:42:53', 1, '{\"route\":\"category\",\"ed\":\"24\",\"p_cat\":\"1\",\"cat_name\":\"delhi tour package\",\"old_cat_image\":\"\",\"narration\":\" new-delhi-india-gate-14762336684p  new-delhi-india-gate-147623366844-new-delhi-india-gate-147623366844\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::beM5 WMAkn26T8KukEtJkrSChP7YWxvNbqxxb1WWfy8PtC6an FwsIo0Sv/TknNQ::2\",\"PHPSESSID\":\"7de138006108370e5f5f476017dcb008\",\"TawkConnectionTime\":\"0\"}'),
(25, '', '', '1', 'south india packages ', 'south-india-packages-', '', '', 0, 0, '', '2019-11-04 11:02:52', '0000-00-00 00:00:00', 1, '{\"route\":\"category\",\"p_cat\":\"1\",\"cat_name\":\"South India Packages \",\"old_cat_image\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::9GN9  PyywtZQ1SOngS 8EKp06O4z dPKcLBb4tPHNoHIig6tjHiTpVlXi479Brt::2\",\"PHPSESSID\":\"9c006e10d147c7175f7b3135b05d9870\",\"TawkConnectionTime\":\"0\"}'),
(26, '', '', '1', 'maharashtra tour package ', 'maharashtra-tour-package-', 'india-maharashtra india-maharashtra-150032823361o india-maharashtra-150032823361o', '1573715183catImage2092753510.jpg', 0, 0, '', '2019-11-04 11:04:12', '2019-11-14 12:36:23', 1, '{\"route\":\"category\",\"ed\":\"26\",\"p_cat\":\"1\",\"cat_name\":\"maharashtra tour package \",\"old_cat_image\":\"\",\"narration\":\"india-maharashtra india-maharashtra-150032823361o india-maharashtra-150032823361o\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::beM5 WMAkn26T8KukEtJkrSChP7YWxvNbqxxb1WWfy8PtC6an FwsIo0Sv/TknNQ::2\",\"PHPSESSID\":\"7de138006108370e5f5f476017dcb008\",\"TawkConnectionTime\":\"0\"}'),
(27, '', '', '1', 'tamil nadu tour package', 'tamil-nadu-tour-package', ' Tamil-Nadu Tamil-Nadu Tamil-Nadu Tamil-Nadu', '1573715514catImage145900450.webp', 0, 0, '', '2019-11-04 11:05:04', '2019-11-14 12:41:54', 1, '{\"route\":\"category\",\"ed\":\"27\",\"p_cat\":\"1\",\"cat_name\":\"tamil nadu tour package\",\"old_cat_image\":\"\",\"narration\":\" Tamil-Nadu Tamil-Nadu Tamil-Nadu Tamil-Nadu\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::beM5 WMAkn26T8KukEtJkrSChP7YWxvNbqxxb1WWfy8PtC6an FwsIo0Sv/TknNQ::2\",\"PHPSESSID\":\"7de138006108370e5f5f476017dcb008\",\"TawkConnectionTime\":\"0\"}'),
(28, '', '', '1', 'uttar pradesh tour package', 'uttar-pradesh-tour-package', '', '', 0, 0, '', '2019-11-04 11:12:23', '0000-00-00 00:00:00', 1, '{\"route\":\"category\",\"p_cat\":\"1\",\"cat_name\":\"Uttar Pradesh tour package\",\"old_cat_image\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::9GN9  PyywtZQ1SOngS 8EKp06O4z dPKcLBb4tPHNoHIig6tjHiTpVlXi479Brt::2\",\"PHPSESSID\":\"9c006e10d147c7175f7b3135b05d9870\",\"TawkConnectionTime\":\"0\"}'),
(29, '', '', '2', 'thailand tour package ', 'thailand-tour-package-', 'The World is now just a hop, skip and jump away and here’s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you won’t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If you’re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '1573117587catImage2097797711.jpg', 0, 0, '', '2019-11-04 11:17:29', '2019-11-07 02:36:27', 1, '{\"route\":\"category\",\"ed\":\"29\",\"p_cat\":\"2\",\"cat_name\":\"thailand tour package \",\"old_cat_image\":\"\",\"narration\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::ydsdQIEbaBpPQMrMZlAkL5efOMJ7 iQQbjwlF2ahb0Yme M3Jg0BU5I6k8R1x7nk::2\",\"PHPSESSID\":\"155003b499d270d5491cb37579f82dc1\",\"TawkConnectionTime\":\"0\"}');
INSERT INTO `category` (`ID`, `top_category`, `brandID`, `parantID`, `name`, `slug`, `narration`, `image`, `adventure_package`, `most_popular`, `icon`, `e_date`, `u_date`, `active`, `dataset`) VALUES
(30, '', '', '2', 'singapore tour package ', 'singapore-tour-package-', 'The World is now just a hop, skip and jump away and here’s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you won’t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If you’re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '1573117672catImage1645044817.jpg', 0, 0, '', '2019-11-04 11:18:02', '2019-11-07 02:37:52', 1, '{\"route\":\"category\",\"ed\":\"30\",\"p_cat\":\"2\",\"cat_name\":\"singapore tour package \",\"old_cat_image\":\"\",\"narration\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::ydsdQIEbaBpPQMrMZlAkL5efOMJ7 iQQbjwlF2ahb0Yme M3Jg0BU5I6k8R1x7nk::2\",\"PHPSESSID\":\"155003b499d270d5491cb37579f82dc1\",\"TawkConnectionTime\":\"0\"}'),
(31, '', '', '2', 'malaysia tour package ', 'malaysia-tour-package-', 'The World is now just a hop, skip and jump away and here’s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you won’t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If you’re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '1573117758catImage920270086.jpg', 0, 0, '', '2019-11-04 11:18:30', '2019-11-07 02:39:18', 1, '{\"route\":\"category\",\"ed\":\"31\",\"p_cat\":\"2\",\"cat_name\":\"malaysia tour package \",\"old_cat_image\":\"\",\"narration\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::ydsdQIEbaBpPQMrMZlAkL5efOMJ7 iQQbjwlF2ahb0Yme M3Jg0BU5I6k8R1x7nk::2\",\"PHPSESSID\":\"155003b499d270d5491cb37579f82dc1\",\"TawkConnectionTime\":\"0\"}'),
(32, '', '', '2', 'maldives tour package ', 'maldives-tour-package-', 'The World is now just a hop, skip and jump away and here’s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you won’t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If you’re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '1573117833catImage762363507.jpg', 0, 0, '', '2019-11-04 11:19:25', '2019-11-07 02:40:33', 1, '{\"route\":\"category\",\"ed\":\"32\",\"p_cat\":\"2\",\"cat_name\":\"maldives tour package \",\"old_cat_image\":\"\",\"narration\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::ydsdQIEbaBpPQMrMZlAkL5efOMJ7 iQQbjwlF2ahb0Yme M3Jg0BU5I6k8R1x7nk::2\",\"PHPSESSID\":\"155003b499d270d5491cb37579f82dc1\",\"TawkConnectionTime\":\"0\"}'),
(33, '', '', '2', 'uae tour package ', 'uae-tour-package-', 'The World is now just a hop, skip and jump away and here’s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you won’t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If you’re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '1573117887catImage325130229.jpg', 0, 0, '', '2019-11-04 11:20:00', '2019-11-07 02:41:27', 1, '{\"route\":\"category\",\"ed\":\"33\",\"p_cat\":\"2\",\"cat_name\":\"uae tour package \",\"old_cat_image\":\"\",\"narration\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::ydsdQIEbaBpPQMrMZlAkL5efOMJ7 iQQbjwlF2ahb0Yme M3Jg0BU5I6k8R1x7nk::2\",\"PHPSESSID\":\"155003b499d270d5491cb37579f82dc1\",\"TawkConnectionTime\":\"0\"}'),
(34, '', '', '2', 'switzerland tour package ', 'switzerland-tour-package-', 'The World is now just a hop, skip and jump away and here’s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you won’t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If you’re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '1573118352catImage1678676013.jpg', 0, 0, '', '2019-11-04 11:20:41', '2019-11-07 02:49:12', 1, '{\"route\":\"category\",\"ed\":\"34\",\"p_cat\":\"2\",\"cat_name\":\"switzerland tour package \",\"old_cat_image\":\"\",\"narration\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::ydsdQIEbaBpPQMrMZlAkL5efOMJ7 iQQbjwlF2ahb0Yme M3Jg0BU5I6k8R1x7nk::2\",\"PHPSESSID\":\"155003b499d270d5491cb37579f82dc1\",\"TawkConnectionTime\":\"0\"}'),
(35, '', '', '2', 'spain tour package ', 'spain-tour-package-', 'The World is now just a hop, skip and jump away and here’s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you won’t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If you’re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '1573117976catImage1427831687.jpg', 0, 0, '', '2019-11-04 11:21:01', '2019-11-07 02:42:56', 1, '{\"route\":\"category\",\"ed\":\"35\",\"p_cat\":\"2\",\"cat_name\":\"spain tour package \",\"old_cat_image\":\"\",\"narration\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::ydsdQIEbaBpPQMrMZlAkL5efOMJ7 iQQbjwlF2ahb0Yme M3Jg0BU5I6k8R1x7nk::2\",\"PHPSESSID\":\"155003b499d270d5491cb37579f82dc1\",\"TawkConnectionTime\":\"0\"}'),
(36, '', '', '2', 'italy tour package ', 'italy-tour-package-', '', '1573118057catImage487143996.jpg', 0, 0, '', '2019-11-04 11:21:23', '2019-11-07 02:44:17', 1, '{\"route\":\"category\",\"ed\":\"36\",\"p_cat\":\"2\",\"cat_name\":\"italy tour package \",\"old_cat_image\":\"\",\"narration\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::ydsdQIEbaBpPQMrMZlAkL5efOMJ7 iQQbjwlF2ahb0Yme M3Jg0BU5I6k8R1x7nk::2\",\"PHPSESSID\":\"155003b499d270d5491cb37579f82dc1\",\"TawkConnectionTime\":\"0\"}'),
(37, '', '', '2', 'uk tour package ', 'uk-tour-package-', '', '1573118146catImage991410600.jpg', 0, 0, '', '2019-11-04 11:22:06', '2019-11-07 02:45:46', 1, '{\"route\":\"category\",\"ed\":\"37\",\"p_cat\":\"2\",\"cat_name\":\"uk tour package \",\"old_cat_image\":\"\",\"narration\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::ydsdQIEbaBpPQMrMZlAkL5efOMJ7 iQQbjwlF2ahb0Yme M3Jg0BU5I6k8R1x7nk::2\",\"PHPSESSID\":\"155003b499d270d5491cb37579f82dc1\",\"TawkConnectionTime\":\"0\"}'),
(38, '', '', '2', 'egypt tour package ', 'egypt-tour-package-', 'The World is now just a hop, skip and jump away and here’s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you won’t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If you’re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '1573118228catImage1478324057.jpg', 0, 0, '', '2019-11-04 11:22:44', '2019-11-07 02:47:08', 1, '{\"route\":\"category\",\"ed\":\"38\",\"p_cat\":\"2\",\"cat_name\":\"egypt tour package \",\"old_cat_image\":\"\",\"narration\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::ydsdQIEbaBpPQMrMZlAkL5efOMJ7 iQQbjwlF2ahb0Yme M3Jg0BU5I6k8R1x7nk::2\",\"PHPSESSID\":\"155003b499d270d5491cb37579f82dc1\",\"TawkConnectionTime\":\"0\"}'),
(39, '', '', '2', 'bali tour package ', 'bali-tour-package-', '', '1573120000catImage1107737794.jpg', 0, 0, '', '2019-11-04 11:23:17', '2019-11-07 03:16:40', 1, '{\"route\":\"category\",\"ed\":\"39\",\"p_cat\":\"2\",\"cat_name\":\"bali tour package \",\"old_cat_image\":\"\",\"narration\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::ydsdQIEbaBpPQMrMZlAkL5efOMJ7 iQQbjwlF2ahb0Yme M3Jg0BU5I6k8R1x7nk::2\",\"PHPSESSID\":\"155003b499d270d5491cb37579f82dc1\",\"TawkConnectionTime\":\"0\"}'),
(41, '', '', '2', 'south africa tour package ', 'south-africa-tour-package-', 'The World is now just a hop, skip and jump away and here’s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you won’t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If you’re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '1573120097catImage933733179.jpg', 0, 0, '', '2019-11-04 11:24:08', '2019-11-07 03:18:17', 1, '{\"route\":\"category\",\"ed\":\"41\",\"p_cat\":\"2\",\"cat_name\":\"south africa tour package \",\"old_cat_image\":\"\",\"narration\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::ydsdQIEbaBpPQMrMZlAkL5efOMJ7 iQQbjwlF2ahb0Yme M3Jg0BU5I6k8R1x7nk::2\",\"PHPSESSID\":\"155003b499d270d5491cb37579f82dc1\",\"TawkConnectionTime\":\"0\"}'),
(42, '', '', '2', 'mauritius tour packages', 'mauritius-tour-packages', 'underwater-waterfall-mauritius underwater-waterfall-mauritius underwater-waterfall-mauritius underwater-waterfall-mauritius', '1573715732catImage2075708509.jpg', 0, 0, '', '2019-11-04 11:24:32', '2019-11-14 12:45:32', 1, '{\"route\":\"category\",\"ed\":\"42\",\"p_cat\":\"2\",\"cat_name\":\"mauritius tour packages\",\"old_cat_image\":\"\",\"narration\":\"underwater-waterfall-mauritius underwater-waterfall-mauritius underwater-waterfall-mauritius underwater-waterfall-mauritius\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::beM5 WMAkn26T8KukEtJkrSChP7YWxvNbqxxb1WWfy8PtC6an FwsIo0Sv/TknNQ::2\",\"PHPSESSID\":\"7de138006108370e5f5f476017dcb008\",\"TawkConnectionTime\":\"0\"}'),
(43, '', '', '2', 'europe tour packages', 'europe-tour-packages', 'photo-1493707553966-283afac8c358 photo-1493707553966-283afac8c358 photo-1493707553966-283afac8c358', '1573715616catImage1383003894.jpg', 0, 0, '', '2019-11-04 11:24:52', '2019-11-20 05:41:12', 1, '{\"route\":\"category\",\"ed\":\"43\",\"p_cat\":\"2\",\"cat_name\":\"europe tour packages\",\"old_cat_image\":\"1573715616catImage1383003894.jpg\",\"narration\":\"photo-1493707553966-283afac8c358 photo-1493707553966-283afac8c358 photo-1493707553966-283afac8c358\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::8WoxYEocyKLqhJMyt6ELFp1SpSQWyyONkqFvp46i7 rdyEwezV9m6CsabngSv22R::2\",\"PHPSESSID\":\"49f66d1aab49428cab4fabd09ba04781\",\"TawkConnectionTime\":\"0\"}'),
(44, '', '', '2', 'turkey tour packages', 'turkey-tour-packages', 'The World is now just a hop, skip and jump away and hereï¿½s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you wonï¿½t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If youï¿½re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '1573715682catImage1098004450.jpg', 0, 0, '', '2019-11-04 11:25:51', '2019-11-14 12:44:42', 1, '{\"route\":\"category\",\"ed\":\"44\",\"p_cat\":\"2\",\"cat_name\":\"turkey tour packages\",\"old_cat_image\":\"\",\"narration\":\"The World is now just a hop, skip and jump away and hereufffds how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you wonufffdt have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from '),
(45, '', '', '2', ' germany tour packages ', '-germany-tour-packages-', 'The World is now just a hop, skip and jump away and here’s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you won’t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If you’re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '', 0, 0, '', '2019-11-04 11:26:30', '0000-00-00 00:00:00', 1, '{\"route\":\"category\",\"p_cat\":\"2\",\"cat_name\":\" Germany Tour Packages \",\"old_cat_image\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::9GN9  PyywtZQ1SOngS 8EKp06O4z dPKcLBb4tPHNoHIig6tjHiTpVlXi479Brt::2\",\"PHPSESSID\":\"9c006e10d147c7175f7b3135b05d9870\",\"TawkConnectionTime\":\"0\"}'),
(46, '', '', '2', ' china tour packages ', '-china-tour-packages-', '', '', 0, 0, '', '2019-11-04 11:26:51', '0000-00-00 00:00:00', 1, '{\"route\":\"category\",\"p_cat\":\"2\",\"cat_name\":\" China Tour Packages \",\"old_cat_image\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::9GN9  PyywtZQ1SOngS 8EKp06O4z dPKcLBb4tPHNoHIig6tjHiTpVlXi479Brt::2\",\"PHPSESSID\":\"9c006e10d147c7175f7b3135b05d9870\",\"TawkConnectionTime\":\"0\"}'),
(47, '', '', '2', 'united states tour packages ', 'united-states-tour-packages-', 'The World is now just a hop, skip and jump away and here’s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you won’t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If you’re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '', 0, 0, '', '2019-11-04 11:27:14', '0000-00-00 00:00:00', 1, '{\"route\":\"category\",\"p_cat\":\"2\",\"cat_name\":\"United States Tour Packages \",\"old_cat_image\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::9GN9  PyywtZQ1SOngS 8EKp06O4z dPKcLBb4tPHNoHIig6tjHiTpVlXi479Brt::2\",\"PHPSESSID\":\"9c006e10d147c7175f7b3135b05d9870\",\"TawkConnectionTime\":\"0\"}'),
(48, '', '', '2', ' france tour packages ', '-france-tour-packages-', '', '', 0, 0, '', '2019-11-04 11:27:34', '0000-00-00 00:00:00', 1, '{\"route\":\"category\",\"p_cat\":\"2\",\"cat_name\":\" France Tour Packages \",\"old_cat_image\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::9GN9  PyywtZQ1SOngS 8EKp06O4z dPKcLBb4tPHNoHIig6tjHiTpVlXi479Brt::2\",\"PHPSESSID\":\"9c006e10d147c7175f7b3135b05d9870\",\"TawkConnectionTime\":\"0\"}'),
(49, '', '', '2', ' japan tour packages ', '-japan-tour-packages-', 'The World is now just a hop, skip and jump away and here’s how you can make your travel easier and better. Our various vacation packages, trip packages and holiday packages offer a kaleidoscopic range of international destinations that meet every interest, schedule and requirement. The best part is, you won’t have to worry about all the planning details; just pack your bag, get set and go.Pick your destination and we will fulfill all your wishes. Whether you want to visit the United States or the United Kingdom, South Africa or the Southeast, we will take you everywhere. Explore the deserts of Egypt where you can see the marvellous pyramids and the mysterious Sphinx at Giza or the city of Alexandria with its remnants of a long and forgotten time. Or the fabulous land of Europe. Our Europe tour packages cover each corner of the continent. You name it and SOTC will deliver it. You can choose from the countries ranging across the Alps; France, Switzerland, Italy or Germany. And then you have the gems of the East. The charming cities of Prague, Budapest or Vienna will give you some amazing memories to take away from your holiday. If you’re looking for something closer to home, visit the enchanting island of Sri Lanka. The ancient city of Sigiriya and the beautiful Yala National Park leave everyone mesmerized. And then there are the temples which are nothing short of awe-inspiring. The Temple of Sacred Relic which is considered the most sacred Buddhist shrine or the Dambulla Royal Cave Temple the largest cave temple of Sri Lanka should definitely feature on the must-see list of every traveller. This is just a small glimpse of our international tour packages. There is much more awaiting you.', '', 0, 0, '', '2019-11-04 11:29:28', '0000-00-00 00:00:00', 1, '{\"route\":\"category\",\"p_cat\":\"2\",\"cat_name\":\" Japan Tour Packages \",\"old_cat_image\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::9GN9  PyywtZQ1SOngS 8EKp06O4z dPKcLBb4tPHNoHIig6tjHiTpVlXi479Brt::2\",\"PHPSESSID\":\"9c006e10d147c7175f7b3135b05d9870\",\"TawkConnectionTime\":\"0\"}'),
(50, '', '', '3', 'srinagar honeymoon packages', 'srinagar-honeymoon-packages', 'Srinagar', '1574139987catImage612182081.png', 0, 0, '', '2019-11-04 11:35:32', '2019-11-19 10:36:27', 1, '{\"route\":\"category\",\"ed\":\"50\",\"p_cat\":\"3\",\"cat_name\":\"srinagar honeymoon packages\",\"old_cat_image\":\"\",\"narration\":\"Srinagar\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::d7FOCGJXbvPA0QJTYeX1yPpPoTJfG9E Vy9HPP0uKjk6dWLC9QIj eZFh85p/MUX::2\",\"TawkConnectionTime\":\"0\",\"PHPSESSID\":\"c74fb7d791b5ec9a2af3dd6417081b33\"}'),
(51, '', '', '3', 'goa honeymoon packages', 'goa-honeymoon-packages', ' Goa honeymoon packages	 ', '1573715363catImage1840729129.webp', 0, 0, '', '2019-11-04 11:36:09', '2019-11-14 12:39:23', 1, '{\"route\":\"category\",\"ed\":\"51\",\"p_cat\":\"3\",\"cat_name\":\"goa honeymoon packages\",\"old_cat_image\":\"\",\"narration\":\" Goa honeymoon packages	 \",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::beM5 WMAkn26T8KukEtJkrSChP7YWxvNbqxxb1WWfy8PtC6an FwsIo0Sv/TknNQ::2\",\"PHPSESSID\":\"7de138006108370e5f5f476017dcb008\",\"TawkConnectionTime\":\"0\"}'),
(52, '', '', '3', 'nainital honeymoon packages', 'nainital-honeymoon-packages', 'bhimtal-lake bhimtal-lake ', '1573715827catImage522234105.webp', 0, 0, '', '2019-11-04 11:36:47', '2019-11-14 12:47:07', 1, '{\"route\":\"category\",\"ed\":\"52\",\"p_cat\":\"3\",\"cat_name\":\"nainital honeymoon packages\",\"old_cat_image\":\"\",\"narration\":\"bhimtal-lake bhimtal-lake \",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::beM5 WMAkn26T8KukEtJkrSChP7YWxvNbqxxb1WWfy8PtC6an FwsIo0Sv/TknNQ::2\",\"PHPSESSID\":\"7de138006108370e5f5f476017dcb008\",\"TawkConnectionTime\":\"0\"}'),
(53, '', '', '3', 'rajasthan honeymoon packages', 'rajasthan-honeymoon-packages', '', '', 0, 0, '', '2019-11-04 11:37:11', '0000-00-00 00:00:00', 1, '{\"route\":\"category\",\"p_cat\":\"3\",\"cat_name\":\"Rajasthan honeymoon packages\",\"old_cat_image\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::9GN9  PyywtZQ1SOngS 8EKp06O4z dPKcLBb4tPHNoHIig6tjHiTpVlXi479Brt::2\",\"PHPSESSID\":\"9c006e10d147c7175f7b3135b05d9870\",\"TawkConnectionTime\":\"0\"}'),
(54, '', '', '3', 'shimla honeymoon packages', 'shimla-honeymoon-packages', 'shimla1 shimla1 shimla1', '1573714845catImage715923271.jpg', 0, 0, '', '2019-11-04 11:37:39', '2019-11-14 12:30:45', 1, '{\"route\":\"category\",\"ed\":\"54\",\"p_cat\":\"3\",\"cat_name\":\"shimla honeymoon packages\",\"old_cat_image\":\"\",\"narration\":\"shimla1 shimla1 shimla1\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::beM5 WMAkn26T8KukEtJkrSChP7YWxvNbqxxb1WWfy8PtC6an FwsIo0Sv/TknNQ::2\",\"PHPSESSID\":\"7de138006108370e5f5f476017dcb008\",\"TawkConnectionTime\":\"0\"}'),
(55, '', '', '3', 'manali honeymoon packages', 'manali-honeymoon-packages', '', '', 0, 0, '', '2019-11-04 11:37:54', '0000-00-00 00:00:00', 1, '{\"route\":\"category\",\"p_cat\":\"3\",\"cat_name\":\"Manali honeymoon packages\",\"old_cat_image\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::9GN9  PyywtZQ1SOngS 8EKp06O4z dPKcLBb4tPHNoHIig6tjHiTpVlXi479Brt::2\",\"PHPSESSID\":\"9c006e10d147c7175f7b3135b05d9870\",\"TawkConnectionTime\":\"0\"}'),
(56, '', '', '3', 'lakshadweep honeymoon packages', 'lakshadweep-honeymoon-packages', '', '', 0, 0, '', '2019-11-04 11:38:37', '0000-00-00 00:00:00', 1, '{\"route\":\"category\",\"p_cat\":\"3\",\"cat_name\":\"Lakshadweep honeymoon packages\",\"old_cat_image\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::9GN9  PyywtZQ1SOngS 8EKp06O4z dPKcLBb4tPHNoHIig6tjHiTpVlXi479Brt::2\",\"PHPSESSID\":\"9c006e10d147c7175f7b3135b05d9870\",\"TawkConnectionTime\":\"0\"}'),
(57, '', '', '3', ' ooty honeymoon packages', '-ooty-honeymoon-packages', ' ooty honeymoon packages', '1574251716catImage1465168329.jpeg', 0, 0, '', '2019-11-04 11:39:15', '2019-11-20 05:38:36', 1, '{\"route\":\"category\",\"ed\":\"57\",\"p_cat\":\"3\",\"cat_name\":\" ooty honeymoon packages\",\"old_cat_image\":\"\",\"narration\":\" ooty honeymoon packages\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::8WoxYEocyKLqhJMyt6ELFp1SpSQWyyONkqFvp46i7 rdyEwezV9m6CsabngSv22R::2\",\"PHPSESSID\":\"49f66d1aab49428cab4fabd09ba04781\",\"TawkConnectionTime\":\"0\"}'),
(58, '', '', '3', 'darjeeling honeymoon packages', 'darjeeling-honeymoon-packages', '', '', 0, 0, '', '2019-11-04 11:39:37', '0000-00-00 00:00:00', 1, '{\"route\":\"category\",\"p_cat\":\"3\",\"cat_name\":\"Darjeeling honeymoon packages\",\"old_cat_image\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::9GN9  PyywtZQ1SOngS 8EKp06O4z dPKcLBb4tPHNoHIig6tjHiTpVlXi479Brt::2\",\"PHPSESSID\":\"9c006e10d147c7175f7b3135b05d9870\",\"TawkConnectionTime\":\"0\"}'),
(59, '', '', '3', 'dharamshla honeymoon packages', 'dharamshla-honeymoon-packages', '', '', 0, 0, '', '2019-11-04 11:39:56', '0000-00-00 00:00:00', 1, '{\"route\":\"category\",\"p_cat\":\"3\",\"cat_name\":\"Dharamshla honeymoon packages\",\"old_cat_image\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::9GN9  PyywtZQ1SOngS 8EKp06O4z dPKcLBb4tPHNoHIig6tjHiTpVlXi479Brt::2\",\"PHPSESSID\":\"9c006e10d147c7175f7b3135b05d9870\",\"TawkConnectionTime\":\"0\"}'),
(60, '', '', '3', 'kerla honeymoon packages', 'kerla-honeymoon-packages', '', '', 0, 0, '', '2019-11-04 11:40:28', '0000-00-00 00:00:00', 1, '{\"route\":\"category\",\"p_cat\":\"3\",\"cat_name\":\"Kerla honeymoon packages\",\"old_cat_image\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"__tawkuuid\":\"e::vridhisoftech.in::9GN9  PyywtZQ1SOngS 8EKp06O4z dPKcLBb4tPHNoHIig6tjHiTpVlXi479Brt::2\",\"PHPSESSID\":\"9c006e10d147c7175f7b3135b05d9870\",\"TawkConnectionTime\":\"0\"}'),
(61, '', '', '3', 'mussoorie honeymoon packages', 'mussoorie-honeymoon-packages', '', '1577731589catImage261637268.jpg', 0, 0, '', '2019-11-04 11:41:00', '2019-12-31 12:16:29', 1, '{\"route\":\"category\",\"ed\":\"61\",\"p_cat\":\"3\",\"cat_name\":\"mussoorie honeymoon packages\",\"old_cat_image\":\"\",\"narration\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::NU/QbzPjBUfBokfdZhT/aOZ2aoeRgOy6NnD/X/8VZi LH1LnX04Ehzbx239FHoR7::2\",\"PHPSESSID\":\"34cc1da06748225679e24303656c0888\",\"TawkConnectionTime\":\"0\"}'),
(62, '', '', '3', 'maldives honeymoon package', 'maldives-honeymoon-package', '', '1574140167catImage929945826.jpg', 0, 0, '', '2019-11-04 11:44:50', '2019-11-19 10:39:27', 1, '{\"route\":\"category\",\"ed\":\"62\",\"p_cat\":\"3\",\"cat_name\":\"maldives honeymoon package\",\"old_cat_image\":\"\",\"narration\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::d7FOCGJXbvPA0QJTYeX1yPpPoTJfG9E Vy9HPP0uKjk6dWLC9QIj eZFh85p/MUX::2\",\"PHPSESSID\":\"c74fb7d791b5ec9a2af3dd6417081b33\",\"TawkConnectionTime\":\"0\"}'),
(63, '', '', '3', 'italy honeymoon package', 'italy-honeymoon-package', 'Italy', '1574140093catImage1807586641.jpg', 0, 0, '', '2019-11-04 11:45:30', '2019-11-19 10:38:13', 1, '{\"route\":\"category\",\"ed\":\"63\",\"p_cat\":\"3\",\"cat_name\":\"italy honeymoon package\",\"old_cat_image\":\"\",\"narration\":\"Italy\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::d7FOCGJXbvPA0QJTYeX1yPpPoTJfG9E Vy9HPP0uKjk6dWLC9QIj eZFh85p/MUX::2\",\"PHPSESSID\":\"c74fb7d791b5ec9a2af3dd6417081b33\",\"TawkConnectionTime\":\"0\"}'),
(65, '', '', '3', 'switzerland honeymoon package', 'switzerland-honeymoon-package', '<p>switzerland honeymoon package</p>\r\n', '1573112514catImage1037617150.jpg', 0, 0, '', '2019-11-04 11:48:24', '2019-12-26 05:15:21', 1, '{\"route\":\"category\",\"ed\":\"65\",\"p_cat\":\"3\",\"cat_name\":\"switzerland honeymoon package\",\"old_cat_image\":\"1573112514catImage1037617150.jpg\",\"narration\":\"<p>switzerland honeymoon package</p>\r\n\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::WmtpNSQcIUJTJ4uwQ3KvU4aUwapnaBviGgf4vknrayJW9jJdrwgB1IYZBKr3U5aH::2\",\"PHPSESSID\":\"a57f6602abbedfa21550c9112f94f191\",\"TawkConnectionTime\":\"0\"}'),
(66, '', '', '3', 'europe honeymoon packages', 'europe-honeymoon-packages', '<p>europe europe europe europe europe</p>\r\n', '1573715466catImage252624798.jpg', 0, 0, '', '2019-11-04 11:49:06', '2019-12-26 05:15:08', 1, '{\"route\":\"category\",\"ed\":\"66\",\"p_cat\":\"3\",\"cat_name\":\"europe honeymoon packages\",\"old_cat_image\":\"1573715466catImage252624798.jpg\",\"narration\":\"<p>europe europe europe europe europe</p>\r\n\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::WmtpNSQcIUJTJ4uwQ3KvU4aUwapnaBviGgf4vknrayJW9jJdrwgB1IYZBKr3U5aH::2\",\"PHPSESSID\":\"a57f6602abbedfa21550c9112f94f191\",\"TawkConnectionTime\":\"0\"}'),
(67, '', '', '3', 'mauritius honeymoon packages ', 'mauritius-honeymoon-packages-', '<p>1508153927_gallery-1508153927_gallery-</p>\r\n', '1573715426catImage516215720.webp', 0, 0, '', '2019-11-04 11:51:42', '2019-12-26 04:19:20', 1, '{\"route\":\"category\",\"ed\":\"67\",\"p_cat\":\"3\",\"cat_name\":\"mauritius honeymoon packages \",\"old_cat_image\":\"1573715426catImage516215720.webp\",\"narration\":\"<p>1508153927_gallery-1508153927_gallery-</p>\r\n\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::WmtpNSQcIUJTJ4uwQ3KvU4aUwapnaBviGgf4vknrayJW9jJdrwgB1IYZBKr3U5aH::2\",\"PHPSESSID\":\"a57f6602abbedfa21550c9112f94f191\",\"TawkConnectionTime\":\"0\"}'),
(68, '', '', '3', 'bali honeymoon packages', 'bali-honeymoon-packages', 'Bali-honeymoon-Bali-romantic-private Bali-honeymoon-Bali-romantic-private', '1573714701catImage1179329953.jpg', 0, 0, '', '2019-11-04 11:52:14', '2019-11-20 04:33:42', 1, '{\"route\":\"category\",\"ed\":\"68\",\"p_cat\":\"3\",\"cat_name\":\"bali honeymoon packages\",\"old_cat_image\":\"1573714701catImage1179329953.jpg\",\"narration\":\"Bali-honeymoon-Bali-romantic-private Bali-honeymoon-Bali-romantic-private\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::8WoxYEocyKLqhJMyt6ELFp1SpSQWyyONkqFvp46i7 rdyEwezV9m6CsabngSv22R::2\",\"PHPSESSID\":\"49f66d1aab49428cab4fabd09ba04781\",\"TawkConnectionTime\":\"0\"}'),
(69, '', '', '3', ' new zealand honeymoon packages', '-new-zealand-honeymoon-packages', 'new zealand honeymoon package new zealand honeymoon package ', '1573714625catImage1671068389.jpg', 0, 0, '', '2019-11-04 11:54:00', '2019-11-20 05:17:27', 1, '{\"route\":\"category\",\"ed\":\"69\",\"p_cat\":\"0\",\"cat_name\":\" new zealand honeymoon packages\",\"old_cat_image\":\"1573714625catImage1671068389.jpg\",\"narration\":\"new zealand honeymoon package new zealand honeymoon package \",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::8WoxYEocyKLqhJMyt6ELFp1SpSQWyyONkqFvp46i7 rdyEwezV9m6CsabngSv22R::2\",\"PHPSESSID\":\"49f66d1aab49428cab4fabd09ba04781\",\"TawkConnectionTime\":\"0\"}'),
(80, '', '', '1', 'trekking tour packages', 'trekking-tour-packages', 'Lorem ipsum dolor sit amet adiu piscing elit sed diam nonum euismo tincidunt ut.', '1573714506catImage156961632.jpg', 1, 0, '', '2019-11-07 11:51:57', '2019-11-20 05:16:34', 1, '{\"route\":\"category\",\"ed\":\"80\",\"p_cat\":\"0\",\"cat_name\":\"trekking tour packages\",\"old_cat_image\":\"1573714506catImage156961632.jpg\",\"narration\":\"Lorem ipsum dolor sit amet adiu piscing elit sed diam nonum euismo tincidunt ut.\",\"adventure_package\":\"on\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::8WoxYEocyKLqhJMyt6ELFp1SpSQWyyONkqFvp46i7 rdyEwezV9m6CsabngSv22R::2\",\"PHPSESSID\":\"49f66d1aab49428cab4fabd09ba04781\",\"TawkConnectionTime\":\"0\"}'),
(81, '', '', '1', 'paragliding tour packages', 'paragliding-tour-packages', 'Lorem ipsum dolor sit amet adiu piscing elit sed diam nonum euismo tincidunt ut.', '1573714443catImage1411300320.jpg', 1, 0, '', '2019-11-07 11:52:52', '2019-11-14 12:24:03', 1, '{\"route\":\"category\",\"ed\":\"81\",\"p_cat\":\"1\",\"cat_name\":\"paragliding tour packages\",\"old_cat_image\":\"\",\"narration\":\"Lorem ipsum dolor sit amet adiu piscing elit sed diam nonum euismo tincidunt ut.\",\"adventure_package\":\"on\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::beM5 WMAkn26T8KukEtJkrSChP7YWxvNbqxxb1WWfy8PtC6an FwsIo0Sv/TknNQ::2\",\"PHPSESSID\":\"7de138006108370e5f5f476017dcb008\",\"TawkConnectionTime\":\"0\"}'),
(82, '', '', '1', 'bike tour packages', 'bike-tour-packages', 'Lorem ipsum dolor sit amet adiu piscing elit sed diam nonum euismo tincidunt ut.', '1573714366catImage825408229.jpg', 1, 0, '', '2019-11-07 11:53:06', '2019-11-14 12:22:46', 1, '{\"route\":\"category\",\"ed\":\"82\",\"p_cat\":\"1\",\"cat_name\":\"bike tour packages\",\"old_cat_image\":\"\",\"narration\":\"Lorem ipsum dolor sit amet adiu piscing elit sed diam nonum euismo tincidunt ut.\",\"adventure_package\":\"on\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::beM5 WMAkn26T8KukEtJkrSChP7YWxvNbqxxb1WWfy8PtC6an FwsIo0Sv/TknNQ::2\",\"PHPSESSID\":\"7de138006108370e5f5f476017dcb008\",\"TawkConnectionTime\":\"0\"}'),
(83, '', '', '1', 'scuba diving tour packages', 'scuba-diving-tour-packages', 'Lorem ipsum dolor sit amet adiu piscing elit sed diam nonum euismo tincidunt ut.', '1573714301catImage467514528.jpg', 1, 0, '', '2019-11-07 11:53:20', '2019-11-14 12:21:41', 1, '{\"route\":\"category\",\"ed\":\"83\",\"p_cat\":\"1\",\"cat_name\":\"scuba diving tour packages\",\"old_cat_image\":\"\",\"narration\":\"Lorem ipsum dolor sit amet adiu piscing elit sed diam nonum euismo tincidunt ut.\",\"adventure_package\":\"on\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::beM5 WMAkn26T8KukEtJkrSChP7YWxvNbqxxb1WWfy8PtC6an FwsIo0Sv/TknNQ::2\",\"PHPSESSID\":\"7de138006108370e5f5f476017dcb008\",\"TawkConnectionTime\":\"0\"}'),
(84, '', '', '1', 'yoga tour packages', 'yoga-tour-packages', 'Lorem ipsum dolor sit amet adiu piscing elit sed diam nonum euismo tincidunt ut.', '1573714251catImage1852972485.jpg', 1, 0, '', '2019-11-07 11:53:30', '2019-11-14 12:20:51', 1, '{\"route\":\"category\",\"ed\":\"84\",\"p_cat\":\"1\",\"cat_name\":\"yoga tour packages\",\"old_cat_image\":\"\",\"narration\":\"Lorem ipsum dolor sit amet adiu piscing elit sed diam nonum euismo tincidunt ut.\",\"adventure_package\":\"on\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::beM5 WMAkn26T8KukEtJkrSChP7YWxvNbqxxb1WWfy8PtC6an FwsIo0Sv/TknNQ::2\",\"PHPSESSID\":\"7de138006108370e5f5f476017dcb008\",\"TawkConnectionTime\":\"0\"}'),
(85, '', '', '1', 'meditation tour package', 'meditation-tour-package', '<p>Lorem ipsum dolor sit amet adiu piscing elit sed diam nonum euismo tincidunt ut.</p>\r\n', '1577731524catImage71351906.jpg', 1, 0, '', '2019-11-07 11:53:43', '2019-12-31 12:15:24', 1, '{\"route\":\"category\",\"ed\":\"85\",\"p_cat\":\"1\",\"cat_name\":\"meditation tour package\",\"old_cat_image\":\"1573714200catImage2097274078.jpg\",\"narration\":\"<p>Lorem ipsum dolor sit amet adiu piscing elit sed diam nonum euismo tincidunt ut.</p>\r\n\",\"adventure_package\":\"on\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::NU/QbzPjBUfBokfdZhT/aOZ2aoeRgOy6NnD/X/8VZi LH1LnX04Ehzbx239FHoR7::2\",\"PHPSESSID\":\"34cc1da06748225679e24303656c0888\",\"TawkConnectionTime\":\"0\"}');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `stateID` smallint(6) NOT NULL,
  `countryID` smallint(6) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`ID`, `name`, `stateID`, `countryID`, `status`) VALUES
(1, 'Anantapur', 1, 81, 0),
(2, 'Chittoor', 1, 81, 1),
(3, 'East Godavari (Kakinada)', 1, 81, 0),
(4, 'Guntur', 1, 81, 1),
(5, 'Krishna (Machilipatnam)', 1, 81, 0),
(6, 'Kurnool', 1, 81, 1),
(7, 'Prakasam (Ongole)', 1, 81, 0),
(8, 'Srikakulam', 1, 81, 0),
(9, 'Sri Potti Sriramulu (Nellore)', 1, 81, 1),
(10, 'Visakhapatnam', 1, 81, 0),
(11, 'Vizianagaram', 1, 81, 1),
(12, 'West Godavari (Eluru)', 1, 81, 0),
(13, 'YSR District, Kadapa (Cuddapah)', 1, 81, 1),
(14, 'Anjaw', 2, 81, 1),
(15, 'Changlang', 2, 81, 0),
(16, 'Dibang Valley (Anini)', 2, 81, 0),
(17, 'East Kameng (Seppa)', 2, 81, 1),
(18, 'East Siang (Pasighat)', 2, 81, 0),
(19, 'Kurung Kumey (Koloriang)', 2, 81, 0),
(20, 'Lohit (Tezu)', 2, 81, 0),
(21, 'Longding', 2, 81, 0),
(22, 'Lower Dibang Valley (Roing)', 2, 81, 0),
(23, 'Lower Subansiri (Ziro)', 2, 81, 0),
(24, 'Papum Pare (Yupia)', 2, 81, 0),
(25, 'Tawang', 2, 81, 0),
(26, 'Tirap (Khonsa)', 2, 81, 0),
(27, 'Upper Siang (Yingkiong)', 2, 81, 0),
(28, 'Upper Subansiri (Daporijo)', 2, 81, 0),
(29, 'West Kameng (Bomdila)', 2, 81, 0),
(30, 'West Siang (Along)', 2, 81, 0),
(31, 'Baksa (Mushalpur)', 3, 81, 0),
(32, 'Barpeta', 3, 81, 1),
(33, 'Bongaigaon', 3, 81, 0),
(34, 'Cachar (Silchar)', 3, 81, 0),
(35, 'Chirang (Kajalgaon)', 3, 81, 0),
(36, 'Darrang (Mangaldai)', 3, 81, 0),
(37, 'Dhemaji', 3, 81, 0),
(38, 'Dhubri', 3, 81, 0),
(39, 'Dibrugarh', 3, 81, 1),
(40, 'Dima Hasao (North Cachar Hills) Haflong', 3, 81, 0),
(41, 'Goalpara', 3, 81, 0),
(42, 'Golaghat', 3, 81, 0),
(43, 'Hailakandi', 3, 81, 0),
(44, 'Jorhat', 3, 81, 1),
(45, 'Kamrup (Guwahati)', 3, 81, 0),
(46, 'Kamrup Metropolitan', 3, 81, 0),
(47, 'Karbi Anglong (Diphu)', 3, 81, 0),
(48, 'Karimganj', 3, 81, 0),
(49, 'Kokrajhar', 3, 81, 0),
(50, 'Lakhimpur', 3, 81, 1),
(51, 'Morigaon', 3, 81, 0),
(52, 'Nagaon', 3, 81, 0),
(53, 'Nalbari', 3, 81, 0),
(54, 'Sivasagar', 3, 81, 1),
(55, 'Sonitpur (Tezpur)', 3, 81, 0),
(56, 'Tinsukia', 3, 81, 0),
(57, 'Udalguri', 3, 81, 0),
(58, 'Araria', 4, 81, 0),
(59, 'Arwal', 4, 81, 0),
(60, 'Aurangabad', 4, 81, 1),
(61, 'Banka', 4, 81, 0),
(62, 'Begusarai', 4, 81, 0),
(63, 'Bhagalpur', 4, 81, 0),
(64, 'Bhojpur (Ara)', 4, 81, 0),
(65, 'Buxar', 4, 81, 0),
(66, 'Darbhanga', 4, 81, 0),
(67, 'East Champaran (Motihari)', 4, 81, 0),
(68, 'Gaya', 4, 81, 0),
(69, 'Gopalganj', 4, 81, 0),
(70, 'Jamui', 4, 81, 0),
(71, 'Jehanabad', 4, 81, 0),
(72, 'Kaimur (Bhabua)', 4, 81, 0),
(73, 'Katihar', 4, 81, 0),
(74, 'Khagaria', 4, 81, 0),
(75, 'Kishanganj', 4, 81, 0),
(76, 'Lakhisarai', 4, 81, 0),
(77, 'Madhepura', 4, 81, 0),
(78, 'Madhubani', 4, 81, 0),
(79, 'Munger (Monghyr)', 4, 81, 0),
(80, 'Muzaffarpur', 4, 81, 0),
(81, 'Nalanda (Bihar Sharif)', 4, 81, 0),
(82, 'Nawada', 4, 81, 0),
(83, 'Patna', 4, 81, 0),
(84, 'Purnia (Purnea)', 4, 81, 0),
(85, 'Rohtas (Sasaram)', 4, 81, 0),
(86, 'Saharsa', 4, 81, 0),
(87, 'Samastipur', 4, 81, 0),
(88, 'Saran (Chhapra)', 4, 81, 0),
(89, 'Sheikhpura', 4, 81, 0),
(90, 'Sheohar', 4, 81, 0),
(91, 'Sitamarhi', 4, 81, 0),
(92, 'Siwan', 4, 81, 0),
(93, 'Supaul', 4, 81, 0),
(94, 'Vaishali (Hajipur)', 4, 81, 0),
(95, 'West Champaran (Bettiah)', 4, 81, 0),
(96, 'Balod', 5, 81, 0),
(97, 'Baloda Bazar', 5, 81, 0),
(98, 'Balrampur', 5, 81, 0),
(99, 'Bastar (Jagdalpur)', 5, 81, 0),
(100, 'Bemetara', 5, 81, 0),
(101, 'Bijapur', 5, 81, 0),
(102, 'Bilaspur', 5, 81, 0),
(103, 'Dantewada (South Bastar)', 5, 81, 0),
(104, 'Dhamtari', 5, 81, 0),
(105, 'Durg', 5, 81, 0),
(106, 'Gariaband', 5, 81, 0),
(107, 'Janjgir-Champa', 5, 81, 0),
(108, 'Jashpur', 5, 81, 0),
(109, 'Kabirdham (Kawardha)', 5, 81, 0),
(110, 'Kanker (North Bastar)', 5, 81, 0),
(111, 'Kondagaon', 5, 81, 0),
(112, 'Korba', 5, 81, 0),
(113, 'Korea (Koriya) Baikunthpur', 5, 81, 0),
(114, 'Mahasamund', 5, 81, 0),
(115, 'Mungeli', 5, 81, 0),
(116, 'Narayanpur', 5, 81, 0),
(117, 'Raigarh', 5, 81, 0),
(118, 'Raipur', 5, 81, 0),
(119, 'Rajnandgaon', 5, 81, 0),
(120, 'Sukma', 5, 81, 0),
(121, 'Surajpur', 5, 81, 0),
(122, 'Surguja (Ambikapur)', 5, 81, 0),
(123, 'North Goa (Panaji)', 6, 81, 0),
(124, 'South Goa (Margao)', 6, 81, 0),
(125, 'Ahmedabad', 7, 81, 0),
(126, 'Amreli', 7, 81, 0),
(127, 'Anand', 7, 81, 0),
(128, 'Aravalli (Modasa)', 7, 81, 0),
(129, 'Banaskantha (Palanpur)', 7, 81, 0),
(130, 'Bharuch', 7, 81, 0),
(131, 'Bhavnagar', 7, 81, 0),
(132, 'Botad', 7, 81, 0),
(133, 'Chhota Udepur', 7, 81, 0),
(134, 'Dahod', 7, 81, 0),
(135, 'Dangs (Ahwa)', 7, 81, 0),
(136, 'Devbhoomi Dwarka (Khambhaliya)', 7, 81, 0),
(137, 'Gandhinagar', 7, 81, 0),
(138, 'Gir Somnath (Veraval)', 7, 81, 0),
(139, 'Jamnagar', 7, 81, 0),
(140, 'Junagadh', 7, 81, 0),
(141, 'Kachchh (Bhuj)', 7, 81, 0),
(142, 'Kheda (Nadiad)', 7, 81, 0),
(143, 'Mahisagar (Lunavada)', 7, 81, 0),
(144, 'Mehsana', 7, 81, 0),
(145, 'Morbi', 7, 81, 0),
(146, 'Narmada (Rajpipla)', 7, 81, 0),
(147, 'Navsari', 7, 81, 0),
(148, 'Panchmahal (Godhra)', 7, 81, 0),
(149, 'Patan', 7, 81, 0),
(150, 'Porbandar', 7, 81, 0),
(151, 'Rajkot', 7, 81, 0),
(152, 'Sabarkantha (Himmatnagar)', 7, 81, 0),
(153, 'Surat', 7, 81, 0),
(154, 'Surendranagar', 7, 81, 0),
(155, 'Tapi (Vyara)', 7, 81, 0),
(156, 'Vadodara', 7, 81, 0),
(157, 'Valsad', 7, 81, 0),
(158, 'Ambala', 8, 81, 0),
(159, 'Bhiwani', 8, 81, 0),
(160, 'Faridabad', 8, 81, 1),
(161, 'Fatehabad', 8, 81, 0),
(162, 'Gurgaon', 8, 81, 0),
(163, 'Hisar', 8, 81, 0),
(164, 'Jhajjar', 8, 81, 0),
(165, 'Jind', 8, 81, 0),
(166, 'Kaithal', 8, 81, 0),
(167, 'Karnal', 8, 81, 0),
(168, 'Kurukshetra', 8, 81, 0),
(169, 'Mahendragarh (Narnaul)', 8, 81, 0),
(170, 'Mewat (Nuh)', 8, 81, 0),
(171, 'Palwal', 8, 81, 0),
(172, 'Panchkula', 8, 81, 0),
(173, 'Panipat', 8, 81, 0),
(174, 'Rewari', 8, 81, 0),
(175, 'Rohtak', 8, 81, 0),
(176, 'Sirsa', 8, 81, 0),
(177, 'Sonipat', 8, 81, 0),
(178, 'Yamunanagar', 8, 81, 0),
(179, 'Bilaspur', 9, 81, 0),
(180, 'Chamba', 9, 81, 0),
(181, 'Hamirpur', 9, 81, 0),
(182, 'Kangra (Dharamasala)', 9, 81, 0),
(183, 'Kinnaur (Reckong Peo)', 9, 81, 0),
(184, 'Kullu', 9, 81, 0),
(185, 'Lahaul & Spiti (Keylong)', 9, 81, 0),
(186, 'Mandi', 9, 81, 0),
(187, 'Shimla', 9, 81, 0),
(188, 'Sirmaur (Sirmour) Nahan', 9, 81, 0),
(189, 'Solan', 9, 81, 0),
(190, 'Una', 9, 81, 0),
(191, 'Anantnag', 10, 81, 0),
(192, 'Bandipore', 10, 81, 0),
(193, 'Baramulla', 10, 81, 0),
(194, 'Budgam', 10, 81, 0),
(195, 'Doda', 10, 81, 0),
(196, 'Ganderbal', 10, 81, 0),
(197, 'Jammu', 10, 81, 0),
(198, 'Kargil', 10, 81, 0),
(199, 'Kathua', 10, 81, 0),
(200, 'Kishtwar', 10, 81, 0),
(201, 'Kulgam', 10, 81, 0),
(202, 'Kupwara', 10, 81, 0),
(203, 'Leh', 10, 81, 0),
(204, 'Poonch', 10, 81, 0),
(205, 'Pulwama', 10, 81, 0),
(206, 'Rajouri', 10, 81, 0),
(207, 'Ramban', 10, 81, 0),
(208, 'Reasi', 10, 81, 0),
(209, 'Samba', 10, 81, 0),
(210, 'Shopian', 10, 81, 0),
(211, 'Srinagar', 10, 81, 0),
(212, 'Udhampur', 10, 81, 0),
(213, 'Bokaro', 11, 81, 0),
(214, 'Chatra', 11, 81, 0),
(215, 'Deoghar', 11, 81, 0),
(216, 'Dhanbad', 11, 81, 0),
(217, 'Dumka', 11, 81, 0),
(218, 'East Singhbhum (Jamshedpur)', 11, 81, 0),
(219, 'Garhwa', 11, 81, 0),
(220, 'Giridih', 11, 81, 0),
(221, 'Godda', 11, 81, 0),
(222, 'Gumla', 11, 81, 0),
(223, 'Hazaribag', 11, 81, 0),
(224, 'Jamtara', 11, 81, 0),
(225, 'Khunti', 11, 81, 0),
(226, 'Koderma', 11, 81, 0),
(227, 'Latehar', 11, 81, 0),
(228, 'Lohardaga', 11, 81, 0),
(229, 'Pakur', 11, 81, 0),
(230, 'Palamu (Daltonganj)', 11, 81, 0),
(231, 'Ramgarh', 11, 81, 0),
(232, 'Ranchi', 11, 81, 0),
(233, 'Sahibganj', 11, 81, 0),
(234, 'Seraikela-Kharsawan', 11, 81, 0),
(235, 'Simdega', 11, 81, 0),
(236, 'West Singhbhum (Chaibasa)', 11, 81, 0),
(237, 'Bagalkot', 12, 81, 0),
(238, 'Ballari (Bellary)', 12, 81, 0),
(239, 'Belagavi (Belgaum)', 12, 81, 0),
(240, 'Bengaluru (Bangalore) Rural', 12, 81, 0),
(241, 'Bengaluru (Bangalore) Urban', 12, 81, 0),
(242, 'Bidar', 12, 81, 0),
(243, 'Chamarajanagar', 12, 81, 0),
(244, 'Chikballapur', 12, 81, 0),
(245, 'Chikkamagaluru (Chikmagalur)', 12, 81, 0),
(246, 'Chitradurga', 12, 81, 0),
(247, 'Dakshina Kannada (Mangaluru)', 12, 81, 0),
(248, 'Davangere', 12, 81, 0),
(249, 'Dharwad', 12, 81, 0),
(250, 'Gadag', 12, 81, 0),
(251, 'Hassan', 12, 81, 0),
(252, 'Haveri', 12, 81, 0),
(253, 'Kalaburagi (Gulbarga)', 12, 81, 0),
(254, 'Kodagu (Madikeri)', 12, 81, 0),
(255, 'Kolar', 12, 81, 0),
(256, 'Koppal', 12, 81, 0),
(257, 'Mandya', 12, 81, 0),
(258, 'Mysuru (Mysore)', 12, 81, 0),
(259, 'Raichur', 12, 81, 0),
(260, 'Ramanagara', 12, 81, 0),
(261, 'Shivamogga (Shimoga)', 12, 81, 0),
(262, 'Tumakuru (Tumkur)', 12, 81, 0),
(263, 'Udupi', 12, 81, 0),
(264, 'Uttara Kannada (Karwar)', 12, 81, 0),
(265, 'Vijayapura (Bijapur)', 12, 81, 0),
(266, 'Yadgir', 12, 81, 0),
(267, 'Alappuzha', 13, 81, 0),
(268, 'Ernakulam (Kochi)', 13, 81, 0),
(269, 'Idukki (Painaw)', 13, 81, 0),
(270, 'Kannur', 13, 81, 0),
(271, 'Kasaragod', 13, 81, 0),
(272, 'Kollam', 13, 81, 0),
(273, 'Kottayam', 13, 81, 0),
(274, 'Kozhikode', 13, 81, 0),
(275, 'Malappuram', 13, 81, 0),
(276, 'Palakkad', 13, 81, 0),
(277, 'Pathanamthitta', 13, 81, 0),
(278, 'Thiruvananthapuram', 13, 81, 0),
(279, 'Thrissur', 13, 81, 0),
(280, 'Wayanad (Kalpetta)', 13, 81, 0),
(281, 'Agar Malwa', 14, 81, 0),
(282, 'Alirajpur', 14, 81, 0),
(283, 'Anuppur', 14, 81, 0),
(284, 'Ashoknagar', 14, 81, 0),
(285, 'Balaghat', 14, 81, 0),
(286, 'Barwani', 14, 81, 0),
(287, 'Betul', 14, 81, 0),
(288, 'Bhind', 14, 81, 0),
(289, 'Bhopal', 14, 81, 0),
(290, 'Burhanpur', 14, 81, 0),
(291, 'Chhatarpur', 14, 81, 0),
(292, 'Chhindwara', 14, 81, 0),
(293, 'Damoh', 14, 81, 0),
(294, 'Datia', 14, 81, 0),
(295, 'Dewas', 14, 81, 0),
(296, 'Dhar', 14, 81, 0),
(297, 'Dindori', 14, 81, 0),
(298, 'Guna', 14, 81, 0),
(299, 'Gwalior', 14, 81, 0),
(300, 'Harda', 14, 81, 0),
(301, 'Hoshangabad', 14, 81, 0),
(302, 'Indore', 14, 81, 0),
(303, 'Jabalpur', 14, 81, 0),
(304, 'Jhabua', 14, 81, 0),
(305, 'Katni', 14, 81, 0),
(306, 'Khandwa', 14, 81, 0),
(307, 'Khargone', 14, 81, 0),
(308, 'Mandla', 14, 81, 0),
(309, 'Mandsaur', 14, 81, 0),
(310, 'Morena', 14, 81, 0),
(311, 'Narsinghpur', 14, 81, 0),
(312, 'Neemuch', 14, 81, 0),
(313, 'Panna', 14, 81, 0),
(314, 'Raisen', 14, 81, 0),
(315, 'Rajgarh', 14, 81, 0),
(316, 'Ratlam', 14, 81, 0),
(317, 'Rewa', 14, 81, 0),
(318, 'Sagar', 14, 81, 0),
(319, 'Satna', 14, 81, 0),
(320, 'Sehore', 14, 81, 0),
(321, 'Seoni', 14, 81, 0),
(322, 'Shahdol', 14, 81, 0),
(323, 'Shajapur', 14, 81, 0),
(324, 'Sheopur', 14, 81, 0),
(325, 'Shivpuri', 14, 81, 0),
(326, 'Sidhi', 14, 81, 0),
(327, 'Singrauli', 14, 81, 0),
(328, 'Tikamgarh', 14, 81, 0),
(329, 'Ujjain', 14, 81, 0),
(330, 'Umaria', 14, 81, 0),
(331, 'Vidisha', 14, 81, 0),
(332, 'Ahmednagar', 15, 81, 0),
(333, 'Akola', 15, 81, 0),
(334, 'Amravati', 15, 81, 0),
(335, 'Aurangabad', 15, 81, 0),
(336, 'Beed', 15, 81, 0),
(337, 'Bhandara', 15, 81, 0),
(338, 'Buldhana', 15, 81, 0),
(339, 'Chandrapur', 15, 81, 0),
(340, 'Dhule', 15, 81, 0),
(341, 'Gadchiroli', 15, 81, 0),
(342, 'Gondia', 15, 81, 0),
(343, 'Hingoli', 15, 81, 0),
(344, 'Jalgaon', 15, 81, 0),
(345, 'Jalna', 15, 81, 0),
(346, 'Kolhapur', 15, 81, 0),
(347, 'Latur', 15, 81, 0),
(348, 'Mumbai City', 15, 81, 0),
(349, 'Mumbai Suburban (Bandra East)', 15, 81, 0),
(350, 'Nagpur', 15, 81, 0),
(351, 'Nanded', 15, 81, 0),
(352, 'Nandurbar', 15, 81, 0),
(353, 'Nashik', 15, 81, 0),
(354, 'Osmanabad', 15, 81, 0),
(355, 'Palghar', 15, 81, 0),
(356, 'Parbhani', 15, 81, 0),
(357, 'Pune', 15, 81, 0),
(358, 'Raigad', 15, 81, 0),
(359, 'Ratnagiri', 15, 81, 0),
(360, 'Sangli', 15, 81, 0),
(361, 'Satara', 15, 81, 0),
(362, 'Sindhudurg (Oras)', 15, 81, 0),
(363, 'Solapur', 15, 81, 0),
(364, 'Thane', 15, 81, 0),
(365, 'Wardha', 15, 81, 0),
(366, 'Washim', 15, 81, 0),
(367, 'Yavatmal', 15, 81, 0),
(368, 'Bishnupur', 16, 81, 0),
(369, 'Chandel', 16, 81, 0),
(370, 'Churachandpur', 16, 81, 0),
(371, 'Imphal East (Porompat)', 16, 81, 0),
(372, 'Imphal West (Lamphelpat)', 16, 81, 0),
(373, 'Senapati (Karong)', 16, 81, 0),
(374, 'Tamenglong', 16, 81, 0),
(375, 'Thoubal', 16, 81, 0),
(376, 'Ukhrul', 16, 81, 0),
(377, 'East Garo Hills (Williamnagar)', 17, 81, 0),
(378, 'East Jaintia Hills (Khliehriat)', 17, 81, 0),
(379, 'East Khasi Hills (Shillong)', 17, 81, 0),
(380, 'North Garo Hills (Resubelpara)', 17, 81, 0),
(381, 'Ri Bhoi (Nongpoh)', 17, 81, 0),
(382, 'South Garo Hills (Baghmara)', 17, 81, 0),
(383, 'South West Garo Hills (Ampati)', 17, 81, 0),
(384, 'South West Khasi Hills (Mawkyrwat)', 17, 81, 0),
(385, 'West Garo Hills (Tura)', 17, 81, 0),
(386, 'West Jaintia Hills (Jowai)', 17, 81, 0),
(387, 'West Khasi Hills (Nongstoin)', 17, 81, 0),
(388, 'Aizawl', 18, 81, 0),
(389, 'Champhai', 18, 81, 0),
(390, 'Kolasib', 18, 81, 0),
(391, 'Lawngtlai', 18, 81, 0),
(392, 'Lunglei', 18, 81, 0),
(393, 'Mamit', 18, 81, 0),
(394, 'Saiha', 18, 81, 0),
(395, 'Serchhip', 18, 81, 0),
(396, 'Dimapur', 19, 81, 0),
(397, 'Kiphire', 19, 81, 0),
(398, 'Kohima', 19, 81, 0),
(399, 'Longleng', 19, 81, 0),
(400, 'Mokokchung', 19, 81, 0),
(401, 'Mon', 19, 81, 0),
(402, 'Peren', 19, 81, 0),
(403, 'Phek', 19, 81, 0),
(404, 'Tuensang', 19, 81, 0),
(405, 'Wokha', 19, 81, 0),
(406, 'Zunheboto', 19, 81, 0),
(407, 'Angul', 20, 81, 0),
(408, 'Balangir', 20, 81, 0),
(409, 'Balasore (Balasore)', 20, 81, 0),
(410, 'Bargarh', 20, 81, 0),
(411, 'Bhadrak', 20, 81, 0),
(412, 'Boudh', 20, 81, 0),
(413, 'Cuttack', 20, 81, 0),
(414, 'Deogarh', 20, 81, 0),
(415, 'Dhenkanal', 20, 81, 0),
(416, 'Gajapati (Paralakhemundi)', 20, 81, 0),
(417, 'Ganjam (Chhatrapur)', 20, 81, 0),
(418, 'Jagatsinghapur', 20, 81, 0),
(419, 'Jajpur (Panikoili)', 20, 81, 0),
(420, 'Jharsuguda', 20, 81, 0),
(421, 'Kalahandi (Bhawanipatna)', 20, 81, 0),
(422, 'Kandhamal (Phulbani)', 20, 81, 0),
(423, 'Kendrapara', 20, 81, 0),
(424, 'Kendujhar (Keonjhar)', 20, 81, 0),
(425, 'Khordha (Khurda) Bhubaneswar', 20, 81, 0),
(426, 'Koraput', 20, 81, 0),
(427, 'Malkangiri', 20, 81, 0),
(428, 'Mayurbhanj (Baripada)', 20, 81, 0),
(429, 'Nabarangpur', 20, 81, 0),
(430, 'Nayagarh', 20, 81, 0),
(431, 'Nuapada', 20, 81, 0),
(432, 'Puri', 20, 81, 0),
(433, 'Rayagada', 20, 81, 0),
(434, 'Sambalpur', 20, 81, 0),
(435, 'Sonepur', 20, 81, 0),
(436, 'Sundargarh', 20, 81, 0),
(437, 'Amritsar', 21, 81, 0),
(438, 'Barnala', 21, 81, 0),
(439, 'Bathinda', 21, 81, 0),
(440, 'Faridkot', 21, 81, 0),
(441, 'Fatehgarh Sahib', 21, 81, 0),
(442, 'Fazilka', 21, 81, 0),
(443, 'Ferozepur', 21, 81, 0),
(444, 'Gurdaspur', 21, 81, 0),
(445, 'Hoshiarpur', 21, 81, 0),
(446, 'Jalandhar', 21, 81, 0),
(447, 'Kapurthala', 21, 81, 0),
(448, 'Ludhiana', 21, 81, 0),
(449, 'Mansa', 21, 81, 0),
(450, 'Moga', 21, 81, 0),
(451, 'Muktsar', 21, 81, 0),
(452, 'Nawanshahr (Shahid Bhagat Singh Nagar)', 21, 81, 0),
(453, 'Pathankot', 21, 81, 0),
(454, 'Patiala', 21, 81, 0),
(455, 'Rupnagar', 21, 81, 0),
(456, 'Sahibzada Ajit Singh Nagar (Mohali)', 21, 81, 0),
(457, 'Sangrur', 21, 81, 0),
(458, 'Tarn Taran', 21, 81, 0),
(459, 'Ajmer', 22, 81, 0),
(460, 'Alwar', 22, 81, 0),
(461, 'Banswara', 22, 81, 0),
(462, 'Baran', 22, 81, 0),
(463, 'Barmer', 22, 81, 0),
(464, 'Bharatpur', 22, 81, 0),
(465, 'Bhilwara', 22, 81, 0),
(466, 'Bikaner', 22, 81, 0),
(467, 'Bundi', 22, 81, 0),
(468, 'Chittorgarh', 22, 81, 0),
(469, 'Churu', 22, 81, 0),
(470, 'Dausa', 22, 81, 0),
(471, 'Dholpur', 22, 81, 0),
(472, 'Dungarpur', 22, 81, 0),
(473, 'Hanumangarh', 22, 81, 0),
(474, 'Jaipur', 22, 81, 0),
(475, 'Jaisalmer', 22, 81, 0),
(476, 'Jalore', 22, 81, 0),
(477, 'Jhalawar', 22, 81, 0),
(478, 'Jhunjhunu', 22, 81, 0),
(479, 'Jodhpur', 22, 81, 0),
(480, 'Karauli', 22, 81, 0),
(481, 'Kota', 22, 81, 0),
(482, 'Nagaur', 22, 81, 0),
(483, 'Pali', 22, 81, 0),
(484, 'Pratapgarh', 22, 81, 0),
(485, 'Rajsamand', 22, 81, 0),
(486, 'Sawai Madhopur', 22, 81, 0),
(487, 'Sikar', 22, 81, 0),
(488, 'Sirohi', 22, 81, 0),
(489, 'Sri Ganganagar', 22, 81, 0),
(490, 'Tonk', 22, 81, 0),
(491, 'Udaipur', 22, 81, 0),
(492, 'East Sikkim (Gangtok)', 23, 81, 0),
(493, 'North Sikkim (Mangan)', 23, 81, 0),
(494, 'South Sikkim (Namchi)', 23, 81, 0),
(495, 'West Sikkim (Geyzing)', 23, 81, 0),
(496, 'Ariyalur', 24, 81, 0),
(497, 'Chennai', 24, 81, 0),
(498, 'Coimbatore', 24, 81, 0),
(499, 'Cuddalore', 24, 81, 0),
(500, 'Dharmapuri', 24, 81, 0),
(501, 'Dindigul', 24, 81, 0),
(502, 'Erode', 24, 81, 0),
(503, 'Kanchipuram (Kancheepuram)', 24, 81, 0),
(504, 'Kanyakumari (Nagercoil)', 24, 81, 0),
(505, 'Karur', 24, 81, 0),
(506, 'Krishnagiri', 24, 81, 0),
(507, 'Madurai', 24, 81, 0),
(508, 'Nagapattinam', 24, 81, 0),
(509, 'Namakkal', 24, 81, 0),
(510, 'Nilgiris (Udagamandalam) Ootacamund', 24, 81, 0),
(511, 'Perambalur', 24, 81, 0),
(512, 'Pudukkottai', 24, 81, 0),
(513, 'Ramanathapuram', 24, 81, 0),
(514, 'Salem', 24, 81, 0),
(515, 'Sivaganga', 24, 81, 0),
(516, 'Thanjavur', 24, 81, 0),
(517, 'Theni', 24, 81, 0),
(518, 'Thoothukudi (Tuticorin)', 24, 81, 0),
(519, 'Tiruchirappalli', 24, 81, 0),
(520, 'Tirunelveli (Thirunelveli)', 24, 81, 0),
(521, 'Tiruppur', 24, 81, 0),
(522, 'Tiruvallur', 24, 81, 0),
(523, 'Tiruvannamalai (Thiruvannamalai)', 24, 81, 0),
(524, 'Tiruvarur', 24, 81, 0),
(525, 'Vellore', 24, 81, 0),
(526, 'Viluppuram (Villupuram)', 24, 81, 0),
(527, 'Virudhunagar', 24, 81, 0),
(528, 'Dhalai (Ambassa)', 25, 81, 0),
(529, 'Gomati (Udaipur)', 25, 81, 0),
(530, 'Khowai', 25, 81, 0),
(531, 'North Tripura (Dharmanagar)', 25, 81, 0),
(532, 'Sepahijala (Bisramganj)', 25, 81, 0),
(533, 'South Tripura (Belonia)', 25, 81, 0),
(534, 'Unakoti (Kailashahar)', 25, 81, 0),
(535, 'West Tripura (Agartala)', 25, 81, 0),
(536, 'Almora', 26, 81, 0),
(537, 'Bageshwar', 26, 81, 0),
(538, 'Chamoli', 26, 81, 0),
(539, 'Champawat', 26, 81, 0),
(540, 'Dehradun', 26, 81, 0),
(541, 'Haridwar', 26, 81, 0),
(542, 'Nainital', 26, 81, 0),
(543, 'Pauri Garhwal', 26, 81, 0),
(544, 'Pithoragarh', 26, 81, 0),
(545, 'Rudraprayag', 26, 81, 0),
(546, 'Tehri Garhwal', 26, 81, 0),
(547, 'Udham Singh Nagar', 26, 81, 0),
(548, 'Uttarkashi', 26, 81, 0),
(549, 'Agra', 27, 81, 0),
(550, 'Aligarh', 27, 81, 0),
(551, 'Allahabad', 27, 81, 0),
(552, 'Ambedkar Nagar', 27, 81, 0),
(553, 'Amethi (Chatrapati Sahuji Mahraj Nagar)', 27, 81, 0),
(554, 'Amroha (J.P. Nagar)', 27, 81, 0),
(555, 'Auraiya', 27, 81, 0),
(556, 'Azamgarh', 27, 81, 0),
(557, 'Baghpat', 27, 81, 0),
(558, 'Bahraich', 27, 81, 0),
(559, 'Ballia', 27, 81, 0),
(560, 'Balrampur', 27, 81, 0),
(561, 'Banda', 27, 81, 0),
(562, 'Barabanki', 27, 81, 0),
(563, 'Bareilly', 27, 81, 0),
(564, 'Basti', 27, 81, 0),
(565, 'Bijnor', 27, 81, 0),
(566, 'Budaun', 27, 81, 0),
(567, 'Bulandshahr', 27, 81, 0),
(568, 'Chandauli', 27, 81, 0),
(569, 'Chitrakoot', 27, 81, 0),
(570, 'Deoria', 27, 81, 0),
(571, 'Etah', 27, 81, 0),
(572, 'Etawah', 27, 81, 0),
(573, 'Faizabad', 27, 81, 0),
(574, 'Farrukhabad', 27, 81, 0),
(575, 'Fatehpur', 27, 81, 0),
(576, 'Firozabad', 27, 81, 0),
(577, 'Gautam Buddha Nagar (Noida)', 27, 81, 0),
(578, 'Ghaziabad', 27, 81, 0),
(579, 'Ghazipur', 27, 81, 0),
(580, 'Gonda', 27, 81, 0),
(581, 'Gorakhpur', 27, 81, 0),
(582, 'Hamirpur', 27, 81, 0),
(583, 'Hapur (Panchsheel Nagar)', 27, 81, 0),
(584, 'Hardoi', 27, 81, 0),
(585, 'Hathras', 27, 81, 0),
(586, 'Jalaun', 27, 81, 0),
(587, 'Jaunpur', 27, 81, 0),
(588, 'Jhansi', 27, 81, 0),
(589, 'Kannauj', 27, 81, 0),
(590, 'Kanpur Dehat', 27, 81, 0),
(591, 'Kanpur Nagar', 27, 81, 0),
(592, 'Kanshiram Nagar (Kasganj)', 27, 81, 0),
(593, 'Kaushambi', 27, 81, 0),
(594, 'Kushinagar (Padrauna)', 27, 81, 0),
(595, 'Lakhimpur - Kheri', 27, 81, 0),
(596, 'Lalitpur', 27, 81, 0),
(597, 'Lucknow', 27, 81, 0),
(598, 'Maharajganj', 27, 81, 0),
(599, 'Mahoba', 27, 81, 0),
(600, 'Mainpuri', 27, 81, 0),
(601, 'Mathura', 27, 81, 0),
(602, 'Mau', 27, 81, 0),
(603, 'Meerut', 27, 81, 0),
(604, 'Mirzapur', 27, 81, 0),
(605, 'Moradabad', 27, 81, 0),
(606, 'Muzaffarnagar', 27, 81, 0),
(607, 'Pilibhit', 27, 81, 0),
(608, 'Pratapgarh', 27, 81, 0),
(609, 'RaeBareli', 27, 81, 0),
(610, 'Rampur', 27, 81, 0),
(611, 'Saharanpur', 27, 81, 0),
(612, 'Sambhal (Bhim Nagar)', 27, 81, 0),
(613, 'Sant Kabir Nagar', 27, 81, 0),
(614, 'Sant Ravidas Nagar', 27, 81, 0),
(615, 'Shahjahanpur', 27, 81, 0),
(616, 'Shamali (Prabuddh Nagar)', 27, 81, 0),
(617, 'Shravasti', 27, 81, 0),
(618, 'Siddharth Nagar', 27, 81, 0),
(619, 'Sitapur', 27, 81, 0),
(620, 'Sonbhadra', 27, 81, 0),
(621, 'Sultanpur', 27, 81, 0),
(622, 'Unnao', 27, 81, 0),
(623, 'Varanasi', 27, 81, 0),
(624, 'Bankura', 28, 81, 0),
(625, 'Birbhum', 28, 81, 0),
(626, 'Burdwan (Bardhaman)', 28, 81, 0),
(627, 'Cooch Behar', 28, 81, 0),
(628, 'Dakshin Dinajpur (South Dinajpur)', 28, 81, 0),
(629, 'Darjeeling', 28, 81, 0),
(630, 'Hooghly', 28, 81, 0),
(631, 'Howrah', 28, 81, 0),
(632, 'Jalpaiguri', 28, 81, 0),
(633, 'Kolkata', 28, 81, 0),
(634, 'Malda', 28, 81, 0),
(635, 'Murshidabad', 28, 81, 0),
(636, 'Nadia', 28, 81, 0),
(637, 'North 24 Parganas', 28, 81, 0),
(638, 'Paschim Medinipur (West Medinipur)', 28, 81, 0),
(639, 'Purba Medinipur (East Medinipur)', 28, 81, 0),
(640, 'Purulia', 28, 81, 0),
(641, 'South 24 Parganas', 28, 81, 0),
(642, 'Uttar Dinajpur (North Dinajpur)', 28, 81, 0),
(643, 'Nicobar (Car Nicobar)', 29, 81, 0),
(644, 'North and Middle Andaman (Mayabunder)', 29, 81, 0),
(645, 'South Andaman (Port Blair)', 29, 81, 0),
(646, 'Chandigarh', 30, 81, 0),
(647, 'Central Delhi', 31, 81, 0),
(648, 'East Delhi', 31, 81, 1),
(649, 'New Delhi', 31, 81, 0),
(650, 'North Delhi', 31, 81, 0),
(651, 'North East Delhi', 31, 81, 0),
(652, 'North West Delhi', 31, 81, 0),
(653, 'Shahdara', 31, 81, 0),
(654, 'South Delhi', 31, 81, 0),
(655, 'South East Delhi', 31, 81, 0),
(656, 'South West Delhi', 31, 81, 0),
(657, 'West Delhi', 31, 81, 0),
(658, 'Dadra & Nagar Haveli (Silvassa)', 32, 81, 0),
(659, 'Daman', 33, 81, 0),
(660, 'Diu', 33, 81, 0),
(661, 'Lakshadweep (Kavaratti)', 34, 81, 0),
(662, 'Karaikal', 35, 81, 0),
(663, 'Mahe', 35, 81, 0),
(664, 'Pondicherry', 35, 81, 0),
(665, 'Yanam', 35, 81, 0),
(666, 'Adilabad', 36, 81, 0),
(667, 'Hyderabad', 36, 81, 0),
(668, 'Karimnagar', 36, 81, 0),
(669, 'Khammam', 36, 81, 0),
(670, 'Mahabubnagar', 36, 81, 0),
(671, 'Medak (Sangareddi)', 36, 81, 0),
(672, 'Nalgonda', 36, 81, 0),
(673, 'Nizamabad', 36, 81, 0),
(674, 'Rangareddy', 36, 81, 0),
(675, 'Warangal', 36, 81, 0),
(676, 'Vijayawada', 1, 81, 0),
(677, 'Nellore', 1, 81, 0),
(678, 'Rajamundry', 1, 81, 0),
(679, 'Nandyal', 1, 81, 0),
(680, 'Adoni', 1, 81, 0),
(681, 'Tenali', 1, 81, 0),
(682, 'Proddatur', 1, 81, 0),
(683, 'Namsai', 2, 81, 0),
(684, 'Itanagar', 2, 81, 0),
(685, 'Capital Cairo ', 39, 55, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacted_users`
--

CREATE TABLE `contacted_users` (
  `ID` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '0=home & 1=package & 2=book',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `terms_conditions` int(11) NOT NULL COMMENT '1 = read & 0 = not read',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `localIP` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacted_users`
--

INSERT INTO `contacted_users` (`ID`, `type`, `name`, `email`, `mobile_no`, `message`, `terms_conditions`, `created_on`, `modified_on`, `localIP`) VALUES
(1, 0, 'Admin', '', '9763545345', 'a fsdf gsdfg ', 0, '2019-11-12 12:10:32', '2019-11-12 12:10:32', '182.64.166.159'),
(2, 0, 'Admin', 'admin@sunstate.com', '9763545345', 's fsdfg dfg df fg', 0, '2019-11-12 12:29:53', '2019-11-12 12:29:53', '182.64.166.159'),
(3, 0, 'Admin', 'admin@sunstate.com', '9763545345', 'a gdh fhg fgh ghf jgfhj fgh', 0, '2019-11-12 12:32:46', '2019-11-12 12:32:46', '182.64.166.159'),
(4, 0, 'Sam', 'Sam@sunstate.com', '9654342312', 'erry rtyfghjghj ghj Testing', 0, '2019-11-13 05:07:06', '2019-11-13 05:07:06', '182.68.49.140'),
(5, 0, 'Sam', 'Sam@sunstate.com', '9654342312', 'Testing Testing', 0, '2019-11-13 05:23:53', '2019-11-13 05:23:53', '182.68.49.140'),
(6, 0, 'Sam121', 'Sam121@sunstate.com', '9763545345', 'asd fsdg f dfg', 0, '2019-11-13 05:25:29', '2019-11-13 05:25:29', '182.68.49.140'),
(7, 0, 'Sam123', 'Sam123@sunstate.com', '9364345345', ' sdfg dfgh df y rt dfg hfdgh fg', 0, '2019-11-13 05:29:59', '2019-11-13 05:29:59', '182.68.49.140'),
(8, 0, 'Sam125', 'Sam125@sunstate.com', '9364345345', 'fgj fgh jfgh Testing ', 0, '2019-11-13 05:33:21', '2019-11-13 05:33:21', '182.68.49.140'),
(9, 0, 'Sam129', 'Sam129@sunstate.com', '9364345398', 'd gfsgh fg dfgTesting Mail', 0, '2019-11-13 05:39:52', '2019-11-13 05:39:52', '182.68.49.140'),
(10, 0, 'Sam137', 'Sam137@sunstate.com', '9364345398', 'sdf gdfg sdfTesting', 0, '2019-11-13 05:41:37', '2019-11-13 05:41:37', '182.68.49.140'),
(11, 0, 'Sam138', 'Sam138@sunstate.com', '9864534531', 'xd gdfgh fdh fhg ghTesting', 0, '2019-11-13 05:44:12', '2019-11-13 05:44:12', '182.68.49.140'),
(12, 0, 'Sam132', 'Sam132@sunstate.com', '9654342387', 'fg dfg df dfgh fdgh', 0, '2019-11-13 05:46:45', '2019-11-13 05:46:45', '182.68.49.140'),
(13, 0, 'Sam111', 'Sam111@sunstate.com', '9364345345', ' sdfg sdfg sdfg sdfg sdf', 0, '2019-11-13 05:50:27', '2019-11-13 05:50:27', '182.68.49.140'),
(14, 0, 'Admin', 'dhanwantriarun@gmail.com', '9364345345', 'st bdfg fdg', 0, '2019-11-13 05:50:46', '2019-11-13 05:50:46', '182.68.49.140'),
(15, 0, ' Sam Admin', 'Sam_admin@sunstate.com', '9763545345', 'sdfg df gdf gfdg hfgh fg', 0, '2019-11-13 05:55:24', '2019-11-13 05:55:24', '182.68.49.140'),
(16, 0, 'Sam Admin', 'Sam_Admin123@gmail.com', '9645342312', 'dfg dfg fgh Testing Testing Tesing', 0, '2019-11-13 05:57:23', '2019-11-13 05:57:23', '182.68.49.140'),
(17, 0, 'Sam Kumar', 'dhanwantriarun@gmail.com', '7530888707', 'Testing', 0, '2019-11-18 06:23:27', '2019-11-18 06:23:27', '182.64.55.96'),
(18, 0, 'sdfsd', 'sdsd@gmail.com', '701133733', 'sdf sadf df', 0, '2019-12-19 05:11:18', '2019-12-19 05:11:18', '182.64.43.228'),
(19, 1, '', 'dhanwantriarun@gmail.com', '7530888707', '', 1, '2019-12-23 07:48:01', '2019-12-23 07:48:01', '117.97.141.85'),
(20, 1, '', 'dhanwantriarun@gmail.com', '7530888707', '', 1, '2019-12-23 07:50:59', '2019-12-23 07:50:59', '117.97.141.85'),
(21, 0, 'fdh', 'dhanwantriarun@gmail.com', '7530888707', 'dfgh fdgh fdgh', 0, '2019-12-23 07:56:33', '2019-12-23 07:56:33', '117.97.141.85'),
(22, 1, '', 'dhanwantriarun@gmail.com', '7530888707', '', 1, '2019-12-24 05:34:08', '2019-12-24 05:34:08', '182.64.32.209'),
(24, 2, '', 'dhanwantriarun@gmail.com', '7530888707', '', 1, '2019-12-24 06:26:51', '2019-12-24 06:26:51', '182.64.32.209'),
(25, 2, '', 'sdfsd@gmail.com', '9746545645', '', 1, '2019-12-26 07:14:06', '2019-12-26 07:14:06', '182.68.79.73');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`ID`, `name`, `status`) VALUES
(1, 'Afghanistan', 1),
(2, 'Albania', 1),
(3, 'Algeria', 1),
(4, 'Andorra', 0),
(5, 'Angola', 0),
(6, 'Antigua and Barbuda', 0),
(7, 'Armenia', 0),
(8, 'Aruba', 0),
(9, 'Australia', 0),
(10, 'Austria', 0),
(11, 'Azerbaijan', 0),
(12, 'Bahamas, The', 0),
(13, 'Bahrain', 0),
(14, 'Bangladesh', 0),
(15, 'Barbados', 0),
(16, 'Belarus', 0),
(17, 'Belgium', 0),
(18, 'Belize', 0),
(19, 'Benin', 0),
(20, 'Bermuda', 0),
(21, 'Bhutan-NDE', 0),
(22, 'Bolivia', 0),
(23, 'Bosnia and Herzegovina', 0),
(24, 'Botswana', 0),
(25, 'Brazil', 0),
(26, 'Brunei', 0),
(27, 'Bulgaria', 0),
(28, 'Burkina Faso', 0),
(29, 'Cambodia', 0),
(30, 'Cameroon', 0),
(31, 'Canada', 0),
(32, 'Cape Verde', 0),
(33, 'Central African Republic', 0),
(34, 'Chad', 0),
(35, 'Chile', 0),
(36, 'China', 0),
(37, 'Colombia', 0),
(38, 'Comoros', 0),
(39, 'Congo, Democratic Republic of the', 0),
(40, 'Congo, Republic of the', 0),
(41, 'Cook Islands', 0),
(42, 'Costa Rica', 0),
(43, 'Cote d\'Ivoire', 0),
(44, 'Croatia', 0),
(45, 'Cuba--NDE', 0),
(46, 'Cyprus', 0),
(47, 'Czech Republic', 0),
(48, 'Burma', 0),
(49, 'Burundi', 0),
(50, 'Denmark', 0),
(51, 'Djibouti', 0),
(52, 'Dominica', 0),
(53, 'Dominican Republic', 0),
(54, 'Ecuador', 0),
(55, 'Egypt', 1),
(56, 'El Salvador', 0),
(57, 'Equatorial Guinea', 0),
(58, 'Eritrea', 1),
(59, 'Estonia', 0),
(60, 'Ethiopia', 0),
(61, 'Fiji', 0),
(62, 'Finland', 0),
(63, 'France', 0),
(64, 'Gabon', 0),
(65, 'Gambia', 1),
(66, 'Georgia', 0),
(67, 'Germany', 0),
(68, 'Ghana', 0),
(69, 'Greece', 0),
(70, 'Grenada', 1),
(71, 'Guatemala', 0),
(72, 'Guinea', 0),
(73, 'Guinea-Bissau', 0),
(74, 'Guyana', 0),
(75, 'Haiti', 0),
(76, 'Vatican City (Holy See)', 0),
(77, 'Honduras', 0),
(78, 'Hungary', 1),
(79, 'Iceland', 0),
(80, 'Indonesia ', 1),
(81, 'India', 1),
(82, 'Iran-NDE', 0),
(83, 'Iraq', 1),
(84, 'Ireland', 1),
(85, 'Israel', 0),
(86, 'Italy', 1),
(87, 'Jamaica', 0),
(88, 'Japan', 1),
(89, 'Jordan', 0),
(90, 'Kazakhstan', 0),
(91, 'Kenya', 0),
(92, 'Kiribati', 0),
(93, 'Korea, North-NDE', 0),
(94, 'Korea, South', 0),
(95, 'Kosovo', 0),
(96, 'Kuwait', 0),
(97, 'Kyrgyzstan', 0),
(98, 'Laos', 1),
(99, 'Latvia', 0),
(100, 'Lebanon', 1),
(101, 'Lesotho', 0),
(102, 'Liberia', 0),
(103, 'Libya', 0),
(104, 'Liechtenstein', 0),
(105, 'Lithuania', 0),
(106, 'Luxembourg', 0),
(107, 'Macedonia', 0),
(108, 'Madagascar', 0),
(109, 'Malawi', 0),
(110, 'Malaysia', 0),
(111, 'Maldives', 0),
(112, 'Mali', 0),
(113, 'Malta', 0),
(114, 'Marshall Islands', 0),
(115, 'Mauritania', 0),
(116, 'Mauritius', 0),
(117, 'Mexico', 0),
(118, 'Micronesia, Federated States of', 0),
(119, 'Moldova', 0),
(120, 'Monaco', 0),
(121, 'Mongolia', 0),
(122, 'Montenegro', 0),
(123, 'Morocco', 0),
(124, 'Mozambique', 0),
(125, 'Namibia', 0),
(126, 'Nauru', 0),
(127, 'Nepal', 0),
(128, 'Netherlands', 0),
(129, 'New Zealand', 0),
(130, 'Nicaragua', 0),
(131, 'Niger', 0),
(132, 'Nigeria', 0),
(133, 'Norway', 0),
(134, 'Oman', 0),
(135, 'Pakistan', 0),
(136, 'Palau', 0),
(137, 'Panama', 0),
(138, 'Papua New Guinea', 0),
(139, 'Paraguay', 0),
(140, 'Peru', 0),
(141, 'Philippines', 0),
(142, 'Poland', 0),
(143, 'Portugal', 0),
(144, 'Qatar', 0),
(145, 'Romania', 0),
(146, 'Russia', 0),
(147, 'Rwanda', 0),
(148, 'Saint Kitts and Nevis', 0),
(149, 'Saint Lucia', 0),
(150, 'Saint Vincent and the Grenadines', 0),
(151, 'Samoa', 0),
(152, 'San Marino', 0),
(153, 'Sao Tome and Principe', 0),
(154, 'Saudi Arabia', 0),
(155, 'Senegal', 0),
(156, 'Serbia', 0),
(157, 'Seychelles', 0),
(158, 'Sierra Leone', 0),
(159, 'Singapore', 0),
(160, 'Slovakia', 0),
(161, 'Slovenia', 0),
(162, 'Solomon Islands', 0),
(163, 'Somalia', 0),
(164, 'South Africa', 0),
(165, 'South Sudan', 0),
(166, 'Spain', 0),
(167, 'Sri Lanka', 0),
(168, 'Sudan', 0),
(169, 'Suriname', 0),
(170, 'Swaziland', 0),
(171, 'Sweden', 0),
(172, 'Switzerland', 0),
(173, 'Syria', 0),
(174, 'Taiwan-NDE', 0),
(175, 'Tajikistan', 0),
(176, 'Tanzania', 0),
(177, 'Thailand', 0),
(178, 'Timor-Leste', 0),
(179, 'Togo', 0),
(180, 'Tonga', 0),
(181, 'Trinidad and Tobago', 0),
(182, 'Tunisia', 0),
(183, 'Turkey', 0),
(184, 'Turkmenistan', 0),
(185, 'Tuvalu', 0),
(186, 'Uganda', 0),
(187, 'Ukraine', 0),
(188, 'United Arab Emirates', 0),
(189, 'United Kingdom', 0),
(190, 'Uruguay', 1),
(191, 'Uzbekistan', 1),
(192, 'Vanuatu', 1),
(193, 'Venezuela', 1),
(194, 'Vietnam', 1),
(195, 'Yemen', 1),
(196, 'Zambia', 1),
(197, 'Zimbabwe', 1),
(198, 'USA', 1),
(199, 'Argentina', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `ID` int(11) NOT NULL,
  `couponID` varchar(255) NOT NULL,
  `productID` varchar(255) NOT NULL,
  `coupon` varchar(100) NOT NULL,
  `d_price` int(11) NOT NULL COMMENT 'discount price',
  `narration` text NOT NULL,
  `e_date` datetime NOT NULL COMMENT 'entry date',
  `exp_date` datetime NOT NULL COMMENT 'expiry date',
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `custom_tour`
--

CREATE TABLE `custom_tour` (
  `ID` int(11) NOT NULL,
  `doa` varchar(255) NOT NULL COMMENT 'date of arrival',
  `departure_date` varchar(255) NOT NULL,
  `adults` int(11) NOT NULL COMMENT 'adults ( 12+ Years )',
  `children_above_5` int(11) NOT NULL COMMENT 'children 12 + Years',
  `children_below_5` int(11) NOT NULL COMMENT 'children 0-5 Years',
  `accomodation_type` varchar(255) NOT NULL COMMENT 'luxury or star rating',
  `budget` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country_residence` varchar(255) NOT NULL,
  `country_mobile_no_code` int(11) NOT NULL COMMENT 'country mobile no code',
  `mobile_no` varchar(255) NOT NULL,
  `description` int(11) NOT NULL COMMENT 'where you want to go',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custom_tour`
--

INSERT INTO `custom_tour` (`ID`, `doa`, `departure_date`, `adults`, `children_above_5`, `children_below_5`, `accomodation_type`, `budget`, `name`, `email`, `country_residence`, `country_mobile_no_code`, `mobile_no`, `description`, `created_at`, `updated_at`) VALUES
(1, '12-10-2020', '15-10-2020', 30, 18, 8, '5 Star', 'price-b2', 'sam', 'sam@gmail.com', 'Austria', 0, '9987764465', 0, '2020-01-20 05:51:53', '2020-01-20 05:51:53'),
(2, '12-10-2020', '15-10-2020', 18, 12, 4, '4 Star', 'price-b2', 'sam', 'sam@gmail.com', 'Aruba', 0, '9987764465', 0, '2020-01-20 05:54:23', '2020-01-20 05:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `departure_city`
--

CREATE TABLE `departure_city` (
  `ID` int(11) NOT NULL,
  `package_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `city_id` varchar(255) NOT NULL,
  `std_price` varchar(255) NOT NULL COMMENT 'standard_price',
  `final_price` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departure_city`
--

INSERT INTO `departure_city` (`ID`, `package_id`, `name`, `slug`, `cost`, `city_id`, `std_price`, `final_price`, `active`, `created_at`, `updated_at`) VALUES
(1, '', 'Join Directly', 'join-directly', '00', '', '', '', 1, '2020-01-02 06:01:40', '2020-01-02 06:01:40'),
(2, '', 'Delhi', 'delhi', '00', '', '', '', 1, '2020-01-02 06:01:54', '2020-01-02 06:01:54'),
(3, '', 'Kolkata', 'kolkata', '5000', '', '', '', 1, '2020-01-02 06:02:17', '2020-01-02 06:02:17'),
(4, '', 'Bengaluru', 'bengaluru', '3000', '', '', '', 1, '2020-01-02 06:02:55', '2020-01-02 06:02:55'),
(5, '', 'Mumbai', 'mumbai', '6000', '', '', '', 1, '2020-01-02 06:03:10', '2020-01-02 06:03:10'),
(7, '20', 'sdfgsdfg', 'sdfgsdfg', '90', '', '', '', 1, '2020-01-02 08:57:41', '2020-01-02 08:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `ID` int(11) NOT NULL,
  `enquiryID` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `ID` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` mediumtext NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`ID`, `heading`, `name`, `slug`, `short_description`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Andhra', 'Andhra', 'andhra', 'sdg sfg sdfgdf', 'Planning a trip? Worried about how to do it? So here we are to help you out to plan your trip to India. We offer the best family tours and honeymoon packages. With our vacation planner in India, you can get customizable holiday packages among varied themes.', '1578401225gallery_image1506297917.jpg', 1, '2020-01-07 12:47:05', '2020-01-10 09:27:50'),
(3, 'Bandra', 'Bandra', 'bandra', ' sdfg sdfg sdfg sfdg', 'Planning a trip? Worried about how to do it? So here we are to help you out to plan your trip to India. We offer the best family tours and honeymoon packages. With our vacation planner in India, you can get customizable holiday packages among varied themes.', '1578401264gallery_image672253717.jpg', 1, '2020-01-07 12:47:44', '2020-01-10 09:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `icon` text NOT NULL,
  `e_date` datetime NOT NULL,
  `u_date` datetime NOT NULL,
  `active` tinyint(4) NOT NULL,
  `dataset` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`ID`, `name`, `slug`, `image`, `icon`, `e_date`, `u_date`, `active`, `dataset`) VALUES
(1, 'cab', 'cab', '1566372222icon1778695601.png', '', '2019-08-21 12:53:42', '2019-08-24 05:58:09', 1, '{\"route\":\"facility_icons\",\"ed\":\"74\",\"name\":\"car\",\"old_icon\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"PHPSESSID\":\"5263aa1db9433229398a2ac38b0cfcb8\"}'),
(2, 'parking', 'parking', '1566372284icon1165367484.png', '', '2019-08-21 12:54:44', '2019-08-24 05:58:18', 1, '{\"route\":\"facility_icons\",\"name\":\"parked car\",\"old_icon\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"PHPSESSID\":\"5263aa1db9433229398a2ac38b0cfcb8\"}'),
(3, 'food', 'food', '1566372295icon2096520701.png', '', '2019-08-21 12:54:55', '2019-12-16 09:30:58', 1, '{\"route\":\"facility_icons\",\"name\":\"room service\",\"old_icon\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"PHPSESSID\":\"5263aa1db9433229398a2ac38b0cfcb8\"}'),
(4, 'hotel', 'hotel', '1566372304icon365581014.png', '', '2019-08-21 12:55:04', '0000-00-00 00:00:00', 1, '{\"route\":\"facility_icons\",\"name\":\"hotel\",\"old_icon\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"PHPSESSID\":\"5263aa1db9433229398a2ac38b0cfcb8\"}'),
(5, 'flight', 'flight', '1566372312icon1351707446.png', '', '2019-08-21 12:55:12', '2019-08-24 05:56:36', 1, '{\"route\":\"facility_icons\",\"name\":\"departures\",\"old_icon\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"humans_21909\":\"1\",\"PHPSESSID\":\"5263aa1db9433229398a2ac38b0cfcb8\"}'),
(6, 'volvo ', 'volvo-', '1576511999icon47179892.png', '', '2019-12-16 09:29:59', '2019-12-16 09:31:22', 1, '{\"route\":\"facility_icons\",\"name\":\"Volvo Bus\",\"old_icon\":\"\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::wRY/mkYwY8cj sc517epyt/LK7Qa1bDlIcl2vevMipxliHCkjysVzptR yoXM5cy::2\",\"PHPSESSID\":\"d6d3999145febd79bd4503472a51891e\",\"TawkConnectionTime\":\"0\"}');

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE `mst_user` (
  `ID` int(11) NOT NULL,
  `usrID` varchar(255) NOT NULL,
  `usertype` enum('M','V','C','') NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `active` tinyint(4) NOT NULL,
  `valid_upto` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`ID`, `usrID`, `usertype`, `name`, `password`, `email`, `phone`, `image`, `active`, `valid_upto`) VALUES
(1, 'abcd', 'M', 'shahwaj', '12345', 'shahwaj@hillstraveler.com', '7838418197', '', 1, '2019-11-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `onrent`
--

CREATE TABLE `onrent` (
  `ID` int(11) NOT NULL,
  `rentID` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1=Car,2=Bike,3=Other',
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `Narration` longtext NOT NULL,
  `off_price` longtext NOT NULL,
  `active` tinyint(4) NOT NULL,
  `e_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onrent`
--

INSERT INTO `onrent` (`ID`, `rentID`, `type`, `name`, `image`, `Narration`, `off_price`, `active`, `e_date`) VALUES
(1, '9FCA80F3-EAC1-4866-A8EA-08C694396C8C', 1, 'tata sumo', '1557489576image1854701145.png', 'Book your Ahmedabad Airport Drop and get Rs100 Off', 'Flat Rs100/- Off on AMD Airport Drops', 1, '2019-05-10 05:29:36'),
(2, '9BB4CA70-4C1C-42D4-9A2B-778228AADCE4', 2, 'Yamaha', '1557490020image81780311.png', 'Book your Ahmedabad Airport Drop and get Rs100 Off', 'Flat Rs100/- Off on AMD Airport Drops', 1, '2019-05-10 05:36:59'),
(5, '27C225EA-CB6C-43E5-958B-170396FAEE00', 1, 'Safari', '1571122636image492648832.jpg', 'The Diesel engine is 2179 cc. It is available with the Manual transmission. Depending upon the variant and fuel type the Safari Storme has a mileage of 14.1 kmpl.\r\n', 'Flat Rs 1000/- Off on AMD Airport Drops\r\n', 1, '2019-10-15 12:27:16'),
(6, '7DE74C26-7FE2-42DB-88D0-3E903FE48FE5', 1, 'Maruti Swift Dzire', '1572594287image164212429.Swift-Dzire', '5 Seat Capacity ', '2000 Per Day ', 1, '2019-11-01 01:14:47');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `ID` int(11) NOT NULL,
  `categoryID` varchar(255) NOT NULL,
  `childcatID` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `days` varchar(255) NOT NULL,
  `night` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `standard_price` double(9,2) NOT NULL,
  `luxury_price` double(9,2) NOT NULL,
  `premium_price` double(9,2) NOT NULL,
  `icons` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `Narration` longtext NOT NULL,
  `deal` longtext NOT NULL,
  `day1` longtext NOT NULL,
  `view_all` longtext NOT NULL,
  `package_include` longtext NOT NULL,
  `honeymoon_include` longtext NOT NULL,
  `slug` varchar(255) NOT NULL,
  `bank_detail` longtext NOT NULL,
  `payment_policy` varchar(255) NOT NULL,
  `term_condition` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `e_date` datetime NOT NULL,
  `u_date` datetime NOT NULL,
  `localIP` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`ID`, `categoryID`, `childcatID`, `heading`, `name`, `days`, `night`, `tag`, `standard_price`, `luxury_price`, `premium_price`, `icons`, `image`, `Narration`, `deal`, `day1`, `view_all`, `package_include`, `honeymoon_include`, `slug`, `bank_detail`, `payment_policy`, `term_condition`, `active`, `e_date`, `u_date`, `localIP`) VALUES
(19, '1', '6', 'Exotic Malana ', 'Exotic Malana ', '5', '5', '', 0.00, 0.00, 0.00, '1,3,2', '1576752092image1245779373.bmp', 'Religion\r\nAccording to 2011 census, the majority religion of the city is Hinduism practised by 93.5% of the population, followed by Islam (2.29%), Sikhism (1.95%), Buddhism (1.33%), Christianity (0.62%), and Jainism (0.10%).[citation needed]\r\n\r\nCulture', '', '<p>he area of present-day Shimla was invaded and captured by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bhimsen_Thapa\">Bhimsen Thapa</a>&nbsp;of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Nepal\">Nepal</a>&nbsp;in 1806. The&nbsp;<a href=\"https://en.wikipedia.org/wiki/British_East_India_Company\">British East India Company</a>&nbsp;took control of the territory as per the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Sugauli_Treaty\">Sugauli Treaty</a>&nbsp;after the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Anglo-Nepalese_War\">Anglo-Nepalese War</a>&nbsp;(1814&ndash;16). The&nbsp;<a href=\"https://en.wikipedia.org/wiki/Gurkha\">Gurkha</a>&nbsp;leaders were quelled by storming the fort of Malaun under the command of David Ochterlony in May 1815. In a diary entry dated 30 August 1817, the Gerard brothers, who surveyed the area, describe Shimla as &quot;a middling-sized village where a fakir is situated to give water to the travellers&quot;. In 1819, Lieutenant Ross, the Assistant Political Agent in the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Hill_States_of_India\">Hill States</a>, set up a wood cottage in Shimla. Three years later, his successor and the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Scotland\">Scottish</a>&nbsp;civil servant&nbsp;<a href=\"https://en.wikipedia.org/wiki/Charles_Pratt_Kennedy\">Charles Pratt Kennedy</a>&nbsp;built the first&nbsp;<a href=\"https://en.wikipedia.org/wiki/Pucca_housing\">pucca house</a>&nbsp;in the area in 1822, near&nbsp;<a href=\"https://en.wikipedia.org/wiki/Annadale,_Shimla\">Annadale</a>, what is now the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Himachal_Pradesh_Legislative_Assembly\">Himachal Pradesh Legislative Assembly</a>&nbsp;building. The accounts of the Britain-like climate started attracting several British officers to the area during the hot Indian summers. By 1826, some officers had started spending their entire vacation in Shimla. In 1827,&nbsp;<a href=\"https://en.wikipedia.org/wiki/William_Amherst,_1st_Earl_Amherst\">Lord Amherst</a>, the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Governor-General_of_Bengal\">Governor-General of Bengal</a>, visited Shimla and stayed in the Kennedy House. A year later,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Stapleton_Cotton,_1st_Viscount_Combermere\">Lord Combermere</a>, the Commander-in-Chief of the British forces in India, stayed at the same residence. During his stay, a three-mile road and a bridge were constructed near&nbsp;<a href=\"https://en.wikipedia.org/wiki/Jakhoo\">Jakhoo</a>. In 1830, the British acquired the surrounding land from the chiefs of Keonthal and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Patiala\">Patiala</a>&nbsp;in exchange for the Rawin&nbsp;<a href=\"https://en.wikipedia.org/wiki/Pargana\">pargana</a>&nbsp;and a portion of the Bharauli pargana. The settlement grew rapidly after this, from 30 houses in 1830 to 1,141 houses in 1881.<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-Vipin1996-8\">[8</a></p>\r\n', '', '<p>Demographics</p>\r\n\r\n<p>Population</p>\r\n\r\n<p>According to 2011 census, Shimla city spread over an area of 35.34&nbsp;km2&nbsp;had a population of 169,578 with 93,152 males and 76,426 females.<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-SMLA-2\">[2]</a><a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-SML-3\">[3]</a>&nbsp;Shimla urban agglomeration had a population of 171,817 as per provisional data of 2011 census, out of which males were 94,797 and females were 77,020.<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-SM-45\">[45]</a>&nbsp;The effective literacy rate of city was 93.63 percent<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-SML-3\">[3]</a>&nbsp;and that of urban agglomeration was 94.14 per cent.<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-SM-45\">[45]</a></p>\r\n\r\n<p>The city area has increased considerably along with passage of time. It has stretched from Hiranagar to Dhalli from one side &amp; from Tara Devi to Malyana in the other. As per the 2001 India Census,<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-46\">[46]</a>&nbsp;the city has a population of 142,161 spread over an area of 19.55&nbsp;km&sup2;.<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-mcshimla-20\">[20]</a>&nbsp;A floating population of 75,000 is attributed to service industries such as tourism.<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-mcshimla-20\">[20]</a>&nbsp;The largest demographic, 55%, is 16&ndash;45 years of age. A further 28% of the population are younger than 15 years. The low&nbsp;<a href=\"https://en.wikipedia.org/wiki/Human_sex_ratio\">sex ratio</a>&nbsp;&ndash; 930 girls for every 1,000 boys in 2001<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-47\">[47]</a>&nbsp;&ndash; is cause for concern, and much lower than the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Himachal_Pradesh#Demographics\">974 versus 1,000</a>&nbsp;for Himachal Pradesh state as a whole.</p>\r\n\r\n<p>The unemployment rate in the city has come down from 36% in 1992 to 22.6% in 2006. This drop is attributed to recent industrialisation, the growth of service industries, and knowledge development.<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-48\">[48]</a></p>\r\n\r\n<p>Language</p>\r\n\r\n<p><a href=\"https://en.wikipedia.org/wiki/Hindi\">Hindi</a>&nbsp;is the</p>\r\n\r\n<p>Demographics[<a href=\"https://en.wikipedia.org/w/index.php?title=Shimla&amp;action=edit&amp;section=6\">edit</a>]</p>\r\n\r\n<p>Population[<a href=\"https://en.wikipedia.org/w/index.php?title=Shimla&amp;action=edit&amp;section=7\">edit</a>]</p>\r\n\r\n<p>According to 2011 census, Shimla city spread over an area of 35.34&nbsp;km2&nbsp;had a population of 169,578 with 93,152 males and 76,426 females.<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-SMLA-2\">[2]</a><a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-SML-3\">[3]</a>&nbsp;Shimla urban agglomeration had a population of 171,817 as per provisional data of 2011 census, out of which males were 94,797 and females were 77,020.<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-SM-45\">[45]</a>&nbsp;The effective literacy rate of city was 93.63 percent<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-SML-3\">[3]</a>&nbsp;and that of urban agglomeration was 94.14 per cent.<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-SM-45\">[45]</a></p>\r\n\r\n<p>The city area has increased considerably along with passage of time. It has stretched from Hiranagar to Dhalli from one side &amp; from Tara Devi to Malyana in the other. As per the 2001 India Census,<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-46\">[46]</a>&nbsp;the city has a population of 142,161 spread over an area of 19.55&nbsp;km&sup2;.<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-mcshimla-20\">[20]</a>&nbsp;A floating population of 75,000 is attributed to service industries such as tourism.<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-mcshimla-20\">[20]</a>&nbsp;The largest demographic, 55%, is 16&ndash;45 years of age. A further 28% of the population are younger than 15 years. The low&nbsp;<a href=\"https://en.wikipedia.org/wiki/Human_sex_ratio\">sex ratio</a>&nbsp;&ndash; 930 girls for every 1,000 boys in 2001<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-47\">[47]</a>&nbsp;&ndash; is cause for concern, and much lower than the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Himachal_Pradesh#Demographics\">974 versus 1,000</a>&nbsp;for Himachal Pradesh state as a whole.</p>\r\n\r\n<p>The unemployment rate in the city has come down from 36% in 1992 to 22.6% in 2006. This drop is attributed to recent industrialisation, the growth of service industries, and knowledge development.<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-48\">[48]</a></p>\r\n\r\n<p>Language[<a href=\"https://en.wikipedia.org/w/index.php?title=Shimla&amp;action=edit&amp;section=8\">edit</a>]</p>\r\n\r\n<p><a href=\"https://en.wikipedia.org/wiki/Hindi\">Hindi</a>&nbsp;is the&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Lingua_franca\">lingua franca</a></em>&nbsp;of the city, it is the principal spoken language of the city and also the most commonly used language for the official purposes. English is also spoken by a sizeable population, and is the second official language of the city. Other than Hindi,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Himachali_languages\">Pahari languages</a>&nbsp;are spoken by the ethnic Pahari people, who form a major part of the population in the city.&nbsp;<a href=\"https://en.wikipedia.org/wiki/Punjabi_language\">Punjabi language</a>&nbsp;is prevalent among the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Punjabi_people\">ethnic Punjabi</a>&nbsp;migrant population of the city, most of whom are refugees from&nbsp;<a href=\"https://en.wikipedia.org/wiki/West_Punjab\">West Punjab</a>, who settled in the city after the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Partition_of_India\">Partition of India</a>&nbsp;in 1947.</p>\r\n\r\n<p>Religion</p>\r\n\r\n<p><em><a href=\"https://en.wikipedia.org/wiki/Lingua_franca\">lingua franca</a></em>&nbsp;of the city, it is the principal spoken language of the city and also the most commonly used language for the official purposes. English is also spoken by a sizeable population, and is the second official language of the city. Other than Hindi,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Himachali_languages\">Pahari languages</a>&nbsp;are spoken by the ethnic Pahari people, who form a major part of the population in the city.&nbsp;<a href=\"https://en.wikipedia.org/wiki/Punjabi_language\">Punjabi language</a>&nbsp;is prevalent among the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Punjabi_people\">ethnic Punjabi</a>&nbsp;migrant population of the city, most of whom are refugees from&nbsp;<a href=\"https://en.wikipedia.org/wiki/West_Punjab\">West Punjab</a>, who settled in the city after the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Partition_of_India\">Partition of India</a>&nbsp;in 1947.</p>\r\n\r\n<p>Religion</p>\r\n', '<p>Demographics</p>\r\n\r\n<p>Population</p>\r\n\r\n<p>According to 2011 census, Shimla city spread over an area of 35.34&nbsp;km2&nbsp;had a population of 169,578 with 93,152 males and 76,426 females.<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-SMLA-2\">[2]</a><a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-SML-3\">[3]</a>&nbsp;Shimla urban agglomeration had a population of 171,817 as per provisional data of 2011 census, out of which males were 94,797 and females were 77,020.<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-SM-45\">[45]</a>&nbsp;The effective literacy rate of city was 93.63 percent<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-SML-3\">[3]</a>&nbsp;and that of urban agglomeration was 94.14 per cent.<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-SM-45\">[45]</a></p>\r\n\r\n<p>The city area has increased considerably along with passage of time. It has stretched from Hiranagar to Dhalli from one side &amp; from Tara Devi to Malyana in the other. As per the 2001 India Census,<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-46\">[46]</a>&nbsp;the city has a population of 142,161 spread over an area of 19.55&nbsp;km&sup2;.<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-mcshimla-20\">[20]</a>&nbsp;A floating population of 75,000 is attributed to service industries such as tourism.<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-mcshimla-20\">[20]</a>&nbsp;The largest demographic, 55%, is 16&ndash;45 years of age. A further 28% of the population are younger than 15 years. The low&nbsp;<a href=\"https://en.wikipedia.org/wiki/Human_sex_ratio\">sex ratio</a>&nbsp;&ndash; 930 girls for every 1,000 boys in 2001<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-47\">[47]</a>&nbsp;&ndash; is cause for concern, and much lower than the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Himachal_Pradesh#Demographics\">974 versus 1,000</a>&nbsp;for Himachal Pradesh state as a whole.</p>\r\n\r\n<p>The unemployment rate in the city has come down from 36% in 1992 to 22.6% in 2006. This drop is attributed to recent industrialisation, the growth of service industries, and knowledge development.<a href=\"https://en.wikipedia.org/wiki/Shimla#cite_note-48\">[48]</a></p>\r\n\r\n<p>Language[<a href=\"https://en.wikipedia.org/w/index.php?title=Shimla&amp;action=edit&amp;section=8\">edit</a>]</p>\r\n\r\n<p><a href=\"https://en.wikipedia.org/wiki/Hindi\">Hindi</a>&nbsp;is the&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Lingua_franca\">lingua franca</a></em>&nbsp;of the city, it is the principal spoken language of the city and also the most commonly used language for the official purposes. English is also spoken by a sizeable population, and is the second official language of the city. Other than Hindi,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Himachali_languages\">Pahari languages</a>&nbsp;are spoken by the ethnic Pahari people, who form a major part of the population in the city.&nbsp;<a href=\"https://en.wikipedia.org/wiki/Punjabi_language\">Punjabi language</a>&nbsp;is prevalent among the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Punjabi_people\">ethnic Punjabi</a>&nbsp;migrant population of the city, most of whom are refugees from&nbsp;<a href=\"https://en.wikipedia.org/wiki/West_Punjab\">West Punjab</a>, who settled in the city after the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Partition_of_India\">Partition of India</a>&nbsp;in 1947.</p>\r\n\r\n<p>Religion</p>\r\n', 'exotic-malana-', '', '', '', 1, '2019-12-27 02:43:05', '0000-00-00 00:00:00', ''),
(17, '1', '6', 'Exotic Shimla To Mussorie', 'Exotic Shimla To Mussorie', '6', '5', 'couples,honeymoon', 0.00, 0.00, 0.00, '1,3', '1576748516image1376902017.jpg', 'Shimla And Mussorie are both is a beautiful Hill station in the lap of Himachal Pradesh and is also its capital. It is located at an altitude of 2213 m. Shimla derives its name from goddess another form of Goddess Kali. Shimla has been blessed with natural beauty and is surrounded by green pastures and snow-capped peaks', 'open deal 20 % OFF', '\r\nShimla is a beautiful Hill station in the lap of Himachal Pradesh and is also its capital. It is located at an altitude of 2213 m. Shimla derives its name from goddess another form of Goddess Kali. Shimla has been blessed with natural beauty and is surrounded by green pastures and snow-capped peaks\r\n\r\n', '', '\r\nShimla is a beautiful Hill station in the lap of Himachal Pradesh and is also its capital. It is located at an altitude of 2213 m. Shimla derives its name from goddess another form of Goddess Kali. Shimla has been blessed with natural beauty and is surrounded by green pastures and snow-capped peaks\r\n\r\n', '\r\nMussorie is a beautiful Hill station in the lap of Himachal Pradesh and is also its capital. It is located at an altitude of 2213 m. Shimla derives its name from goddess another form of Goddess Kali. Shimla has been blessed with natural beauty and is surrounded by green pastures and snow-capped peaks\r\n\r\n', '', '', '\r\nCash', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(20, '1', '6', 'Exotic Kullu ', 'Exotic Kullu ', '5', '4', 'couples,hill station,popular', 0.00, 0.00, 0.00, '1,3,2', '1577441491image602926667.jpg', 'In the eastern part of the district, the village of Manikaran contains Sikh and Hindu temples and popular hot springs. The Hidimba Devi Temple is at Manali. There are also many Sikh villages located close to Manikaran. To the northeast of Kullu Valley, lies the famous, Malana Valley.', 'Off Season 40% Off', '<p><strong>Kullu</strong>&nbsp;is a&nbsp;<a href=\"https://en.wikipedia.org/wiki/District\">district</a>&nbsp;in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Himachal_Pradesh\">Himachal Pradesh</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/India\">India</a>. The district lies in central Himachal and is famous for its tourist stations and Himalayan Treks connecting the trails with far remote regions between the adjacent districts of Lahaul and Spiti, Kinnaur , Mandi and Kangra districts which are bordered at North - North East , East , West and South Of Kullu respectively. The District is also a home to some of the Ancient settlements, Traditional Handloom and Apple Cultivation. It stretches from the Town of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Rampur,_Himachal_Pradesh\">Rampur</a>&nbsp;in the south to the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Rohtang_Pass\">Rohtang Pass</a>&nbsp;in the North. The Main Kullu Valley which falls between the Pir Panjal Himalayas and Northern Edge Of The Dhauladhar or Bhangal Region lies at an elevation ranging from as less as 833 M to 3330 M from Aut Tunnel North Portal ( Some areas meshed in Mandi District Administrative Limits ) to Rohtang Tunnel South Portal On NH 3 and NH 505.</p>\r\n', '', '', '<p>The British took all of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Kangra,_Himachal_Pradesh\">Kangra</a>&nbsp;and Kullu from the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Sikhs\">Sikhs</a>&nbsp;in 1846. It is still used as home by the royal descendants, but the more ancient Naggar Castle was sold to the British.</p>\r\n', 'exotic-kullu-', '', '<p>Since the onset of the most recent unrest in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Kashmir\">Kashmir</a>, Manali and the Kullu Valley in general, have become important destinations for tourists escaping the summer heat of India.</p>\r\n', '<p>Please read the following&nbsp;<em>terms</em>&nbsp;and&nbsp;<em>conditions</em>&nbsp;carefully as it sets out the&nbsp;<em>terms</em>&nbsp;of a legally binding agreement between you (the reader) and Business Standard</p>\r\n', 1, '2019-12-27 03:41:31', '0000-00-00 00:00:00', ''),
(24, '2', '29', 'Exotic Thailand ', 'Exotic Thailand ', '3', '4', '', 0.00, 0.00, 0.00, '1,3,2', '1579165040image1721982512.jpg', '<p><strong>Koh Samui beaches</strong></p>  <p><strong>Chaweng Beach</strong>&nbsp;is by far the most popular beach in Koh Samui. This white sand beach has everything a visitor may need for a fun-filled day by the sea, from sun loungers to massages and from watersports to beachfront restaurants.&nbsp;<strong>Lamai Beach</strong>&nbsp;is also one of the popular Thailand beaches, with stunning views, and plenty of opportunities for swimming, snorkelling and other water activities.&nbsp;<strong>Lipa Noi Beach</strong>&nbsp;is the best Koh Samui beach for families, since it has shallow water devoid of rocks and very fine sand. It is also quieter and not a party location, hence it is one of the Thailand beaches recommended for families with children.</p>  <p>&nbsp;</p>  <p>We hope our detailed Thailand guide, with ideas on sightseeing and places to visit in Thailand for every kind of traveller, will help you get a better idea of the Thailand packages you would like to shortlist for your own holiday. So don&rsquo;t waste any time and get started on planning that awesome Thailand trip!</p>', '50% Off with credit card payments ', '[\"If you are planning a Thailand trip, MakeMyTrip is the right place to come to. Whatever your travel preference, you will find suitable Thailand holiday packages here. Whether you are&nbsp;looking for Thailand packages for a family or a couple, whether you need escorted Thailand tour packages for your parents or an offbeat Thailand vacation for yourself, MakeMyTrip can help you sort out your Thailand trip plan. MakeMyTrip currently offers over 39 tour packages to Thailand, with prices starting as low as Rs.25485.0. Explore a variety of itineraries and choose from Thailand travel packages with or without flights. With our unbeatable deals and discounts, your money goes further! Don&rsquo;t forget to add tours and activities to your selected Thailand tour packages. We curate our Thailand packages by theme as well, to help you find your kind of holiday. Whether you are planning your honeymoon and looking for romantic Thailand packages for couples or simply want an adventurous Thailand trip with friends, you will find the right choice at MakeMyTrip. Be it a short trip or long, a relaxing stay or an active holiday, whatever your travel style, MakeMyTrip has the right Thailand vacation packages for you to choose from. Looking for a luxury holiday? Check out our luxury Thailand packages offering the best of hotels and inclusions designed to pamper you on your Thailand vacation. To help you prepare for your Thailand travel, we have put together some tips such as the best time to visit Thailand, things to do in Thailand and so on.\r\n\",\"Thailand is a year-round destination with a humid, tropical climate marked by hot summers, rainy monsoon and cool winter months. However, the Thailand weather varies between the northern, central and southern parts of the country. Summer in Thailand lasts from March till June, with the average Thailand temperature ranging from 30u00b0C to 34u00b0C. One of the most important festivals during this season is the Songkran Festival, held annually across Thailand in April. This festival represents the Thai New Year and is celebrated throughout the country. This is an excellent time to opt for a Thailand trip with your loved ones, as you will get to explore and experience a unique aspect of Thailandu2019s amicable culture.\r\n\r\nThe monsoon period from end June to October is when, due to rain, there are fewer visitors but also many off-season deals for Thailand. The average Thailand temperature ranges between 26u00b0C and 30u00b0C now. This is the best time to visit Thailand national parks and if you are a nature enthusiast, you can opt for one of the off season discounted Thailand packages. One of the most important festivals in Thailand during this time is the Nine Emperor Gods Festival. Also called the Vegetarian Festival, this nine-day Taoist celebration is held around the months of September and October, based on the Chinese lunar calendar.\r\n\r\nWinter in Thailand lasts from November to February, with the average temperature ranging from 24u00b0C to 27u00b0C. This season is considered the best time to visit Thailand and you can choose from plenty of Thailand tour packages to explore its beaches and islands. If you want to enjoy Thai culture in this season, you should opt for a Thailand trip package including Chiang Mai or Bangkok during November, when the Loy Krathong Festival is held. Also called the Thai Festival of Lights, this ancient festival is celebrated by lighting lanterns and setting them afloat on rivers and ponds.\",\"The main points of entry into Thailand are the two international airports in Bangkok, and the international airport in Phuket. Suvarnabhumi International Airport, located 30km away from Bangkok, is Thailandu2019s main international airport, with most airlines flying into this airport. Certain low cost carriers like Air Asia and Thai Smile use the Don Mueang airport. Phuket airport is Thailandu2019s second busiest international airport.\r\n\r\nIf you are considering Thailand packages from Delhi, the major airlines with a direct flight to Bangkok are SpiceJet, Air India, and Thai Airways. Flights to Bangkok from Delhi with one stop enroute are also operated by IndiGo Airlines and Air Asia. The major airlines with non-stop flights from Mumbai to Bangkok are SpiceJet, Air India, Thai Airways, Thai Smile and Bangkok Airways while connecting flights are operated by IndiGo Airlines, SpiceJet, Malaysia Airlines, and Sri Lankan Airlines, among others.\r\n\r\nThere are also several direct and connecting flights to Bangkok and Phuket from all the major cities in India. Delhi and Mumbai to Phuket direct flight connections are also available now on Go Air and IndiGo Airlines. You can plan your Thailand trip accordingly.\"]', '', '<p><strong>Koh Samui beaches</strong></p>\r\n\r\n<p><strong>Chaweng Beach</strong>&nbsp;is by far the most popular beach in Koh Samui. This white sand beach has everything a visitor may need for a fun-filled day by the sea, from sun loungers to massages and from watersports to beachfront restaurants.&nbsp;<strong>Lamai Beach</strong>&nbsp;is also one of the popular Thailand beaches, with stunning views, and plenty of opportunities for swimming, snorkelling and other water activities.&nbsp;<strong>Lipa Noi Beach</strong>&nbsp;is the best Koh Samui beach for families, since it has shallow water devoid of rocks and very fine sand. It is also quieter and not a party location, hence it is one of the Thailand beaches recommended for families with children.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We hope our detailed Thailand guide, with ideas on sightseeing and places to visit in Thailand for every kind of traveller, will help you get a better idea of the Thailand packages you would like to shortlist for your own holiday. So don&rsquo;t waste any time and get started on planning that awesome Thailand trip!</p>\r\n', '<p><strong>Phuket beaches</strong></p>\r\n\r\n<p>The beaches in Phuket are some of the most popular Thailand beaches, largely due to the location of the town and the scenic views. While you could spend a month exploring the beaches of Phuket, let us recommend the best. The palm-shaded&nbsp;<strong>Kata Beach</strong>&nbsp;is very popular with families due to its white sand, clear water and relatively calm nightlife. The beach is also popular with surfers during the surfing season (May to October).&nbsp; Another Phuket beach perfect for families and couples is&nbsp;<strong>Ya Nui Beach</strong>, with soft sand to lounge on and opportunities for snorkelling and other watersports.&nbsp;<strong>Freedom Beach</strong>&nbsp;near Patong offers an offbeat escape, with stunning views and a tranquil atmosphere devoid of the usual watersports. Come here if you want to just relax on a quiet and scenic beach, swim and snorkel. Those looking for a relaxed vibe will also enjoy&nbsp;<strong>Surin Beach</strong>, the white sand beach frequented largely by high-end travellers. This beach is all about laid back beach cafes, spas, surf spots and beachside bars.</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>Krabi beaches</strong></p>\r\n\r\n<p>Amongst the beaches in Krabi mainland,&nbsp;<strong>Ao Nang Beach</strong>&nbsp;is the most popular beach since all long-tail boats for island tours from Ao Nang leave from here. This beach is great for a stroll at sunset. The small and beautiful</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Tonsai Beach</strong>&nbsp;with its spectacular limestone cliffs is great for scuba diving and kayaking, and adventure seekers can even take rock climbing lessons on the cliffs here. This beach is only accessible by boat. Its neighbour,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Railay Beach</strong>, is known as one of the best beaches in Krabi due to its spectacular sunset views and variety of activities available for visitors of all ages. For people seeking a peaceful retreat during their Krabi trip,</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'exotic-thailand-', '', '<h2>Thailand Tour Packages</h2>\r\n\r\n<table>\r\n	<thead>\r\n		<tr>\r\n			<th>Thailand Packages</th>\r\n			<th>Day/Night</th>\r\n			<th>Price</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n		</tr>\r\n		<tr>\r\n			<td>Northern Thai Highlights Millennial Special (18-35 years)<', '<p>Situated in Southeast Asia with the Andaman Sea to its west, Thailand is a lush tropical country with a varied landscape. While Thailand is home to some of the most beautiful beaches and islands in the world, it is also replete with breathtaking mounta', 1, '2020-01-16 02:27:20', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `package_plan`
--

CREATE TABLE `package_plan` (
  `ID` int(11) NOT NULL,
  `planID` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(20) NOT NULL,
  `narration` longtext NOT NULL,
  `active` tinyint(4) NOT NULL,
  `e_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_plan`
--

INSERT INTO `package_plan` (`ID`, `planID`, `name`, `slug`, `narration`, `active`, `e_date`) VALUES
(1, '9A1645FC-691F-4F80-A4AA-FE0ABF08E8F0', 'Standard', 'standard', 'London is the capital city of England. ', 1, '2019-04-30 12:21:45'),
(2, '837B567F-5BF2-47E5-B5DC-66E126B41E67', 'Premium', 'premium', 'Create Premium plan ', 1, '2019-05-01 11:11:36'),
(3, '5ACE4AAB-A586-4725-B829-859461053D41', 'Luxury', 'luxury', 'Create Luxury Plan', 1, '2019-05-01 11:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `ID` int(11) NOT NULL,
  `paymentsID` varchar(255) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `pay_mode` tinyint(4) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `GST` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `ID` int(11) NOT NULL,
  `categoryID` varchar(255) NOT NULL,
  `subcategoryID` varchar(255) NOT NULL,
  `packageID` varchar(255) NOT NULL,
  `planID` varchar(255) NOT NULL,
  `r_price` double(9,2) NOT NULL,
  `f_price` double(9,2) NOT NULL,
  `lux_final_price` double(9,2) NOT NULL,
  `lux_regular_price` double(9,2) NOT NULL,
  `lux_per_bed_price` double(9,2) NOT NULL COMMENT 'luxury price''s increase according to bed''s',
  `std_final_price` double(9,2) NOT NULL,
  `std_regular_price` double(9,2) NOT NULL,
  `std_per_bed_price` double(9,2) NOT NULL COMMENT 'standard price''s increase according to bed''s',
  `prm_final_price` double(9,2) NOT NULL,
  `prm_regular_price` double(9,2) NOT NULL,
  `prm_per_bed_price` double(9,2) NOT NULL COMMENT 'Premium price''s increase according to bed''s',
  `narration` longtext NOT NULL,
  `active` tinyint(4) NOT NULL,
  `e_date` datetime NOT NULL,
  `u_date` datetime NOT NULL,
  `localIP` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`ID`, `categoryID`, `subcategoryID`, `packageID`, `planID`, `r_price`, `f_price`, `lux_final_price`, `lux_regular_price`, `lux_per_bed_price`, `std_final_price`, `std_regular_price`, `std_per_bed_price`, `prm_final_price`, `prm_regular_price`, `prm_per_bed_price`, `narration`, `active`, `e_date`, `u_date`, `localIP`) VALUES
(1, '1', '6', '20', '', 0.00, 0.00, 5500.00, 7450.00, 0.00, 4050.00, 5700.00, 0.00, 7850.00, 11500.00, 0.00, 'testing sdfsd', 1, '2020-01-07 03:10:58', '2020-01-08 10:24:34', ''),
(2, '1', '6', '19', '', 0.00, 0.00, 5700.00, 7200.00, 30.00, 4250.00, 5950.00, 20.00, 7950.00, 11550.00, 50.00, 'Testing yet done', 1, '2020-01-07 03:36:22', '2020-01-07 04:14:19', ''),
(3, '1', '6', '17', '', 0.00, 0.00, 4200.00, 5400.00, 155.00, 3700.00, 5000.00, 350.00, 5100.00, 6000.00, 420.00, 'Testing Yet Done', 1, '2020-01-07 04:16:24', '2020-01-09 10:07:09', ''),
(4, '2', '29', '24', '', 0.00, 0.00, 19999.00, 2500.00, 1000.00, 24999.00, 30000.00, 1000.00, 29999.00, 35000.00, 1500.00, '', 1, '2020-01-16 02:37:28', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `productID` varchar(255) NOT NULL,
  `categoryID` varchar(255) NOT NULL,
  `sub_categoryID` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `p_code` varchar(100) NOT NULL COMMENT 'product code',
  `r_price` double(8,2) NOT NULL COMMENT 'regular price',
  `s_price` double(8,2) NOT NULL COMMENT 'selling price',
  `weight` varchar(100) NOT NULL,
  `narration` longtext NOT NULL,
  `image` text NOT NULL,
  `GST` double(7,2) NOT NULL,
  `e_date` datetime NOT NULL COMMENT 'entry date',
  `u_date` datetime NOT NULL COMMENT 'update date',
  `active` tinyint(4) NOT NULL,
  `localIP` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_img`
--

CREATE TABLE `product_img` (
  `ID` int(11) NOT NULL,
  `productID` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registered_vehicles`
--

CREATE TABLE `registered_vehicles` (
  `ID` int(11) NOT NULL,
  `rent_id` varchar(255) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1=Car,2=Bike',
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `vehicle_model` varchar(255) NOT NULL,
  `arrival_date` varchar(255) NOT NULL,
  `departure_date` varchar(255) NOT NULL,
  `passenger` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL COMMENT '1=active,0=not active',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `localIP` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_vehicles`
--

INSERT INTO `registered_vehicles` (`ID`, `rent_id`, `userID`, `type`, `name`, `contact`, `city`, `destination`, `vehicle_model`, `arrival_date`, `departure_date`, `passenger`, `active`, `created_on`, `modified_on`, `localIP`) VALUES
(15, '', '8076545', 1, 'Shami', '7530888701', 'Lakhisarai', 'Fatehpur', 'Verna', '29.10.2019 17:58', '31.10.2019 17:58', '4', 1, '2019-10-18 07:37:33', '2019-10-18 07:37:33', '117.97.162.130'),
(3, '', '6917055', 2, 'Sam', '7530888707', 'Chittoor', '', 'Bullet', '29.10.2019 17:58', '31.10.2019 17:58', '', 1, '2019-10-17 12:28:30', '2019-10-17 12:28:30', '122.161.94.181'),
(13, '', '7985021', 1, 'Rohit', '7530888709', 'Guntur', 'Anjaw', 'Lambhorghini', '28.10.2019 13:04', '31.10.2019 13:04', '2', 1, '2019-10-18 07:35:04', '2019-10-18 07:35:04', '117.97.162.130'),
(12, '5', '8845851', 1, 'Rahul', '7530888707', 'Muzaffarnagar', 'Madhubani', 'Ferrari', '29.10.2019 17:58', '31.10.2019 17:40', '4', 1, '2019-10-18 07:34:06', '2019-10-18 07:34:06', '117.97.162.130'),
(14, '', '6769331', 1, 'Ravi', '7530888709', 'YSR District, Kadapa (Cuddapah)', 'Changlang', 'Alto', '29.10.2019 17:44', '31.10.2019 17:58', '4', 1, '2019-10-18 07:35:49', '2019-10-18 07:35:49', '117.97.162.130'),
(7, '', '3855440', 2, 'Sam', '7530888707', 'Faridabad', 'Delhi', 'Avenger', '23.10.2019 18:29', '31.10.2019 18:29', '3', 1, '2019-10-17 12:59:54', '2019-10-17 12:59:54', '122.161.94.181'),
(8, '', '1155250', 1, 'Sam', '7530888707', 'Faridabad', 'Gurgaon', 'Bullet', '21.10.2019 18:31', '31.10.2019 18:31', '4', 1, '2019-10-17 13:01:59', '2019-10-17 13:01:59', '122.161.94.181'),
(9, '', '6237850', 1, 'Sam', '7530888707', 'Jashpur', 'Kheda (Nadiad)', 'Lambhorghini', '17.10.2019 18:34', '30.10.2019 18:34', '2', 1, '2019-10-17 13:04:21', '2019-10-17 13:04:21', '122.161.94.181'),
(10, '5', '4751659', 1, 'Sam', '7530888707', 'Chittoor', 'Prakasam (Ongole)', 'Safari', '23.10.2019 18:34', '31.10.2019 18:34', '5', 1, '2019-10-17 13:04:52', '2019-10-17 13:04:52', '122.161.94.181'),
(18, '', '2216425', 1, 'Sumit', '7530888711', 'Chittoor', 'Kurnool', 'Lambhorghini', '29.10.2019 13:20', '31.10.2019 13:20', '2', 1, '2019-10-18 07:50:24', '2019-10-18 07:50:24', '117.97.162.130'),
(19, '', '7451930', 1, 'Shami', '7530888701', 'Kurnool', 'Prakasam (Ongole)', 'Lambhorghini', '23.10.2019 17:42', '31.10.2019 17:44', '3', 1, '2019-10-18 07:53:12', '2019-10-18 07:53:12', '117.97.162.130'),
(20, '', '6624728', 1, 'Ravi Pandit', '8895646544', 'Guntur', 'Kurnool', 'Lambhorghini', '22.10.2019 14:42', '30.10.2019 14:42', '2', 1, '2019-10-18 09:13:09', '2019-10-18 09:13:09', '117.97.162.130'),
(31, '1', '6953427', 1, 'Shami', '9844654566', 'Guntur', 'Chittoor', 'Lambhorghini', '29.10.2019 17:44', '31.10.2019 17:58', '3', 1, '2019-10-18 10:30:17', '2019-10-18 10:30:17', '117.97.162.130'),
(22, '', '2555563', 1, 'Rahul', '9844654566', 'Balrampur', 'Patan', 'Lambhorghini', '23.10.2019 17:56', '31.10.2019 17:49', '2', 1, '2019-10-18 09:16:25', '2019-10-18 09:16:25', '117.97.162.130'),
(23, '', '9488563', 1, 'Shami', '7530888711', 'Kaimur (Bhabua)', 'East Siang (Pasighat)', 'Lambhorghini', '23.10.2019 17:42', '31.10.2019 17:58', '2', 1, '2019-10-18 09:18:29', '2019-10-18 09:18:29', '117.97.162.130'),
(24, '', '2721881', 1, 'Sumit', '9844654566', 'Changlang', 'East Siang (Pasighat)', 'Lambhorghini', '23.10.2019 17:56', '23.10.2019 17:42', '1', 1, '2019-10-18 09:26:41', '2019-10-18 09:26:41', '117.97.162.130'),
(25, '', '1920918', 1, 'Rohit', '7530888701', 'East Kameng (Seppa)', 'Kurung Kumey (Koloriang)', 'Lambhorghini', '29.10.2019 17:44', '31.10.2019 17:57', '2', 1, '2019-10-18 09:27:50', '2019-10-18 09:27:50', '117.97.162.130'),
(32, '5', '5771439', 1, 'Rahul', '8895646544', 'East Godavari (Kakinada)', 'East Godavari (Kakinada)', '', '29.10.2019 17:58', '31.10.2019 17:49', '3', 1, '2019-10-18 12:12:23', '2019-10-18 12:12:23', '117.97.135.176'),
(27, '', '7197314', 1, 'Shami', '9844654566', 'East Godavari (Kakinada)', 'Chittoor', 'Lambhorghini', '23.10.2019 17:56', '31.10.2019 17:40', '2', 1, '2019-10-18 09:30:45', '2019-10-18 09:30:45', '117.97.162.130'),
(28, '1', '6721572', 1, 'Sumit', '7530888701', 'Gariaband', 'Kulgam', 'Verna', '22.10.2019 17:41', '24.10.2019 17:57', '4', 1, '2019-10-18 10:03:46', '2019-10-18 10:03:46', '117.97.162.130'),
(29, '5', '7308647', 1, 'Rahul', '9844654566', 'Krishna (Machilipatnam)', 'Kurnool', 'Verna', '29.10.2019 17:58', '24.10.2019 17:57', '3', 1, '2019-10-18 10:12:06', '2019-10-18 10:12:06', '117.97.162.130'),
(30, '', '8123290', 1, 'Rohit', '7530888701', 'Krishna (Machilipatnam)', 'Dibang Valley (Anini)', 'Verna', '21.10.2019 15:44', '30.10.2019 15:44', '2', 1, '2019-10-18 10:14:17', '2019-10-18 10:14:17', '117.97.162.130'),
(33, '', '7900226', 1, 'Shami', '7530888711', 'Dibang Valley (Anini)', 'Anjaw', 'Lambhorghini', '22.10.2019 17:42', '30.10.2019 17:42', '4', 1, '2019-10-18 12:12:51', '2019-10-18 12:12:51', '117.97.135.176'),
(34, '', '1477230', 2, 'Ravi', '7530888701', 'Vizianagaram', '', 'Bullet', '29.10.2019 17:42', '31.10.2019 17:43', '', 1, '2019-10-18 12:13:14', '2019-10-18 12:13:14', '117.97.135.176'),
(35, '', '7788334', 2, 'Shami', '7530888711', 'Sri Potti Sriramulu (Nellore)', 'Anjaw', '', '23.10.2019 17:56', '31.10.2019 17:49', '', 1, '2019-10-18 12:16:15', '2019-10-18 12:16:15', '117.97.135.176'),
(36, '2', '4329863', 2, 'Ravi', '7530888701', 'Visakhapatnam', 'Kullu', '', '23.10.2019 17:56', '31.10.2019 17:58', '', 1, '2019-10-18 12:17:46', '2019-10-18 12:17:46', '117.97.135.176'),
(37, '2', '4883463', 2, 'Sam', '8895646544', 'Guntur', 'Faridabad', '', '26.10.2019 17:51', '22.10.2019 17:51', '', 1, '2019-10-18 12:22:04', '2019-10-18 12:22:04', '117.97.135.176'),
(38, '5', '4341872', 1, 'Shami', '9844654566', 'East Godavari (Kakinada)', 'Bastar (Jagdalpur)', '', '23.10.2019 17:52', '29.10.2019 17:52', '4', 1, '2019-10-18 12:22:54', '2019-10-18 12:22:54', '117.97.135.176'),
(39, '1', '4721492', 1, 'Sam', '9844654566', 'Faridabad', 'Gurgaon', '', '24.10.2019 18:03', '31.10.2019 18:03', '4', 1, '2019-10-18 12:33:39', '2019-10-18 12:33:39', '117.97.135.176'),
(40, '2', '7796176', 2, 'Sam', '7530888711', 'Faridabad', 'Gurgaon', '', '31.10.2019 18:04', '24.10.2019 18:04', '', 1, '2019-10-18 12:34:18', '2019-10-18 12:34:18', '117.97.135.176'),
(41, '', '8745880', 1, 'Shami', '7530888701', 'West Godavari (Eluru)', 'Dibang Valley (Anini)', 'Ferrari', '31.10.2019 18:04', '01.11.2019 18:03', '2', 1, '2019-10-18 12:34:51', '2019-10-18 12:34:51', '117.97.135.176'),
(42, '2', '9744241', 2, 'Rahul', '8895646544', 'West Godavari (Eluru)', 'Nagaon', '', '23.10.2019 11:03', '31.10.2019 11:03', '', 1, '2019-10-19 05:33:57', '2019-10-19 05:33:57', '182.64.42.2'),
(43, '2', '5720801', 2, 'Rohit', '8895646544', 'West Godavari (Eluru)', 'Anjaw', '', '24.10.2019 11:04', '30.10.2019 11:04', '', 1, '2019-10-19 05:34:34', '2019-10-19 05:34:34', '182.64.42.2'),
(44, '5', '5326888', 1, 'Sumit', '7530888711', 'Chittoor', 'Sitamarhi', '', '27.10.2019 11:05', '29.10.2019 11:05', '3', 1, '2019-10-19 05:35:37', '2019-10-19 05:35:37', '182.64.42.2'),
(45, '5', '3137061', 1, 'Sam', '9844654566', 'Kurnool', 'Udalguri', '', '24.10.2019 16:34', '30.10.2019 16:34', '3', 1, '2019-10-19 11:04:54', '2019-10-19 11:04:54', '182.64.42.2'),
(46, '1', '1086696', 1, 'Sam Kumar', '9786524523', '1', '8', '', '22.11.2019 11:51', '27.11.2019 11:51', '4', 1, '2019-11-18 06:21:27', '2019-11-18 06:21:27', '182.64.55.96'),
(48, '', '2289200', 1, 'Sam', '7988974532', '36', '3', 'Ferrari', '25.12.2019 12:24', '26.12.2019 12:24', '4', 1, '2019-12-24 06:54:59', '2019-12-24 06:54:59', '182.64.32.209'),
(49, '5', '1438912', 1, 'Sam_return', '7988974532', '1', '1', '', '31.12.2019 12:25', '31.12.2019 12:35', '6', 1, '2019-12-24 06:55:40', '2019-12-24 06:55:40', '182.64.32.209'),
(50, '5', '6266675', 1, 'Saneep', '9786454654', '1', '1', '', '30.12.2019 11:10', '31.12.2019 11:09', '6', 1, '2019-12-30 05:40:49', '2019-12-30 05:40:49', '182.64.61.67');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `countryID` smallint(6) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`ID`, `name`, `countryID`, `status`) VALUES
(1, 'Andhra Pradesh', 81, 1),
(2, 'Arunachal Pradesh', 81, 1),
(3, 'Assam', 81, 1),
(4, 'Bihar', 81, 1),
(5, 'Chhattisgarh', 81, 1),
(6, 'Goa', 81, 1),
(7, 'Gujarat', 81, 1),
(8, 'Haryana', 81, 1),
(9, 'Himachal Pradesh', 81, 1),
(10, 'Jammu and Kashmir', 81, 1),
(11, 'Jharkhand', 81, 1),
(12, 'Karnataka', 81, 1),
(13, 'Kerala', 81, 1),
(14, 'Madhya Pradesh', 81, 1),
(15, 'Maharashtra', 81, 1),
(16, 'Manipur', 81, 1),
(17, 'Meghalaya', 81, 1),
(18, 'Mizoram', 81, 1),
(19, 'Nagaland', 81, 1),
(20, 'Odisha', 81, 1),
(21, 'Punjab', 81, 1),
(22, 'Rajasthan', 81, 1),
(23, 'Sikkim', 81, 1),
(24, 'Tamil Nadu', 81, 1),
(25, 'Tripura', 81, 1),
(26, 'Uttarakhand', 81, 1),
(27, 'Uttar Pradesh', 81, 1),
(28, 'West Bengal', 81, 1),
(29, 'Andaman and Nicobar Islands (UT)', 81, 1),
(30, 'Chandigarh (UT)', 81, 1),
(31, 'Delhi NCT', 81, 1),
(32, 'Dadra and Nagar Haveli (UT)', 81, 1),
(33, 'Daman and Diu (UT)', 81, 1),
(34, 'Lakshadweep (UT)', 81, 1),
(35, 'Puducherry (UT)', 81, 1),
(36, 'Telangana', 81, 1),
(39, 'cairo', 55, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `u_date` datetime NOT NULL,
  `e_date` datetime NOT NULL,
  `dataset` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`ID`, `name`, `slug`, `active`, `u_date`, `e_date`, `dataset`) VALUES
(1, 'romantic', 'romantic', 1, '0000-00-00 00:00:00', '2019-08-09 04:23:37', '{\"route\":\"tag\",\"name\":\"romantic\",\"active\":\"on\",\"submit\":\"Submit\",\"PHPSESSID\":\"6b8c828abd7631a408484e0c81db02d2\",\"__tawkuuid\":\"e::hillstraveler.com::ahsyGDIl0OoKl5Q9IJUs07HpanQnU/H3CgCO6brVSkMHGDRDWMUc5/7htiZYIQUk::2\",\"TawkConnectionTime\":\"0\"}'),
(2, 'hill station', 'hill-station', 1, '0000-00-00 00:00:00', '2019-08-09 04:23:45', '{\"route\":\"tag\",\"name\":\"hill station\",\"active\":\"on\",\"submit\":\"Submit\",\"PHPSESSID\":\"6b8c828abd7631a408484e0c81db02d2\",\"__tawkuuid\":\"e::hillstraveler.com::ahsyGDIl0OoKl5Q9IJUs07HpanQnU/H3CgCO6brVSkMHGDRDWMUc5/7htiZYIQUk::2\",\"TawkConnectionTime\":\"0\"}'),
(3, 'popular', 'popular', 1, '0000-00-00 00:00:00', '2019-08-09 04:23:52', '{\"route\":\"tag\",\"name\":\"popular\",\"active\":\"on\",\"submit\":\"Submit\",\"PHPSESSID\":\"6b8c828abd7631a408484e0c81db02d2\",\"__tawkuuid\":\"e::hillstraveler.com::ahsyGDIl0OoKl5Q9IJUs07HpanQnU/H3CgCO6brVSkMHGDRDWMUc5/7htiZYIQUk::2\",\"TawkConnectionTime\":\"0\"}'),
(5, 'couples', 'couples', 1, '2019-12-26 04:04:56', '2019-08-09 04:24:04', '{\"route\":\"tag\",\"name\":\"couples\",\"active\":\"on\",\"submit\":\"Submit\",\"PHPSESSID\":\"6b8c828abd7631a408484e0c81db02d2\",\"__tawkuuid\":\"e::hillstraveler.com::ahsyGDIl0OoKl5Q9IJUs07HpanQnU/H3CgCO6brVSkMHGDRDWMUc5/7htiZYIQUk::2\",\"TawkConnectionTime\":\"0\"}'),
(6, 'without flight', 'without-flight', 1, '2019-12-26 04:02:57', '2019-08-09 04:24:17', '{\"route\":\"tag\",\"name\":\"without flight\",\"active\":\"on\",\"submit\":\"Submit\",\"PHPSESSID\":\"6b8c828abd7631a408484e0c81db02d2\",\"__tawkuuid\":\"e::hillstraveler.com::ahsyGDIl0OoKl5Q9IJUs07HpanQnU/H3CgCO6brVSkMHGDRDWMUc5/7htiZYIQUk::2\",\"TawkConnectionTime\":\"0\"}'),
(10, 'hfsghdfgh', 'hfsghdfgh', 1, '0000-00-00 00:00:00', '2019-12-30 10:53:40', '{\"route\":\"tag\",\"name\":\"hfsghdfgh\",\"active\":\"on\",\"submit\":\"Submit\",\"__tawkuuid\":\"e::vridhisoftech.in::0k6ls1p5AxDTE i6owESS7ym1dZxR4tN0ESVCX9F1xLxSLqDyyDSkBUDFa7uUUf8::2\",\"PHPSESSID\":\"b60122772f1cf1b4e78872b938056c12\",\"TawkConnectionTime\":\"0\"}');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `ID` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `video_link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`ID`, `heading`, `name`, `description`, `video_link`, `image`, `active`, `created_on`, `modified_on`) VALUES
(2, 'WHAT OUR CLIENTS SAY ABOUT US', 'Hyundai', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'https://www.youtube.com/watch?v=Thf60JU8E98', '1571919100Pimage1845720505.jpg', 1, '2019-10-24 12:13:43', '2019-10-25 10:46:40'),
(3, 'WHAT OUR CLIENTS SAY ABOUT US', 'Shehwaj', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'https://www.youtube.com/watch?v=Thf60JU8E98', '1571919485Pimage1143031556.jpg', 1, '2019-10-24 12:18:05', '2020-01-07 11:21:22'),
(5, 'WHAT OUR CLIENTS SAY ABOUT US', 'Khiladi', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'https://www.youtube.com/watch?v=Thf60JU8E98', '1571980369Pimage815529847.jpg', 1, '2019-10-25 05:12:49', '2020-01-07 11:21:07'),
(6, 'WHAT OUR CLIENTS SAY ABOUT US', 'Sam', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'https://www.youtube.com/watch?v=Thf60JU8E98', '1571980416Pimage542986237.jpg', 1, '2019-10-25 05:13:36', '2020-01-07 11:21:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `f_name` varchar(100) NOT NULL COMMENT 'First name',
  `l_name` varchar(100) NOT NULL COMMENT 'Last name',
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `fb_link` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL,
  `linkedin_link` varchar(255) NOT NULL,
  `instagram_link` varchar(255) NOT NULL,
  `ship_info` varchar(400) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `landmark` varchar(400) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `e_date` datetime NOT NULL,
  `valid_upto` datetime NOT NULL,
  `last_login` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `dataset` varchar(255) NOT NULL,
  `localIP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `userID`, `type`, `f_name`, `l_name`, `name`, `email`, `phone`, `image`, `password`, `country`, `state`, `city`, `address`, `fb_link`, `twitter_link`, `linkedin_link`, `instagram_link`, `ship_info`, `pin_code`, `landmark`, `gender`, `e_date`, `valid_upto`, `last_login`, `active`, `dataset`, `localIP`) VALUES
(1, '2194149', 1, 'Mohammad', 'Shahwaj', 'shahwaj', 'admin@gmail.com', '7982389443', '1578650236adminImage966285630.jpg', '12345', '', 'new delhi', '', 'Vijay Nagar Ballabgarh Faridabad', '', '', '', '', '', 0, '', '', '0000-00-00 00:00:00', '2020-05-31 00:00:00', '', 1, '{\"route\":\"admin_profile\",\"ed\":\"1\",\"name\":\"shahwaj\",\"email\":\"admin@gmail.com\",\"password\":\"12345\",\"phone\":\"7982389443\",\"address\":\"Vijay Nagar Ballabgarh Faridabad\",\"fb_link\":\"\",\"twitter_link\":\"\",\"linkedin_link\":\"\",\"instagram_link\":\"\",\"old_admin_image\":\"\",\"s', ''),
(2, '1236547', 0, 'Mohammad', 'Shahwaj', 'taj', 'taj@gmail.com', '7982389443', '', '1234', 'India', 'new delhi', 'delhi', '', '', '', '', '', '', 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `ID` int(11) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `e_date` datetime NOT NULL,
  `localIP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`ID`, `userID`, `e_date`, `localIP`) VALUES
(1, 'qwert12321', '2019-04-24 05:01:24', '103.116.85.205'),
(2, 'qwert12321', '2019-04-24 16:53:37', '103.100.6.111'),
(3, 'qwert12321', '2019-04-25 16:00:26', '103.100.6.111'),
(4, 'qwert12321', '2019-04-25 17:50:51', '103.100.6.111'),
(5, 'qwert12321', '2019-04-26 05:25:27', '103.116.85.205'),
(6, 'qwert12321', '2019-04-26 13:24:56', '103.116.85.205'),
(7, 'qwert12321', '2019-04-29 17:32:56', '103.100.4.16'),
(8, 'qwert12321', '2019-04-29 18:25:50', '103.100.4.16'),
(9, 'qwert12321', '2019-05-01 05:41:01', '103.116.85.205'),
(10, 'qwert12321', '2019-05-07 07:19:47', '103.116.85.205'),
(11, 'qwert12321', '2019-05-07 09:48:09', '117.97.189.89'),
(12, 'qwert12321', '2019-05-07 10:48:37', '103.116.85.205'),
(13, 'qwert12321', '2019-05-10 11:52:55', '103.100.4.95'),
(14, 'qwert12321', '2019-05-10 14:00:51', '103.100.4.95'),
(15, 'qwert12321', '2019-05-10 17:51:01', '103.100.4.95'),
(16, 'qwert12321', '2019-05-10 22:36:25', '103.100.4.95'),
(17, 'qwert12321', '2019-05-11 05:53:04', '117.97.181.248'),
(18, 'qwert12321', '2019-05-11 06:51:47', '103.116.85.205'),
(19, 'qwert12321', '2019-05-11 09:14:21', '103.116.85.205'),
(20, 'qwert12321', '2019-05-14 04:38:41', '103.116.85.205'),
(21, 'qwert12321', '2019-05-14 05:52:49', '103.116.85.205'),
(22, 'qwert12321', '2019-05-14 07:40:40', '103.116.85.205'),
(23, 'qwert12321', '2019-05-14 10:01:47', '103.116.85.205'),
(24, 'qwert12321', '2019-05-15 11:21:46', '103.116.85.205'),
(25, 'qwert12321', '2019-05-19 07:02:06', '103.116.85.205'),
(26, 'qwert12321', '2019-05-19 07:41:14', '103.116.85.205'),
(27, 'qwert12321', '2019-05-19 09:13:16', '103.116.85.205'),
(28, 'qwert12321', '2019-05-20 06:15:13', '103.116.85.205'),
(29, 'qwert12321', '2019-05-20 11:39:59', '122.161.95.152'),
(30, 'qwert12321', '2019-05-21 04:58:10', '103.116.85.205'),
(31, 'qwert12321', '2019-05-21 06:56:36', '122.161.80.32'),
(32, 'qwert12321', '2019-05-21 10:49:10', '103.116.85.205'),
(33, 'qwert12321', '2019-05-21 12:01:33', '103.116.85.205'),
(34, 'qwert12321', '2019-05-21 18:01:51', '47.30.194.227'),
(35, 'qwert12321', '2019-05-22 07:50:14', '103.116.85.205'),
(36, 'qwert12321', '2019-05-22 09:17:04', '103.116.85.205'),
(37, 'qwert12321', '2019-05-23 07:02:07', '122.161.87.230'),
(38, 'qwert12321', '2019-05-23 07:16:42', '103.116.85.205'),
(39, 'qwert12321', '2019-05-23 09:13:09', '122.161.87.230'),
(40, 'qwert12321', '2019-05-23 11:23:29', '103.116.85.205'),
(41, 'qwert12321', '2019-05-23 17:12:29', '47.30.199.46'),
(42, 'qwert12321', '2019-05-23 17:25:46', '47.31.115.251'),
(43, 'qwert12321', '2019-05-24 03:06:17', '106.198.136.95'),
(44, 'qwert12321', '2019-05-24 03:06:18', '106.198.136.95'),
(45, 'qwert12321', '2019-05-24 06:36:01', '106.212.150.210'),
(46, 'qwert12321', '2019-05-25 05:25:20', '103.116.85.205'),
(47, 'qwert12321', '2019-05-25 05:36:34', '103.116.85.205'),
(48, 'qwert12321', '2019-05-29 07:09:05', '103.116.85.205'),
(49, '', '2019-08-08 07:19:28', '103.116.85.211'),
(50, 'qwert12321', '2019-08-08 07:49:16', '103.116.85.211'),
(51, 'qwert12321', '2019-08-08 09:20:12', '103.116.85.211'),
(52, 'qwert12321', '2019-08-09 05:31:01', '103.116.85.211'),
(53, 'qwert12321', '2019-08-09 10:41:45', '117.99.172.173'),
(54, 'qwert12321', '2019-08-20 18:23:54', '103.212.147.161'),
(55, 'qwert12321', '2019-08-21 06:52:23', '103.116.85.211'),
(56, 'qwert12321', '2019-08-22 19:11:17', '103.212.147.238'),
(57, 'qwert12321', '2019-08-24 11:59:49', '103.116.85.211'),
(58, 'qwert12321', '2019-09-18 06:50:48', '103.116.85.211'),
(59, 'qwert12321', '2019-09-29 17:42:36', '139.5.254.141'),
(60, 'qwert12321', '2019-09-29 17:55:36', '139.5.254.141'),
(61, 'qwert12321', '2019-10-04 07:02:04', '117.97.155.81'),
(62, 'qwert12321', '2019-10-04 07:03:29', '117.97.155.81'),
(63, 'qwert12321', '2019-10-04 07:03:30', '117.97.155.81'),
(64, 'qwert12321', '2019-10-04 07:04:38', '117.97.155.81'),
(65, 'qwert12321', '2019-10-04 07:05:14', '117.97.155.81'),
(66, 'qwert12321', '2019-10-04 07:05:37', '117.97.155.81'),
(67, 'qwert12321', '2019-10-04 07:06:44', '117.97.155.81'),
(68, 'qwert12321', '2019-10-04 07:56:54', '117.97.155.81'),
(69, 'qwert12321', '2019-10-11 10:13:15', '117.97.137.237'),
(70, 'qwert12321', '2019-10-11 10:14:55', '117.97.137.237'),
(71, 'qwert12321', '2019-10-11 10:15:13', '117.97.137.237'),
(72, 'qwert12321', '2019-10-11 10:15:35', '117.97.137.237'),
(73, 'qwert12321', '2019-10-11 10:15:41', '117.97.137.237'),
(74, 'qwert12321', '2019-10-11 10:16:27', '117.97.137.237'),
(75, 'qwert12321', '2019-10-11 10:17:45', '117.97.137.237'),
(76, 'qwert12321', '2019-10-11 10:18:17', '117.97.137.237'),
(77, 'qwert12321', '2019-10-11 10:18:25', '117.97.137.237'),
(78, 'qwert12321', '2019-10-11 10:18:38', '117.97.137.237'),
(79, 'qwert12321', '2019-10-11 10:24:12', '117.97.137.237'),
(80, 'qwert12321', '2019-10-12 06:30:46', '110.227.154.182'),
(81, 'qwert12321', '2019-10-12 06:41:51', '110.227.154.182'),
(82, 'qwert12321', '2019-10-12 06:42:04', '110.227.154.182'),
(83, 'qwert12321', '2019-10-12 06:42:46', '110.227.154.182'),
(84, 'qwert12321', '2019-10-12 06:43:36', '110.227.154.182'),
(85, 'qwert12321', '2019-10-12 06:44:27', '110.227.154.182'),
(86, 'qwert12321', '2019-10-12 06:53:20', '110.227.154.182'),
(87, 'qwert12321', '2019-10-12 06:54:26', '110.227.154.182');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_on_price`
--
ALTER TABLE `add_on_price`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `book_now`
--
ALTER TABLE `book_now`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contacted_users`
--
ALTER TABLE `contacted_users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `custom_tour`
--
ALTER TABLE `custom_tour`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `departure_city`
--
ALTER TABLE `departure_city`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `onrent`
--
ALTER TABLE `onrent`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `package_plan`
--
ALTER TABLE `package_plan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `registered_vehicles`
--
ALTER TABLE `registered_vehicles`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_on_price`
--
ALTER TABLE `add_on_price`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `book_now`
--
ALTER TABLE `book_now`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=686;

--
-- AUTO_INCREMENT for table `contacted_users`
--
ALTER TABLE `contacted_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_tour`
--
ALTER TABLE `custom_tour`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departure_city`
--
ALTER TABLE `departure_city`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `onrent`
--
ALTER TABLE `onrent`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `package_plan`
--
ALTER TABLE `package_plan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_img`
--
ALTER TABLE `product_img`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registered_vehicles`
--
ALTER TABLE `registered_vehicles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
