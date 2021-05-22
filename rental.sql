-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Bulan Mei 2021 pada 05.43
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `console`
--

CREATE TABLE `console` (
  `ConsoleID` int(11) NOT NULL,
  `NamaConsole` varchar(256) NOT NULL,
  `qty` int(11) NOT NULL,
  `qtyReady` int(11) NOT NULL,
  `manufacturer` varchar(256) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(256) NOT NULL,
  `gambar` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `console`
--

INSERT INTO `console` (`ConsoleID`, `NamaConsole`, `qty`, `qtyReady`, `manufacturer`, `harga`, `deskripsi`, `gambar`) VALUES
(1, 'Playstation 4', 5, 5, 'Sony', 50000, 'BUDI', '1.jpg'),
(2, 'Playstation 5', 3, 3, 'Sony', 0, '', ''),
(3, 'XBOX One', 7, 7, 'Microsoft', 0, '', ''),
(4, 'XBOX Series X', 4, 4, 'Microsoft', 0, '', ''),
(5, 'Nintendo Wii', 10, 10, 'Nintendo', 0, '', ''),
(6, 'Nintendo Switch', 6, 6, 'Nintendo', 0, '', ''),
(8, 'Test console', 69, 69, 'Sony', 69420, 'Keren', 'Kti8BSQBcqhFKr0KYecQ.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `consoleorder`
--

CREATE TABLE `consoleorder` (
  `orderId` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `consoleId` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `hari` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `game`
--

CREATE TABLE `game` (
  `GameID` int(11) NOT NULL,
  `NamaGame` varchar(256) NOT NULL,
  `platform` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `gambar` varchar(256) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `game`
--

INSERT INTO `game` (`GameID`, `NamaGame`, `platform`, `qty`, `gambar`, `harga`, `deskripsi`) VALUES
(1, 'Mortal Kombat 11', 1, 3, 'EetXlLN3H0Ahw9x8ItoP.jpg', 25000, 'intense fighting and brutal, watch for your back bone'),
(2, 'Battlefield 5', 1, 4, '', 0, ''),
(3, 'God of War 4', 1, 5, '', 0, ''),
(4, 'Kingdom Hearts 3', 1, 2, '', 0, ''),
(5, 'Marvel\'s Spiderman', 1, 5, '', 0, ''),
(6, 'Devil May Cry 2', 1, 5, '', 0, ''),
(7, 'The Last of Us 2', 1, 2, '', 0, ''),
(8, 'The Witcher 3 : Wild Hunt', 1, 8, '', 0, ''),
(9, 'Persona 5', 1, 1, '', 0, ''),
(10, 'Dark Souls 3', 1, 2, '', 0, ''),
(11, 'Final Fantasy VII Remake', 1, 6, '', 0, ''),
(12, 'Grand Theft Auto V', 1, 10, '', 0, ''),
(13, 'The Last of US Remastered', 1, 4, '', 0, ''),
(14, 'Minecraft : Playstation 4 Edition', 1, 9, '', 0, ''),
(15, 'NBA 2K17', 1, 8, '', 0, ''),
(16, 'Pro Evolution Soccer 2016', 1, 6, '', 0, ''),
(17, 'FIFA 14', 1, 2, '', 0, ''),
(18, 'F1 2020', 1, 6, '', 0, ''),
(19, 'Resident Evil Village', 2, 2, '', 0, ''),
(20, 'Gotham Knights', 2, 2, '', 0, ''),
(21, 'Rachet & Clank Rift Apart', 2, 2, '', 0, ''),
(22, 'Horizon Forbidden West', 2, 2, '', 0, ''),
(23, 'Marvel\'s Spider-Man : Miles Morales', 2, 2, '', 0, ''),
(24, 'Spiderman Remastered', 2, 2, '', 0, ''),
(25, 'Assassin\'s Creed Valhalla', 2, 2, '', 0, ''),
(26, 'Demon\'s Souls', 2, 2, '', 0, ''),
(27, 'Tekken 7', 3, 3, '', 0, ''),
(28, 'Assassin’s Creed Syndicate', 3, 3, '', 0, ''),
(29, 'Wolfenstein: The New Order', 3, 3, '', 0, ''),
(30, 'Tom Clancy’s The Division 2', 3, 3, '', 0, ''),
(31, 'Call of Duty: WWII', 3, 3, '', 0, ''),
(32, 'The Elder Scrolls V: Skyrim Special Edition', 3, 3, '', 0, ''),
(33, 'Dragon Ball FighterZ', 3, 3, '', 0, ''),
(34, 'Far Cry 4', 3, 2, '', 0, ''),
(35, 'Batman: Arkham Knight', 3, 1, '', 0, ''),
(36, 'Assassin’s Creed Valhalla', 4, 4, '', 0, ''),
(37, 'Gears 5', 4, 4, '', 0, ''),
(38, 'Forza Horizon 4', 4, 4, '', 0, ''),
(39, 'Sea of Thieves', 4, 4, '', 0, ''),
(40, 'Ori and the Will of the Wisps', 4, 4, '', 0, ''),
(41, 'Dirt 5', 4, 4, '', 0, ''),
(42, 'Hitman 3', 4, 4, '', 0, ''),
(43, 'Wii Sports', 5, 5, '', 0, ''),
(44, 'Wii Sports Resort', 5, 5, '', 0, ''),
(45, 'The Legend of Zelda: Twilight Princess', 5, 5, '', 0, ''),
(46, 'Muramasa: The Demon Blade', 5, 5, '', 0, ''),
(47, 'No More Heroes 2: Desperate Struggle', 5, 5, '', 0, ''),
(48, 'Monster Hunter Tri', 5, 5, '', 0, ''),
(49, 'Fire Emblem: Radiant Dawn', 5, 6, '', 0, ''),
(50, 'Pokémon Battle Revolution', 5, 5, '', 0, ''),
(51, 'Rock Band', 5, 5, '', 0, ''),
(52, 'Calling', 5, 5, '', 0, ''),
(53, 'Animal Crossing: New Horizons', 6, 6, '', 0, ''),
(54, 'Baldur\'s Gate 1 and 2: Enhanced Editions / Planescape Torment and Icewind Dale Enhanced Editions', 6, 6, '', 0, ''),
(55, 'Bayonetta 2', 6, 6, '', 0, ''),
(56, 'Celeste', 6, 6, '', 0, ''),
(57, 'Dark Souls: Remastered', 6, 6, '', 0, ''),
(58, 'Hades', 6, 6, '', 0, ''),
(59, 'Pokémon Sword and Shield', 6, 6, '', 0, ''),
(60, 'Stardew Valley', 6, 6, '', 0, ''),
(61, 'Super Mario Maker 2', 6, 6, '', 0, ''),
(62, 'Super Mario Odyssey', 6, 6, '', 0, ''),
(63, 'Super Smash Bros. Ultimate', 6, 6, '', 0, ''),
(64, 'The Legend of Zelda: Breath of the Wild', 6, 6, '', 0, ''),
(65, 'Assassin\'s Creed: The Rebel Collection', 6, 6, '', 0, ''),
(66, 'The Witcher 3: Wild Hunt', 6, 6, '', 0, ''),
(70, 'Arena of Valor', 6, 20, '', 20000, 'Just another 5v5 moba');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gameorder`
--

CREATE TABLE `gameorder` (
  `gameOrderId` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `gameId` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `hari` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `genre`
--

CREATE TABLE `genre` (
  `idGame` int(11) NOT NULL,
  `genreId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `genre`
--

INSERT INTO `genre` (`idGame`, `genreId`) VALUES
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 11),
(70, 3),
(70, 6),
(70, 12),
(1, 1),
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `genredetails`
--

CREATE TABLE `genredetails` (
  `genreId` int(11) NOT NULL,
  `genreName` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `genredetails`
--

INSERT INTO `genredetails` (`genreId`, `genreName`) VALUES
(1, 'Fighting'),
(2, 'Single Player'),
(3, 'Multi Player'),
(4, 'First-Person Shooter'),
(5, 'Battle Royale'),
(6, 'Action'),
(7, 'Adventure'),
(8, 'Role Playing'),
(9, 'Sandbox'),
(10, 'Real-Time Strategy'),
(11, 'Third-Person Shooter'),
(12, 'MOBA'),
(13, 'Simulation'),
(14, 'Sport'),
(15, 'Puzzle'),
(16, 'Party'),
(17, 'Survival'),
(18, 'Horror'),
(19, 'Platformer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pricing`
--

CREATE TABLE `pricing` (
  `gamePrice` int(11) NOT NULL,
  `consolePrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pricing`
--

INSERT INTO `pricing` (`gamePrice`, `consolePrice`) VALUES
(80000, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `firstName` varchar(256) NOT NULL,
  `lastName` varchar(256) NOT NULL,
  `alamat` varchar(512) NOT NULL,
  `telepon` varchar(256) NOT NULL,
  `role` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`email`, `password`, `firstName`, `lastName`, `alamat`, `telepon`, `role`) VALUES
('admin@jesse.com', '$2y$10$634sKWdgb9D8UMrEQsRZB.2iyTNEYhlo7h7LVeHrcGy9pHBoeb682', 'Admin', 'Jesse', 'rumahku', '02292929', 'user'),
('akun@baru.com', '$2y$10$t7bcrrzHxl5sc4fiKhjHi.OTpdnmhghzP3o8XP1BHWQvbAWEc/l9W', 'Akun', 'Baru', 'akunbaru', '111111111', 'user'),
('asd@asd.casd', '$2y$10$D42aAoLDKG9hqCL.g2.ws.bHP9airUt/PsV.PtqS4lcfn6WC87F3y', 'Budi', 'asd', 'asd', '123123123123', 'user'),
('jesse.evans@student.umn.ac.id', '$2y$10$MW16ETzwOzDVtA4SFeUmYuxDEFi2O3YKPvC6PSjxriIi44KANCcMe', 'Jesse', 'Evans', 'rumah saya', '082209107025', 'admin'),
('John@doe.com', '$2y$10$15Dzii8RtdLJXwLbGPI8iuwtH1TWvcpvvXAu56134eA6zd.RvYG.S', 'John', 'Doe', 'ruma', '123123123', 'user'),
('udin@patetot.com', '$2y$10$87EyHfvLVrJEXhRqCGhJo.WFgV0tz/w.c5Po0weVxgkeD/nPkfejq', 'Udin', 'Patetot', 'udara dingin', '08690696969', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `console`
--
ALTER TABLE `console`
  ADD PRIMARY KEY (`ConsoleID`);

--
-- Indeks untuk tabel `consoleorder`
--
ALTER TABLE `consoleorder`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `consoleId` (`consoleId`),
  ADD KEY `email` (`email`);

--
-- Indeks untuk tabel `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`GameID`),
  ADD KEY `platform` (`platform`);

--
-- Indeks untuk tabel `gameorder`
--
ALTER TABLE `gameorder`
  ADD PRIMARY KEY (`gameOrderId`),
  ADD KEY `gameId` (`gameId`),
  ADD KEY `email` (`email`);

--
-- Indeks untuk tabel `genre`
--
ALTER TABLE `genre`
  ADD KEY `idGame` (`idGame`),
  ADD KEY `genreId` (`genreId`);

--
-- Indeks untuk tabel `genredetails`
--
ALTER TABLE `genredetails`
  ADD PRIMARY KEY (`genreId`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `console`
--
ALTER TABLE `console`
  MODIFY `ConsoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `consoleorder`
--
ALTER TABLE `consoleorder`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `game`
--
ALTER TABLE `game`
  MODIFY `GameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `gameorder`
--
ALTER TABLE `gameorder`
  MODIFY `gameOrderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `genredetails`
--
ALTER TABLE `genredetails`
  MODIFY `genreId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `consoleorder`
--
ALTER TABLE `consoleorder`
  ADD CONSTRAINT `consoleorder_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `consoleorder_ibfk_2` FOREIGN KEY (`consoleId`) REFERENCES `console` (`ConsoleID`);

--
-- Ketidakleluasaan untuk tabel `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`platform`) REFERENCES `console` (`ConsoleID`);

--
-- Ketidakleluasaan untuk tabel `gameorder`
--
ALTER TABLE `gameorder`
  ADD CONSTRAINT `gameorder_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `gameorder_ibfk_2` FOREIGN KEY (`gameId`) REFERENCES `game` (`GameID`);

--
-- Ketidakleluasaan untuk tabel `genre`
--
ALTER TABLE `genre`
  ADD CONSTRAINT `genre_ibfk_1` FOREIGN KEY (`genreId`) REFERENCES `genredetails` (`genreId`),
  ADD CONSTRAINT `genre_ibfk_2` FOREIGN KEY (`idGame`) REFERENCES `game` (`GameID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
