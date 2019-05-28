-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 15, 2018 alle 13:00
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
-- Struttura della tabella `ordine`
--

CREATE TABLE `ordine` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `carrello` int(10) UNSIGNED NOT NULL,
  `comunicazioni` varchar(500) COLLATE utf8_bin NOT NULL,
  `luogo` varchar(100) COLLATE utf8_bin NOT NULL,
  `orario` datetime NOT NULL,
  `carta` varchar(15) COLLATE utf8_bin NOT NULL,
  `prezzo` decimal(4,2) NOT NULL,
  `evaso` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `ordine`
--

INSERT INTO `ordine` (`id`, `email`, `carrello`, `comunicazioni`, `luogo`, `orario`, `carta`, `prezzo`, `evaso`) VALUES
(3, 'simone@live.it', 0, 'no', 'sede', '2018-02-14 14:52:00', 'no', '1.98', 0),
(4, 'simone@live.it', 0, 'no', 'sede', '2018-02-14 14:52:00', 'no', '1.98', 0),
(5, 'simone@live.it', 0, 'no', 'sede', '2018-02-14 14:52:00', 'no', '1.98', 0),
(6, 'simone@live.it', 0, 'no', 'sede', '2018-02-14 14:52:00', 'no', '1.98', 0),
(7, 'simone@live.it', 0, 'no', 'sede', '2018-02-14 14:52:00', 'no', '1.98', 0),
(8, 'simone@live.it', 0, 'no', 'sede', '2018-02-14 14:52:00', 'no', '1.98', 0),
(9, 'simone@live.it', 0, 'no', 'sede', '2018-02-14 14:52:00', 'no', '1.98', 0),
(10, 'simone@live.it', 0, 'Dove sono sone?', 'via Pascoli, 13', '2018-02-14 17:59:00', '052698526345', '3.96', 0),
(11, 'simone@live.it', 0, 'Dove sono sone?', 'via Pascoli, 13', '2018-02-14 17:59:00', '052698526345', '3.96', 0),
(12, 'simone@live.it', 0, 'Dove sono sone?', 'via Pascoli, 13', '2018-02-14 17:59:00', '052698526345', '3.96', 0),
(13, 'simone@live.it', 0, 'Dove sono sone?', 'via Pascoli, 13', '2018-02-14 17:59:00', '052698526345', '3.96', 0),
(14, 'simone@live.it', 0, 'Dove sono sone?', 'via Pascoli, 13', '2018-02-14 17:59:00', '052698526345', '3.96', 0),
(15, 'simone@live.it', 0, 'Ciao sono ciao', 'via Pascoli, 13', '2018-02-15 13:09:00', 'fattorino', '0.99', 0),
(16, 'simone@live.it', 0, 'Ciao sono ciao', 'via Pascoli, 13', '2018-02-15 13:09:00', 'fattorino', '0.99', 0),
(17, 'simone@live.it', 0, 'Ciao sono ciao', 'via Pascoli, 13', '2018-02-15 13:09:00', 'fattorino', '0.99', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `ordine`
--
ALTER TABLE `ordine`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
