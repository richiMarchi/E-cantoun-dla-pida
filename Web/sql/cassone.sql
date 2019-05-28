-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 19, 2018 alle 13:16
-- Versione del server: 10.1.30-MariaDB
-- Versione PHP: 7.2.1

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
-- Struttura della tabella `cassone`
--

CREATE TABLE `cassone` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoria` int(10) UNSIGNED NOT NULL DEFAULT '3',
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `ingredienti` varchar(200) COLLATE utf8_bin NOT NULL,
  `calorie` int(11) NOT NULL,
  `healthy` tinyint(1) NOT NULL,
  `prezzo` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `cassone`
--

INSERT INTO `cassone` (`id`, `categoria`, `nome`, `ingredienti`, `calorie`, `healthy`, `prezzo`) VALUES
(1, 3, 'Cassone pomodoro Mozzarella', 'pomodoro, mozzarella', 230, 1, '2.50'),
(2, 3, 'Cassone verde', 'erbe di campagna', 190, 1, '2.50'),
(3, 3, 'Cassone patate', 'patate', 340, 1, '2.50'),
(4, 3, 'Cassone patate e salsiccia', 'patate, salsiccia', 390, 0, '2.90'),
(5, 3, 'Cassone patate, salsiccia e mozzarella', 'patate, salsiccia, mozzarella', 430, 0, '3.20'),
(6, 3, 'Cassone vulcano', 'pomodoro, mozzarella, salame piccante', 450, 0, '4.00');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cassone`
--
ALTER TABLE `cassone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cassone`
--
ALTER TABLE `cassone`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
