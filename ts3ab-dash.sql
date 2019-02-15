-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Lut 2019, 21:44
-- Wersja serwera: 10.1.37-MariaDB
-- Wersja PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `ts3ab-dash`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bots`
--

CREATE TABLE `bots` (
  `id` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `server` text NOT NULL,
  `channel_id` text NOT NULL,
  `group_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `bots`
--

INSERT INTO `bots` (`id`, `name`, `server`, `channel_id`, `group_id`) VALUES
('default', 'WrajtBOT', '127.0.0.1', '1', '1337');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `bots`
--
ALTER TABLE `bots`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
