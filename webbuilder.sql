-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2015 at 05:56 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webbuilder`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(11) NOT NULL,
  `content_html` longtext,
  `isMenu` varchar(1) NOT NULL,
  `content_menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `html`
--

CREATE TABLE `html` (
  `id` int(255) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `menus` varchar(255) DEFAULT NULL,
  `header` longtext,
  `footer` longtext,
  `body` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jd_repair`
--

CREATE TABLE `jd_repair` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `site` varchar(255) DEFAULT 'NA',
  `address` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `since` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `mapdata` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `institute` varchar(255) DEFAULT NULL,
  `itemurl` varchar(1000) DEFAULT NULL,
  `assigned_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media_arch`
--

CREATE TABLE `media_arch` (
  `id` int(100) NOT NULL,
  `res_name` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `template_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `template_id` varchar(255) NOT NULL,
  `menu_title` varchar(255) NOT NULL,
  `hassubmenu` tinyint(1) DEFAULT '1',
  `a_href` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `submenu_id` varchar(255) NOT NULL DEFAULT '',
  `submenu_title` varchar(255) DEFAULT NULL,
  `menu_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(11) NOT NULL,
  `template_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `template_url` varchar(255) DEFAULT NULL,
  `template_res_url` varchar(255) DEFAULT NULL,
  `saved_name` varchar(255) DEFAULT NULL,
  `template_name` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_html`
--

CREATE TABLE `user_html` (
  `user_id` varchar(255) NOT NULL,
  `html_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `html`
--
ALTER TABLE `html`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jd_repair`
--
ALTER TABLE `jd_repair`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `media_arch`
--
ALTER TABLE `media_arch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`submenu_id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- Indexes for table `user_html`
--
ALTER TABLE `user_html`
  ADD PRIMARY KEY (`user_id`,`html_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `html`
--
ALTER TABLE `html`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jd_repair`
--
ALTER TABLE `jd_repair`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `media_arch`
--
ALTER TABLE `media_arch`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
