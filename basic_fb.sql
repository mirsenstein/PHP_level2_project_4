-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2019 at 01:16 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basic_fb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `comment`) VALUES
(5, 25, 10, 'Oh, yeah!'),
(6, 31, 10, 'Ð˜ Ð°Ð· Ð¸ÑÐºÐ°Ð¼ Ð´Ð° ÐºÐ¾Ð¼ÐµÐ½Ñ‚Ð¸Ñ€Ð°Ð¼!'),
(7, 31, 11, 'ÐšÐ¾Ð¼ÐµÐ½Ñ‚Ð°Ñ€Ñ‡ÐµÐ½Ñ†ÐµÐµÐµÐµ!! :P'),
(8, 25, 9, 'Dogggooooo!'),
(9, 25, 27, 'So cute!');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `post_id`, `user_id`) VALUES
(16, 24, 10),
(22, 28, 11),
(21, 29, 11),
(24, 30, 11),
(26, 31, 11),
(19, 35, 9),
(20, 35, 11),
(28, 35, 27),
(23, 38, 11),
(27, 39, 9);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_text` text COLLATE utf8_unicode_ci,
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_time` datetime NOT NULL,
  `likes_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_text`, `image`, `date_time`, `likes_num`) VALUES
(24, 9, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '2019-03-20 20:39:37', 0),
(25, 9, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'dog.jpg', '2019-03-20 08:40:08', 0),
(28, 10, '', 'Tina-copertina.jpg', '2019-03-20 20:51:27', 0),
(29, 10, 'Run, wolf! RUN!', NULL, '2019-03-20 20:59:06', 0),
(35, 9, 'Unipotato', '10811621_310637979136270_1629766622_n.jpg', '2019-03-21 23:17:14', 0),
(36, 11, '', 'IMG_5574.JPG', '2019-03-21 23:28:08', 0),
(38, 11, 'Hi, Im lonely!', NULL, '2019-03-22 19:42:12', 0),
(39, 9, 'Cute!', 'dog5.jpg', '2019-03-24 13:49:20', 0),
(41, 27, 'Eto text', 'dog4.jpg', '2019-03-24 14:00:32', 0),
(42, 27, 'More dogs', 'download.jpg', '2019-03-24 14:00:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `names` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `names`) VALUES
(9, 'user1', '$2y$10$jIvHs/j/tpSKUarEqbtUoOjZwbRwvUTWUiTlksTMw6SPbGQoKzfbm', 'The most creative'),
(10, '2user', '$2y$10$jKfxClrJ63Rl8.Alr3PwXeNr4KacAd1FGDdGCCtHtBXdM8IHV2htS', 'YEAH!!!!'),
(11, 'TheLongestName', '$2y$10$hRup7j.CtTmurXSYmaT93.D3zg9ZmkIG2OPgfqUlWD1hXpJI8zLz6', 'NoOne'),
(12, '', '$2y$10$LC3vcZeDAe2Q.R3bDtdEsOB5EeiNYpzzm4nzd81wJd98msV2FZP7y', 'sdfg'),
(20, 'user23', '$2y$10$vYlWz/sEBi.P.C5Os95C5eauDy/mb578EwV1T.wdfrBRbX0/sNGdm', 'HiHello'),
(27, 'user_test', '$2y$10$chg3NpEm0CtZAV4JW5BlrOoBu9wl43qeY7esbMHQEQHtscRcHdyWy', 'Stavri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`,`user_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `post_id` (`post_id`,`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
