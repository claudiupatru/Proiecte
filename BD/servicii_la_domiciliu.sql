-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 07:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servicii_la_domiciliu`
--

-- --------------------------------------------------------

--
-- Table structure for table `angajati`
--

CREATE TABLE `angajati` (
  `angajat_id` int(11) NOT NULL,
  `nume` varchar(20) NOT NULL,
  `prenume` varchar(20) NOT NULL,
  `functie` varchar(20) NOT NULL,
  `data_angajarii` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `angajati`
--

INSERT INTO `angajati` (`angajat_id`, `nume`, `prenume`, `functie`, `data_angajarii`) VALUES
(1, 'Andrei', 'Bogdan', 'CEO', '2023-01-15'),
(2, 'Ionescu', 'Ana', 'Veterinar', '2022-05-20'),
(3, 'Dragomir', 'Mihai', 'Asistent Tehnic', '2023-02-10'),
(4, 'Georgescu', 'Andreea', 'Asistent Veterinar', '2023-04-02'),
(5, 'Stoica', 'Alexandru', 'Veterinar', '2022-12-10'),
(6, 'Munteanu', 'Catalin', 'Asistent Tehnic', '2023-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE `clienti` (
  `client_id` int(11) NOT NULL,
  `nume` varchar(20) NOT NULL,
  `prenume` varchar(20) NOT NULL,
  `nr_telefon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`client_id`, `nume`, `prenume`, `nr_telefon`) VALUES
(1, 'Radu', 'Maria', '0721123456'),
(2, 'Dumitrescu', 'Cristian', '0732987654'),
(3, 'Oprea', 'Elena', '0710345678'),
(4, 'Moldoveanu', 'Alina', '0712345678'),
(5, 'Iacob', 'Razvan', '0732123456'),
(6, 'Dinu', 'Ana', '0722987654'),
(7, 'Andrei', 'Ion', '0787567483');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `programare_id` int(11) DEFAULT NULL,
  `nota` int(11) DEFAULT NULL,
  `comentarii` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `programare_id`, `nota`, `comentarii`) VALUES
(1, 1, 4, 'Servicii foarte bune'),
(2, 2, 3, 'A fost intarziere la'),
(3, 3, 5, 'Recomand cu increder'),
(4, 4, 5, 'Servicii excelente!'),
(5, 5, 4, 'Personal amabil si e'),
(6, 6, 3, 'A fost nevoie de o p'),
(7, 1, 4, 'Servicii foarte bune!'),
(8, 2, 3, 'A fost intarziere la programare.'),
(9, 3, 5, 'Recomand cu incredere!'),
(10, 4, 5, 'Servicii excelente!'),
(11, 5, 4, 'Personal amabil si eficient.'),
(12, 6, 3, 'A fost nevoie de o programare mai rapida.');

-- --------------------------------------------------------

--
-- Table structure for table `ore_lucrate`
--

CREATE TABLE `ore_lucrate` (
  `ore_lucrata_id` int(11) NOT NULL,
  `angajat_id` int(11) DEFAULT NULL,
  `nr_ore` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ore_lucrate`
--

INSERT INTO `ore_lucrate` (`ore_lucrata_id`, `angajat_id`, `nr_ore`) VALUES
(1, 1, 6),
(2, 2, 5),
(3, 3, 3),
(4, 4, 7),
(5, 5, 4),
(6, 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `programari`
--

CREATE TABLE `programari` (
  `programare_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `angajat_id` int(11) DEFAULT NULL,
  `serviciu_id` int(11) DEFAULT NULL,
  `data_programare` date DEFAULT NULL,
  `ora_programare` time DEFAULT NULL,
  `stare_programare` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programari`
--

INSERT INTO `programari` (`programare_id`, `client_id`, `angajat_id`, `serviciu_id`, `data_programare`, `ora_programare`, `stare_programare`) VALUES
(1, 1, 2, 3, '2023-03-01', '10:00:00', 'Confirmata'),
(2, 2, 1, 2, '2023-03-05', '15:30:00', 'In Asteptare'),
(3, 3, 3, 1, '2024-01-06', '17:42:00', 'Confirmata'),
(4, 4, 5, 2, '2023-04-05', '11:30:00', 'In Asteptare'),
(5, 5, 2, 6, '2023-04-10', '16:00:00', 'Confirmata'),
(6, 1, 1, 1, '2023-04-15', '14:45:00', 'In Asteptare'),
(7, 3, 1, 2, '2024-01-09', '23:58:00', 'Neconfirmata'),
(8, 3, 1, 2, '2024-01-09', '23:58:00', 'Neconfirmata'),
(9, 3, 1, 2, '2024-01-09', '23:58:00', 'Neconfirmata');

-- --------------------------------------------------------

--
-- Table structure for table `servicii`
--

CREATE TABLE `servicii` (
  `serviciu_id` int(11) NOT NULL,
  `tip_serviciu` varchar(20) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servicii`
--

INSERT INTO `servicii` (`serviciu_id`, `tip_serviciu`, `cost`) VALUES
(1, 'Anestezie', 40),
(2, 'Vaccinare', 30),
(3, 'Chirurgie', 150),
(4, 'Radiografie', 80),
(5, 'Consultatie la Domic', 100),
(6, 'Sterilizare', 120);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(3, 'claudiu', 'qwerty1#'),
(4, 'asd', 'asda'),
(5, 'asdas', 'asdasd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angajati`
--
ALTER TABLE `angajati`
  ADD PRIMARY KEY (`angajat_id`);

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `programare_id` (`programare_id`);

--
-- Indexes for table `ore_lucrate`
--
ALTER TABLE `ore_lucrate`
  ADD PRIMARY KEY (`ore_lucrata_id`),
  ADD KEY `angajat_id` (`angajat_id`);

--
-- Indexes for table `programari`
--
ALTER TABLE `programari`
  ADD PRIMARY KEY (`programare_id`),
  ADD KEY `angajat_id` (`angajat_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `serviciu_id` (`serviciu_id`);

--
-- Indexes for table `servicii`
--
ALTER TABLE `servicii`
  ADD PRIMARY KEY (`serviciu_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angajati`
--
ALTER TABLE `angajati`
  MODIFY `angajat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clienti`
--
ALTER TABLE `clienti`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ore_lucrate`
--
ALTER TABLE `ore_lucrate`
  MODIFY `ore_lucrata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `programari`
--
ALTER TABLE `programari`
  MODIFY `programare_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `servicii`
--
ALTER TABLE `servicii`
  MODIFY `serviciu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`programare_id`) REFERENCES `programari` (`programare_id`);

--
-- Constraints for table `ore_lucrate`
--
ALTER TABLE `ore_lucrate`
  ADD CONSTRAINT `ore_lucrate_ibfk_1` FOREIGN KEY (`angajat_id`) REFERENCES `angajati` (`angajat_id`);

--
-- Constraints for table `programari`
--
ALTER TABLE `programari`
  ADD CONSTRAINT `programari_ibfk_1` FOREIGN KEY (`angajat_id`) REFERENCES `angajati` (`angajat_id`),
  ADD CONSTRAINT `programari_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `clienti` (`client_id`),
  ADD CONSTRAINT `programari_ibfk_3` FOREIGN KEY (`serviciu_id`) REFERENCES `servicii` (`serviciu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
