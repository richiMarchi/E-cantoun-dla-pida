-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 18, 2018 alle 17:23
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
-- Database: `cantoun`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `avviso`
--

CREATE TABLE `avviso` (
  `codiceAvviso` int(11) NOT NULL,
  `dataInizio` date NOT NULL,
  `dataFine` date DEFAULT NULL,
  `contenuto` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `avviso`
--

INSERT INTO `avviso` (`codiceAvviso`, `dataInizio`, `dataFine`, `contenuto`) VALUES
(1, '2018-01-18', NULL, 'Oggi non si effettuano consegne a domicilio.');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `avviso`
--
ALTER TABLE `avviso`
  ADD PRIMARY KEY (`codiceAvviso`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `avviso`
--
ALTER TABLE `avviso`
  MODIFY `codiceAvviso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
