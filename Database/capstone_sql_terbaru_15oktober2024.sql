-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 15, 2024 at 09:07 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

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
-- Table structure for table `achievement`
--

CREATE TABLE `achievement` (
  `idachievement` int NOT NULL,
  `idteam` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `achievement`
--

INSERT INTO `achievement` (`idachievement`, `idteam`, `name`, `date`, `description`) VALUES
(1, 1, 'Victory at Battle Royale', '2024-09-10', 'Won the annual Battle Royale tournament.'),
(2, 2, 'Top Scorer', '2024-09-11', 'Achieved highest score in the league.'),
(3, 3, 'Fastest Win', '2024-09-12', 'Won a match in record time.'),
(4, 4, 'Best Strategy', '2024-09-13', 'Recognized for the best strategy in competition.'),
(7, 1, 'Pemenan', '2024-10-08', 'sfd');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `idevent` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`idevent`, `name`, `date`, `description`) VALUES
(1, 'Summer Tournament', '2024-09-01', 'Annual summer gaming tournament'),
(2, 'Winter Championship', '2024-12-15', 'Competitive winter championship for pro teams'),
(3, 'Spring Challenge', '2024-03-20', 'A challenge for top teams during spring'),
(4, 'Lomba Valo', '2024-10-25', 'sfd');

-- --------------------------------------------------------

--
-- Table structure for table `event_teams`
--

