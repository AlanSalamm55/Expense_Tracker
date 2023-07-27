-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 10:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `ID` int(10) NOT NULL,
  `UserEmail` varchar(20) NOT NULL,
  `ExpenseDate` date DEFAULT NULL,
  `ExpenseItem` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ExpenseCost` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `NoteDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`ID`, `UserEmail`, `ExpenseDate`, `ExpenseItem`, `ExpenseCost`, `NoteDate`) VALUES
(41, '44@gmail.com', '2023-05-15', 'alan', '5000', '2023-05-09 11:51:23'),
(42, 'alans@gmail.com', '2000-03-31', 'slave', '40', '2023-05-09 11:52:04'),
(47, 'alans@gmail.com', '2023-05-09', 'aa', '1', '2023-05-09 13:08:58'),
(57, 'alan@ex.com', '2023-05-13', 'awro', '250', '2023-05-13 06:46:57'),
(58, 'alan@ex.com', '2023-05-12', 'dune', '500', '2023-05-13 06:47:13'),
(59, 'alan@ex.com', '2022-05-13', 'LastYear', '1000', '2023-05-13 06:47:41'),
(60, 'alan@ex.com', '2021-05-13', 'lastYearAkid', '400', '2023-05-13 06:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(10) NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobilenumber` bigint(10) DEFAULT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `email`, `mobilenumber`, `password`, `RegDate`, `status`) VALUES
(23, 'Alan Salam Mohammed', '55@gmail.com', 1212112121, '46756b989b1050a317258e6d5e8e9891', '2023-05-07 21:40:36', 0),
(24, 'alansalam', 'alans@gmail.com', 6545654565, '978f9c8fa30137baf3b46e82f1e91e08', '2023-05-08 17:38:58', 0),
(25, 'alands', '44@gmail.com', 5464646546, '93279e3308bdbbeed946fc965017f67a', '2023-05-09 16:51:31', 0),
(26, 'alan slam', 'alan@ex.com', 1212121212, '96e79218965eb72c92a549dd5a330112', '2023-05-09 17:16:35', 0),
(27, 'hakam', 'hakam@ex.com', 1111111111, '96e79218965eb72c92a549dd5a330112', '2023-05-10 06:18:56', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
