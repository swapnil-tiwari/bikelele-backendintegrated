-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2019 at 05:09 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bikelele`
--

-- --------------------------------------------------------

--
-- Table structure for table `bikes`
--

CREATE TABLE `bikes` (
  `bikeid` varchar(255) NOT NULL,
  `bikename` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `imgurl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bikes`
--

INSERT INTO `bikes` (`bikeid`, `bikename`, `type`, `price`, `status`, `imgurl`) VALUES
('27ead07e0', 'UM Renegade', 'Cruise', 240, 'available', 'uploads/bikes/27ead07e0.jpg'),
('318cab401', 'Tiger', 'Adventure', 500, 'Available', 'uploads/bikes/318cab401.jpg'),
('97ead07e0', 'Avenger', 'Cruise', 300, 'available', 'uploads/bikes/97ead07e0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` varchar(255) NOT NULL,
  `bikeid` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `orderdate` varchar(255) NOT NULL,
  `ordertime` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `pickupdate` varchar(255) NOT NULL,
  `pickuptime` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `paymentmode` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `bikeid`, `userid`, `orderdate`, `ordertime`, `duration`, `pickupdate`, `pickuptime`, `amount`, `paymentmode`, `status`) VALUES
('00692a4f4', '318cab401,97ead07e0', '72b34e12e', '22/08/2019', '20:38:42', '', '\n            ', '', 800, 'cod', 'success'),
('09caa1b06', '27ead07e0,318cab401', '518cab401', '22/08/2019', '18:49:35', '5', '08/14/2019\n            ', '10:50', 740, 'cod', 'success'),
('0e4a79c1c', '318cab401,97ead07e0', '72b34e12e', '22/08/2019', '20:38:45', '', '\n            ', '', 800, 'cod', 'success'),
('164646ba2', '97ead07e0,318cab401,27ead07e0', '16ec77da6', '22/08/2019', '19:27:27', '-10', '08/27/2019\n            ', '03:30', 1040, 'cod', 'success'),
('16472ad69', '318cab401,318cab401', '4e1beab7a', '22/08/2019', '19:21:27', '5', '08/27/2019\n            ', '22:50', 1000, 'cod', 'success'),
('2ec5d13fd', '97ead07e0,318cab401', '7b218634c', '22/08/2019', '19:00:15', '-6', '08/22/2019\n            ', '13:05', 800, 'cod', 'success'),
('7c633cd42', '97ead07e0', 'd54cf70b7', '22/08/2019', '19:03:04', '-7', '08/22/2019\n            ', '01:05', 300, 'cod', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(255) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contactnumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `email`, `password`, `contactnumber`, `address`) VALUES
('009e84110', 'swapnil', 'swapnil_tiwari@outlook.com', '123456789', '987456321', '375A/1 MEERAPUR ALLAHABAD'),
('16ec77da6', 'Shivam', 'shuklashivamk2@gmail.com', '123', '7894561230', 'west bengal'),
('37ead07e0', 'nikhilesh', 'nikhileshofficial@gmail.com', '1234567890', '2147483647', 'alpha 1'),
('4e1beab7a', 'Mini', 'mini@gmail.com', 'qwerty', '9874563215', 'Nagpur'),
('518cab401', 'Suryansh Verma', 'suryansh@gmail.com', '123456', '2147483647', 'Allahabad'),
('72b34e12e', 'Arpit', 'arpit@gmail.com', '123456789', '987453215', 'Nauka Vihaar'),
('7b218634c', 'Udit Gupta', 'uditsameer@gmail.com', '12345', '2147483647', 'Aligarh'),
('a95c86897', 'Shivansh', 'shivansh@gmail.com', '123456', '2147483647', 'Delhi'),
('d54cf70b7', 'sameer', 'udit3008@outlook.com', '123', '2147483647', 'Greater Noida'),
('f8f67c874', 'Deepak', 'deepak@gmail.com', 'qwerty', '2147483647', 'Bihaar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bikes`
--
ALTER TABLE `bikes`
  ADD PRIMARY KEY (`bikeid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
