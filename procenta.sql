-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pát 19. led 2024, 06:33
-- Verze serveru: 10.4.28-MariaDB
-- Verze PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `automaty`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `procenta`
--

CREATE TABLE `procenta` (
  `id` int(10) UNSIGNED NOT NULL,
  `vyhra` int(10) UNSIGNED DEFAULT NULL,
  `prohra` int(10) UNSIGNED DEFAULT NULL,
  `deset` int(10) UNSIGNED DEFAULT NULL,
  `jednaapul` int(10) UNSIGNED DEFAULT NULL,
  `jackpot` int(10) UNSIGNED DEFAULT NULL,
  `padesat` int(10) UNSIGNED DEFAULT NULL,
  `pet` int(10) UNSIGNED DEFAULT NULL,
  `dvacet` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `procenta`
--

INSERT INTO `procenta` (`id`, `vyhra`, `prohra`, `deset`, `jednaapul`, `jackpot`, `padesat`, `pet`, `dvacet`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `procenta`
--
ALTER TABLE `procenta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `procenta`
--
ALTER TABLE `procenta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
