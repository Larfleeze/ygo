-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2018 at 06:04 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ygo`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `picture` varchar(225) NOT NULL DEFAULT 'https://orig00.deviantart.net/8863/f/2011/321/4/5/yu_gi_oh_zane_render_by_nyaediter-d4gg2il.png',
  `content` text NOT NULL,
  `date` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `picture`, `content`, `date`) VALUES
(1, 'Welcome to YGO! Genesis', 'https://orig00.deviantart.net/8863/f/2011/321/4/5/yu_gi_oh_zane_render_by_nyaediter-d4gg2il.png', 'Hello duelists and welcome to YGO! Genesis. You will be able to duel others in real time, chat with others and even watch others duelling. Due to a test gone wrong (Obelisk the Tormentor was just too strong for our servers to handle), features are under maintenance. Currently only the slot machine is fully operating, win and collect coins which can later be used to buy rare cards from Solomon Muto\'s card shop!', 'May 6th, 2018');

-- --------------------------------------------------------

--
-- Table structure for table `shout_box`
--

CREATE TABLE `shout_box` (
  `id` int(11) NOT NULL,
  `user` varchar(60) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_address` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shout_box`
--

INSERT INTO `shout_box` (`id`, `user`, `message`, `date_time`, `ip_address`) VALUES
(1, 'kaiba', 'hello', '2018-05-06 17:46:50', '127.0.0.1'),
(2, 'kaiba', 'test', '2018-05-06 17:47:55', '127.0.0.1'),
(3, 'kaiba', 'real time', '2018-05-06 17:48:03', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT 'https://orig00.deviantart.net/2a17/f/2015/041/4/b/seto_kaiba_avatar_by_avatarw0rld-d8hh884.png',
  `elo` int(11) NOT NULL,
  `coins` int(11) NOT NULL DEFAULT '100',
  `favorite_card` varchar(35) NOT NULL DEFAULT 'Blue-Eyes White Dragon',
  `birthday` varchar(50) NOT NULL DEFAULT 'August 3rd, 2001',
  `gender` varchar(20) NOT NULL DEFAULT 'Male',
  `email` varchar(250) NOT NULL DEFAULT '',
  `password` varchar(200) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `avatar`, `elo`, `coins`, `favorite_card`, `birthday`, `gender`, `email`, `password`) VALUES
(1, 'kaiba', 'https://orig00.deviantart.net/2a17/f/2015/041/4/b/seto_kaiba_avatar_by_avatarw0rld-d8hh884.png', 0, 100, 'Blue-Eyes White Dragon', 'August 3rd, 2001', 'Male', 'azare2989@wrdsb.ca', '$2y$10$R49DZyyHEYLmF2we6r9vH.YT4/AbbuiXMemAhaQF7hNLv9HVGvKr2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shout_box`
--
ALTER TABLE `shout_box`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shout_box`
--
ALTER TABLE `shout_box`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
