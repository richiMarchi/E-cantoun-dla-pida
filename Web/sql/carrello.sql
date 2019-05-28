-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 15, 2018 alle 19:44
-- Versione del server: 10.1.26-MariaDB
-- Versione PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecantoun`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `id` int(10) UNSIGNED NOT NULL,
  `prodotto` int(10) UNSIGNED NOT NULL,
  `categoria` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `carrello`
--

INSERT INTO `carrello` (`id`, `prodotto`, `categoria`) VALUES
(0, 1, 1),
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(3, 3, 1),
(4, 3, 1),
(4, 3, 1),
(4, 3, 1),
(5, 3, 1),
(5, 3, 1),
(5, 3, 1),
(6, 3, 1),
(6, 3, 1),
(6, 3, 1),
(7, 3, 1),
(7, 3, 1),
(7, 3, 1),
(7, 1, 1),
(7, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
