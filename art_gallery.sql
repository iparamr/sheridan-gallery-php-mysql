-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Aug 01, 2024 at 12:19 AM
-- Server version: 8.4.2
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Digital Art'),
(2, 'Fine Art');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int NOT NULL,
  `image_id` int NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `image_id`, `comment`) VALUES
(7, 3, 'In magna. Integer consectetuer, odio sed auctor fermentum, mauris nisl sollicitudin neque, eu rhoncus risus lectus at diam. Curabitur pulvinar diam eget est.'),
(28, 7, 'Is that Amitabh Bachchan?'),
(30, 2, 'How did you do the knife?'),
(32, 8, 'Ne quando ridens pri, qui enim choro cu, et dolores vivendum pro. His ipsum praesent ei. Ubique maluisset concludaturque vel cu, detracto lucilius iracundia sit eu. Ea vide volutpat vix. No latine vituperata his, te duo quot accusamus assueverit.'),
(33, 9, 'Eu per dolore epicurei. Sit at everti fabellas. Lobortis scripserit ex qui. Per detracto pertinacia ut. Eu ludus facete sed, vel vocent docendi ne, dicit errem id ius.'),
(34, 2, 'Excellent work.'),
(44, 2, 'Yes, That\'s all done using scanned objects.'),
(45, 2, 'Did you scan the knife?'),
(46, 2, 'Blood looks so real.'),
(49, 3, 'Is that all scannned?'),
(51, 9, 'Color Pencils?'),
(52, 3, 'Cool!!!');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `thumbnail` varchar(200) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `views` int NOT NULL,
  `cat_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `title`, `thumbnail`, `picture`, `views`, `cat_id`) VALUES
(1, 'Lyrics Book 1', 'images/thumbnails/digitalArt/digitalArt1.jpg', 'images/pictures/digitalArt/digitalArt1.jpg', 23, 1),
(2, 'Lyrics Book 2', 'images/thumbnails/digitalArt/digitalArt2.jpg', 'images/pictures/digitalArt/digitalArt2.jpg', 19, 1),
(3, 'Lyrics Book 3', 'images/thumbnails/digitalArt/digitalArt3.jpg', 'images/pictures/digitalArt/digitalArt3.jpg', 76, 1),
(4, 'Lyrics Book 4', 'images/thumbnails/digitalArt/digitalArt4.jpg', 'images/pictures/digitalArt/digitalArt4.jpg', 59, 1),
(5, 'Lyrics Book 5', 'images/thumbnails/digitalArt/digitalArt5.jpg', 'images/pictures/digitalArt/digitalArt5.jpg', 6, 1),
(6, 'Fashion Poster', 'images/thumbnails/digitalArt/digitalArt6.jpg', 'images/pictures/digitalArt/digitalArt6.jpg', 5, 1),
(7, 'Amitabh Bachchan', 'images/thumbnails/fineArt/fineArt1.jpg', 'images/pictures/fineArt/fineArt1.jpg', 12, 2),
(8, 'Still Life', 'images/thumbnails/fineArt/fineArt2.jpg', 'images/pictures/fineArt/fineArt2.jpg', 9, 2),
(9, 'Boy', 'images/thumbnails/fineArt/fineArt3.jpg', 'images/pictures/fineArt/fineArt3.jpg', 7, 2),
(10, 'Scanography', 'images/thumbnails/digitalArt/digitalArt7.jpg', 'images/pictures/digitalArt/digitalArt7.jpg', 9, 1),
(11, 'Abstract', 'images/thumbnails/digitalArt/digitalArt8.jpg', 'images/pictures/digitalArt/digitalArt8.jpg', 41, 1),
(12, 'Vector  Car', 'images/thumbnails/digitalArt/digitalArt9.jpg', 'images/pictures/digitalArt/digitalArt9.jpg', 2, 1),
(13, 'Made Up', 'images/thumbnails/digitalArt/digitalArt10.jpg', 'images/pictures/digitalArt/digitalArt10.jpg', 4, 1),
(14, 'Liquid Ice', 'images/thumbnails/digitalArt/digitalArt11.jpg', 'images/pictures/digitalArt/digitalArt11.jpg', 6, 1),
(15, 'Glassy', 'images/thumbnails/digitalArt/digitalArt12.jpg', 'images/pictures/digitalArt/digitalArt12.jpg', 6, 1),
(16, 'Fashion', 'images/thumbnails/digitalArt/digitalArt13.jpg', 'images/pictures/digitalArt/digitalArt13.jpg', 3, 1),
(17, 'Print 1', 'images/thumbnails/digitalArt/digitalArt14.jpg', 'images/pictures/digitalArt/digitalArt14.jpg', 3, 1),
(18, 'Print 2', 'images/thumbnails/digitalArt/digitalArt15.jpg', 'images/pictures/digitalArt/digitalArt15.jpg', 3, 1),
(19, 'Brochure', 'images/thumbnails/digitalArt/digitalArt16.jpg', 'images/pictures/digitalArt/digitalArt16.jpg', 3, 1),
(20, 'Fashion Card', 'images/thumbnails/digitalArt/digitalArt17.jpg', 'images/pictures/digitalArt/digitalArt17.jpg', 6, 1),
(21, 'Abstract', 'images/thumbnails/digitalArt/digitalArt18.jpg', 'images/pictures/digitalArt/digitalArt18.jpg', 4, 1),
(22, 'Icy Explosion Abstract', 'images/thumbnails/digitalArt/digitalArt19.jpg', 'images/pictures/digitalArt/digitalArt19.jpg', 2, 1),
(23, 'Star Dust', 'images/thumbnails/digitalArt/digitalArt20.jpg', 'images/pictures/digitalArt/digitalArt20.jpg', 2, 1),
(24, 'Abstract Peacock', 'images/thumbnails/digitalArt/digitalArt21.jpg', 'images/pictures/digitalArt/digitalArt21.jpg', 2, 1),
(25, 'New Art', 'images/thumbnails/fineArt/fineArt4.jpg', 'images/pictures/fineArt/fineArt4.jpg', 3, 2),
(26, 'Shetch', 'images/thumbnails/fineArt/fineArt5.jpg', 'images/pictures/fineArt/fineArt5.jpg', 3, 2),
(27, 'Divya Bharti', 'images/thumbnails/fineArt/fineArt6.jpg', 'images/pictures/fineArt/fineArt6.jpg', 3, 2),
(28, 'Cute Dog', 'images/thumbnails/fineArt/fineArt7.jpg', 'images/pictures/fineArt/fineArt7.jpg', 3, 2),
(29, 'Elvis Presley', 'images/thumbnails/fineArt/fineArt8.jpg', 'images/pictures/fineArt/fineArt8.jpg', 3, 2),
(30, 'Color Pencils', 'images/thumbnails/fineArt/fineArt9.jpg', 'images/pictures/fineArt/fineArt9.jpg', 3, 2),
(31, 'Flowers', 'images/thumbnails/fineArt/fineArt10.jpg', 'images/pictures/fineArt/fineArt10.jpg', 3, 2),
(32, 'Hibiscus', 'images/thumbnails/fineArt/fineArt11.jpg', 'images/pictures/fineArt/fineArt11.jpg', 3, 2),
(33, 'Horse', 'images/thumbnails/fineArt/fineArt12.jpg', 'images/pictures/fineArt/fineArt12.jpg', 3, 2),
(34, 'Still Life', 'images/thumbnails/fineArt/fineArt13.jpg', 'images/pictures/fineArt/fineArt13.jpg', 3, 2),
(35, 'Land Scape', 'images/thumbnails/fineArt/fineArt14.jpg', 'images/pictures/fineArt/fineArt14.jpg', 3, 2),
(36, 'Leaves', 'images/thumbnails/fineArt/fineArt15.jpg', 'images/pictures/fineArt/fineArt15.jpg', 3, 2),
(37, 'Architectural Design', 'images/thumbnails/fineArt/fineArt16.jpg', 'images/pictures/fineArt/fineArt16.jpg', 3, 2),
(38, 'Modern Art', 'images/thumbnails/fineArt/fineArt17.jpg', 'images/pictures/fineArt/fineArt17.jpg', 4, 2),
(39, 'Pen Art', 'images/thumbnails/fineArt/fineArt18.jpg', 'images/pictures/fineArt/fineArt18.jpg', 3, 2),
(40, 'Pen Art', 'images/thumbnails/fineArt/fineArt19.jpg', 'images/pictures/fineArt/fineArt19.jpg', 2, 2),
(41, 'Priety Zinta', 'images/thumbnails/fineArt/fineArt20.jpg', 'images/pictures/fineArt/fineArt20.jpg', 2, 2),
(42, 'Mohd. Rafi', 'images/thumbnails/fineArt/fineArt21.jpg', 'images/pictures/fineArt/fineArt21.jpg', 2, 2),
(43, 'Land Scape', 'images/thumbnails/fineArt/fineArt22.jpg', 'images/pictures/fineArt/fineArt22.jpg', 2, 2),
(44, 'Sketch Pen Art', 'images/thumbnails/fineArt/fineArt23.jpg', 'images/pictures/fineArt/fineArt23.jpg', 4, 2),
(45, 'Sketchy Lines', 'images/thumbnails/fineArt/fineArt24.jpg', 'images/pictures/fineArt/fineArt24.jpg', 2, 2),
(46, 'Coloured Pencils', 'images/thumbnails/fineArt/fineArt25.jpg', 'images/pictures/fineArt/fineArt25.jpg', 2, 2),
(47, 'Color Pencils', 'images/thumbnails/fineArt/fineArt26.jpg', 'images/pictures/fineArt/fineArt26.jpg', 2, 2),
(48, 'Free Hand', 'images/thumbnails/fineArt/fineArt27.jpg', 'images/pictures/fineArt/fineArt27.jpg', 3, 2),
(49, 'Land Scape', 'images/thumbnails/fineArt/fineArt28.jpg', 'images/pictures/fineArt/fineArt28.jpg', 2, 2),
(50, 'Vegetables', 'images/thumbnails/fineArt/fineArt29.jpg', 'images/pictures/fineArt/fineArt29.jpg', 2, 2),
(51, 'Pencil Color Flowers', ' images/thumbnails/fineArt/fineArt30.jpg', 'images/pictures/fineArt/fineArt30.jpg', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_name`, `password`) VALUES
('admin', 'sheridan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
