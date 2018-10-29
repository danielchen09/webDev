-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 02, 2018 at 09:11 AM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `Fid` int(11) NOT NULL,
  `Oid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`Fid`, `Oid`, `name`, `amount`) VALUES
(7, 8, 'BBQ.jpg', 1),
(8, 8, '4cheese.jpg', 1),
(9, 9, '4cheese.jpg', 1),
(10, 9, 'BBQ.jpg', 1),
(11, 9, 'Best.jpg', 4),
(12, 10, 'leaf.jpg', 10),
(13, 10, 'salmon.jpg', 5),
(14, 11, '4cheese.jpg', 2),
(15, 11, 'Best.jpg', 3),
(16, 11, 'BBQ.jpg', 1),
(17, 12, '4cheese.jpg', 1),
(18, 12, 'BBQ.jpg', 1),
(19, 12, 'Best.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `foodorder`
--

CREATE TABLE `foodorder` (
  `Oid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foodorder`
--

INSERT INTO `foodorder` (`Oid`, `username`) VALUES
(8, 'aa'),
(9, 'aa'),
(10, 'j'),
(11, 'Jessie'),
(12, 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `address` varchar(100) NOT NULL,
  `FName` varchar(20) NOT NULL,
  `LName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Uid`, `username`, `password`, `address`, `FName`, `LName`) VALUES
(1, 'aa', '961b6dd3ede3cb8ecbaacbd68de040cd78eb2ed5889130cceb4c49268ea4d506', 'aa', '', ''),
(2, 'bb', '3b64db95cb55c763391c707108489ae18b4112d783300de38e033b4c98c3deaf', 'bb', 'bb', 'bb'),
(3, 'danielchen', '7665aa0eae7acdecf6a344e5836114cb98d6d869b59f2a9ba0a335a0a8a896d2', 'mars', 'daniel', 'chen'),
(4, 'qwer', 'f6f2ea8f45d8a057c9566a33f99474da2e5c6a6604d736121650e2730c6fb0a3', 'werqwer', 'qw', 'er'),
(5, 'j', '189f40034be7a199f1fa9891668ee3ab6049f82d38c68be70f596eab2e1857b7', 'j', 'j', 'c'),
(6, '', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', '', '', ''),
(7, 'cc', '355b1bbfc96725cdce8f4a2708fda310a80e6d13315aec4e5eed2a75fe8032ce', 'cc', '', ''),
(8, 'Jessie', 'd04e7ee84cd3bb0ce3d7a55de533d6c26ea8ab163f6dea1fad9a41b60585fba2', '', 'Jessie ', 'Huang '),
(9, 'Sean Hung', 'fb68ddfaf334da24110bc3b5c3f39ec62db48b3e3a4a834a59816ad8f2750a0c', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`Fid`);

--
-- Indexes for table `foodorder`
--
ALTER TABLE `foodorder`
  ADD PRIMARY KEY (`Oid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `Fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `foodorder`
--
ALTER TABLE `foodorder`
  MODIFY `Oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
