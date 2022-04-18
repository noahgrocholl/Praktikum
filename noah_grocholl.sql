-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 01. Apr 2022 um 08:23
-- Server-Version: 10.1.38-MariaDB
-- PHP-Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `noah_grocholl`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categrories`
--

CREATE TABLE `categrories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `categrories`
--

INSERT INTO `categrories` (`id`, `name`) VALUES
(1, 'Natur'),
(5, 'Katzen'),
(6, 'Hunde'),
(7, 'Technik'),
(8, 'Sport'),
(9, 'Musik'),
(10, 'deutsch'),
(11, 'englisch');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `posts`
--

INSERT INTO `posts` (`id`, `text`, `date`, `user`) VALUES
(197, 'TECHNIK LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA LA ', '2022-03-30', 105),
(198, 'SPOOOOORT', '2022-03-31', 109),
(201, 'technik aaaa hund ', '2022-04-01', 110);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `post_categories`
--

INSERT INTO `post_categories` (`id`, `post_id`, `category_id`) VALUES
(29, 193, 6),
(30, 194, 1),
(31, 194, 5),
(32, 195, 7),
(33, 196, 9),
(34, 196, 10),
(35, 197, 7),
(36, 197, 9),
(37, 198, 7),
(38, 198, 8),
(39, 198, 9),
(40, 198, 10),
(47, 201, 6),
(48, 201, 7);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `created_at`) VALUES
(105, 'Hans', '2022-03-23'),
(106, 'Peter', '2022-03-23'),
(107, 'Noah', '2022-03-23'),
(108, 'Kurt', '2022-03-24'),
(109, 'Klaus', '2022-03-24'),
(110, 'Uwe', '2022-03-24'),
(111, 'Brigitte', '2022-03-24'),
(112, 'aasaasasaasa ', '2022-03-24'),
(113, 'Rudi', '2022-03-24'),
(114, 'xX_phpNutzer35_Xx', '2022-03-24'),
(115, 'User12', '2022-03-24'),
(117, 'Henry', '2022-03-24'),
(118, 'Hans', '2022-03-25'),
(119, 'Peter', '2022-03-28');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `categrories`
--
ALTER TABLE `categrories`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `categrories`
--
ALTER TABLE `categrories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT für Tabelle `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
