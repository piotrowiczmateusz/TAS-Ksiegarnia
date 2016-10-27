-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Paź 2016, 22:42
-- Wersja serwera: 5.6.24
-- Wersja PHP: 5.6.8

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
-- Struktura tabeli dla tabeli `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` int(11) NOT NULL,
  `is_new` tinyint(1) NOT NULL,
  `is_bestseller` tinyint(1) NOT NULL,
  `price` int(11) NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_discount` tinyint(1) NOT NULL,
  `discount_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `book`
--

INSERT INTO `book` (`id`, `title`, `author`, `description`, `category`, `publisher`, `cover`, `date`, `is_new`, `is_bestseller`, `price`, `rating`, `is_discount`, `discount_price`) VALUES
('0c78c349-9c84-11e6-b712-d850e6df78c4', 'Dywizjon 303', 'Arkady Fiedler', 'Dywizjon 303 to utwór, którego roli w polskiej literaturze i historii nie można pominąć. Powstał w 1940 roku, w ostatnich tygodniach Bitwy o Anglię, której przebieg opisuje.', 'Historyczna', 'Greg', 'a6a1efe9958d2c17fd293702321cfbf3.jpeg', 2008, 0, 1, 15, '0', 0, 0),
('2b2f9cf5-9c84-11e6-b712-d850e6df78c4', 'Pan Tadeusz', 'Adam Mickiewicz', 'Treść książki oraz dokładne, wyczerpujące opracowanie, w tym biografia pisarza, kalendarium jego życia i twórczości, precyzyjnie określone rodzaj i gatunek literacki utworu.', 'Klasyka', 'Greg', 'd1aabb6eaa93d70a0c0d515bd3b5fc92.jpeg', 2001, 0, 1, 20, '0', 1, 15),
('5a63c3fa-9c84-11e6-b712-d850e6df78c4', 'Wolyn ''43', 'Grzegorz Motyka', 'Czytelnik niezaznajomiony z historią rzezi wołyńskiej znajdzie tutaj wszystkie najważniejsze fakty, a odbiorcy bardziej zorientowani w tej tematyce — poznają najnowsze badania i ustalenia historyków.', 'Historyczna', 'Wydawnictwo Literacki', '3f30636bff81d285c3c2fccd1975ad56.jpeg', 2005, 0, 1, 30, '0', 0, 0),
('799ec764-9c84-11e6-b712-d850e6df78c4', 'Awitorzy', 'Jarosław Sokół', 'Fenomenalna, barwna powieść o polskich lotnikach autora bestsellerowego "Czasu Honoru".', 'Historyczna', 'Wydawnictwo Zwierciadło', 'df158a49ef1be88fabcdf2d429ba7eb7.jpeg', 2010, 1, 0, 15, '0', 0, 0),
('9adc2bb3-9c84-11e6-b712-d850e6df78c4', 'Ścieżka Bogów', 'Kristjansson Snorri', 'W Trondheim król Olaf, fanatyczny orędownik Białego Chrystusa, z trudem utrzymuje pokój wśród podstępnych lokalnych wodzów.', 'Historyczna', 'Dom Wydawniczy Rebis', '9fdfcfb931051f046d6b0b0816a394af.jpeg', 2000, 1, 0, 20, '0', 1, 30),
('b58e99da-9c84-11e6-b712-d850e6df78c4', 'Wikingowie. Najeźdźcy z Północy', 'Lewandowski Radosław', 'W drugiej części trylogii opisana jest samotna wędrówka młodego wikinga Oddiego po iglastych lasach Labradowu.', 'Historyczna', 'Greg', '1de0997c4cc0754b610da755967c141b.jpeg', 1990, 1, 0, 15, '0', 0, 0),
('d78f6daf-9c83-11e6-b712-d850e6df78c4', 'W pustyni i w puszczy', 'Henryk Sienkiewicz', 'W pustyni i w puszczy – powieść przygodowa dla młodzieży Henryka Sienkiewicza.', 'Klasyka', 'Greg', 'a8907df2751a6fbb3b6cd4be2c0ac286.jpeg', 2014, 0, 1, 20, '0', 0, 0),
('d82e3eef-9c84-11e6-b712-d850e6df78c4', 'Harry Potter i Przeklęte Dziecko', 'Rowling J.K., Tiffany John, Thorne Jack', 'To ósma historia w serii i pierwszy autoryzowany spektakl teatralny ze świata Harry’ego Pottera.', 'Fantastyka', 'Media Rodzina', 'a030714ae84c39b16b0cf650975c3de0.jpeg', 2016, 1, 0, 30, '0', 0, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
