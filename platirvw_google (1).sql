-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2017 at 10:28 AM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `platirvw_google`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `status`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `gender`, `locale`, `picture`, `link`, `created`, `modified`) VALUES
(1, 'none', 'google', '101960213097200538929', 'Elezire', 'Technologies', 'elezire@gmail.com', '', 'en', 'https://lh3.googleusercontent.com/-CGBslEs-22Y/AAAAAAAAAAI/AAAAAAAAAE8/SV84wK_y_2I/photo.jpg', 'https://plus.google.com/101960213097200538929', '2017-10-30 08:53:36', '2017-10-31 17:50:12'),
(2, 'none', 'google', '106718442643902987048', 'md', 'imran', 'imranofficialmail@gmail.com', '', 'en', 'https://lh5.googleusercontent.com/-H0VE1w0SWbo/AAAAAAAAAAI/AAAAAAAAQXg/7QpoxFGl8kQ/photo.jpg', 'https://plus.google.com/106718442643902987048', '2017-10-31 16:21:41', '2017-11-01 14:34:30'),
(3, 'none', 'google', '113310478522712187552', 'md', 'imran', 'imranaashid@gmail.com', '', 'en', 'https://lh3.googleusercontent.com/-3KdpT-UhbKs/AAAAAAAAAAI/AAAAAAAAAHQ/h2RmJVMX-t4/photo.jpg', 'https://plus.google.com/113310478522712187552', '2017-10-31 16:56:49', '2017-10-31 17:50:00'),
(4, 'admin', 'google', '108070648802670345284', 'PRIYANK', 'UPADHYAY', 'priyupadhyay1994@gmail.com', 'male', 'en', 'https://lh5.googleusercontent.com/-JRr7rAGcdP4/AAAAAAAAAAI/AAAAAAAAAKI/n7kADjzMIP8/photo.jpg', 'https://plus.google.com/+PRIYANKUPADHYAY1', '2017-10-31 17:46:22', '2017-11-28 16:42:34'),
(5, 'none', 'google', '108034204574068297902', 'Pawan', 'Shah', 'pawan.shah92@gmail.com', 'male', 'en', 'https://lh6.googleusercontent.com/-ejXtM9puuJg/AAAAAAAAAAI/AAAAAAAAAyQ/S33YA_ZtnsU/photo.jpg', 'https://plus.google.com/108034204574068297902', '2017-10-31 17:57:54', '2017-10-31 17:57:54'),
(6, 'admin', 'google', '100212291781807239450', 'Anil', 'Shah', 'mailtoanilshah@gmail.com', '', 'en', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '', '2017-11-01 04:45:27', '2017-11-28 17:17:20'),
(7, 'none', 'google', '113901772457443788258', 'MySchool Coaching', 'Institute Asansol', 'myschoolasansol@gmail.com', 'male', 'en', 'https://lh5.googleusercontent.com/-gSW7JkW1bcA/AAAAAAAAAAI/AAAAAAAAABY/Q8puc29xgCU/photo.jpg', 'https://plus.google.com/113901772457443788258', '2017-11-01 12:44:11', '2017-11-27 04:37:05'),
(8, 'admin', 'google', '111195845113273905248', 'Kartik', 'Pawar', 'kartikpawar2014@gmail.com', 'male', 'en', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', 'https://plus.google.com/111195845113273905248', '2017-11-09 16:49:37', '2017-11-27 19:02:36');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
