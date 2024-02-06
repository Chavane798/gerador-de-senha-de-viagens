-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 06, 2024 at 11:20 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservas`
--

DROP TABLE IF EXISTS `reservas`;
CREATE TABLE IF NOT EXISTS `reservas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `destino` varchar(255) DEFAULT NULL,
  `origem` varchar(255) DEFAULT NULL,
  `data_time` datetime DEFAULT NULL,
  `nome_passageiro` varchar(255) DEFAULT NULL,
  `assento` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reservas`
--

INSERT INTO `reservas` (`id`, `destino`, `origem`, `data_time`, `nome_passageiro`, `assento`) VALUES
(1, 'maputo', 'Nampula', '2024-02-06 13:33:00', 'Gervasio Bernardo ', 12),
(2, 'maputo', 'beira', '2024-02-06 14:05:00', 'Gervasio ', 12),
(3, 'Zambézia ', 'Nampula', '2024-02-06 14:10:00', 'Gervasio ', 12),
(4, 'maxixi', 'Nampula', '2024-02-06 14:15:00', 'yons', 20),
(5, 'Zambézia ', 'Nampula', '2024-02-06 14:30:00', 'mussa', 13),
(6, 'Zambézia ', 'Nampula', '2024-02-06 14:30:00', 'mussa', 13),
(7, 'Zambézia ', 'Nampula', '2024-02-06 14:34:00', 'nilton', 10),
(8, 'Zambézia ', 'Nampula', '2024-02-20 14:43:00', 'Gervasio ', 13),
(9, 'maputo', 'Nampula', '2024-02-06 14:47:00', 'Gervasio Bernardo ', 13);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
