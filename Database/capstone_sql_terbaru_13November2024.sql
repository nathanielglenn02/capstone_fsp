-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Nov 2024 pada 02.41
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `achievement`
--

CREATE TABLE `achievement` (
  `idachievement` int(11) NOT NULL,
  `idteam` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `achievement`
--

INSERT INTO `achievement` (`idachievement`, `idteam`, `name`, `date`, `description`) VALUES
(1, 1, 'Battle Royale Champion', '2024-01-15', 'Won the Battle Royale Showdown with the highest kills.'),
(2, 2, 'Arena Heroes', '2024-02-10', 'Secured first place in the Arena Champions Cup.'),
(3, 3, 'Sniper Master', '2024-03-05', 'Achieved top score in the Sniper Elite Challenge.'),
(4, 4, 'Racing Legend', '2024-04-12', 'Won the Speed Racing Grand Prix with record time.'),
(5, 5, 'Strike Force Elite', '2024-05-07', 'Dominated the Strike Force Championship.'),
(6, 6, 'Combat Legend', '2024-06-03', 'MVP in Combat Legends Invitational.'),
(7, 7, 'Soccer Stars Champion', '2024-07-21', 'Won the Soccer Stars League.'),
(8, 8, 'Rocket League Star', '2024-08-15', 'First place in Rocket Racers Cup.'),
(9, 9, 'Warzone Winner', '2024-09-01', 'Dominated Warzone Battle Royale with strategic gameplay.'),
(10, 10, 'Brawler Frenzy Winner', '2024-09-20', 'First place in the Brawler Frenzy Tournament.'),
(11, 11, 'Cyber Battle Victor', '2024-09-20', 'Champion of the Cyber Battle Clash.'),
(12, 12, 'Warzone Tactical Champion', '2024-09-20', 'First place in Warzone Tactical.'),
(14, 14, 'Heroic Clash Winner', '2024-09-20', 'Secured first place in Heroic Clash.'),
(15, 15, 'Basketball Blitz MVP', '2024-09-20', 'Top scorer in Basketball Blitz Contest.'),
(16, 16, 'Ultimate Fighter', '2024-09-20', 'Champion in Ultimate Fighters Tournament.'),
(17, 17, 'Fantasy Champion', '2024-09-20', 'Won Fantasy Battleground Clash.'),
(18, 18, 'Golf Rivals Champion', '2024-09-20', 'First place in Golf Rivals Championship.'),
(19, 19, 'Space Raider Champion', '2024-09-20', 'Top player in Space Raiders Tournament.'),
(20, 20, 'Dodgeball Master', '2024-09-20', 'Champion of Dodgeball Extravaganza.'),
(21, 21, 'Zombie Slayer', '2024-09-20', 'Dominated Zombie Survival Royale.'),
(22, 22, 'Tank Commander', '2024-09-20', 'Won Tank Warfare League.'),
(23, 23, 'Epic Racer', '2024-09-20', 'First place in Epic Racing Tournament.'),
(24, 24, 'Volleyball Smash Champion', '2024-09-20', 'Top team in Volleyball Smash Cup.'),
(25, 25, 'King of the Hill', '2024-09-20', 'Captured the hill in King of the Hill Battle.'),
(26, 26, 'Ninja Showdown Champion', '2024-09-20', 'Dominated the Ninja Showdown Championship.'),
(27, 27, 'Pirate King', '2024-09-20', 'Won Pirate Sea Battle with most treasures.'),
(28, 28, 'Drone Racing Master', '2024-09-20', 'First place in Drone Racing League.'),
(29, 29, 'MOBA Master', '2024-09-20', 'Champion in Fantasy MOBA Masters.'),
(30, 30, 'Flag Capturer', '2024-09-20', 'Won the Capture the Flag Tournament with most captures.'),
(38, 4, 'efefef', '2000-11-02', '332323');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `idevent` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`idevent`, `name`, `date`, `description`) VALUES
(1, 'Battle Royale Showdown', '2024-01-15', 'Compete in the ultimate battle royale tournament.'),
(2, 'Arena Champions Cup', '2024-02-10', '5v5 tournament with the best teams from around the world.'),
(3, 'Sniper Elite Challenge', '2024-03-05', 'Test your sniper skills against top players.'),
(4, 'Speed Racing Grand Prix', '2024-04-12', 'High-speed races with prize money for the top finishers.'),
(5, 'Strike Force Championship', '2024-05-07', 'Tactical shooter tournament with strategic objectives.'),
(6, 'Combat Legends Invitational', '2024-06-03', 'Fight for glory in this competitive arena.'),
(7, 'Soccer Stars League', '2024-07-21', 'Multiplayer soccer tournament with top teams.'),
(8, 'Rocket Racers Cup', '2024-08-15', 'Soccer and rocket-powered vehicles in a competitive mix.'),
(9, 'Warzone Battle Royale', '2024-09-01', 'Battle royale in large-scale war zones.'),
(10, 'Brawler Frenzy Tournament', '2024-09-20', 'Melee combat tournament with top brawlers.'),
(11, 'Cyber Battle Clash', '2024-10-05', 'Cyberpunk-style PvP battles in futuristic settings.'),
(12, 'Ultimate Hero Showdown', '2024-10-25', 'Hero selection tournament with diverse teams.'),
(13, 'Basketball Blitz Contest', '2024-11-15', 'Fast-paced basketball competition.'),
(14, 'Global Fighting Cup', '2024-12-01', 'International fighting tournament with unique characters.'),
(15, 'Fantasy Battleground Clash', '2025-01-05', 'Fantasy-themed battles with top players.'),
(16, 'Golf Rivals Championship', '2025-02-11', 'One-on-one golf matches with challenging courses.'),
(17, 'Space Raiders Tournament', '2025-03-02', 'Compete for resources and glory in space battles.'),
(18, 'Dodgeball Extravaganza', '2025-04-06', 'Competitive dodgeball matches with special moves.'),
(19, 'Zombie Survival Royale', '2025-05-10', 'Survive against zombies and rival players.'),
(20, 'Tank Warfare League', '2025-06-18', 'Command tanks in strategic, explosive battles.'),
(21, 'Volleyball Smash Cup', '2025-07-24', 'Beach volleyball competition for the best teams.'),
(22, 'King of the Hill Battle', '2025-08-13', 'Capture and defend the hill in dynamic arenas.'),
(23, 'Ninja Showdown Championship', '2025-09-05', 'Ninja skills competition in fast-paced duels.'),
(24, 'Pirate Sea Battle', '2025-10-02', 'Ship battles in the high seas with treasure rewards.'),
(25, 'Drone Racing League', '2025-10-27', 'Pilot drones in obstacle courses and races.'),
(26, 'Fantasy MOBA Masters', '2025-11-18', 'Choose champions for a MOBA-style tournament.'),
(27, 'Capture the Flag Tournament', '2025-12-08', 'Team-based competition to capture the flag.'),
(28, 'Epic Gladiator Clash', '2026-01-20', 'Compete in the ancient Roman arena for glory.'),
(29, 'Wild West Showdown', '2026-02-15', 'Wild West themed shooting competition.'),
(30, 'Space Colony Builder', '2026-03-10', 'Compete to build the best space colony.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_teams`
--

CREATE TABLE `event_teams` (
  `idevent` int(11) NOT NULL,
  `idteam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `event_teams`
--

INSERT INTO `event_teams` (`idevent`, `idteam`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 3),
(3, 4),
(4, 1),
(4, 2),
(4, 4),
(5, 2),
(5, 4),
(5, 5),
(6, 2),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `game`
--

CREATE TABLE `game` (
  `idgame` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `game`
--

INSERT INTO `game` (`idgame`, `name`, `description`) VALUES
(1, 'Battle Royale Kings', 'Fight against 100 players to be the last one standing in a shrinking arena.'),
(2, 'Arena Champions', 'Choose your hero and compete in 5v5 matches with tactical objectives.'),
(3, 'Sniper Elite', 'Showcase your sniper skills in intense player-vs-player battles.'),
(4, 'Race to Glory', 'Compete in high-speed races across diverse tracks and environments.'),
(5, 'Strike Force', 'Engage in 5v5 tactical shooter battles to complete various objectives.'),
(6, 'Legends of Combat', 'Pick your character and team up to dominate in arena battles.'),
(7, 'Soccer Stars', 'Lead your team to victory in fast-paced soccer matches.'),
(8, 'Rocket Racers', 'Use rocket-powered vehicles to play soccer in a futuristic arena.'),
(9, 'Battlefield Warriors', 'Coordinate with your squad in large-scale war zones.'),
(10, 'Brawler Frenzy', 'Fight in close-quarters melee combat to defeat your opponents.'),
(11, 'Cyber Battle', 'Join cyberpunk-style battles in a futuristic urban setting.'),
(12, 'Warzone Tactical', 'Survive and conquer in a massive open-world battle royale.'),
(13, 'Speed Demons', 'Race against the best in adrenaline-fueled car races.'),
(14, 'Heroic Clash', 'Strategically select heroes to compete in objective-based matches.'),
(15, 'Basketball Blitz', 'Score points and dominate in quick basketball games.'),
(16, 'Ultimate Fighters', 'Compete in a global fighting tournament with unique characters.'),
(17, 'Fantasy Battlegrounds', 'Battle for supremacy in a fantasy-themed battle arena.'),
(18, 'Golf Rivals', 'Challenge opponents in one-on-one golf matches with realistic physics.'),
(19, 'Space Raiders', 'Fight for resources in outer space and defeat enemy players.'),
(20, 'Dodgeball Showdown', 'Play intense dodgeball matches with power-ups and special moves.'),
(21, 'Zombie Royale', 'Survive against other players and waves of zombies.'),
(22, 'Tank Wars', 'Command a tank and engage in strategic, explosive battles.'),
(23, 'Epic Racing', 'Race against other players with customizable cars on dynamic tracks.'),
(24, 'Volleyball Smash', 'Spike, block, and compete in volleyball matches on sandy beaches.'),
(25, 'King of the Hill', 'Capture and defend the hill against other players in dynamic arenas.'),
(26, 'Ninja Showdown', 'Show off your ninja skills in fast-paced, competitive duels.'),
(27, 'Pirate Battle', 'Engage in ship battles and claim treasures against rival pirates.'),
(28, 'Drone Champions', 'Pilot drones in competitive obstacle courses and races.'),
(29, 'Fantasy MOBA', 'Choose your champion and compete in strategic, objective-based battles.'),
(30, 'Capture the Flag', 'Team up to capture the flag and bring it back to your base.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `join_proposal`
--

CREATE TABLE `join_proposal` (
  `idjoin_proposal` int(11) NOT NULL,
  `idmember` int(11) NOT NULL,
  `idteam` int(11) NOT NULL,
  `description` varchar(100) DEFAULT 'role preference: support, attacker, dll',
  `status` enum('waiting','approved','rejected') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `join_proposal`
--

INSERT INTO `join_proposal` (`idjoin_proposal`, `idmember`, `idteam`, `description`, `status`) VALUES
(26, 5, 1, 'a', 'rejected'),
(27, 5, 2, 'a', 'approved'),
(28, 5, 3, 'a', 'rejected'),
(29, 5, 4, 'a', 'approved'),
(30, 5, 5, 'a', 'approved'),
(31, 5, 6, 'a', 'waiting'),
(32, 49, 2, 'ge', 'approved'),
(33, 49, 1, 'rf', 'approved'),
(34, 5, 9, 'h', 'waiting'),
(35, 5, 12, 'h', 'approved'),
(36, 5, 11, 'h', 'approved'),
(37, 5, 10, 'rg', 'approved');

--
-- Trigger `join_proposal`
--
DELIMITER $$
CREATE TRIGGER `after_update_join_proposal` AFTER UPDATE ON `join_proposal` FOR EACH ROW BEGIN
    IF NEW.status = 'approved' THEN
        INSERT INTO team_members (idmember, idteam, description)
        VALUES (NEW.idmember, NEW.idteam, new.description);
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `idmember` int(11) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `profile` enum('admin','member') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`idmember`, `fname`, `lname`, `username`, `password`, `profile`) VALUES
(1, 'John', 'Doe', 'johndoe', '$2y$10$i8bFmR7kZwJ0Obqn3QWFguRkFcV85SIg.0tAO4s.ck2kkKP1Gl1o2', 'admin'),
(2, 'Jane', 'Smith', 'janesmith', '$2y$10$i8bFmR7kZwJ0Obqn3QWFguRkFcV85SIg.0tAO4s.ck2kkKP1Gl1o2', 'admin'),
(3, 'Alice', 'Anderson', 'aliceA', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(4, 'Bob', 'Brown', 'bobB', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(5, 'Charlie', 'Clark', 'charlieC', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(6, 'Diana', 'Davis', 'dianaD', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(7, 'Edward', 'Evans', 'edwardE', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(8, 'Fiona', 'Franklin', 'fionaF', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(9, 'George', 'Green', 'georgeG', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(10, 'Hannah', 'Hill', 'hannahH', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(11, 'Ian', 'Irwin', 'ianI', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(12, 'Julia', 'Johnson', 'juliaJ', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(13, 'Kevin', 'King', 'kevinK', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(14, 'Laura', 'Lewis', 'lauraL', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(15, 'Michael', 'Moore', 'michaelM', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(16, 'Nina', 'Nelson', 'ninaN', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(17, 'Oliver', 'Owens', 'oliverO', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(18, 'Paula', 'Parker', 'paulaP', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(19, 'Quentin', 'Quinn', 'quentinQ', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(20, 'Rachel', 'Roberts', 'rachelR', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(21, 'Samuel', 'Smith', 'samuelS', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(22, 'Tina', 'Taylor', 'tinaT', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(23, 'Umar', 'Underwood', 'umarU', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(24, 'Vera', 'Vance', 'veraV', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(25, 'Walter', 'White', 'walterW', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(26, 'Xena', 'Xavier', 'xenaX', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(27, 'Yara', 'Young', 'yaraY', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(28, 'Zack', 'Zimmer', 'zackZ', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(29, 'Leo', 'Lee', 'leoL', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(30, 'Sophia', 'Stewart', 'sophiaS', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(31, 'Jack', 'Cole', 'jackJ', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(32, 'Mia', 'Gray', 'miaM', '$2y$10$SYGixE5X.i./xnPYSMIhSetM/JO7G..Jm1Sg.kD9063R3Zrr5iTjq', 'member'),
(49, 'Jono', 'Jono', 'jono', '$2y$10$rZ8n44mm8tDbxh5T34WGzOVsioOtL0opnljCFXXe9BonbGG0hHQVO', 'member'),
(50, 'Jono', 'Jono', 'jonoo', '$2y$10$yHX2/HlYT7FBjT9Cr4JNB.oXhQtT4M3tUECZTE1Gv1NMwTX3kan.O', 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `team`
--

CREATE TABLE `team` (
  `idteam` int(11) NOT NULL,
  `idgame` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `imgPath` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `team`
--

INSERT INTO `team` (`idteam`, `idgame`, `name`, `imgPath`) VALUES
(1, 1, 'Kings of Battle', '1.jpg'),
(2, 2, 'Champions United', 'default.jpg'),
(3, 3, 'Elite Snipers', 'default.jpg'),
(4, 4, 'Glory Racers', 'default.jpg'),
(5, 5, 'Strike Squad', 'default.jpg'),
(6, 6, 'Legends of Combat', 'default.jpg'),
(7, 7, 'Soccer Stars FC', 'default.jpg'),
(8, 8, 'Rocket Racers Club', 'default.jpg'),
(9, 9, 'Battlefield Warriors', 'default.jpg'),
(10, 10, 'Frenzy Fighters', 'default.jpg'),
(11, 11, 'Cyber Attackers', 'default.jpg'),
(12, 12, 'Warzone Tactical', 'default.jpg'),
(14, 14, 'Heroes United', 'default.jpg'),
(15, 15, 'Basketball Blitzers', 'default.jpg'),
(16, 16, 'Ultimate Fight Club', 'default.jpg'),
(17, 17, 'Fantasy Warriors', 'default.jpg'),
(18, 18, 'Golf Rivals Club', 'default.jpg'),
(19, 19, 'Space Raiders Guild', 'default.jpg'),
(20, 20, 'Dodgeball Aces', 'default.jpg'),
(21, 21, 'Zombie Slayers', 'default.jpg'),
(22, 22, 'Tank Warriors', 'default.jpg'),
(23, 23, 'Epic Racers', 'default.jpg'),
(24, 24, 'Volleyball Smashers', 'default.jpg'),
(25, 25, 'Hill Defenders', 'default.jpg'),
(26, 26, 'Ninja Showdown Crew', 'default.jpg'),
(27, 27, 'Pirate Buccaneers', 'default.jpg'),
(28, 28, 'Drone Pilots League', 'default.jpg'),
(29, 29, 'MOBA Masters', 'default.jpg'),
(30, 30, 'Flag Capturers', 'default.jpg'),
(52, 1, 'g', '52.jpg'),
(53, 1, 'rhrhrh', '53.jpg'),
(54, 1, 'vgegeg', 'default.jpg'),
(55, 1, 'cecec', 'default.jpg'),
(57, 1, 'ce', '57.jpg'),
(58, 1, 'tthththth', 'default.jpg'),
(60, 1, 'g', 'default.jpg'),
(62, 1, 'y5y5y5y5y5y', 'default.jpg'),
(63, 1, 'y6y6y', '6733f9751574b.jpg'),
(64, 1, 'rvrvrv', 'default.jpg'),
(66, 1, 'rfrfrf', 'default.jpg'),
(67, 1, '5y5y', '67340373828c4.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `team_members`
--

CREATE TABLE `team_members` (
  `idteam` int(11) NOT NULL,
  `idmember` int(11) NOT NULL,
  `description` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `team_members`
--

INSERT INTO `team_members` (`idteam`, `idmember`, `description`) VALUES
(1, 49, 'rf'),
(2, 5, 'a'),
(2, 20, NULL),
(2, 21, NULL),
(2, 22, NULL),
(2, 49, 'ge'),
(4, 5, 'a'),
(5, 5, 'a'),
(5, 49, NULL),
(6, 5, NULL),
(7, 5, NULL),
(10, 5, 'rg'),
(11, 5, 'h'),
(12, 5, 'h');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`idachievement`),
  ADD KEY `fk_achievement_team1_idx` (`idteam`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`idevent`);

--
-- Indeks untuk tabel `event_teams`
--
ALTER TABLE `event_teams`
  ADD PRIMARY KEY (`idevent`,`idteam`),
  ADD KEY `fk_event_has_team_team1_idx` (`idteam`),
  ADD KEY `fk_event_has_team_event1_idx` (`idevent`);

--
-- Indeks untuk tabel `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`idgame`);

--
-- Indeks untuk tabel `join_proposal`
--
ALTER TABLE `join_proposal`
  ADD PRIMARY KEY (`idjoin_proposal`),
  ADD KEY `fk_join_proposal_member1_idx` (`idmember`),
  ADD KEY `fk_join_proposal_team1_idx` (`idteam`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idmember`);

--
-- Indeks untuk tabel `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`idteam`),
  ADD KEY `fk_team_game1_idx` (`idgame`);

--
-- Indeks untuk tabel `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`idteam`,`idmember`),
  ADD KEY `fk_team_has_member_member1_idx` (`idmember`),
  ADD KEY `fk_team_has_member_team_idx` (`idteam`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `achievement`
--
ALTER TABLE `achievement`
  MODIFY `idachievement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `idevent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `game`
--
ALTER TABLE `game`
  MODIFY `idgame` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `join_proposal`
--
ALTER TABLE `join_proposal`
  MODIFY `idjoin_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `idmember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `team`
--
ALTER TABLE `team`
  MODIFY `idteam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `achievement`
--
ALTER TABLE `achievement`
  ADD CONSTRAINT `fk_achievement_team1` FOREIGN KEY (`idteam`) REFERENCES `team` (`idteam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `event_teams`
--
ALTER TABLE `event_teams`
  ADD CONSTRAINT `fk_event_has_team_event1` FOREIGN KEY (`idevent`) REFERENCES `event` (`idevent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_event_has_team_team1` FOREIGN KEY (`idteam`) REFERENCES `team` (`idteam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `join_proposal`
--
ALTER TABLE `join_proposal`
  ADD CONSTRAINT `fk_join_proposal_member1` FOREIGN KEY (`idmember`) REFERENCES `member` (`idmember`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_join_proposal_team1` FOREIGN KEY (`idteam`) REFERENCES `team` (`idteam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `fk_team_game1` FOREIGN KEY (`idgame`) REFERENCES `game` (`idgame`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `team_members`
--
ALTER TABLE `team_members`
  ADD CONSTRAINT `fk_team_has_member_member1` FOREIGN KEY (`idmember`) REFERENCES `member` (`idmember`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_team_has_member_team` FOREIGN KEY (`idteam`) REFERENCES `team` (`idteam`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
