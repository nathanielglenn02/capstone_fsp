-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for capstone
DROP DATABASE IF EXISTS `capstone`;
CREATE DATABASE IF NOT EXISTS `capstone` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `capstone`;

-- Dumping structure for table capstone.achievement
DROP TABLE IF EXISTS `achievement`;
CREATE TABLE IF NOT EXISTS `achievement` (
  `idachievement` int NOT NULL AUTO_INCREMENT,
  `idteam` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idachievement`),
  KEY `fk_achievement_team1_idx` (`idteam`),
  CONSTRAINT `fk_achievement_team1` FOREIGN KEY (`idteam`) REFERENCES `team` (`idteam`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table capstone.achievement: ~5 rows (approximately)
DELETE FROM `achievement`;
INSERT INTO `achievement` (`idachievement`, `idteam`, `name`, `date`, `description`) VALUES
	(1, 1, 'Victory at Battle Royalea', '2024-09-10', 'Won the annual Battle Royale tournament.'),
	(2, 2, 'Top Scorer', '2024-09-11', 'Achieved highest score in the league.'),
	(3, 3, 'Fastest Win', '2024-09-12', 'Won a match in record time.'),
	(4, 4, 'Best Strategy', '2024-09-13', 'Recognized for the best strategy in competition.'),
	(5, 1, 'Juara 1', '2024-09-12', 'test');

-- Dumping structure for table capstone.event
DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `idevent` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idevent`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table capstone.event: ~4 rows (approximately)
DELETE FROM `event`;
INSERT INTO `event` (`idevent`, `name`, `date`, `description`) VALUES
	(1, 'Summer Tournament', '2024-09-01', 'Annual summer gaming tournament'),
	(2, 'Winter Championship', '2024-12-15', 'Competitive winter championship for pro teams'),
	(3, 'Spring Challenge', '2024-03-20', 'A challenge for top teams during spring'),
	(4, 'Lomba Valo', '2024-10-25', 'sfd');

-- Dumping structure for table capstone.event_teams
DROP TABLE IF EXISTS `event_teams`;
CREATE TABLE IF NOT EXISTS `event_teams` (
  `idevent` int NOT NULL,
  `idteam` int NOT NULL,
  PRIMARY KEY (`idevent`,`idteam`),
  KEY `fk_event_has_team_team1_idx` (`idteam`),
  KEY `fk_event_has_team_event1_idx` (`idevent`),
  CONSTRAINT `fk_event_has_team_event1` FOREIGN KEY (`idevent`) REFERENCES `event` (`idevent`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_event_has_team_team1` FOREIGN KEY (`idteam`) REFERENCES `team` (`idteam`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table capstone.event_teams: ~6 rows (approximately)
DELETE FROM `event_teams`;
INSERT INTO `event_teams` (`idevent`, `idteam`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(1, 2),
	(2, 3),
	(3, 4);

-- Dumping structure for table capstone.game
DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `idgame` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idgame`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table capstone.game: ~14 rows (approximately)
DELETE FROM `game`;
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

-- Dumping structure for table capstone.join_proposal
DROP TABLE IF EXISTS `join_proposal`;
CREATE TABLE IF NOT EXISTS `join_proposal` (
  `idjoin_proposal` int NOT NULL AUTO_INCREMENT,
  `idmember` int NOT NULL,
  `idteam` int NOT NULL,
  `description` varchar(100) DEFAULT 'role preference: support, attacker, dll',
  `status` enum('waiting','approved','rejected') DEFAULT NULL,
  PRIMARY KEY (`idjoin_proposal`),
  KEY `fk_join_proposal_member1_idx` (`idmember`),
  KEY `fk_join_proposal_team1_idx` (`idteam`),
  CONSTRAINT `fk_join_proposal_member1` FOREIGN KEY (`idmember`) REFERENCES `member` (`idmember`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_join_proposal_team1` FOREIGN KEY (`idteam`) REFERENCES `team` (`idteam`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table capstone.join_proposal: ~7 rows (approximately)
DELETE FROM `join_proposal`;
INSERT INTO `join_proposal` (`idjoin_proposal`, `idmember`, `idteam`, `description`, `status`) VALUES
	(1, 13, 1, 'role preference: support, attacker, dll', 'waiting'),
	(2, 13, 2, 'role preference: support, attacker, dll', 'waiting'),
	(3, 13, 3, 'role preference: support, attacker, dll', 'waiting'),
	(4, 13, 4, 'role preference: support, attacker, dll', 'waiting'),
	(5, 12, 1, 'role preference: support, attacker, dll', 'waiting'),
	(6, 12, 2, 'ngetnod anijr', 'waiting'),
	(7, 12, 4, 'sini kontol', 'waiting');

-- Dumping structure for table capstone.member
DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `idmember` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `profile` enum('admin','member') DEFAULT NULL,
  PRIMARY KEY (`idmember`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table capstone.member: ~15 rows (approximately)
DELETE FROM `member`;
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
	(13, 'ngentod', 'ngentod', 'ngentod', '$2y$10$21ryg.vshnoOc/bQEP9mR.1Gjk.EOYSAGGyx5SteleHF8lrl6OqPq', 'member'),
	(14, 'Jeffry', 'Wiharjo', 'kontol', '$2y$10$778r4Qu3vC.5/K4887JPIOicexYWEX2M/vj.c2/8792BoxLOYUp5C', 'member'),
	(15, 'tol', 'tol', 'tol', '$2y$10$AFdj92p8ishaN5jxfJ0zru7PNJy4QBlRCkqxjOfnVejKRlhlVRSZO', 'member'),
	(16, 'luky', 'wilan', 'lukyw', '$2y$10$1wt1InFqAQLLXfl25j4jkOusOXSnO/A/ymgP0GiPXiZaWiMVaHjI6', 'admin');

-- Dumping structure for table capstone.team
DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `idteam` int NOT NULL AUTO_INCREMENT,
  `idgame` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idteam`),
  KEY `fk_team_game1_idx` (`idgame`),
  CONSTRAINT `fk_team_game1` FOREIGN KEY (`idgame`) REFERENCES `game` (`idgame`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table capstone.team: ~50 rows (approximately)
DELETE FROM `team`;
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

-- Dumping structure for table capstone.team_members
DROP TABLE IF EXISTS `team_members`;
CREATE TABLE IF NOT EXISTS `team_members` (
  `idteam` int NOT NULL,
  `idmember` int NOT NULL,
  `description` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`idteam`,`idmember`),
  KEY `fk_team_has_member_member1_idx` (`idmember`),
  KEY `fk_team_has_member_team_idx` (`idteam`),
  CONSTRAINT `fk_team_has_member_member1` FOREIGN KEY (`idmember`) REFERENCES `member` (`idmember`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_team_has_member_team` FOREIGN KEY (`idteam`) REFERENCES `team` (`idteam`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table capstone.team_members: ~10 rows (approximately)
DELETE FROM `team_members`;
INSERT INTO `team_members` (`idteam`, `idmember`, `description`) VALUES
	(1, 1, 'Team Leader'),
	(1, 3, 'Strategist'),
	(1, 4, 'Scout'),
	(2, 2, 'Team Leader'),
	(2, 5, 'Marksman'),
	(2, 6, 'Support'),
	(3, 7, 'Team Leader'),
	(3, 8, 'Sniper'),
	(4, 1, 'Tactician'),
	(4, 4, 'Engineer');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
