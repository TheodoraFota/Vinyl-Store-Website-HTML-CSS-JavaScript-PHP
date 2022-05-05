-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 14 Οκτ 2021 στις 05:15:08
-- Έκδοση διακομιστή: 10.4.17-MariaDB
-- Έκδοση PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `vinylstore`
--
DROP DATABASE IF EXISTS `vinylstore`;
CREATE DATABASE IF NOT EXISTS `vinylstore` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `vinylstore`;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `mylist`
--

DROP TABLE IF EXISTS `mylist`;
CREATE TABLE `mylist` (
  `id` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `vinylName` varchar(100) NOT NULL,
  `page` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `mylist`
--

INSERT INTO `mylist` (`id`, `userName`, `vinylName`, `page`) VALUES
(4, 'cosmos', 'Black Sabbath - Paranoid', 'blacksabbathParanoid.php'),
(6, 'cosmos', 'AC DC - Power up', 'acdcPowerUp.php'),
(7, 'cosmos', 'Eagles - Millenium Concert', ''),
(8, 'panos', 'Eagles - Millenium Concert', ''),
(9, 'panos', 'AC DC - Power up', 'acdcPowerUp.php'),
(10, 'maria', 'AC DC - Power up', 'acdcPowerUp.php');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('cosmos', '123'),
('dokimi', '12'),
('maria', '123'),
('panos', '123');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `mylist`
--
ALTER TABLE `mylist`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `primaryUsername` (`username`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `mylist`
--
ALTER TABLE `mylist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
