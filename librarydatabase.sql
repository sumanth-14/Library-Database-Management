-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 03:13 PM
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
-- Database: `librarydatabase`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `returnbook` (IN `issueid` INT)  BEGIN
DELETE FROM issue WHERE issue_id=issueid;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `isbn_num` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `publisher_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `isbn_num`, `title`, `author`, `branch_id`, `publisher_id`) VALUES
(30, 29, 'The Inheritance of Loss', 'Kiran Desai', 26, 25),
(33, 32, 'Shantaram', 'Gregory David Roberts', 23, 23),
(34, 33, 'Concepts of physics', 'HC Ver', 25, 24),
(35, 34, 'Engineering Mathematics', 'Rishabh kohli', 31, 31),
(36, 35, 'Data Structure', 'Balaguruswamy', 23, 32),
(40, 36, 'MEI', 'Bhaskar Rao', 23, 34);

--
-- Triggers `books`
--
DELIMITER $$
CREATE TRIGGER `insert_log` AFTER INSERT ON `books` FOR EACH ROW BEGIN
INSERT INTO book_logs VALUES (NEW.title,'INSERTED',NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_log` AFTER UPDATE ON `books` FOR EACH ROW BEGIN
INSERT INTO book_logs VALUES (NEW.title,'UPDATED',NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `book_logs`
--

CREATE TABLE `book_logs` (
  `book_name` varchar(20) NOT NULL,
  `action` varchar(20) NOT NULL,
  `date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_logs`
--

INSERT INTO `book_logs` (`book_name`, `action`, `date`) VALUES
('fguhiujo', 'UPDATED', '2021-01-20 14:47:53'),
('fguhiujo', 'DELETED', '2021-01-20 14:47:53'),
('fguhiujo', 'INSERTED', '2021-01-20 14:47:53'),
('fghjk', 'INSERTED', '2021-01-20 14:52:44'),
('fghjk', 'DELETED', '2021-01-20 14:52:44'),
('fghhhggf', 'UPDATED', '2021-01-20 14:56:13'),
('A Suitable Boy', 'INSERTED', '2021-01-20 18:27:36'),
('The God of Small Thi', 'INSERTED', '2021-01-20 18:29:01'),
('Midnight’s Children', 'INSERTED', '2021-01-20 18:30:24'),
('The Inheritance of L', 'INSERTED', '2021-01-20 18:31:25'),
('Shantaram', 'INSERTED', '2021-01-20 18:33:44'),
('The White Tiger', 'INSERTED', '2021-01-20 18:34:55'),
('Shantaram', 'INSERTED', '2021-01-20 18:41:48'),
('Concepts of physics', 'INSERTED', '2021-01-20 18:42:30'),
('Engineering Mathemat', 'INSERTED', '2021-01-20 18:43:40'),
('Data Structure', 'INSERTED', '2021-01-20 18:44:30'),
('Concepts of physics', 'UPDATED', '2021-01-21 06:04:12'),
('Forest Gump', 'INSERTED', '2021-01-27 12:27:45'),
('Forest Gump', 'UPDATED', '2021-01-27 12:28:11'),
('MEI', 'INSERTED', '2021-01-27 14:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `issue_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `issue_date` date NOT NULL DEFAULT current_timestamp(),
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`issue_id`, `book_id`, `user_id`, `issue_date`, `return_date`) VALUES
(51, 35, 18, '2021-01-21', '0000-00-00'),
(53, 35, 11, '2021-01-21', '0000-00-00'),
(54, 36, 11, '2021-01-21', '0000-00-00'),
(57, 36, 16, '2021-01-21', '0000-00-00'),
(58, 34, 16, '2021-01-21', '0000-00-00'),
(60, 33, 11, '2021-01-21', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `library_branch`
--

CREATE TABLE `library_branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(25) NOT NULL,
  `branch_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library_branch`
--

INSERT INTO `library_branch` (`branch_id`, `branch_name`, `branch_address`) VALUES
(23, 'DSATM', 'Bangalore'),
(24, 'DSATM', 'Bangalore'),
(25, 'DSCE', 'Mangalore'),
(26, 'RVCE', 'Bangalore'),
(27, 'DSATM', 'Bangalore'),
(28, 'DSCE', 'Mangalore'),
(29, 'DSATM', 'Bangalore'),
(30, 'DSCE', 'Mangalore'),
(31, 'JSS', 'Mysore'),
(32, 'DSATM', 'Bangalore'),
(33, 'DSATM', 'Bangalore'),
(34, 'DSI', 'Mysore'),
(35, 'DSATM', 'Bangalore'),
(36, 'DSATM', 'Bangalore');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL,
  `publisher_name` varchar(50) NOT NULL,
  `publisher_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_address`) VALUES
(23, 'Penguin Random House', 'Jaipur'),
(24, 'Hachette Livre', 'Mumbai'),
(25, 'HarperCollins', 'Hyderabad'),
(26, 'HarperCollins', 'Hy'),
(27, 'Penguin Random House', 'Jaipur'),
(28, 'Hachette Livre', 'Mu'),
(29, 'Penguin Random House', 'Jaipur'),
(30, 'Hachette Livre', 'Hyderabad'),
(31, 'McGraw Hill', 'Pune'),
(32, 'Arihant', 'Delhi'),
(33, 'Arihant', 'Mumbai'),
(34, 'oswaal', 'london'),
(35, 'Arihant', 'Mumbai'),
(36, 'oswaal', 'london');

-- --------------------------------------------------------

--
-- Table structure for table `readers`
--

CREATE TABLE `readers` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `readers`
--

INSERT INTO `readers` (`user_id`, `username`, `password`) VALUES
(8, 'testuser', '$2y$10$xC0GPh.EILR9MCDqqD6mU.guGIdEEF8pa04uZYS2/7k7b8wt8zzuC'),
(9, 'Lokesh', '$2y$10$ZFI/.k5wG0ooIag0Ub.W7ejHUvY1nKyNVkO2LiRMQXypcb5a2ypom'),
(10, 'sumanth', '$2y$10$YoO14a/MiIc4XpZyy9Wqlu5aN80jjUBQPJ53YPdXBfxwz7LlTDV1K'),
(11, 'prashanth', '$2y$10$WmJItDsQWfJbH0.a3Qi26u3OqiuqkDIncEkyUITexUpl2tA7sVTay'),
(12, 'Prash', '$2y$10$E4WK9R0cQOK3F6gjrJ3/M.bMjsSdNltp7THGlSNHB6YhjZRG8xFg2'),
(13, 'testuser1', '$2y$10$cYWNr9YuS/KpYKrRdpw8WutakX3.Xfg/vKv49u7JaOXnCl9kh4C4K'),
(14, 'reader', '$2y$10$5nd5c4HzLQJOW/Tt2YtOvO5vThHV3FO7cgn/M.e17qll6DL4DsWtG'),
(15, 'test', '$2y$10$YkVuhyQMgpXI9BHz0vxlbedzt/a8ori0Qc3D/A3xwkHFwSt1tRqEC'),
(16, 'dhanush', '$2y$10$LzsO5ZalZ24w.7lM0QtIzOrRU3RY60sshknjCzB4P70o/oqxJkiVe'),
(17, 'vaishnavi', '$2y$10$r/4eQyhk89VNF0UzHRNyJuYE33WIhtZ5d4fdN.km/orryMKNKQU/O'),
(18, 'sumanth14', '$2y$10$vbI6uv.v/t15/Gm.rM2DxepMiCIdjh9bCQimo/A5OKAzDwTsPgchK');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `username`, `password`) VALUES
(1, 'teststaff', '$2y$10$NeHEqMnAK8fxrDJ1gTVveelt.nl8WgUvwGCsIeybudyUKbz5XqefC'),
(2, 'teststaff1', '$2y$10$HoxGnf//pp/kXv.Zam/3/u4SfwopydHfs1cGbd9APWjbDdp441N4O'),
(4, 'teststaff3', '$2y$10$j6osGsLuRRAmzHru2tZOIuafx3hrE9rjifnMyrkGv09UmTjwSfGH.'),
(5, 'admin', '$2y$10$xnJa52xQxdwTiQ5EEYvDUeqtVHP53ScvVMSSyD6RFe3pucvodN202');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `isbn_num` (`isbn_num`),
  ADD KEY `test` (`branch_id`),
  ADD KEY `test1` (`publisher_id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`issue_id`),
  ADD UNIQUE KEY `issue_id` (`issue_id`,`book_id`);

--
-- Indexes for table `library_branch`
--
ALTER TABLE `library_branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indexes for table `readers`
--
ALTER TABLE `readers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `library_branch`
--
ALTER TABLE `library_branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `readers`
--
ALTER TABLE `readers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `test` FOREIGN KEY (`branch_id`) REFERENCES `library_branch` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test1` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`publisher_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
