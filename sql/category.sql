-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Paź 2016, 22:16
-- Wersja serwera: 5.6.21
-- Wersja PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `symfony`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
('1', 'Astronomiczne'),
('10', 'Informatyka'),
('11', 'Klasyka'),
('12', 'Komiksy'),
('13', 'Kryminał'),
('14', 'Kulinaria'),
('15', 'Matematyka'),
('16', 'Medycyna'),
('17', 'Militaria'),
('18', 'Motoryzacja'),
('19', 'Muzyka'),
('2', 'Biografie'),
('20', 'Podróżnicze'),
('21', 'Poezja'),
('22', 'Powieść'),
('23', 'Przygodowa'),
('24', 'Religia'),
('25', 'Słowniki'),
('26', 'Sport'),
('27', 'Turystyka'),
('28', 'Zrowie'),
('3', 'Dramaty'),
('4', 'Encyklopedie'),
('5', 'Fantastyka'),
('6', 'Filozofia'),
('7', 'Finanse'),
('8', 'Historyczna'),
('9', 'Horror');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
