-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 01:17 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'Javascript'),
(5, 'PHP/ MySql'),
(6, 'JAVA'),
(11, 'Bootstrap');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(5) NOT NULL,
  `comment_post_id` int(5) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 5, 'Utsav D. Joshi', 'utsav@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In nec ornare ipsum. Nulla leo velit, viverra condimentum est nec, volutpat hendrerit leo. Phasellus quis odio risus.', 'approved', '2017-07-06 00:00:00'),
(7, 2, 'Kathrine', 'kathrine@gmail.com', 'Nulla leo velit, viverra condimentum est nec, volutpat hendrerit leo. Phasellus quis odio risus.', 'approved', '2017-07-06 23:47:18'),
(8, 2, 'Utsav', 'utsav@gmail.com', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.', 'disapproved', '2017-07-07 00:22:23'),
(9, 2, 'James', 'james@gmai.com', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.', 'approved', '2017-07-07 00:38:29'),
(10, 5, 'John', 'john@gmail.com', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.', 'approved', '2017-07-07 00:42:08'),
(11, 5, 'Trisha', 'trisha@gmail.com', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.', 'approved', '2017-07-07 00:44:51'),
(12, 2, 'Trisha', 'trisha@gmail.com', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.', 'approved', '2017-07-07 00:45:40'),
(13, 5, 'Hanna', 'hanna@gmail.com', 'This is awesome!!', 'approved', '2017-07-07 01:33:00'),
(15, 2, 'Jake', 'jake@gmail.com', 'Mauris aliquam neque rutrum leo efficitur scelerisque. Nulla vulputate semper neque, vel accumsan enim. Morbi varius erat faucibus magna volutpat rhoncus.', 'approved', '2017-07-07 01:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(5) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(2, 2, 'Javascript is awesome', 'John Doe', '2017-07-06', 'cms3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ipsum nunc, suscipit eget congue id, viverra id est. In tincidunt nisi ac dictum porttitor. Phasellus consequat sed augue ut lobortis. Quisque rutrum nisl ut augue porttitor tempus. Sed turpis nunc, dignissim eget nulla eu, laoreet pharetra ante. Sed eget massa ex. Curabitur vitae ex ut nisl iaculis bibendum sed a eros. Pellentesque eget mollis sem, at rhoncus felis. Phasellus vulputate massa eget metus vulputate, eu aliquet tortor elementum. Sed ac eros turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla pulvinar ipsum a leo aliquet porta. Quisque lacinia accumsan pulvinar. Vivamus eu nunc in elit volutpat condimentum. Suspendisse potenti. Vestibulum maximus turpis sit amet nisl hendrerit, nec porttitor felis dignissim.\r\n\r\nVestibulum auctor quam id ipsum viverra tempus. Pellentesque commodo mollis enim vel euismod. Suspendisse potenti. Vestibulum eu egestas leo. Integer elementum, justo non elementum congue, ligula est lobortis dolor, at iaculis velit erat at lectus. Aenean sit amet diam vitae augue finibus tincidunt. Aliquam posuere erat a dolor commodo tincidunt. In in purus id lectus bibendum commodo. Ut iaculis sem justo, sit amet tristique dolor tincidunt eget. Sed mollis ornare metus. Vivamus ut justo orci. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nDonec sodales auctor ipsum, a posuere sem aliquam a. In interdum eros erat, at facilisis magna molestie vitae. Proin dolor ipsum, viverra quis sollicitudin quis, vehicula eu diam. Nulla erat sapien, sagittis ac odio at, sollicitudin imperdiet mauris. Aenean eleifend vehicula varius. Pellentesque vehicula dapibus eros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi lacus felis, rhoncus quis justo nec, sodales bibendum enim. Donec elementum a justo et venenatis. Mauris hendrerit purus at velit laoreet volutpat. Suspendisse vitae pretium turpis. Mauris aliquam neque rutrum leo efficitur scelerisque. Nulla vulputate semper neque, vel accumsan enim. Morbi varius erat faucibus magna volutpat rhoncus.', 'javascript2, course, class, john', 5, 'draft'),
(5, 6, 'Best Game Ever!!!', 'James Bond', '2017-07-06', 'cms2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ipsum nunc, suscipit eget congue id, viverra id est. In tincidunt nisi ac dictum porttitor. Phasellus consequat sed augue ut lobortis. Quisque rutrum nisl ut augue porttitor tempus. Sed turpis nunc, dignissim eget nulla eu, laoreet pharetra ante. Sed eget massa ex. Curabitur vitae ex ut nisl iaculis bibendum sed a eros. Pellentesque eget mollis sem, at rhoncus felis. Phasellus vulputate massa eget metus vulputate, eu aliquet tortor elementum. Sed ac eros turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla pulvinar ipsum a leo aliquet porta. Quisque lacinia accumsan pulvinar. Vivamus eu nunc in elit volutpat condimentum. Suspendisse potenti. Vestibulum maximus turpis sit amet nisl hendrerit, nec porttitor felis dignissim.\r\n\r\nVestibulum auctor quam id ipsum viverra tempus. Pellentesque commodo mollis enim vel euismod. Suspendisse potenti. Vestibulum eu egestas leo. Integer elementum, justo non elementum congue, ligula est lobortis dolor, at iaculis velit erat at lectus. Aenean sit amet diam vitae augue finibus tincidunt. Aliquam posuere erat a dolor commodo tincidunt. In in purus id lectus bibendum commodo. Ut iaculis sem justo, sit amet tristique dolor tincidunt eget. Sed mollis ornare metus. Vivamus ut justo orci. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nDonec sodales auctor ipsum, a posuere sem aliquam a. In interdum eros erat, at facilisis magna molestie vitae. Proin dolor ipsum, viverra quis sollicitudin quis, vehicula eu diam. Nulla erat sapien, sagittis ac odio at, sollicitudin imperdiet mauris. Aenean eleifend vehicula varius. Pellentesque vehicula dapibus eros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi lacus felis, rhoncus quis justo nec, sodales bibendum enim. Donec elementum a justo et venenatis. Mauris hendrerit purus at velit laoreet volutpat. Suspendisse vitae pretium turpis. Mauris aliquam neque rutrum leo efficitur scelerisque. Nulla vulputate semper neque, vel accumsan enim. Morbi varius erat faucibus magna volutpat rhoncus.', 'james, bond, 007, game, best', 5, 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `rand_salt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `rand_salt`) VALUES
(2, 'admin', '1234', 'Utsav', 'Joshi', 'admin@gmail.com', '', 'Admin', ''),
(3, 'james', '1234', 'James', 'Taylor', 'james@gmail.com', '', 'Subscriber', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
