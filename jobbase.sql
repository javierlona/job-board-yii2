-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 23, 2018 at 09:35 PM
-- Server version: 5.7.23-0ubuntu0.16.04.1-log
-- PHP Version: 7.1.23-2+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `create_date`) VALUES
(1, 'Accounting', '2018-10-13 11:58:54'),
(2, 'Business', '2018-10-13 11:58:54'),
(3, 'Construction', '2018-10-13 11:58:54'),
(4, 'Retail', '2018-10-13 11:58:54'),
(5, 'Technology', '2018-10-13 11:58:54'),
(6, 'Finance', '2018-10-13 13:23:45'),
(7, 'Fashion', '2018-10-13 13:43:01'),
(8, 'Education', '2018-10-22 22:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job`
--

CREATE TABLE `tbl_job` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `requirements` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salary_range` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` int(255) NOT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_job`
--

INSERT INTO `tbl_job` (`id`, `category_id`, `user_id`, `title`, `description`, `type`, `requirements`, `salary_range`, `city`, `state`, `zipcode`, `contact_email`, `contact_phone`, `is_published`, `create_date`) VALUES
(1, 5, 1, 'Database Administrator', 'The Database Administrator will be responsible for administering, maintaining, monitoring, and supporting all SQL Server systems.', 'Full Time', 'Bachelor Degree required; degree in computer science preferred\r\nMinimum of 5 years’ experience working in IT\r\nMust have 5+ years of hand-on experience in Database administration in SQL server (2008, 2008 R2, 2012)', '$60k - 80K', 'Boston', 'MA', 61902, 'info@efgcompany.com', '555-888-9999', 1, '2018-10-13 16:27:05'),
(3, 4, 1, 'Experienced Cashier', 'Hiring Cashiers for a wholesale warehouse in our East Ft. Worth location. Must be reliable, have good attendance. Duties include proper ringing up of customer purchases, cash and credit card handling, responsible for cash drawer, helping customers and clean up. We are open 7-days per week so must have an open and flexible schedule. We have full and part-time openings.', 'Part Time', 'You have a high school diploma or equivalent', 'Under $20k', 'Fort Worth', 'TX', 76112, 'info@restaurant.com', '5559997777', 1, '2018-10-14 21:16:56'),
(5, 2, 1, 'Accounting Specialist', 'We are looking for an ambitious and motivated individual with accounting experience to work for a reputable, and stable company that will value what you bring to the organization. A self-motivated individual with accounting experience. Someone who can handle things quickly, but also accurately.', 'Full Time', 'High School Diploma', '$41k - $60k', 'Arlington', 'TX', 76018, 'info@automax.com', '888-666-9999', 1, '2018-10-22 14:43:48'),
(6, 5, 1, 'Web Developer', 'As part of a team responsible for the design, develop, implementation and maintenance of KCM websites and related projects within the KCM guidelines.', 'Full Time', 'BS Computer Science', '$81k - 100k', 'Fort Worth', 'TX', 74054, 'info@church.com', '888-999-5555', 1, '2018-10-22 14:57:40'),
(7, 1, 1, 'Reporting Analyst', 'Provide accounting guidance to Project and Finance Managers.\r\nReview capital/expense (CapEx’s) spend through project life cycle and contracts to make accounting recommendations as appropriate.\r\nReview and prepare/process period journal entries in accordance with period calendar deadlines.', 'Full Time', '3yrs Experiance', '$41k - $60k', 'Plano', 'TX', 75023, 'info@epitec.com', '333-222-1111', 1, '2018-10-22 15:12:39'),
(8, 3, 1, 'Project Manager', 'You will be responsible for running a variety of projects for some of our exceptional clients around the country. As you grown in your role with Tri-North, you will become the primary point of contact for designated client relationships and become their go to Project Manager. As the project manager, you will be responsible for overall communication with the client, including regular check-ins, as well as oversight of the client projects.', 'Full Time', '3yrs experiance', '$61k - $80k', 'Fort Worth', 'TX', 77777, 'info@trinorthbuilders.com', '555-444-6666', 1, '2018-10-22 22:11:08'),
(9, 5, 3, 'Entry-Level Java Developer', 'Xpressdocs, an affiliate of Reynolds and Reynolds, is looking for a Junior Java Developer to join our team in Forth Worth, TX. As a Java Developer you will work in an agile environment and be responsible for designing, developing and maintaining applications for large enterprise backend systems. In addition, you will resolve customer software issues and respond to suggestions for improvements and enhancements to our products. This position is located at Xpressdocs offices in Ft. Worth.', 'Full Time', 'Bachelor\'s degree in Computer Science, Computer Engineering, MIS, or other related field preferred', '$41k - $60k', 'Fort Worth', 'TX', 76101, 'info@xpressdocs.com', '555-444-6666', 1, '2018-10-23 20:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `full_name`, `username`, `email`, `password`, `auth_key`, `create_date`) VALUES
(1, 'James Bond', 'bond007', 'bond007@gmail.com', '$2y$13$wKLohpRKRS2icaSpoBJHO.4v/O/IxNrTUqvLTMRh8KhWoWMShfV.u', 'DEX70t7BhHXYofPosRfQjHcIEvmDPLnV', '2018-10-22 20:43:49'),
(2, 'James Dean', 'Dean', 'dean@gmail.com', '$2y$13$RU.JMbMR0ZxNzLtx6Qhuo.uHb/zX2T4XvMRAjz18IF8IkNv1qAFuq', 'eC4HJg7xU29k-HTJYogE7OjeFsmI0-FA', '2018-10-22 22:06:34'),
(3, 'Bob Smith', 'Bobby', 'bobby@gmail.com', '$2y$13$h1tK.2LaL8ExVkHFR2a9KewPIU5ARBrpxgTc28CdGzVtQUobXSG5a', 'xO5FuMfHSoIjybNg__A2XhaWXFa8qEPK', '2018-10-22 22:08:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_job`
--
ALTER TABLE `tbl_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_job`
--
ALTER TABLE `tbl_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
