-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2021 at 08:43 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(5) NOT NULL,
  `book_name` varchar(70) NOT NULL,
  `book_image` varchar(100) NOT NULL,
  `book_author_name` varchar(50) NOT NULL,
  `book_publication_name` varchar(50) NOT NULL,
  `book_purchase_date` varchar(50) NOT NULL,
  `book_price` varchar(10) NOT NULL,
  `book_qty` int(5) NOT NULL,
  `availabele_qty` int(5) NOT NULL,
  `librarian_username` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `availabele_qty`, `librarian_username`, `datetime`) VALUES
(10, 'বেলা ফুরাবার আগে', '20210210090427.png', 'আরিফ আজাদ', 'সমকালীন প্রকাশন', '2021-02-11', '216', 5, 5, 'noman1', '2021-02-10 20:01:34'),
(11, 'আরজ আলী সমীপে', '20210210090401.png', 'আরিফ আজাদ', 'সমকালীন প্রকাশন', '2021-02-11', '188', 8, 8, 'noman1', '2021-02-10 20:04:01'),
(12, 'প্যারাডক্সিক্যাল সাজিদ', '20210210090544.png', 'আরিফ আজাদ', 'গার্ডিয়ান পাবলিকেশনস', '2021-02-11', '195', 10, 10, 'noman1', '2021-02-10 20:05:44'),
(13, 'আল-ফিকহুল আকবর (বঙ্গানুবাদ ও ব্যাখ্যা)', '20210210090739.png', 'ড. খোন্দকার আব্দুল্লাহ জাহাঙ্গীর', 'আস-সুন্নাহ পাবলিকেশন্স', '2021-02-11', '240', 5, 5, 'noman1', '2021-02-10 20:07:39'),
(14, 'রাহে বেলায়াত', '20210210090859.png', 'ড. খোন্দকার আব্দুল্লাহ জাহাঙ্গীর', 'আস-সুন্নাহ পাবলিকেশন্স', '2021-02-11', '315', 10, 10, 'noman1', '2021-02-10 20:08:59'),
(15, 'শেষের কবিতা', '20210210091429.png', 'রবীন্দ্রনাথ ঠাকুর', 'জোনাকী প্রকাশনী', '2021-02-11', '112', 8, 8, 'noman1', '2021-02-10 20:14:29'),
(16, 'জাপান কাহিনী', '20210210092140.png', 'আশির আহমেদ', 'ঐতিহ্য', '2021-02-11', '150', 5, 5, 'noman1', '2021-02-10 20:21:40'),
(17, 'ইতিহাসের খলনায়ক', '20210210092312.png', 'নাফে নজরুল', 'প্রতিভা প্রকাশ', '2021-02-11', '120', 7, 7, 'noman1', '2021-02-10 20:23:12'),
(18, 'বি পজেটিভ', '20210210092517.png', 'মশিউর রহমান শান্ত', 'বর্ষাদুপুর', '2021-02-11', '150', 5, 5, 'noman1', '2021-02-10 20:25:17'),
(19, 'ফান্ডামেন্টাল অব ই-কমার্স', '20210210092723.png', 'সাঈদ রহমান', 'ইত্যাদি গ্রন্থ প্রকাশ', '2021-02-11', '248', 20, 20, 'noman1', '2021-02-10 20:27:23'),
(20, 'স্টোরি অব বিগিনিং', '20210210093003.png', 'ওমর সুলেইমান', 'গার্ডিয়ান পাবলিকেশনস', '2021-02-11', '263', 2, 2, 'noman1', '2021-02-10 20:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `id` int(5) NOT NULL,
  `student_id` int(5) NOT NULL,
  `book_id` int(5) NOT NULL,
  `book_issue_date` varchar(20) NOT NULL,
  `book_return_date` varchar(20) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_books`
--

INSERT INTO `issue_books` (`id`, `student_id`, `book_id`, `book_issue_date`, `book_return_date`, `datetime`) VALUES
(1, 1, 2, '07-02-2021', '08-02-21', '2021-02-07 18:57:10'),
(2, 1, 2, '07-02-2021', '08-02-21', '2021-02-07 19:01:23'),
(3, 1, 8, '07-02-2021', '08-02-21', '2021-02-07 19:01:42'),
(4, 1, 8, '07-02-2021', '08-02-21', '2021-02-07 19:05:28'),
(5, 2, 9, '07-02-2021', '08-02-21', '2021-02-07 19:06:03'),
(6, 1, 2, '08-02-2021', '08-02-21', '2021-02-08 08:15:11'),
(7, 1, 8, '08-02-2021', '08-02-21', '2021-02-08 08:25:58'),
(8, 2, 8, '08-02-2021', '08-02-21', '2021-02-08 08:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `id` int(3) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `datetime`) VALUES
(1, 'Noman', 'Abdullah', 'abdullah@gmail.com', 'noman1', '20eabe5d64b0e216796e834f52d61fd0b70332fc', '2021-02-06 17:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(5) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `roll` int(6) NOT NULL,
  `reg` int(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`, `phone`, `image`, `status`, `datetime`) VALUES
(1, 'Noman', 'Abdullah', 123456, 123456, 'abdullah@gmail.com', 'noman1', '20eabe5d64b0e216796e834f52d61fd0b70332fc', '01715667788', NULL, 1, '2021-02-06 15:07:03'),
(2, 'Abdullah', 'Noman', 123456, 123456, 'noman@gmail.com', 'noman11', '20eabe5d64b0e216796e834f52d61fd0b70332fc', '01715667788', NULL, 1, '2021-02-06 18:40:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `issue_books`
--
ALTER TABLE `issue_books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `librarian`
--
ALTER TABLE `librarian`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