CREATE TABLE `event_teams` (
  `idevent` int NOT NULL,
  `idteam` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `event_teams`
--

INSERT INTO `event_teams` (`idevent`, `idteam`) VALUES
(1, 1),
(2, 1),
(3, 1),
(1, 2),
(2, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `idgame` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`idgame`, `name`, `description`) VALUES
(1, 'Dota', 'A multiplayer online battle arena game'),
(2, 'Valorant', 'A tactical first-person shooter game'),
(3, 'PUBG M', 'A battle royale gamdededefrfr'),
(4, 'Apex Legends', 'A battle royale shooter'),
(6, 'Honor', 'Game Bagus '),
(7, 'Rocket League', 'Permainan sepak bola dengan mobil.'),
(8, 'World of Warcraft', 'Permainan MMORPG yang terkenal di dunia.'),
(9, 'The Witcher 3: Wild Hunt', 'Permainan RPG yang memiliki dunia terbuka yang luas.'),
(10, 'FIFA 22', 'Permainan sepak bola yang sangat populer.'),
(11, 'Final Fantasy XIV', 'MMORPG dengan elemen cerita yang kuat.'),
(12, 'Genshin Impact', 'Permainan RPG aksi dengan elemen gacha.'),
(13, 'Destiny 2', 'Permainan tembak-menembak dengan elemen MMO dan RPG.'),
(14, 'The Elder Scrolls V: Skyrim', 'Permainan RPG dengan dunia terbuka dan cerita yang mendalam.'),
(15, 'Monster Hunter: World', 'Permainan aksi RPG tentang berburu monster.');

-- --------------------------------------------------------

--
-- Table structure for table `join_proposal`
--

CREATE TABLE `join_proposal` (
  `idjoin_proposal` int NOT NULL,
  `idmember` int NOT NULL,
  `idteam` int NOT NULL,
  `description` varchar(100) DEFAULT 'role preference: support, attacker, dll',
  `status` enum('waiting','approved','rejected') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `join_proposal`
--

INSERT INTO `join_proposal` (`idjoin_proposal`, `idmember`, `idteam`, `description`, `status`) VALUES
(1, 13, 1, 'role preference: support, attacker, dll', 'rejected'),
(2, 13, 2, 'role preference: support, attacker, dll', 'rejected'),
(3, 13, 3, 'role preference: support, attacker, dll', 'approved'),
(4, 13, 4, 'role preference: support, attacker, dll', 'approved'),
(5, 12, 1, 'role preference: support, attacker, dll', 'approved'),
(6, 12, 2, 'attacker', 'approved'),
(7, 12, 4, 'rusher', 'approved'),
(8, 17, 1, '', 'approved');

--
-- Triggers `join_proposal`
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
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `idmember` int NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `profile` enum('admin','member') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`idmember`, `fname`, `lname`, `username`, `password`, `profile`) VALUES
(1, 'John', 'Doe', 'johndoe', '$2y$10$q3YFU0rQyscet2wfwg0xxeJPdFvx5JJaqytL2Wr3sNEnmKz6Owc1.', 'admin'),
(2, 'Jane', 'Smith', 'janesmith', '$2y$10$q3YFU0rQyscet2wfwg0xxeJPdFvx5JJaqytL2Wr3sNEnmKz6Owc1.', 'admin'),
(3, 'Alice', 'Johnson', 'alicej', '$2y$10$q3YFU0rQyscet2wfwg0xxeJPdFvx5JJaqytL2Wr3sNEnmKz6Owc1.', 'member'),
(4, 'Bob', 'Brown', 'bobbrown', '$2y$10$q3YFU0rQyscet2wfwg0xxeJPdFvx5JJaqytL2Wr3sNEnmKz6Owc1.', 'member'),
(5, 'Charlie', 'Davis', 'charlied', '$2y$10$q3YFU0rQyscet2wfwg0xxeJPdFvx5JJaqytL2Wr3sNEnmKz6Owc1.', 'member'),
(6, 'Eve', 'Miller', 'evemiller', '$2y$10$q3YFU0rQyscet2wfwg0xxeJPdFvx5JJaqytL2Wr3sNEnmKz6Owc1.', 'member'),
(7, 'Frank', 'Wilson', 'frankw', '$2y$10$q3YFU0rQyscet2wfwg0xxeJPdFvx5JJaqytL2Wr3sNEnmKz6Owc1.', 'member'),
(8, 'Grace', 'Moore', 'gracem', '$2y$10$q3YFU0rQyscet2wfwg0xxeJPdFvx5JJaqytL2Wr3sNEnmKz6Owc1.', 'member'),
(9, 'Henry', 'Taylor', 'henryt', '$2y$10$q3YFU0rQyscet2wfwg0xxeJPdFvx5JJaqytL2Wr3sNEnmKz6Owc1.', 'member'),
(10, 'Ivy', 'Anderson', 'ivyanderson', '$2y$10$q3YFU0rQyscet2wfwg0xxeJPdFvx5JJaqytL2Wr3sNEnmKz6Owc1.', 'member'),
(12, 'abuhan', 'abuhan', 'abuhan', '$2y$10$PI.avu2aQAY2ZNEI2qEAGeeuERqLWuZeYk7FTscJpYh1yAfwZgHIu', 'member'),
(13, 'member', 'sa', 'sa', '$2y$10$21ryg.vshnoOc/bQEP9mR.1Gjk.EOYSAGGyx5SteleHF8lrl6OqPq', 'member'),
(14, 'Jeffry', 'Wiharjo', 'Baju', '$2y$10$778r4Qu3vC.5/K4887JPIOicexYWEX2M/vj.c2/8792BoxLOYUp5C', 'member'),
(15, 'tol', 'tol', 'tol', '$2y$10$AFdj92p8ishaN5jxfJ0zru7PNJy4QBlRCkqxjOfnVejKRlhlVRSZO', 'member'),
(16, 'luky', 'wilan', 'lukyw', '$2y$10$1wt1InFqAQLLXfl25j4jkOusOXSnO/A/ymgP0GiPXiZaWiMVaHjI6', 'admin'),
(17, 'lukymember', 'member', 'lukym', '$2y$10$4R7iPA62wOZpUGXtfijDCOkHfx9pTD.EO9G6uuCPJ1UycASqcTr1S', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `idteam` int NOT NULL,
  `idgame` int NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`idteam`, `idgame`, `name`) VALUES
(1, 1, 'Alpha Squad'),
(2, 2, 'Beta Warriors'),
(3, 3, 'Gamma Knights'),
(4, 4, 'Delta Force'),
(5, 1, 'Alpha Team'),
(6, 2, 'Beta Force'),
(7, 2, 'Omega Squad'),
(8, 1, 'Zeta Titans'),
(9, 3, 'Epsilon Warriors'),
(10, 4, 'Theta Squad'),
(11, 1, 'Lambda Guardians'),
(12, 2, 'Sigma Force'),
(13, 3, 'Rho Knights'),
(14, 4, 'Kappa Clan'),
(15, 1, 'Iota Invincibles'),
(16, 2, 'Eta Legends'),
(17, 3, 'Gamma Squad'),
(18, 4, 'Delta Defenders'),
(19, 1, 'Phi Fighters'),
(20, 2, 'Xi Crusaders'),
(21, 3, 'Mu Avengers'),
(22, 4, 'Nu Guardians'),
(23, 1, 'Omicron Legion'),
(24, 2, 'Pi Champions'),
(25, 3, 'Tau Troopers'),
(26, 4, 'Upsilon Braves'),
(27, 1, 'Chi Defenders'),
(28, 2, 'Psi Squad'),
(29, 3, 'Omega Warriors'),
(30, 4, 'Zeta Guardians'),
(31, 1, 'Eta Force'),
(32, 2, 'Theta Legends'),
(33, 3, 'Iota Invincibles'),
(34, 4, 'Kappa Knights'),
(35, 1, 'Lambda Crusaders'),
(36, 2, 'Mu Guardians'),
(37, 3, 'Nu Force'),
(38, 4, 'Xi Warriors'),
(39, 1, 'Omicron Defenders'),
(40, 2, 'Pi Invincibles'),
(41, 3, 'Rho Squad'),
(42, 4, 'Sigma Avengers'),
(43, 1, 'Tau Champions'),
(44, 2, 'Upsilon Defenders'),
(45, 3, 'Phi Force'),
(46, 4, 'Chi Guardians'),
(47, 1, 'Psi Crusaders'),
(48, 2, 'Omega Knights'),
(49, 3, 'Zeta Troopers'),
(50, 4, 'Alpha Invincibles');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `idteam` int NOT NULL,
  `idmember` int NOT NULL,
  `description` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`idteam`, `idmember`, `description`) VALUES
