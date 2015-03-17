-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: 17 giu, 2013 at 06:02 PM
-- Versione MySQL: 5.1.69
-- Versione PHP: 5.3.2-1ubuntu4.19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aruzzant-PR`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `RapportiTecnici`
--

CREATE TABLE IF NOT EXISTS `RapportiTecnici` (
  `idRapporto` int(11) NOT NULL,
  `Ubicazione` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `Tipologia` enum('Generico','Specifico') COLLATE latin1_general_ci DEFAULT NULL,
  `Note` varchar(120) COLLATE latin1_general_ci DEFAULT NULL,
  `idTecnico` int(11) NOT NULL,
  `idReferente` int(11) NOT NULL,
  `idOspedale` int(11) NOT NULL,
  `serialeApparecchiatura` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`idRapporto`),
  KEY `idTecnico` (`idTecnico`),
  KEY `idReferente` (`idReferente`),
  KEY `idOspedale` (`idOspedale`),
  KEY `serialeApparecchiatura` (`serialeApparecchiatura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dump dei dati per la tabella `RapportiTecnici`
--

INSERT INTO `RapportiTecnici` (`idRapporto`, `Ubicazione`, `Data`, `Tipologia`, `Note`, `idTecnico`, `idReferente`, `idOspedale`, `serialeApparecchiatura`) VALUES
(1, 'Milano', '2013-06-12', 'Specifico', 'Nessuna nota inserita.', 1, 14, 1, 'VNAP-0014'),
(2, 'Milano', '2013-06-12', 'Specifico', 'Verifica protezione di terra non possibile. Apparecchiatura di classe 2.', 1, 26, 1, 'VNAP-0001'),
(3, 'Chieti', '1990-03-13', 'Specifico', 'Nessuna nota inserita.', 34, 29, 9, 'VNAP-0019'),
(4, 'Milano', '2013-06-12', 'Specifico', 'Nessuna nota inserita.', 35, 16, 1, 'VNRV-3480'),
(5, 'Firenze', '2008-11-08', 'Specifico', 'Nessuna nota inserita.', 38, 14, 16, 'Z1190'),
(6, 'Milano', '2013-06-12', 'Generico', 'Nessuna nota inserita.', 1, 16, 1, 'VNRV-4123'),
(7, 'Venezia', '2013-06-01', 'Generico', 'Nessuna nota inserita.', 2, 28, 3, 'VNRV-3222'),
(8, 'Napoli', '2012-11-17', 'Generico', 'Codice Batteria: 29384XC', 35, 19, 12, '7SMV-D'),
(9, 'Parma', '2013-06-03', 'Generico', 'Nessuna nota inserita.', 2, 22, 8, '012RW-3009CR'),
(10, 'Aosta', '1999-01-01', 'Generico', 'Nessuna nota inserita.', 6, 24, 11, 'VNRV-4119'),
(11, 'Cagliari', '2009-09-10', 'Specifico', 'Classe 1.', 11, 22, 17, 'BR-10031'),
(12, 'Cagliari', '2013-06-10', 'Generico', 'Nessuna nota inserita.', 10, 31, 17, 'TPTCS-012338901WR'),
(13, 'Aosta', '2005-08-31', 'Specifico', 'Classe 3.', 36, 17, 11, 'VNAP-0024'),
(14, 'Genova', '2013-06-06', 'Specifico', 'Prove di accuratezza con pesi campione superate.', 12, 29, 15, 'CFG00567685678-34'),
(15, 'Milano', '2000-03-16', 'Generico', 'Nessuna nota inserita.', 7, 15, 1, 'RS422'),
(16, 'Piove di Sacco', '2003-12-05', 'Specifico', 'Classe 2.', 3, 14, 7, 'VNRD-0081'),
(17, 'Roma', '2013-06-03', 'Specifico', 'Prove di accuratezza con pesi campione superate.', 4, 15, 5, '334MBPN009'),
(18, 'Roma', '2013-06-15', 'Specifico', 'Temperature rilevate conformi a quelle impostate.', 37, 21, 4, '02.1001'),
(19, 'Trento', '2012-01-20', 'Specifico', 'Nessuna nota inserita.', 36, 19, 14, '2HGW2-R5'),
(20, 'Trento', '2013-06-07', 'Specifico', 'Prove con pesi campione superate.', 12, 29, 14, '123-99875TRB-012'),
(21, 'Genova', '2013-02-05', 'Generico', 'Batteria NiCd compat. 6V 0,18Ah.', 34, 21, 15, '03018B'),
(22, 'Napoli', '2013-06-06', 'Generico', 'Nessuna nota inserita.', 36, 33, 12, '1715139'),
(23, 'Aosta', '2013-06-17', 'Generico', 'Nessuna nota inserita.', 10, 19, 11, '0123456ORTD'),
(24, 'Padova', '2012-05-31', 'Generico', 'Nessuna nota inserita.', 34, 27, 2, '111AFTR-122-09876'),
(25, 'Reggio di Calabria', '2002-10-24', 'Generico', 'Nessuna nota inserita.', 37, 28, 13, 'VNAP-0096'),
(26, 'Milano', '2010-01-27', 'Specifico', 'Nessuna nota inserita.', 38, 29, 1, 'CYTT-99235653-WER'),
(27, 'Palermo', '2008-03-22', 'Generico', 'Nessuna nota inserita.', 12, 26, 6, '146-3796-203'),
(28, 'Genova', '2010-12-03', 'Specifico', 'VelocitÃ  misurata coincide con quella impostata.', 3, 23, 15, 'VNAP-0012'),
(29, 'Venezia', '2007-05-18', 'Generico', 'Nessuna nota inserita.', 9, 15, 3, 'VNRD-0189'),
(30, 'Piove di Sacco', '2000-07-23', 'Generico', 'Nessuna nota inserita.', 8, 17, 7, 'A-HEPA701'),
(31, 'Parma', '2006-09-08', 'Generico', 'Nessuna nota inserita.', 35, 23, 8, 'RL4Y-20C'),
(32, 'Chieti', '2013-06-03', 'Specifico', 'Temperature misurate conformi a quelle impostate.', 6, 23, 9, 'JF7R7GTHVYTR7'),
(33, 'Milano', '2003-08-29', 'Generico', 'Nessuna nota inserita.', 1, 30, 1, '87HBS-S4'),
(34, 'Padova', '2008-07-18', 'Generico', 'Classe 2.', 4, 24, 2, 'VNAP-0160'),
(35, 'Milano', '1999-06-15', 'Generico', 'Nessuna nota inserita.', 8, 15, 10, 'VNAP-0177'),
(36, 'Trento', '2009-02-07', 'Specifico', 'Nessuna nota inserita.', 10, 20, 14, 'VNRV-3280'),
(37, 'Milano', '2001-10-09', 'Specifico', 'Nessuna nota inserita.', 5, 17, 1, '764GF8B5C8EV7WC7'),
(38, 'Roma', '2000-07-27', 'Specifico', 'Nessuna nota inserita.', 12, 32, 5, 'M11-16B'),
(39, 'Reggio di Calabria', '2005-11-11', 'Generico', 'Nessuna nota inserita.', 13, 22, 13, 'MNBD94992834RB'),
(40, 'Firenze', '2012-11-09', 'Generico', 'Nessuna nota inserita.', 6, 18, 16, '500R426'),
(41, 'Firenze', '2013-06-03', 'Specifico', 'Temperature rilevate coincidono con quelle impostate.\r\nRpm rilevati coincidono con velocitÃ  impostata.', 38, 33, 16, 'BHUEU4ER7T7E'),
(42, 'Padova', '2013-05-19', 'Specifico', 'Nessuna nota inserita.', 12, 31, 2, 'RT3-899113'),
(43, 'Napoli', '2013-01-16', 'Generico', 'Nessuna nota inserita.', 36, 23, 12, 'BFG3URYIWWEITUR'),
(44, 'Milano', '2012-12-19', 'Specifico', 'Prove di scarica effettuate: potenza rilevata conforme a quella impostata.', 12, 28, 1, 'VNAP-0017'),
(45, 'Genova', '2011-05-13', 'Specifico', 'Nessuna nota inserita.', 7, 18, 15, 'VNRD-0355'),
(46, 'Genova', '2011-02-09', 'Specifico', 'Nessuna nota inserita.', 3, 20, 15, 'DBHDIQ13576RY-246'),
(47, 'Piove di Sacco', '2010-06-09', 'Generico', 'Nessuna nota inserita.', 9, 27, 7, 'CDJEWUU246731-12'),
(48, 'Cagliari', '2008-10-04', 'Generico', 'Nessuna nota inserita.', 2, 27, 17, '218032ZW'),
(49, 'Parma', '2011-11-15', 'Generico', 'Classe 2.', 5, 30, 8, 'VNAP-0082'),
(50, 'Napoli', '2007-04-02', 'Generico', 'Nessuna nota inserita.', 10, 32, 12, 'CGGUGHE262-84'),
(51, 'Milano', '2013-01-09', 'Generico', 'Nessuna nota inserita.', 3, 19, 10, 'REQ-1C4R'),
(52, 'Palermo', '2011-09-15', 'Generico', 'Nessuna nota inserita.', 11, 21, 6, 'JCBAU8284812-135'),
(53, 'Cagliari', '2013-05-29', 'Generico', 'Nessuna nota inserita.', 38, 25, 17, 'JDBVA-79876-12'),
(54, 'Palermo', '2012-09-03', 'Generico', 'Nessuna nota inserita.', 5, 33, 6, 'D38C44N94'),
(55, 'Genova', '2005-06-25', 'Specifico', 'Verificata accuratezza rilevamento BPM. Esito:positivo.', 9, 18, 15, 'CSAV.12425-13'),
(56, 'Padova', '2012-05-08', 'Specifico', 'Nessuna nota inserita.', 36, 33, 2, 'ER0K-0104'),
(57, 'Chieti', '2005-11-30', 'Specifico', 'Sonda Esaote convessa BC431.', 34, 21, 9, 'CSHJBFWJE45UI'),
(58, 'Milano', '2011-06-15', 'Generico', 'Nessuna nota inserita.', 7, 22, 10, 'SGDHTRE56789'),
(59, 'Aosta', '2011-10-27', 'Generico', 'Nessuna nota inserita.', 11, 16, 11, 'X-02.88.049'),
(60, 'Milano', '2013-03-04', 'Generico', 'Nessuna nota inserita.', 35, 22, 1, '4FXC-35'),
(61, 'Roma', '2013-05-27', 'Generico', 'Nessuna nota inserita.', 34, 21, 5, 'MEB-9400K'),
(62, 'Aosta', '2010-06-25', 'Generico', 'Nessuna nota inserita.', 37, 18, 11, 'ASDGF-HT53122'),
(63, 'Roma', '1991-06-06', 'Generico', 'Classe 2.', 8, 25, 5, '235-1FLE'),
(64, 'Piove di Sacco', '2007-03-16', 'Generico', 'Nessuna nota inserita.', 38, 29, 7, 'C-5G0P'),
(65, 'Cagliari', '2007-12-30', 'Generico', 'Nessuna nota inserita.', 4, 26, 17, 'DFG234566-234TFD'),
(66, 'Roma', '2013-06-10', 'Specifico', 'Temperature rilevate conformi a quelle impostate.', 2, 21, 5, 'HTRE3456R-1345'),
(67, 'Padova', '2013-02-14', 'Generico', 'Nessuna nota inserita.', 6, 32, 2, 'QWOP-356'),
(68, 'Padova', '2013-06-02', 'Specifico', 'Nessuna nota inserita.', 11, 25, 2, 'BFDW.1234-54'),
(69, 'Venezia', '2006-04-08', 'Specifico', 'Nessuna nota inserita.', 2, 31, 3, 'A324-24V36'),
(70, 'Milano', '2008-09-03', 'Specifico', 'Nessuna nota inserita.', 13, 24, 1, 'DB3-2462454-3456'),
(71, 'Milano', '2012-09-05', 'Specifico', 'Nessuna nota inserita.', 13, 32, 1, 'DF74RK'),
(72, 'Napoli', '2000-06-30', 'Specifico', 'Temperature impostate conformi alle temperature rilevate.', 7, 18, 12, 'MBR-705GR'),
(73, 'Chieti', '2013-06-18', 'Generico', 'Nessuna nota inserita.', 1, 27, 9, 'FVB-234-52473'),
(74, 'Reggio di Calabria', '2013-02-09', 'Generico', 'Nessuna nota inserita.', 12, 20, 13, '151OD-EL'),
(75, 'Reggio di Calabria', '2011-06-18', 'Specifico', 'Nessuna nota inserita.', 13, 20, 13, 'BDGSWI45625'),
(76, 'Palermo', '2006-03-02', 'Specifico', 'Nessuna nota inserita.', 13, 26, 6, 'VNEN-0051'),
(77, 'Roma', '2007-10-05', 'Generico', 'Nessuna nota inserita.', 37, 20, 5, 'FDHAJ-245867TG3'),
(78, 'Trento', '2012-01-31', 'Generico', 'Nessuna nota inserita.', 34, 18, 14, 'VI970900'),
(79, 'Parma', '2011-04-30', 'Specifico', 'Nessuna nota inserita.', 13, 21, 8, 'FHGDS74.132456'),
(80, 'Padova', '2010-05-06', 'Generico', 'Nessuna nota inserita.', 1, 14, 2, 'PD2157'),
(81, 'Roma', '2013-06-04', 'Generico', 'Nessuna nota inserita.', 9, 30, 4, 'FDHAJ-245867TG3');

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `RapportiTecnici`
--
ALTER TABLE `RapportiTecnici`
  ADD CONSTRAINT `RapportiTecnici_ibfk_1` FOREIGN KEY (`idTecnico`) REFERENCES `Tecnici` (`idPersona`) ON DELETE NO ACTION,
  ADD CONSTRAINT `RapportiTecnici_ibfk_2` FOREIGN KEY (`idReferente`) REFERENCES `Referenti` (`idPersona`) ON DELETE NO ACTION,
  ADD CONSTRAINT `RapportiTecnici_ibfk_3` FOREIGN KEY (`idOspedale`) REFERENCES `Ospedali` (`idOspedale`) ON DELETE NO ACTION,
  ADD CONSTRAINT `RapportiTecnici_ibfk_4` FOREIGN KEY (`serialeApparecchiatura`) REFERENCES `Apparecchiature` (`serialeApparecchiatura`) ON DELETE CASCADE;
