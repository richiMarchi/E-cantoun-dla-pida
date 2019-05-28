-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 15, 2018 alle 17:04
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
(1, 4, 'acqua san benedetto', 0.5, 0, 1, '0.40');

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
(1, 3, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `cassone`
--

CREATE TABLE `cassone` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoria` int(10) UNSIGNED NOT NULL DEFAULT '3',
  `nome` varchar(32) COLLATE utf8_bin NOT NULL,
  `ingredienti` varchar(200) COLLATE utf8_bin NOT NULL,
  `calorie` int(11) NOT NULL,
  `healthy` tinyint(1) NOT NULL,
  `prezzo` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `cassone`
--

INSERT INTO `cassone` (`id`, `categoria`, `nome`, `ingredienti`, `calorie`, `healthy`, `prezzo`) VALUES
(1, 3, 'Pomodoro Mozzarella', 'pomodoro, mozzarella', 230, 1, '2.50'),
(2, 3, 'verde', 'erbe di campagna', 190, 1, '2.50');

-- --------------------------------------------------------

--
-- Struttura della tabella `consigliodelgiorno`
--

CREATE TABLE `consigliodelgiorno` (
  `codiceConsiglio` int(10) UNSIGNED NOT NULL,
  `consiglio` varchar(140) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `consigliodelgiorno`
--

INSERT INTO `consigliodelgiorno` (`codiceConsiglio`, `consiglio`) VALUES
(1, 'Coniglio in porchetta'),
(2, 'Faraona al forno');

-- --------------------------------------------------------

--
-- Struttura della tabella `indirizzo`
--

CREATE TABLE `indirizzo` (
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `indirizzo` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `indirizzo`
--

INSERT INTO `indirizzo` (`email`, `indirizzo`) VALUES
('simone@live.it', 'via Paolo Rossi, 82'),
('simone@live.it', 'via Pascoli, 13'),
('simone@live.it', 'via dei Pastori, 45');

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
(17, 'simone@live.it', 0, 'Ciao sono ciao', 'via Pascoli, 13', '2018-02-15 13:09:00', 'fattorino', '0.99', 0),
(18, 'simone@live.it', 0, 'no', 'via Paolo Rossi, 82', '2018-02-15 14:59:00', '052698526345', '0.99', 0),
(19, 'simone@live.it', 0, 'Prova', 'sede', '2018-02-15 15:00:00', 'no', '0.99', 0),
(20, 'simone@live.it', 0, 'ciao sono ciao', 'sede', '2018-02-15 15:29:00', '052698526345', '2.97', 0),
(21, 'simone@live.it', 0, 'La rucola a freddo', 'via Paolo Rossi, 82', '2018-02-15 15:47:00', '052698526345', '7.00', 0),
(22, 'simone@live.it', 1, 'ciao ok', 'sede', '2018-02-15 15:40:00', 'no', '7.00', 0),
(23, 'simone@hotmail.it', 1, 'no', 'sede', '2018-02-15 17:27:00', 'no', '3.50', 0),
(24, 'simone@hotmail.it', 1, 'no', 'sede', '2018-02-16 17:30:00', 'no', '7.00', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `pagamento`
--

CREATE TABLE `pagamento` (
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `carta` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `pagamento`
--

INSERT INTO `pagamento` (`email`, `carta`) VALUES
('simone@live.it', '052698526345');

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
(3, 1, 'Squacquerone e Rucola', 'squacquerone e rucola', '3.50', 230, 1);

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
(1, 2, 'leggerezza', 'stracchino, pomodorini datterini, rucola', 240, 1, '5.00'),
(2, 2, 'campagnolo', 'mozzarella, speck, funghi', 480, 0, '5.00');

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(128) COLLATE utf8_bin NOT NULL,
  `nome` varchar(20) COLLATE utf8_bin NOT NULL,
  `cognome` varchar(20) COLLATE utf8_bin NOT NULL,
  `numeroTelefono` bigint(20) UNSIGNED NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `salt` varchar(128) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`email`, `password`, `nome`, `cognome`, `numeroTelefono`, `admin`, `salt`) VALUES
('simone@hotmail.it', '5580ef42d69c387225a780ed8cb4723dc1b3cd1420aa8d39decabe2909e59b57b1bc4dfe760677b22785fcdd2fdc9191ab50953f99596cab4b7d532c86982ec5', 'Simone', 'Simone', 0, 0, '9160db34e3a52ca17b8f31620fab923033177d4c2b348f08d31c16df1528beeee39e562b01301060b06765938a595fa4954648959d7ee868b6db3566ff5e22d2'),
('simone@live.it', '8edb693bd330444e7fc5a37dd99bdd18ad0587252fe3ad6acdd1e262f8d0ecc83205853c3f7d28b73786c3820294003ef1e394f2b7807cc3c4c7e692ec129d00', 'Simone', 'Venturi', 89243567819, 0, 'a6b77c7031798b03a8a85b3eabd17cad2510a94866225506a50787dd055157f3a29b24116ddc9dd1d80c2c5ef7a5b74168141e59ae68799c2c25c76c7a3c7d5f');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `avviso`
--
ALTER TABLE `avviso`
  ADD PRIMARY KEY (`codiceAvviso`);

--
-- Indici per le tabelle `bibita`
--
ALTER TABLE `bibita`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`id`,`prodotto`,`categoria`);

--
-- Indici per le tabelle `cassone`
--
ALTER TABLE `cassone`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `consigliodelgiorno`
--
ALTER TABLE `consigliodelgiorno`
  ADD PRIMARY KEY (`codiceConsiglio`);

--
-- Indici per le tabelle `indirizzo`
--
ALTER TABLE `indirizzo`
  ADD PRIMARY KEY (`email`,`indirizzo`) USING BTREE;

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `piada`
--
ALTER TABLE `piada`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `rotolo`
--
ALTER TABLE `rotolo`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `avviso`
--
ALTER TABLE `avviso`
  MODIFY `codiceAvviso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `bibita`
--
ALTER TABLE `bibita`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `cassone`
--
ALTER TABLE `cassone`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `consigliodelgiorno`
--
ALTER TABLE `consigliodelgiorno`
  MODIFY `codiceConsiglio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `ordine`
--
ALTER TABLE `ordine`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT per la tabella `piada`
--
ALTER TABLE `piada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `rotolo`
--
ALTER TABLE `rotolo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
