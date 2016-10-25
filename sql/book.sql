-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Paź 2016, 17:19
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
-- Struktura tabeli dla tabeli `book`
--

CREATE TABLE IF NOT EXISTS `book` (
`id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` int(11) NOT NULL,
  `is_new` tinyint(1) NOT NULL,
  `is_bestseller` tinyint(1) NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `book`
--

INSERT INTO `book` (`id`, `title`, `author`, `description`, `category`, `publisher`, `cover`, `date`, `is_new`, `is_bestseller`, `price`, `rating`) VALUES
(1, 'W pustyni i w puszczy', 'Henryk Sienkiewicz', 'W pustyni i w puszczy – powieść przygodowa dla młodzieży Henryka Sienkiewicza.', 'Przygodowa', 'Greg', '', 2002, 0, 1, '25,00', '5'),
(2, 'Dywizjon 303', 'Arkady Fiedler', 'Dywizjon 303 to utwór, którego roli w polskiej literaturze i historii nie można pominąć. Powstał w 1940 roku, w ostatnich tygodniach Bitwy o Anglię, której przebieg opisuje.', 'Historyczna', 'Greg', '', 2008, 0, 1, '16,20', '5'),
(3, 'Pan Tadeusz', 'Adam Mickiewicz', 'Treść książki oraz dokładne, wyczerpujące opracowanie, w tym biografia pisarza, kalendarium jego życia i twórczości, precyzyjnie określone rodzaj i gatunek literacki utworu.', 'Klasyka', 'Greg', 'okładka twarda', 2006, 0, 1, '15,80', '5'),
(4, 'Wolyn ''43', 'Grzegorz Motyka', 'Czytelnik niezaznajomiony z historią rzezi wołyńskiej znajdzie tutaj wszystkie najważniejsze fakty, a odbiorcy bardziej zorientowani w tej tematyce — poznają najnowsze badania i ustalenia historyków.', 'Historyczna', 'Wydawnictwo Literacki', 'okładka miękka', 2016, 1, 0, '33,99', '5'),
(5, 'Awitorzy', 'Jarosław Sokół', 'Fenomenalna, barwna powieść o polskich lotnikach autora bestsellerowego "Czasu Honoru".', 'Historyczna', 'Wydawnictwo Zwierciadło', 'okładka twarda', 2016, 1, 0, '41,99', '5'),
(6, 'Ścieżka Bogów', 'Kristjansson Snorri', 'W Trondheim król Olaf, fanatyczny orędownik Białego Chrystusa, z trudem utrzymuje pokój wśród podstępnych lokalnych wodzów.', 'Historyczna', 'Dom Wydawniczy Rebis', 'okładka miękka', 2016, 1, 0, '30,99', '4'),
(7, 'Wikingowie. Najeźdźcy z Północy', 'Lewandowski Radosław', 'W drugiej części trylogii opisana jest samotna wędrówka młodego wikinga Oddiego po iglastych lasach Labradowu.', 'Historyczna', 'Greg', 'okładka miękka', 2016, 1, 0, '39,99', '4'),
(8, 'Harry Potter i Przeklęte Dziecko', 'Rowling J.K., Tiffany John, Thorne Jack', 'To ósma historia w serii i pierwszy autoryzowany spektakl teatralny ze świata Harry’ego Pottera.', 'Fantastyka', 'Media Rodzina', 'okładka miękka', 2016, 0, 1, '33,20', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `book`
--
ALTER TABLE `book`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
