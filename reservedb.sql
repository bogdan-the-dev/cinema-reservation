-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2021 at 06:54 PM
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
-- Database: `reservedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `location` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `NoRooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`id`, `Name`, `location`, `NoRooms`) VALUES
(1, 'Cinema Calculatoare', 'Cluj-Napoca', 2),
(2, 'Cinema Automatica', 'Bucuresti', 2);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `movieID` int(11) NOT NULL,
  `startingTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` date NOT NULL,
  `cinemaID` int(11) DEFAULT NULL,
  `roomID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `movieID`, `startingTime`, `date`, `cinemaID`, `roomID`) VALUES
(1, 3, '2021-01-12 16:00:00', '2021-01-12', 1, 1),
(2, 4, '2021-01-12 17:00:00', '2021-01-12', 2, 3),
(3, 5, '2021-01-12 13:00:00', '2021-01-12', 1, 2),
(4, 1, '2021-01-12 20:00:00', '2021-01-12', 1, 1),
(5, 2, '2021-01-12 19:00:00', '2021-01-12', 1, 2),
(6, 2, '2021-01-12 20:00:00', '2021-01-12', 2, 3),
(7, 1, '2021-01-12 12:00:00', '2021-01-12', 2, 4),
(8, 3, '2021-01-09 15:56:48', '2021-01-13', 2, 3),
(9, 4, '2021-01-13 18:45:00', '2021-01-13', 2, 4),
(10, 1, '2021-01-13 10:30:00', '2021-01-13', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `clientID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `message`, `clientID`) VALUES
(1, 'awasome', 5),
(2, 'Imi palce sa ma uit la filme cu database', 15);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `title`, `description`, `duration`) VALUES
(1, 'The man from S.Q.L.', 'In the early 1960s, CIA agent Napoleon Solo and KGB operative Illya Kuryakin participate in a joint mission against a mysterious criminal organization, which is working to proliferate nuclear weapons and steal databases.', 120),
(2, 'The lord of the Foreign Key', 'A meek Hobbit from the Shire and eight companions set out on a journey to destroy the powerful database and save MySQL from the Dark Microsoft SQL Server.', 180),
(3, 'Data Wars, Episodes III Revenge of the Query', 'Three years into the JOIN Wars, the Jedi rescue Palpatine from Count Dooku. As Obi-Wan pursues a new threat, Anakin acts as a double agent between the Jedi Council and Palpatine and is lured into a sinister plan to rule the VARCHAR Galaxy.', 140),
(4, 'A Christmas Query', 'An animated retelling of Calin Cenan\'s classic novel about a Victorian-era miser taken on a journey of data processing, courtesy of several mysterious Christmas apparitions.', 96),
(5, 'SQL Story 3', 'The SQL entries are mistakenly inserted into the user table instead of the order table before Andy leaves for college, and it\'s up to Woody to convince the other queries that they weren\'t abandoned and to return home.\'', 100);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservationID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `ReservationDate` date NOT NULL,
  `IsPaid` tinyint(1) DEFAULT 0,
  `numberOfCustomers` int(11) DEFAULT 1,
  `seatID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservationID`, `userID`, `eventID`, `ReservationDate`, `IsPaid`, `numberOfCustomers`, `seatID`) VALUES
