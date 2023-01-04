-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 04, 2023 at 09:50 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `Role_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ID`, `UserID`, `Password`, `Role_ID`) VALUES
(3, 123456798, 'Password', '0');

-- --------------------------------------------------------

--
-- Table structure for table `call_log`
--

CREATE TABLE `call_log` (
  `ID` int(11) NOT NULL,
  `Call_Recording` text NOT NULL,
  `Start_Time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Duration` int(255) NOT NULL,
  `Staff_ID` int(11) NOT NULL,
  `Call_Report_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `call_report`
--

CREATE TABLE `call_report` (
  `ID` int(11) NOT NULL,
  `Handler_ID` int(11) NOT NULL,
  `Person_ID` int(11) NOT NULL,
  `Amubulance_Dispatched` tinyint(1) NOT NULL,
  `What_3_Words_ID` int(5) NOT NULL,
  `Call_Transfur` int(5) NOT NULL,
  `Nusance_call` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cityortown`
--

CREATE TABLE `cityortown` (
  `ID` int(3) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contract_type`
--

CREATE TABLE `contract_type` (
  `ID` int(11) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `ID` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`ID`, `Name`) VALUES
(1, 'Bedfordshire'),
(2, 'Berkshire'),
(3, 'Bristol'),
(4, 'Buckinghamshire'),
(5, 'Cambridgeshire'),
(6, 'Cheshire'),
(7, 'City of London'),
(8, 'Cornwall'),
(9, 'Cumbria'),
(10, 'Derbyshire'),
(11, 'Devon'),
(12, 'Dorset'),
(13, 'County Durham'),
(14, 'East Riding of Yorkshire'),
(15, 'East Sussex'),
(16, 'Essex'),
(17, 'Gloucestershire'),
(18, 'Greater London'),
(19, 'Greater London'),
(20, 'Hampshire'),
(21, 'Herefordshire'),
(22, 'Hertfordshire'),
(23, 'Isle of Wight'),
(24, 'Kent'),
(25, 'Lancashire'),
(26, 'Leicestershire'),
(27, 'Lincolnshire'),
(28, 'Merseyside'),
(29, 'Norfolk'),
(30, 'North Yorkshire'),
(31, 'Surrey'),
(32, 'Tyne and Wear'),
(33, 'Warwickshire'),
(34, 'West Midlands'),
(35, 'West Sussex'),
(36, 'West Yorkshire'),
(37, 'Wiltshire'),
(38, 'Worcestershire');

-- --------------------------------------------------------

--
-- Table structure for table `paye`
--

CREATE TABLE `paye` (
  `ID` int(11) NOT NULL,
  `Pay_Band` int(11) NOT NULL,
  `Pay_Rate` int(11) NOT NULL,
  `Bank_Holidays` int(11) NOT NULL,
  `Nights` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `ID` int(11) NOT NULL,
  `Forname` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `Counties_ID` int(11) NOT NULL,
  `PostCode` varchar(9) NOT NULL,
  `Contact_Number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `ID` int(1) NOT NULL,
  `Role_Type` varchar(50) NOT NULL,
  `Pay_Band` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `ID` int(11) NOT NULL,
  `Person_ID` int(11) NOT NULL,
  `Role_ID` int(1) NOT NULL,
  `Contract_Type_ID` int(1) NOT NULL,
  `Call_Count` int(10) NOT NULL,
  `Team_ID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff_clocks`
--

CREATE TABLE `staff_clocks` (
  `ID` int(11) NOT NULL,
  `Logon` datetime NOT NULL,
  `Logoff` datetime NOT NULL,
  `Staff_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stats_dashboard`
--

CREATE TABLE `stats_dashboard` (
  `ID` int(11) NOT NULL,
  `Team_ID` int(2) NOT NULL,
  `Hour` int(5) NOT NULL,
  `Day` int(5) NOT NULL,
  `Week` int(5) NOT NULL,
  `Month` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `what_3_words`
--

CREATE TABLE `what_3_words` (
  `ID` int(11) NOT NULL,
  `Word_1` varchar(50) NOT NULL,
  `Word_2` varchar(50) NOT NULL,
  `Word_3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `call_log`
--
ALTER TABLE `call_log`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Staff_ID` (`Staff_ID`);

--
-- Indexes for table `cityortown`
--
ALTER TABLE `cityortown`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contract_type`
--
ALTER TABLE `contract_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `paye`
--
ALTER TABLE `paye`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Contract_Type_ID` (`Contract_Type_ID`),
  ADD KEY `Person_ID` (`Person_ID`),
  ADD KEY `Role_ID` (`Role_ID`),
  ADD KEY `Team_ID` (`Team_ID`);

--
-- Indexes for table `staff_clocks`
--
ALTER TABLE `staff_clocks`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Staff_ID` (`Staff_ID`);

--
-- Indexes for table `stats_dashboard`
--
ALTER TABLE `stats_dashboard`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Team_ID` (`Team_ID`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `call_log`
--
ALTER TABLE `call_log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cityortown`
--
ALTER TABLE `cityortown`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_type`
--
ALTER TABLE `contract_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counties`
--
ALTER TABLE `counties`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `paye`
--
ALTER TABLE `paye`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_clocks`
--
ALTER TABLE `staff_clocks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stats_dashboard`
--
ALTER TABLE `stats_dashboard`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `call_log`
--
ALTER TABLE `call_log`
  ADD CONSTRAINT `call_log_ibfk_1` FOREIGN KEY (`Staff_ID`) REFERENCES `staff` (`ID`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`Contract_Type_ID`) REFERENCES `contract_type` (`ID`),
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`Person_ID`) REFERENCES `person` (`ID`),
  ADD CONSTRAINT `staff_ibfk_3` FOREIGN KEY (`Role_ID`) REFERENCES `role` (`ID`),
  ADD CONSTRAINT `staff_ibfk_4` FOREIGN KEY (`Team_ID`) REFERENCES `teams` (`ID`);

--
-- Constraints for table `staff_clocks`
--
ALTER TABLE `staff_clocks`
  ADD CONSTRAINT `staff_clocks_ibfk_1` FOREIGN KEY (`Staff_ID`) REFERENCES `staff` (`ID`);

--
-- Constraints for table `stats_dashboard`
--
ALTER TABLE `stats_dashboard`
  ADD CONSTRAINT `stats_dashboard_ibfk_1` FOREIGN KEY (`Team_ID`) REFERENCES `teams` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
