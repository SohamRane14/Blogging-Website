-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2021 at 08:30 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `created_at`) VALUES
(1, 1, 'technology', '2021-05-13 05:29:13'),
(2, 1, 'business', '2021-05-13 05:29:22');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `body`, `created_at`) VALUES
(1, 4, 'Onkar Jadhav', 'omjadhav2610@gmail.com', 'Great post! \r\nThanks for sharing!', '2021-05-13 05:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `body`, `created_at`) VALUES
(1, 1, 1, 'My first post', 'My-first-post', '<p><strong>Lorem ipsum dolor sit amet,</strong> consectetur adipiscing elit. Maecenas ut consectetur nibh, ac fermentum augue. Vestibulum nec feugiat ligula. Donec eu nulla nibh. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque faucibus justo tristique malesuada tristique. Mauris <i>hendrerit euismod lacinia</i>. In sodales ex ut lectus feugiat facilisis. Suspendisse potenti. Praesent elit urna, commodo non nisl sed, sodales pharetra lacus. Aliquam fermentum maximus eros et ullamcorper. Cras pulvinar lorem ut vulputate semper.</p><blockquote><p>Ut feugiat sem id urna posuere suscipit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Quisque non venenatis neque. Quisque tristique eget felis vel varius. In tortor dui, porttitor in porta id, mattis quis ipsum. Quisque ut tempus ex. Proin facilisis commodo sollicitudin. Morbi condimentum mi lectus. Aenean eget dui est. Suspendisse a libero lobortis, gravida sapien id, blandit mauris.</p></blockquote><p>Aenean varius purus id sem varius, in finibus diam porttitor. Duis consequat dui et est porttitor cursus. Nullam sodales eget tellus vel finibus. Nulla ac tincidunt est, vel congue purus. Nulla interdum ipsum purus, non scelerisque augue pulvinar ac. Ut a erat posuere, lobortis nulla in, venenatis massa. Nunc eget sollicitudin nisl.</p>', '2021-05-13 05:29:58'),
(2, 2, 1, 'My second post', 'My-second-post', '<p><strong>Aenean</strong> varius purus id sem varius, in finibus diam porttitor. Duis consequat dui et est porttitor cursus. Nullam sodales eget tellus vel finibus. Nulla ac tincidunt est, vel congue purus. Nulla interdum ipsum purus, non scelerisque augue pulvinar ac. Ut a erat posuere, lobortis nulla in, venenatis massa. Nunc eget sollicitudin nisl.</p><p>Pellentesque varius dui quis ligula pulvinar, in luctus nisi euismod. Proin fringilla nibh id nisl blandit venenatis. Aenean a volutpat felis. Proin sed feugiat lacus. Nunc efficitur dolor at porttitor egestas. Curabitur porta justo sem, in dapibus elit vestibulum consectetur. Fusce gravida metus leo, eget vestibulum ex consectetur id. Vestibulum pulvinar nec quam id gravida. Phasellus sed pharetra libero. Praesent vel vehicula nulla. Sed euismod aliquam augue eu suscipit. Nulla tincidunt felis sed odio placerat tincidunt. Aenean pharetra interdum magna, sit amet molestie tellus convallis nec. Duis luctus, diam vel placerat pretium, eros lorem gravida nisl, at sagittis orci neque eget velit.</p><p>Ut posuere mi nibh, in fringilla velit sagittis id. Aliquam ac porta nibh, sed pharetra risus. Pellentesque ac ornare metus, nec porta diam. Morbi porttitor malesuada nisi, eget mattis neque placerat eget. Curabitur lacus metus, feugiat quis volutpat sit amet, aliquet consectetur est. Mauris accumsan maximus lorem eu finibus. Integer varius, lorem vitae lobortis sodales, sem orci pulvinar ante, sed auctor quam neque sit amet urna. Mauris malesuada lectus sapien. Donec eget sem id orci consequat aliquet. Nunc luctus tincidunt erat, nec vehicula velit cursus posuere.</p>', '2021-05-13 05:32:13'),
(3, 2, 1, 'Post no 3 ', 'Post-no-3', '<p><strong>Donec </strong>lobortis faucibus purus, dictum vulputate massa posuere semper. Aenean ex quam, finibus in ante in, elementum egestas felis. Suspendisse sed lectus elementum, ullamcorper mi ac, pulvinar elit. Phasellus vitae sapien gravida, congue dolor sed, condimentum metus. Vestibulum posuere sagittis auctor. Nam molestie elit in massa molestie consectetur. Donec sollicitudin quam nisi, sit amet semper dolor posuere ac. Vivamus posuere enim ligula, id varius sem auctor quis. Ut lobortis justo sed nunc gravida, ut rhoncus felis euismod. Vivamus vehicula sollicitudin lacus eu interdum. Aenean mi sapien, maximus nec vestibulum id, venenatis id ante. Donec sit amet euismod sem.</p><p>Maecenas nec tempor est, at molestie sem. Pellentesque erat elit, pellentesque et suscipit sed, efficitur sed ex. Praesent fermentum, erat id finibus imperdiet, turpis quam mattis libero, varius ornare est ex et odio. Duis tempus velit vitae ultrices molestie. Vestibulum dignissim velit eget rhoncus egestas. Aliquam laoreet nec diam eget laoreet. In id quam ac est molestie volutpat. Pellentesque rutrum feugiat nisl, non tincidunt risus semper id. Pellentesque lacinia vitae lorem quis mollis. Aenean ultrices odio at vulputate auctor. Morbi quis felis sed odio malesuada tempor. Mauris mattis nulla at libero porttitor, in venenatis erat efficitur.&nbsp;</p><ol><li>Nullam</li><li>facilisis&nbsp;</li><li>facilisis&nbsp;</li><li>magna&nbsp;</li><li>accumsan.</li></ol>', '2021-05-13 05:35:39'),
(4, 1, 1, 'An interesting title', 'An-interesting-title', '<p>Duis aliquet cursus ipsum, non blandit risus varius vitae. Mauris at ante quis mauris pretium dictum non tempus est. Nulla auctor tellus quis nibh elementum euismod. Nulla et volutpat neque. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec ut nulla ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam dolor nulla, aliquet sed leo sit amet, egestas laoreet lacus. Curabitur porta non orci nec condimentum. Curabitur leo dolor, congue vulputate malesuada nec, commodo vel lectus. Pellentesque luctus ullamcorper sodales. Nunc maximus finibus elit. Cras cursus malesuada fringilla. Suspendisse euismod metus tincidunt, mattis orci pulvinar, consequat tellus.</p><h2>Sed rutrum tincidunt hendrerit.</h2><p>Sed pharetra scelerisque placerat. Fusce tincidunt, lacus a hendrerit lobortis, lectus quam egestas massa, eget consequat sem nibh nec sapien. Pellentesque dictum arcu rhoncus arcu placerat aliquam. Aliquam vitae ultricies massa. Praesent eu auctor risus. Phasellus vel ligula ullamcorper, condimentum nisi eget, suscipit ipsum. Curabitur a lacus malesuada, luctus metus eget, ullamcorper arcu. Integer ac augue ipsum. Etiam dapibus quam elementum, malesuada leo a, ornare massa.</p>', '2021-05-13 05:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `zipcode`, `email`, `username`, `password`, `register_date`) VALUES
(1, 'Admin', '412106', 'omjadhav2610@gmail.com', 'admin', '$2y$10$ShEZz0AGsIEDbST6fXCYteywRmSIF9KVgKDIHhbiGZ7A8rg9BQMJ2', '2021-05-13 05:27:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
