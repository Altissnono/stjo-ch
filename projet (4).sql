-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 16, 2023 at 05:25 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet`
--

-- --------------------------------------------------------

--
-- Table structure for table `fiche-animal`
--

CREATE TABLE `fiche-animal` (
  `id` int(11) NOT NULL,
  `sexe` varchar(100) NOT NULL,
  `naissance` varchar(100) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `deces` varchar(100) NOT NULL,
  `coderace` varchar(100) NOT NULL,
  `race` varchar(100) NOT NULL,
  `nomdenaissance` varchar(100) NOT NULL,
  `poil` varchar(100) NOT NULL,
  `robe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fiche-animal`
--

INSERT INTO `fiche-animal` (`id`, `sexe`, `naissance`, `categorie`, `deces`, `coderace`, `race`, `nomdenaissance`, `poil`, `robe`) VALUES
(44, 'Femelle', 'Â¨KP', 'KÂ¨PK', '', '.MLKMLK', 'JPOJPKJ', 'theo', 'OK', 'JKLJLK'),
(50, 'Femelle', 'nkn', 'k,k', '', 'nknkn', 'knkn', 'knknk', 'k,k', 'nkn'),
(51, 'FemelleKK', 'LLK', 'LKLK', '', 'HK', 'HJK', 'JKJKJ', 'KLK', 'KJ'),
(53, 'fÃ©minin', ';lfl', 'll;l', '', ',klklml', 'mlm', 'ml', 'fkl;l', 'ml'),
(54, 'masculin', 'jpkjkj', 'jjp', '', 'kokpo', 'kkpk', 'pokk', 'lkjolj', 'opkpok'),
(55, 'masculin', 'k,k,', 'kn,lknln', '', 'kjoj', 'kjkojk', 'jkjokj', 'fk,k', 'jokj'),
(56, 'Masculin', 'ihiouh', 'iuhh', '', 'kjkih', 'hhiu', 'huhiuh', 'jhojh', 'iuh'),
(57, 'Masculin', 'ij', 'ijij', '', 'nbjbnjui', 'ouou', 'oijih', 'jih', 'houh'),
(58, 'Masculin', 'pkjkjpn', 'hihi', '', 'hugÃ®up', 'y^_fg', 'ytpgyigyi', 'flkj', 'gyuig'),
(59, 'Masculin', 'fsq', 'fqs', '', 'sfq', 'fsq', 'sqf', 'sfq', 'sfq'),
(60, 'Masculin', 'hjlkhiuoh', 'kjh', 'hkjlhh', 'hjkh', 'khh', 'hkhk', 'fanhjlholh', 'hk');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `username`, `prenom`, `type`, `age`, `adresse`, `ville`, `email`, `password`) VALUES
(1, 'root', 'dvq', 'user', 52, 'lplp', 'pl', 'sqv@gmail.com', '4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fiche-animal`
--
ALTER TABLE `fiche-animal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fiche-animal`
--
ALTER TABLE `fiche-animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
