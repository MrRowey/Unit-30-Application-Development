-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 26, 2022 at 06:36 PM
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
  `Managment` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ID`, `UserID`, `Password`, `Managment`) VALUES
(1, 123456789, 'gEx_L9jZ6qZr7fn', 1);

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
  `Patient_ID` int(11) NOT NULL,
  `Patient_Issuse` text NOT NULL,
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
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `ID` int(1) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `county`
--

CREATE TABLE `county` (
  `ID` int(3) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `ID` int(11) NOT NULL,
  `Person_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Address_ID` int(4) NOT NULL,
  `Contact_Number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `person_address`
--

CREATE TABLE `person_address` (
  `ID` int(11) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `CityOrTown_ID` int(3) NOT NULL,
  `County_ID` int(3) NOT NULL,
  `Country_ID` int(1) NOT NULL,
  `Postcode` varchar(8) NOT NULL
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
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `county`
--
ALTER TABLE `county`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Person_ID` (`Person_ID`);

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
-- Indexes for table `person_address`
--
ALTER TABLE `person_address`
  ADD KEY `CityOrTown_ID` (`CityOrTown_ID`),
  ADD KEY `Country_ID` (`Country_ID`),
  ADD KEY `County_ID` (`County_ID`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `county`
--
ALTER TABLE `county`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`Person_ID`) REFERENCES `person` (`ID`);

--
-- Constraints for table `person_address`
--
ALTER TABLE `person_address`
  ADD CONSTRAINT `person_address_ibfk_1` FOREIGN KEY (`CityOrTown_ID`) REFERENCES `cityortown` (`ID`),
  ADD CONSTRAINT `person_address_ibfk_2` FOREIGN KEY (`Country_ID`) REFERENCES `country` (`ID`),
  ADD CONSTRAINT `person_address_ibfk_3` FOREIGN KEY (`County_ID`) REFERENCES `county` (`ID`);

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
