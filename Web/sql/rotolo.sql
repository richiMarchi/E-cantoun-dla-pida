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
-- Struttura della tabella `rotolo`
--

CREATE TABLE `rotolo` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoria` int(11) UNSIGNED NOT NULL DEFAULT '2',
  `nome` varchar(32) COLLATE utf8_bin NOT NULL,
  `ingredienti` varchar(200) COLLATE utf8_bin NOT NULL,
  `calorie` int(11) NOT NULL,
  `healthy` tinyint(1) NOT NULL,
  `prezzo` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `rotolo`
--

INSERT INTO `rotolo` (`id`, `categoria`, `nome`, `ingredienti`, `calorie`, `healthy`, `prezzo`) VALUES
(1, 2, 'Rotolo leggerezza', 'stracchino, pomodorini datterini, rucola', 240, 1, '5.00'),
(2, 2, 'Rotolo campagnolo', 'mozzarella, speck, funghi', 480, 0, '5.00'),
(3, 2, 'Rotolo fitness', 'bresaola, rucola, grana', 350, 0, '5.00'),
(4, 2, 'Rotolo tirolese', 'Speck, provola affumicata, pomodoro', 460, 0, '4.50'),
(5, 2, 'Rotolo esagerato', 'pancetta, squacquerone, grana, funghi, pomodoro', 610, 0, '6.00'),
(6, 2, 'Rotolo light', 'tacchino, scquacquerone, pomodoro, lattuga', 390, 0, '4.10'),
(7, 2, 'Rotolo adriatico', 'tonno, mozzarella, pomodoro, origano, maionese', 460, 1, '5.00'),
(8, 2, 'Rotolo americano', 'hamburger, insalata, pomodori, maionese', 710, 0, '5.50'),
(9, 2, 'Rotolo alpino', 'salsiccia, gorgonzola, rucola, pomodorini', 570, 0, '5.40'),
(10, 2, 'Rotolo fritz', 'wurstel, crauti, senape', 570, 0, '4.80'),
(11, 2, 'San Martino', 'porchetta, peperoni, cipolla', 630, 0, '5.50'),
(12, 2, 'Rotolo marino', 'salmone, grana, pomodorini', 460, 1, '5.50');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `rotolo`
--
ALTER TABLE `rotolo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `rotolo`
--
ALTER TABLE `rotolo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
