-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2026 at 07:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `closet_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `couleur`
--

CREATE TABLE `couleur` (
  `Id_Couleur` int(50) NOT NULL,
  `Nom_Couleur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `couleur`
--

INSERT INTO `couleur` (`Id_Couleur`, `Nom_Couleur`) VALUES
(1, 'Noir'),
(2, 'Blanc'),
(3, 'Gris'),
(4, 'Brun'),
(5, 'Rouge'),
(6, 'Orange'),
(7, 'Jaune'),
(8, 'Vert'),
(9, 'Bleu'),
(10, 'Violet'),
(11, 'Rose'),
(12, 'Autre');

-- --------------------------------------------------------

--
-- Table structure for table `notation`
--

CREATE TABLE `notation` (
  `Id_User` int(11) NOT NULL,
  `Id_Tenue` int(11) NOT NULL,
  `Note` int(11) NOT NULL CHECK (`Note` between 1 and 10)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saison`
--

CREATE TABLE `saison` (
  `Id_Saison` int(11) NOT NULL,
  `Nom_Saison` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saison`
--

INSERT INTO `saison` (`Id_Saison`, `Nom_Saison`) VALUES
(1, 'Été'),
(2, 'Hiver'),
(3, 'Printemps'),
(4, 'Automne');

-- --------------------------------------------------------

--
-- Table structure for table `tenue`
--

CREATE TABLE `tenue` (
  `Id_Tenue` int(11) NOT NULL,
  `Titre_Tenue` text NOT NULL,
  `Img_Tenue` varchar(100) NOT NULL,
  `Id_User` int(11) NOT NULL,
  `Id_Saison` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenue_vetement`
--

CREATE TABLE `tenue_vetement` (
  `Id_Tenue` int(50) NOT NULL,
  `Id_Vet` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `Id_Type` int(11) NOT NULL,
  `Nom_Type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`Id_Type`, `Nom_Type`) VALUES
(1, 'Pull'),
(2, 'T-shirt'),
(3, 'Chemise'),
(4, 'Pantalon'),
(5, 'Short'),
(6, 'Jupe'),
(7, 'Robe'),
(8, 'Gilet'),
(9, 'Veste'),
(10, 'Chausette'),
(11, 'Chausure'),
(12, 'Botte'),
(13, 'Autre');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Id_User` int(50) NOT NULL,
  `Pseudo` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mdp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`Id_User`, `Pseudo`, `Email`, `Mdp`) VALUES
(1, 'l0umzd', 'exemple@email.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `vetement`
--

CREATE TABLE `vetement` (
  `Id_Vet` int(50) NOT NULL,
  `Img_Vet` varchar(30) NOT NULL,
  `Id_Type` int(11) NOT NULL,
  `Id_Couleur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vetement`
--

INSERT INTO `vetement` (`Id_Vet`, `Img_Vet`, `Id_Type`, `Id_Couleur`) VALUES
(1, 'vet/pant1.jpg', 4, 9),
(2, 'vet/shirt1.jpg', 2, 1),
(3, 'vet/shirt2.jpg', 2, 1),
(4, 'vet/shirt3.jpg', 2, 5),
(5, 'vet/shirt4.jpg', 1, 3),
(6, 'vet/skirt1.jpg', 6, 1),
(7, 'vet/skirt2.jpg', 6, 1),
(8, 'vet/short1.jpg', 5, 9),
(9, 'vet/shoe1.jpg', 11, 1),
(10, 'vet/shoe2.jpg', 11, 1),
(11, 'vet/shoe3.jpg', 11, 1),
(12, 'vet/shoe4.jpg', 11, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `couleur`
--
ALTER TABLE `couleur`
  ADD PRIMARY KEY (`Id_Couleur`);

--
-- Indexes for table `notation`
--
ALTER TABLE `notation`
  ADD PRIMARY KEY (`Id_User`,`Id_Tenue`),
  ADD KEY `Id_Tenue` (`Id_Tenue`);

--
-- Indexes for table `saison`
--
ALTER TABLE `saison`
  ADD PRIMARY KEY (`Id_Saison`);

--
-- Indexes for table `tenue`
--
ALTER TABLE `tenue`
  ADD PRIMARY KEY (`Id_Tenue`),
  ADD KEY `Id_Saison` (`Id_Saison`),
  ADD KEY `Id_User` (`Id_User`);

--
-- Indexes for table `tenue_vetement`
--
ALTER TABLE `tenue_vetement`
  ADD PRIMARY KEY (`Id_Tenue`,`Id_Vet`),
  ADD KEY `fk_vetement` (`Id_Vet`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`Id_Type`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Id_User`);

--
-- Indexes for table `vetement`
--
ALTER TABLE `vetement`
  ADD PRIMARY KEY (`Id_Vet`),
  ADD KEY `Id_Type` (`Id_Type`),
  ADD KEY `Id_Couleur` (`Id_Couleur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `couleur`
--
ALTER TABLE `couleur`
  MODIFY `Id_Couleur` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `saison`
--
ALTER TABLE `saison`
  MODIFY `Id_Saison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tenue`
--
ALTER TABLE `tenue`
  MODIFY `Id_Tenue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `Id_Type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Id_User` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vetement`
--
ALTER TABLE `vetement`
  MODIFY `Id_Vet` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notation`
--
ALTER TABLE `notation`
  ADD CONSTRAINT `notation_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `utilisateur` (`Id_User`) ON DELETE CASCADE,
  ADD CONSTRAINT `notation_ibfk_2` FOREIGN KEY (`Id_Tenue`) REFERENCES `tenue` (`Id_Tenue`) ON DELETE CASCADE;

--
-- Constraints for table `tenue`
--
ALTER TABLE `tenue`
  ADD CONSTRAINT `tenue_ibfk_1` FOREIGN KEY (`Id_Saison`) REFERENCES `saison` (`Id_Saison`),
  ADD CONSTRAINT `tenue_ibfk_2` FOREIGN KEY (`Id_User`) REFERENCES `utilisateur` (`Id_User`);

--
-- Constraints for table `tenue_vetement`
--
ALTER TABLE `tenue_vetement`
  ADD CONSTRAINT `fk_tenue` FOREIGN KEY (`Id_Tenue`) REFERENCES `tenue` (`Id_Tenue`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_vetement` FOREIGN KEY (`Id_Vet`) REFERENCES `vetement` (`Id_Vet`) ON DELETE CASCADE;

--
-- Constraints for table `vetement`
--
ALTER TABLE `vetement`
  ADD CONSTRAINT `vetement_ibfk_1` FOREIGN KEY (`Id_Type`) REFERENCES `type` (`Id_Type`),
  ADD CONSTRAINT `vetement_ibfk_2` FOREIGN KEY (`Id_Couleur`) REFERENCES `couleur` (`Id_Couleur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
