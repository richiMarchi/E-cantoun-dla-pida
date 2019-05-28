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
-- Struttura della tabella `piada`
--

CREATE TABLE `piada` (
  `id` int(11) NOT NULL,
  `categoria` int(11) NOT NULL DEFAULT '1',
  `nome` varchar(32) COLLATE utf8_bin NOT NULL,
  `ingredienti` varchar(200) COLLATE utf8_bin NOT NULL,
  `prezzo` decimal(3,2) NOT NULL,
  `calorie` int(11) NOT NULL,
  `healthy` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `piada`
--

INSERT INTO `piada` (`id`, `categoria`, `nome`, `ingredienti`, `prezzo`, `calorie`, `healthy`) VALUES
(1, 1, 'Piada col Cotto', 'prosciutto cotto', '3.50', 350, 0),
(2, 1, 'Piada col Crudo', 'prosciutto crudo', '3.50', 350, 0),
(3, 1, 'Squacquerone e Rucola', 'squacquerone e rucola', '3.50', 230, 1),
(4, 1, 'Piada con salsiccia', 'salsiccia', '3.50', 410, 0),
(5, 1, 'Piada con salsiccia e cipolla', 'salsiccia, cipolla', '4.00', 450, 0),
(6, 1, 'Piada campanone', 'pecorino, miele, noci', '4.50', 400, 1),
(7, 1, 'Piada col cotto e fontina', 'prosciutto cotto, fontina', '3.50', 420, 0),
(8, 1, 'Piada primavera', 'lattuga, zucchina, funghi', '4.00', 210, 1),
(9, 1, 'Piada con la testa', 'coppa di testa di mora romagnola', '4.00', 520, 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `piada`
--
ALTER TABLE `piada`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `piada`
--
ALTER TABLE `piada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
