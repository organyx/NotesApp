-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 11, 2016 at 02:03 PM
-- Server version: 5.6.31
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webNotes`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `_id` int(50) NOT NULL,
  `note_text` varchar(6000) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(50) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`_id`, `note_text`, `created_by`, `date`) VALUES
(1, 'Lorem Ipsum', 1, '2016-11-07 00:00:00'),
(2, 'Lorem 2', 2, '2016-11-09 14:48:03'),
(3, 'Lorem 3', 2, '2016-11-09 14:48:32'),
(4, 'Ipsum', 3, '2016-11-09 14:48:32'),
(5, 'Ipsum 2', 3, '2016-11-09 14:48:32'),
(6, 'test 2 note', 2, '2016-11-09 16:17:21'),
(7, 'test 3 note', 3, '2016-11-09 16:22:09'),
(8, 'test 3 note 2', 3, '2016-11-09 16:22:42'),
(9, 'test 3 note 3', 3, '2016-11-09 16:23:16'),
(10, 'test 3 note 4', 3, '2016-11-09 16:23:52'),
(11, 'test 4 note', 4, '2016-11-09 16:27:06'),
(12, 'test 4 note 2', 4, '2016-11-09 16:29:31'),
(13, 'test 4 note 3', 4, '2016-11-09 16:32:39'),
(14, 'test 2 note', 4, '2016-11-09 16:34:17'),
(15, 'test 3 note 2', 4, '2016-11-09 16:40:35'),
(41, '123', 20, '2016-11-11 14:59:48'),
(42, '321', 20, '2016-11-11 14:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `_id` int(50) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`_id`, `username`, `password`, `email`, `date`) VALUES
(1, 'test', 'test', 'test@test.com', '2016-11-07 00:00:00'),
(2, 'test2', '$2y$10$au1LBjzVCKwyJb3tDVcFs.bXoo5vctTSfKauB372CAgxa6zgUAt5m', 'test2@test.com', '2016-11-08 19:11:33'),
(3, 'test3', '$2y$10$xl7bNG9SWzmXy08hw7CgHOWcdQQtCu1U.DsU0XELtkTowCGbt7Wq2', 'test3@test.com', '2016-11-08 20:19:59'),
(4, 'test4', '$2y$10$YnrkVwA6Lbql6.d2QnFzHeye/4IeYppX3AjlyMZtubyvZe3584KyK', 'test4@test.com', '2016-11-09 16:26:36'),
(5, 'test5', '$2y$10$5Iwc7hJGxMGoa8xpukLeoenjBDxR6DLCGkdi94DMdCr1iSrXYMa66', 'test5@test.com', '2016-11-09 17:37:18'),
(6, 'test7', '$2y$10$CsX3hBC7rW6kJclM1a3L2.RmBMbagLd9q7Fhn5t4xuxjvm82N0ah6', 'test7@test.com', '2016-11-09 18:00:49'),
(7, 'test6', '$2y$10$Z8RYlwsSaq5hGjRuyZvbXOEJkyhhXvhXtrp7I7Z49T1j/12h0YJza', 'test6@test.com', '2016-11-09 18:09:45'),
(8, 'test8', '$2y$10$DbkA3X5e4A9Y7HNRyKKBauwm7r160ox/u/dlgZ6TvOyS0hL8NNejm', 'test8@test.com', '2016-11-09 18:10:53'),
(20, 'user', '$2y$10$qrHmRuBboDKBi/JTwYLxPuw7TssP6rQ.l2v.nU29bdXGoyKIHiARq', 'uer@dasd.ru', '2016-11-11 14:54:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `fk_note_owner` (`created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`_id`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `fk_note_owner` FOREIGN KEY (`created_by`) REFERENCES `users` (`_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
