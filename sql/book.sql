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
('001e44ce-9c8c-11e6-ba75-e8039ab51a57', 'Igrzyska śmierci 3. Kosogłos', 'Suzanne Collins', 'Katniss po ciężkich przeżyciach na arenie przebywa z matką, Prim i przyjaciółmi w Trzynastce, dystrykcie, który szykuje się do rozprawy z Kapitolem. Katniss, mimo początkowej niechęci, decyduje się zostać Kosogłosem – symbolem rewolucji przeciwko Kapitolo', 'Przygodowa', 'Media Rodzina', 'okladka', 2014, 0, 0, 22, '0', 0, 0),
('1c1f7ba0-9bd1-11e6-88f2-e8039ab51a57', 'Percy Jackson i bogowie olimpijscy. Morze potworów', 'Rick Riordan', 'Tajemnicze zatrucie sosny Thalii osłabia magiczną granicę Obozu Herosów. Percy i jego przyjaciele mają zaledwie kilka dni na odnalezienie jedynego magicznego przedmiotu, który posiada moc wystarczającą do powstrzymania fali mitycznych bestii. Problem w ty', 'Fantastyka', 'Galeria Książki', 'okladka', 2009, 0, 1, 22, '0', 0, 0),
('1de0997c4cc0754b610da755967c141b', 'Wikingowie. Najeźdźcy z Północy', 'Lewandowski Radosław', 'W drugiej części trylogii opisana jest samotna wędrówka młodego wikinga Oddiego po iglastych lasach Labradowu.', 'Historyczna', 'Greg', 'okładka miękka', 2016, 1, 0, 39, '4', 0, 0),
('1eedc49f-9c8d-11e6-ba75-e8039ab51a57', 'Czas żniw 2. Zakon Mimów', 'Samantha Shannon', 'Spektakularna ucieczka z kolonii karnej Szeol I ma tragiczny finał. Zaledwie garstce udaje się ukryć na ulicach Londynu. Sajon nie śpi. Czuwa. Każdy z ocalałych musi się mieć na baczności.', 'Przygodowa', 'Sine Qua Non', 'okladka', 2015, 0, 0, 22, '0', 0, 0),
('3f30636bff81d285c3c2fccd1975ad56', 'Wołyń ''43', 'Grzegorz Motyka', 'Czytelnik niezaznajomiony z historią rzezi wołyńskiej znajdzie tutaj wszystkie najważniejsze fakty, a odbiorcy bardziej zorientowani w tej tematyce — poznają najnowsze badania i ustalenia historyków.', 'Historyczna', 'Wydawnictwo Literacki', 'okładka miękka', 2016, 1, 0, 33, '5', 0, 0),
('3ffd23b1-9c8b-11e6-ba75-e8039ab51a57', 'Droga', 'Cormac McCarthy', 'Ostatnie chwile naszej planety. Ostatni ludzie – krwiożercze bestie. Ostatnie ślady naszej cywilizacji – puszka coca-coli i strzępy starych gazet. Piekło apokalipsy spełnionej w uhonorowanej Nagrodą Pulitzera powieści Cormaca McCarthy’ego. Tę książkę czyt', 'Przygodowa', 'Wydawnictwo Literackie', 'okladka', 2010, 0, 0, 21, '0', 0, 0),
('46e9be78-9c8c-11e6-ba75-e8039ab51a57', 'Alicja w Krainie Czarów', 'Lewis Carroll', 'Seria pięknie zilustrowanych książek, bez których nie sposób sobie wyobrazić kanonu literatury dziecięcej i młodzieżowej. Uniwersalne opowieści - pełne wydarzeń, które poruszą każde serce, i zapierających dech w piersiach przygód - już od pokoleń inspiruj', 'Przygodowa', 'Olesiejuk Sp. z o.o.', 'okladka', 2016, 1, 0, 14, '0', 0, 0),
('59b04383-9bd2-11e6-88f2-e8039ab51a57', 'Igrzyska śmierci', 'Suzanne Collins', 'Na ruinach dawnej Ameryki Północnej rozciąga się państwo Panem, z imponującym Kapitolem otoczonym przez dwanaście dystryktów. Okrutne władze stolicy zmuszają podległe sobie rejony do składania upiornej daniny. Raz w roku każdy dystrykt musi dostarczyć chł', 'Przygodowa', 'Media Rodzina', 'okladka', 2012, 0, 1, 19, '0', 0, 0),
('608017bc-9bcd-11e6-88f2-e8039ab51a57', 'Lampiony', 'Katarzyna Bonda', 'Główną bohaterką tej historii jest zmagająca się z zawodowymi problemami profilerka. Odważna, zdolna, niemniej kobieta z bagażem słabości. Ludzka, prawdziwa, taka, jakby przyszło jej istnieć naprawdę.', 'Kryminał', 'Muza', 'okladka', 2016, 1, 0, 27, '0', 0, 0),
('7222ce82-9bd0-11e6-88f2-e8039ab51a57', 'Bóg pośród ruin', 'Kate Atkinson', 'Bóg pośród ruin to kontynuacja powieści Jej wszystkie życia. Bohaterem jest młodszy brat Ursuli, Teddy – niedoszły poeta, pilot bombowca RAF-u, mąż, ojciec i dziadek. Mężczyzna musi stawić czoła niebezpieczeństwom i wyzwaniom XX wieku.', 'Powieść', 'Czarna Owca', 'okladka', 2016, 1, 0, 26, '0', 0, 0),
('9fdfcfb931051f046d6b0b0816a394af', 'Ścieżka Bogów', 'Kristjansson Snorri', 'W Trondheim król Olaf, fanatyczny orędownik Białego Chrystusa, z trudem utrzymuje pokój wśród podstępnych lokalnych wodzów.', 'Historyczna', 'Dom Wydawniczy Rebis', 'okładka miękka', 2016, 1, 0, 30, '4', 0, 0),
('a030714ae84c39b16b0cf650975c3de0', 'Harry Potter i Przeklęte Dziecko', 'Rowling J.K., Tiffany John, Thorne Jack', 'To ósma historia w serii i pierwszy autoryzowany spektakl teatralny ze świata Harry’ego Pottera.', 'Fantastyka', 'Media Rodzina', 'okładka miękka', 2016, 0, 1, 33, '', 0, 0),
('a50715e1-9c8c-11e6-ba75-e8039ab51a57', 'Okrążyć słońce', 'Paula McLain', 'Poruszająca opowieść o bezgranicznej wolności i pasji.\r\n\r\nPoczątek XX wieku. Trzyletnia Beryl Markham przeprowadza się wraz z rodzicami na farmę w Kenii. To miejsce szybko staje się jej domem, a członkowie plemienia Kipsigis przewodnikami po nowej i dziki', 'Przygodowa', 'Znak', 'okladka', 2016, 0, 0, 24, '0', 0, 0),
('a6a1efe9958d2c17fd293702321cfbf3', 'Dywizjon 303', 'Arkady Fiedler', 'Dywizjon 303 to utwór, którego roli w polskiej literaturze i historii nie można pominąć. Powstał w 1940 roku, w ostatnich tygodniach Bitwy o Anglię, której przebieg opisuje.', 'Historyczna', 'Greg', '', 2008, 0, 1, 16, '5', 0, 0),
('a8907df2751a6fbb3b6cd4be2c0ac286', 'W pustyni i w puszczy', 'Henryk Sienkiewicz', 'W pustyni i w puszczy – powieść przygodowa dla młodzieży Henryka Sienkiewicza.', 'Przygodowa', 'Greg', '', 2002, 0, 1, 25, '5', 0, 0),
('aab4c5b7-9bd1-11e6-88f2-e8039ab51a57', 'Więzień labiryntu. Tom 1.', 'James Dashner', 'Więzień labiryntu to pierwszy tom trylogii amerykańskiego autora Jamesa Dashnera, która stała się międzynarodowym bestsellerem i jest uznawana za jedną z najlepszych książek tego gatunku, obok takich tytułów jak Igrzyska Śmierci, Niezgodna czy seria Gone.', 'Przygodowa', 'Papierowy księżyc', 'okladka', 2014, 0, 1, 24, '0', 0, 0),
('b7a2bb7b-9c8b-11e6-ba75-e8039ab51a57', 'Igrzyska śmierci 2. W pierścieniu ognia', 'Suzanne Collins', 'To drugi tom trylogii o państwie Panem, gdzie co roku odbywają się emitowane przez telewizję krwawe Głodowe Igrzyska. Uczestniczą w nich nastolatki z każdego z dwudziestu czterech dystryktów. Zwycięzca igrzysk może być tylko jeden.', 'Przygodowa', 'Media Rodzina', 'okladka', 2013, 0, 0, 19, '0', 0, 0),
('b80a5dff-9bd2-11e6-88f2-e8039ab51a57', 'Marsjanin', 'Andy Weir', 'Mark Watney jest uczestnikiem sześcioosobowej misji na Marsie. Kiedy podczas szóstego sola na czerwonej planecie w obóz uderza silna burza piaskowa, dowódca podejmuje decyzję o ewakuacji. Oderwany przez wiatr element anteny nadawczej uderza w Marka, a prz', 'Przygodowa', 'Akurat', 'okladka', 2015, 0, 1, 26, '0', 0, 0),
('d1aabb6eaa93d70a0c0d515bd3b5fc92', 'Pan Tadeusz', 'Adam Mickiewicz', 'Treść książki oraz dokładne, wyczerpujące opracowanie, w tym biografia pisarza, kalendarium jego życia i twórczości, precyzyjnie określone rodzaj i gatunek literacki utworu.', 'Klasyka', 'Greg', 'okładka twarda', 2006, 0, 1, 15, '5', 0, 0),
('d56fea3b-9c8d-11e6-ba75-e8039ab51a57', 'Achaja. Tom 2', 'Andrzej Ziemiański', 'Achaja była kiedyś księżniczką potężnego Królestwa Troy. Zdążyła jednak już o tym zapomnieć... Ucieka. Z piętnem niewolnicy i tatuażem dziewki z domu publicznego... Czy istnieje na świecie miejsce, gdzie będzie mogła normalnie żyć?', 'Przygodowa', 'Fabryka Słów', 'okladka', 2011, 0, 0, 25, '0', 0, 0),
('d9963275-9c8e-11e6-ba75-e8039ab51a57', 'Przemyślny rycerz Don Kichot z Manczy', 'Miguel De Cervantes Saavedra', 'Choć wydaje się, że prawie każdy zna powieść Cervantesa i wielokrotnie widział don Kichota w dziełach wielkich artystów, jak Gustave Doré, Honoré Daumier, Salvador Dali, Pablo Picasso i wielu innych, to z pewnością zaskoczą go rysunki i wizje Wojciecha Si', 'Przygodowa', 'Rebis', 'okladka', 2016, 0, 0, 39, '0', 0, 0),
('df158a49ef1be88fabcdf2d429ba7eb7', 'Awitorzy', 'Jarosław Sokół', 'Fenomenalna, barwna powieść o polskich lotnikach autora bestsellerowego "Czasu Honoru".', 'Historyczna', 'Wydawnictwo Zwierciadło', 'okładka twarda', 2016, 1, 0, 41, '5', 0, 0),
('e99505e1-9c8c-11e6-ba75-e8039ab51a57', 'Dotknięcie pustki', 'Joe Simpson', 'W książce, autor opisuje to, co sam przeżył w obojętnym lecz bezlitosnym świecie górskiej przyrody. Trzymająca w napięciu akcja, chwilami wręcz niewiarygodna opowieść człowieka walczącego o przetrwanie, niezwykła szczerość wypowiedzi a także duży talent l', 'Przygodowa', 'Stapis', 'okladka', 2016, 0, 0, 24, '0', 0, 0),
('fd1bbec4-9bcb-11e6-88f2-e8039ab51a57', 'Wikingowie i ich wrogowie', 'Philip Line', 'Od VIII do XI wieku wikingowie przemierzali całą Europę – napadali, eksplorowali i kolonizowali – a swoją obecność zaznaczyli nawet na Rusi i w Bizancjum. Mimo że cieszyli się sławą wspaniałych wojowników, niewiele wiemy o ich talentach wojskowych.', 'Historyczna', 'RM', 'okladka', 2006, 0, 0, 34, '0', 0, 0);

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
