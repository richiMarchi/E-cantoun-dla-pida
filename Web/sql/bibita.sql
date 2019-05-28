-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 18, 2018 alle 13:26
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
-- Struttura della tabella `bibita`
--

CREATE TABLE `bibita` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoria` int(10) UNSIGNED NOT NULL DEFAULT '4',
  `nome` varchar(32) COLLATE utf8_bin NOT NULL,
  `dimensione` float NOT NULL,
  `calorie` int(11) NOT NULL,
  `healthy` tinyint(1) NOT NULL,
  `prezzo` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `bibita`
--

INSERT INTO `bibita` (`id`, `categoria`, `nome`, `dimensione`, `calorie`, `healthy`, `prezzo`) VALUES
(1, 4, 'acqua naturale san benedetto', 0.5, 0, 1, '0.40'),
(2, 4, 'acqua frizzante san Benedetto', 0.5, 0, 1, '0.40'),
(3, 4, 'acqua naturale san Benedetto', 1.5, 0, 1, '1.00'),
(4, 4, 'acqua frizzante san Benedetto', 1.5, 0, 1, '1.00'),
(5, 4, 'Coca-Cola lattina', 0.33, 150, 0, '0.80'),
(6, 4, 'Sprite lattina', 0.33, 150, 0, '0.80'),
(7, 4, 'Fanta lattina', 0.33, 150, 0, '0.80'),
(8, 4, 'Coca-cola zero lattina', 0.33, 150, 1, '0.80'),
(9, 4, 'Coca-cola', 1.5, 150, 1, '1.50');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `bibita`
--
ALTER TABLE `bibita`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `bibita`
--
ALTER TABLE `bibita`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