(3, 5, 1, '0000-00-00', 0, 1, 7),
(4, 10, 1, '0000-00-00', 0, 1, 28),
(5, 10, 9, '0000-00-00', 0, 1, 63),
(8, 13, 4, '0000-00-00', 0, 1, 15),
(9, 13, 6, '0000-00-00', 0, 1, 50),
(10, 14, 2, '0000-00-00', 0, 1, 51),
(11, 14, 1, '0000-00-00', 0, 1, 15),
(16, 16, 1, '0000-00-00', 0, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `NoSeats` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `cinemaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `NoSeats`, `name`, `cinemaID`) VALUES
(1, 30, 'P03', 1),
(2, 12, 'D21', 1),
(3, 18, 'UPB', 2),
(4, 6, 'ASE', 2);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `rownr` int(11) DEFAULT NULL,
  `colnr` int(11) DEFAULT NULL,
  `roomID` int(11) DEFAULT NULL,
  `seatPos` varchar(4) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `rownr`, `colnr`, `roomID`, `seatPos`) VALUES
(0, 1, 1, 1, 'A1'),
(1, 1, 2, 1, 'A2'),
(2, 1, 3, 1, 'A3'),
(3, 1, 4, 1, 'A4'),
(4, 1, 5, 1, 'A5'),
(5, 1, 6, 1, 'A6'),
(6, 2, 1, 1, 'B1'),
(7, 2, 2, 1, 'B2'),
(8, 2, 3, 1, 'B3'),
(9, 2, 4, 1, 'B4'),
(10, 2, 5, 1, 'B5'),
(11, 2, 6, 1, 'B6'),
(12, 3, 1, 1, 'C1'),
(13, 3, 2, 1, 'C2'),
(14, 3, 3, 1, 'C3'),
(15, 3, 4, 1, 'C4'),
(16, 3, 5, 1, 'C5'),
(17, 3, 6, 1, 'C6'),
(18, 4, 1, 1, 'D1'),
(19, 4, 2, 1, 'D2'),
(20, 4, 3, 1, 'D3'),
(21, 4, 4, 1, 'D4'),
(22, 4, 5, 1, 'D5'),
(23, 4, 6, 1, 'D6'),
(24, 5, 1, 1, 'E1'),
(25, 5, 2, 1, 'E2'),
(26, 5, 3, 1, 'E3'),
(27, 5, 4, 1, 'E4'),
(28, 5, 5, 1, 'E5'),
(29, 5, 6, 1, 'E6'),
(30, 1, 1, 2, 'A1'),
(31, 1, 2, 2, 'A2'),
(32, 1, 3, 2, 'A3'),
(33, 1, 4, 2, 'A4'),
(34, 1, 5, 2, 'A5'),
(35, 1, 6, 2, 'A6'),
(36, 2, 1, 2, 'B1'),
(37, 2, 2, 2, 'B2'),
(38, 2, 3, 2, 'B3'),
(39, 2, 4, 2, 'B4'),
(40, 2, 5, 2, 'B5'),
(41, 2, 6, 2, 'B6'),
(42, 1, 1, 3, 'A1'),
(43, 1, 2, 3, 'A2'),
(44, 1, 3, 3, 'A3'),
(45, 1, 4, 3, 'A4'),
(46, 1, 5, 3, 'A5'),
(47, 1, 6, 3, 'A6'),
(48, 2, 1, 3, 'B1'),
(49, 2, 2, 3, 'B2'),
(50, 2, 3, 3, 'B3'),
(51, 2, 4, 3, 'B4'),
(52, 2, 5, 3, 'B5'),
(53, 2, 6, 3, 'B6'),
(54, 3, 1, 3, 'C1'),
(55, 3, 2, 3, 'C2'),
(56, 3, 3, 3, 'C3'),
(57, 3, 4, 3, 'C4'),
(58, 3, 5, 3, 'C5'),
(59, 3, 6, 3, 'C6'),
(60, 1, 1, 4, 'A1'),
(61, 1, 2, 4, 'A2'),
(62, 1, 3, 4, 'A3'),
(63, 1, 4, 4, 'A4'),
(64, 1, 5, 4, 'A5'),
(65, 1, 6, 4, 'A6');

-- --------------------------------------------------------

--
-- Table structure for table `userauth`
--

CREATE TABLE `userauth` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `userauth`
--

INSERT INTO `userauth` (`userid`, `username`, `password`) VALUES
(1, 'darklord', '6a7c7e6ab24172bf7ce5f897afce0c61'),
(2, 'cesavezi', 'd41d8cd98f00b204e9800998ecf8427e'),
(3, '1', 'd41d8cd98f00b204e9800998ecf8427e'),
(4, 'ala', '202cb962ac59075b964b07152d234b70'),
(5, 'user2', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'jenica', '63adada0c38fcb3eb4f11548d046dfc7'),
(7, 'tavi', '095b2626c9b6bad0eb89019ea6091bd9'),
(8, 'danutzu', '7315de75b6992d9eb6f64589aa691b0c'),
(9, 'paul001', '202cb962ac59075b964b07152d234b70'),
(10, 'Ion', 'f07cea5a270c83089b29e8831f7e6148'),
(11, 'test1', '202cb962ac59075b964b07152d234b70'),
(12, '12', '979d472a84804b9f647bc185a877a8b5'),
(13, 'floricica', 'abcdc33106ee84f667432998ae825327'),
(14, 'CalulOrtodox25', '85b26b5a71595a4cc71eca631527ea16'),
(15, 'bogdan.szs', 'eed29c6cc025fd8a182a47f0195eeec6'),
(16, 'nemes', '202cb962ac59075b964b07152d234b70'),
(17, 'Palpatine', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `userID` int(11) NOT NULL,
  `FirstName` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `LastName` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `picpath` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`userID`, `FirstName`, `LastName`, `email`, `phone`, `picpath`) VALUES
(1, 'Darth', 'Vader', 'darthvader@galacticempire.co', '1646484846', ''),
(2, 'Nu', 'Am', 'chef@gmail.com', '464687', ''),
(3, 'a', 'a', 'da@gmail.com', '4564546', ''),
(4, 'bala', 'ce', 'ad@gmail.com', '6456464', ''),
(5, 'Vasile', 'Ionescu', 'vasile@gmail.com', '5225455', ''),
(6, 'Jenica', 'Bica', 'jeni@cnrn.ro', '654645878', ''),
(7, 'Tavi', 'Octavianus', 'tavi@yahoo.com', '554215', ''),
(8, 'Danucu', 'Sucu', 'danucu@sinca.ro', '445665', ''),
(9, 'Paul', 'Mic', 'paul@nimic.ro', '46646556', ''),
(10, 'Ion', 'Betivu', 'ion@drojdeala.ro', '0598265852', ''),
(11, '1', '2', '123@gmail.com', '1234567892', ''),
(12, '12', '21', '2123@gmail.com', '5564545', ''),
(13, 'Floricia', 'Dansatoarea', 'iohaniss@gmail.com', '0659874595', ''),
(14, 'Calul', 'Ortodox', 'calul@ortodox.ro', '656465', ''),
(15, 'Bogdan', 'Szasz', 'szasz@bogdan.ro', '0698758952', ''),
(16, 'Andrei', 'Nemes', 'andrei@nemes.ro', '758659852', ''),
(17, 'Sheev ', 'Palpatine', 'sheev.palpatine@galacticempire.ge', '0569875985', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_cinema_id_fk` (`cinemaID`),
  ADD KEY `event_room_id_fk` (`roomID`),
  ADD KEY `event_movie_id_fk` (`movieID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservationID`),
  ADD KEY `reservation_event_id_fk` (`eventID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `seatID` (`seatID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_cinema_id_fk` (`cinemaID`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seats_id_uindex` (`id`),
  ADD KEY `seats_room_id_fk` (`roomID`);

--
-- Indexes for table `userauth`
--
ALTER TABLE `userauth`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userauth`
--
ALTER TABLE `userauth`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_cinema_id_fk` FOREIGN KEY (`cinemaID`) REFERENCES `cinema` (`id`),
  ADD CONSTRAINT `event_movie_id_fk` FOREIGN KEY (`movieID`) REFERENCES `movie` (`id`),
  ADD CONSTRAINT `event_room_id_fk` FOREIGN KEY (`roomID`) REFERENCES `room` (`id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_event_id_fk` FOREIGN KEY (`eventID`) REFERENCES `event` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `userprofile` (`userID`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`seatID`) REFERENCES `seats` (`id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_cinema_id_fk` FOREIGN KEY (`cinemaID`) REFERENCES `cinema` (`id`);

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_room_id_fk` FOREIGN KEY (`roomID`) REFERENCES `room` (`id`);

--
-- Constraints for table `userauth`
--
ALTER TABLE `userauth`
  ADD CONSTRAINT `userauth_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `userprofile` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
