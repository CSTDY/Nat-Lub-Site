-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Maj 2020, 14:53
-- Wersja serwera: 10.1.37-MariaDB
-- Wersja PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `nat_lub_site_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `o_sobie`
--

CREATE TABLE `o_sobie` (
  `id` int(11) NOT NULL,
  `header` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tekst` varchar(1024) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `edition_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `o_sobie`
--

INSERT INTO `o_sobie` (`id`, `header`, `tekst`, `edition_date`) VALUES
(1, 'Moja historia', 'Kosmetyką zajmuję się od zawsze, profesjonalnie od dwóch lat... Posiadam wiele cyrtyfikatów', '2020-04-22 14:22:52');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `o_sobie`
--
ALTER TABLE `o_sobie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `o_sobie`
--
ALTER TABLE `o_sobie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