(1, 1, 'Team Leader'),
(1, 3, 'Strategist'),
(1, 4, 'Scout'),
(1, 12, 'diterima'),
(1, 17, 'diterima'),
(2, 2, 'Team Leader'),
(2, 5, 'Marksman'),
(2, 6, 'Support'),
(2, 12, 'diterima'),
(3, 7, 'Team Leader'),
(3, 8, 'Sniper'),
(3, 13, 'diterima'),
(4, 1, 'Tactician'),
(4, 4, 'Engineer'),
(4, 12, 'diterima'),
(4, 13, 'role preference: support, attacker, dll');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`idachievement`),
  ADD KEY `fk_achievement_team1_idx` (`idteam`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`idevent`);

--
-- Indexes for table `event_teams`
--
ALTER TABLE `event_teams`
  ADD PRIMARY KEY (`idevent`,`idteam`),
  ADD KEY `fk_event_has_team_team1_idx` (`idteam`),
  ADD KEY `fk_event_has_team_event1_idx` (`idevent`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`idgame`);

--
-- Indexes for table `join_proposal`
--
ALTER TABLE `join_proposal`
  ADD PRIMARY KEY (`idjoin_proposal`),
  ADD KEY `fk_join_proposal_member1_idx` (`idmember`),
  ADD KEY `fk_join_proposal_team1_idx` (`idteam`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idmember`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`idteam`),
  ADD KEY `fk_team_game1_idx` (`idgame`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`idteam`,`idmember`),
  ADD KEY `fk_team_has_member_member1_idx` (`idmember`),
  ADD KEY `fk_team_has_member_team_idx` (`idteam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievement`
--
ALTER TABLE `achievement`
  MODIFY `idachievement` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `idevent` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `idgame` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `join_proposal`
--
ALTER TABLE `join_proposal`
  MODIFY `idjoin_proposal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `idmember` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `idteam` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achievement`
--
ALTER TABLE `achievement`
  ADD CONSTRAINT `fk_achievement_team1` FOREIGN KEY (`idteam`) REFERENCES `team` (`idteam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_teams`
--
ALTER TABLE `event_teams`
  ADD CONSTRAINT `fk_event_has_team_event1` FOREIGN KEY (`idevent`) REFERENCES `event` (`idevent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_event_has_team_team1` FOREIGN KEY (`idteam`) REFERENCES `team` (`idteam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `join_proposal`
--
ALTER TABLE `join_proposal`
  ADD CONSTRAINT `fk_join_proposal_member1` FOREIGN KEY (`idmember`) REFERENCES `member` (`idmember`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_join_proposal_team1` FOREIGN KEY (`idteam`) REFERENCES `team` (`idteam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `fk_team_game1` FOREIGN KEY (`idgame`) REFERENCES `game` (`idgame`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `team_members`
--
ALTER TABLE `team_members`
  ADD CONSTRAINT `fk_team_has_member_member1` FOREIGN KEY (`idmember`) REFERENCES `member` (`idmember`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_team_has_member_team` FOREIGN KEY (`idteam`) REFERENCES `team` (`idteam`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
