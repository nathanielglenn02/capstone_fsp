-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Okt 2024 pada 15.11
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
(1, 1, 'Champion League Wina', '2023-01-15', 'Achieved first place in the league'),
(2, 1, 'MVP Award', '2023-02-20', 'Awarded for outstanding performance'),
(3, 2, 'Best Defensive Team', '2023-03-05', 'Recognized for best defensive plays'),
(4, 2, 'Fair Play Award', '2023-04-10', 'Awarded for fair play throughout season'),
(5, 3, 'Top Scorer', '2023-05-15', 'Most goals scored by a team player'),
(6, 3, 'Community Engagement', '2023-06-22', 'Participated in community events'),
(7, 4, 'Best Newcomer', '2023-07-12', 'Awarded to new team for best debut'),
(8, 4, 'Most Improved Team', '2023-08-20', 'Recognized for significant improvement'),
(9, 5, 'Team of the Month', '2023-09-25', 'Recognized as the best team of the month'),
(10, 5, 'All-Star Team', '2023-10-02', 'Selected for all-star game'),
(11, 6, 'Tournament Runner-Up', '2023-11-10', 'Finished in second place in tournament'),
(12, 6, 'Sportsmanship Award', '2023-12-18', 'Recognized for sportsmanship'),
(13, 7, 'Best Offense', '2024-01-10', 'Recognized for top offensive stats'),
(14, 7, 'Charity Event Winner', '2024-02-14', 'Won a local charity tournament'),
(15, 8, 'International Debut', '2024-03-05', 'Participated in an international event'),
(16, 8, 'Regional Champions', '2024-04-09', 'Won the regional championship'),
(17, 9, 'Best Team Spirit', '2024-05-15', 'Awarded for exceptional team spirit'),
(18, 9, 'Best Attendance', '2024-06-20', 'Most players with perfect attendance'),
(19, 10, 'Top Assist Leader', '2024-07-18', 'Most assists made by team members'),
(20, 10, 'Most Clean Sheets', '2024-08-12', 'Highest number of games without conceding'),
(21, 11, 'Best Comeback', '2024-09-05', 'Awarded for best comeback win'),
(22, 11, 'League Runners-Up', '2024-10-09', 'Finished second in the league'),
(23, 12, 'Fastest Goal Scored', '2024-11-15', 'Scored the fastest goal of the season'),
(24, 12, 'Most Supportive Team', '2024-12-18', 'Awarded for supporting fellow teams'),
(25, 13, 'Best Goalkeeper', '2025-01-10', 'Awarded for outstanding goalkeeping'),
(26, 13, 'Top Defense', '2025-02-11', 'Best defensive record of the season'),
(27, 14, 'Outstanding Coach', '2025-03-17', 'Awarded for best coaching staff'),
(28, 14, 'Record-Breaking Season', '2025-04-14', 'Set new records this season'),
(29, 15, 'Top Scoring Team', '2025-05-19', 'Scored the most goals this season'),
(30, 15, 'Tournament Champions', '2025-06-21', 'Won the season-ending tournament');

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
(1, 'Annual Championship', '2024-01-15', 'The biggest event of the year for top teams to compete.'),
(2, 'Summer Showdown', '2024-06-20', 'A hot summer event where teams battle under the sun.'),
(3, 'Winter Invitational', '2024-12-05', 'An exclusive winter event with invited teams.'),
(4, 'Spring Sprint', '2024-04-10', 'Teams race to the finish line in this spring event.'),
(5, 'Fall Frenzy', '2024-10-30', 'An intense autumn event with unpredictable outcomes.'),
(6, 'City Clash', '2024-03-15', 'Local teams face off to claim city bragging rights.'),
(7, 'National Cup', '2024-08-25', 'Teams from around the nation compete for the cup.'),
(8, 'Champions League', '2024-07-01', 'The ultimate league event for champions.'),
(9, 'Battle Royale', '2024-02-17', 'Teams fight to be the last one standing.'),
(10, 'Heroes Tournament', '2024-05-22', 'A tournament for teams to prove their heroism.'),
(11, 'King’s Challenge', '2024-11-08', 'Teams accept the challenge to become the king.'),
(12, 'Queen’s Cup', '2024-09-12', 'A regal event to determine the queen of the teams.'),
(13, 'Rookie Rumble', '2024-04-25', 'New teams test their skills in this event.'),
(14, 'Elite Championship', '2024-06-05', 'The championship for elite teams only.'),
(15, 'Dragon Duel', '2024-01-30', 'Teams battle for supremacy in the dragon-themed event.'),
(16, 'Frostbite Festival', '2024-12-20', 'A chilling event held in the winter.'),
(17, 'Firestorm Showdown', '2024-07-15', 'Teams face off in a blazing showdown.'),
(18, 'Savanna Scramble', '2024-08-10', 'A wild event set in the savanna.'),
(19, 'Jungle Jam', '2024-05-10', 'An exciting event held deep in the jungle.'),
(20, 'Desert Duel', '2024-09-25', 'Teams battle under the scorching desert sun.'),
(21, 'Ocean Odyssey', '2024-03-05', 'An event held near the ocean, full of surprises.'),
(22, 'Mountain Mayhem', '2024-02-28', 'A high-altitude challenge for the daring.'),
(23, 'Forest Frenzy', '2024-04-15', 'Teams compete surrounded by towering trees.'),
(24, 'River Rush', '2024-07-25', 'A fast-paced event along the river.'),
(25, 'Sky High Showdown', '2024-11-30', 'Teams compete high above the clouds.'),
(26, 'Gladiator Games', '2024-06-30', 'A fierce competition reminiscent of ancient gladiators.'),
(27, 'Avalanche Attack', '2024-01-10', 'Teams navigate a snowy battleground.'),
(28, 'Solar Showdown', '2024-10-10', 'A bright and sunny event for solar-powered teams.'),
(29, 'Hurricane Havoc', '2024-09-05', 'An event set amidst hurricane conditions.'),
(30, 'Lunar Lunacy', '2024-02-05', 'A mystical night event under the full moon.');

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
(1, 2),
(2, 3),
(2, 4),
(3, 5),
(3, 6),
(4, 7),
(4, 8),
(5, 9),
(5, 10),
(6, 11),
(6, 12),
(7, 13),
(7, 14),
(8, 15),
(8, 16),
(9, 17),
(9, 18),
(10, 19),
(10, 20),
(11, 21),
(11, 22),
(12, 23),
(12, 24),
(13, 25),
(13, 26),
(14, 27),
(14, 28),
(15, 29),
(15, 30);

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
(1, 'Soccer', 'A team sport played with a round ball and goals'),
(2, 'Basketball', 'A sport played with a ball and hoop, scoring points by shooting'),
(3, 'Tennis', 'A racquet sport played with a ball and a net'),
(4, 'Baseball', 'A bat-and-ball game played between two teams of nine players'),
(5, 'Cricket', 'A bat-and-ball game played between two teams of eleven players'),
(6, 'Hockey', 'A sport played with a puck or ball and sticks'),
(7, 'Golf', 'A sport in which players hit a ball into a hole with a club'),
(8, 'Rugby', 'A contact sport played with an oval-shaped ball'),
(9, 'Swimming', 'An individual or team sport that requires moving through water'),
(10, 'Table Tennis', 'A racquet sport played on a table divided by a net'),
(11, 'Volleyball', 'A team sport where players hit a ball over a net'),
(12, 'Badminton', 'A racquet sport played with a shuttlecock and a net'),
(13, 'Boxing', 'A combat sport involving two fighters in a ring'),
(14, 'MMA', 'Mixed Martial Arts, a full-contact combat sport'),
(15, 'Karate', 'A martial art that includes punching, kicking, and striking techniques'),
(16, 'Chess', 'A strategic board game played by two players'),
(17, 'Running', 'An athletic sport involving speed and endurance on foot'),
(18, 'Cycling', 'A sport involving riding bicycles for competition or leisure'),
(19, 'Archery', 'A sport of shooting arrows with a bow at a target'),
(20, 'Fencing', 'A combat sport involving sword fighting'),
(21, 'Judo', 'A martial art that focuses on throws and grappling'),
(22, 'Gymnastics', 'A sport involving exercises and routines for flexibility and strength'),
(23, 'Weightlifting', 'A sport in which athletes lift heavy weights'),
(24, 'Surfing', 'A water sport in which a person rides waves on a board'),
(25, 'Skateboarding', 'A sport involving riding and performing tricks on a skateboard'),
(26, 'Snowboarding', 'A winter sport involving riding down slopes on a snowboard'),
(27, 'Skiing', 'A winter sport involving gliding on snow with skis'),
(28, 'Rowing', 'A water sport involving rowing boats for speed'),
(29, 'Climbing', 'An activity involving climbing up, down, or across natural rock or artificial walls'),
(30, 'Parkour', 'A physical discipline involving running, climbing, and jumping over obstacles');

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
(1, 'John', 'Doe', 'johndoe', '$2y$10$q3YFU0rQyscet2wfwg0xxeJPdFvx5JJaqytL2Wr3sNEnmKz6Owc1.', 'admin'),
(2, 'Jane', 'Smith', 'janesmith', '$2y$10$q3YFU0rQyscet2wfwg0xxeJPdFvx5JJaqytL2Wr3sNEnmKz6Owc1.', 'admin'),
(3, 'Alice', 'Johnson', 'alicej', '$2y$10$q3YFU0rQyscet2wfwg0xxeJPdFvx5JJaqytL2Wr3sNEnmKz6Owc1.', 'member'),
(4, 'Bob', 'Brown', 'bobbrown', '$2y$10$q3YFU0rQyscet2wfwg0xxeJPdFvx5JJaqytL2Wr3sNEnmKz6Owc1.', 'member'),
(5, 'Charlie', 'Davis', 'charlied', '$2y$10$q3YFU0rQyscet2wfwg0xxeJPdFvx5JJaqytL2Wr3sNEnmKz6Owc1.', 'member'),
(6, 'Eve', 'Miller', 'evemiller', '$2y$10$q3YFU0rQyscet2wfwg0xxeJPdFvx5JJaqytL2Wr3sNEnmKz6Owc1.', 'member'),
(7, 'Frank', 'Wilson', 'frankw', '$2y$10$q3YFU0rQyscet2wfwg0xxeJPdFvx5JJaqytL2Wr3sNEnmKz6Owc1.', 'member'),
(8, 'Grace', 'Moore', 'gracem', '$2y$10$q3YFU0rQyscet2wfwg0xxeJPdFvx5JJaqytL2Wr3sNEnmKz6Owc1.', 'member'),
(9, 'Matthew', 'Garcia', 'mgarcia', '$2y$10$Hl2k/fmZJhLQv.hrSLyRp.ZqvSk8rVvgvYVb7BuSLnIoJHW7uRBiy', 'member'),
(10, 'Ava', 'Martinez', 'amartinez', '$2y$10$n9hQ46iz6hUZOvY9hFrgbOHkT7seXBTK/NudDMMjVVRE/auv/ntGi', 'member'),
(11, 'Ethan', 'Rodriguez', 'erodriguez', '$2y$10$xj7GfjFyPA8OM2wKJfRdp.1UZ0ULPuMKGVi2cFsIk2pSu4gEw61.i', 'member'),
(12, 'Isabella', 'Hernandez', 'ihernandez', '$2y$10$zwvs4WKzOH0ndwrwdANonOApwPNnfX2cdTg1d3n1BCrRj0buMECEK', 'member'),
(13, 'Benjamin', 'Lopez', 'blopez', '$2y$10$afyedGMwFoz.zV78d.u9JuOLUFUDa.cKKasGerKkqt5UKCAVhMP6.', 'member'),
(14, 'Mia', 'Gonzales', 'mgonzales', '$2y$10$26mNcFQ9jTvRAY2HcVuHi.mzA1edAil5kUeg5Q6Dbiyy./Bke7376', 'member'),
(15, 'Lucas', 'Clark', 'lclark', '$2y$10$VRzVLUejdyD5wMBA5CTH5OCFSbMCylAH43jd9bcSTba2tcMhq7HBa', 'member'),
(16, 'Bambang', 'Sumanto', 'bambang', '$2y$10$zl9Mqv.85hgGyhK3bcQGmu42M/Os90sIkbpJQxNwTRE4g3yUj17kO', 'member'),
(17, 'Henry', 'Walker', 'hwalker', '$2y$10$cPlvmqlFlm2IOvuR1LdX9eIj.Bqki2p3NY3fdixaIbkhXFXDpkm3C', 'member'),
(18, 'Ella', 'Young', 'eyoung', '$2y$10$T4dyxquC617rDlXQPnDmeO6R6wntOMk57o/22l736iVUFf6GE0Lbu', 'member'),
(19, 'Alexander', 'Allen', 'aallen', '$2y$10$wkIujW2X8fM/d5P4zEvRG.Cj4pOCe6cLeB699EjmPVvtrfb/t6Hia', 'member'),
(20, 'Charlotte', 'King', 'cking', '$2y$10$X7QvQ2WNIy2xoqu2fObCxepAe1ISqTQID7HzUdERE82reZSCGcIoG', 'member'),
(21, 'Jack', 'Wright', 'jwright', '$2y$10$TsMWDNeJ4n1cN1o62F/BzuWNT8kGAht6q1TnUDLtObGGUSkOH97Su', 'member'),
(22, 'Harper', 'Scott', 'hscott', '$2y$10$8TsECb6vyVOovhBwXNtfn.BafAdySt5DfsJLuxCea7YLB8Yr1LuDW', 'member'),
(23, 'Owen', 'Green', 'ogreen', '$2y$10$Ece.VeP6wtICVkk8ldI2E./xowZ.9ZFjy4wezYHUP21ldwg4JXNXa', 'member'),
(24, 'Lily', 'Baker', 'lbaker', '$2y$10$lKiiQCP4VLVT.Rrr/8gBteebBIdbIYjU790Q0z8F8AZJwXTx06BL2', 'member'),
(25, 'Sebastian', 'Adams', 'sadams', '$2y$10$InmaYbPVrM8Iv5P8/T0k9.3NTR4tNI.CbbHH/8RjhauoeOH9rI2ry', 'member'),
(26, 'Aria', 'Perez', 'aperez', '$2y$10$RTwk5XTOAMCbkQ6feA60ZOZ.cfK7a40QM2InIfQN1l0f.HWMRxQpK', 'member'),
(27, 'Carter', 'White', 'cwhite', '$2y$10$CAlNxWNFJVfLmQDJEppjwOJ2e2Zkc2WznvQmgNt1YLnJu7n/eM2dK', 'member'),
(28, 'Grace', 'Harris', 'gharris', '$2y$10$tUWBcYBVLSm/JFis/4tVTuqOVQS9wqgNvkjpXIyLsN.Cs17bTCgF6', 'member'),
(29, 'Wyatt', 'Nelson', 'wnelson', '$2y$10$D2Y4zAZwdXNRHWqlgTUb9u6h0rKJ.CuxMooAY19FxNhYxglMW1yVW', 'member'),
(30, 'Scarlett', 'Carter', 'scarter', '$2y$10$tYa1FFuYhbo6ul8Ea/5lYevEQdO1/GT3GhRoLYEXOj8PHJf1qa8Du', 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `team`
--

CREATE TABLE `team` (
  `idteam` int(11) NOT NULL,
  `idgame` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `team`
--

INSERT INTO `team` (`idteam`, `idgame`, `name`) VALUES
(1, 1, 'Red Dragons'),
(2, 2, 'Blue Warriors'),
(3, 3, 'Green Titans'),
(4, 4, 'Yellow Lions'),
(5, 5, 'Black Panthers'),
(6, 6, 'White Tigers'),
(7, 7, 'Golden Eagles'),
(8, 8, 'Silver Sharks'),
(9, 9, 'Bronze Bears'),
(10, 10, 'Purple Phoenix'),
(11, 11, 'Orange Falcons'),
(12, 12, 'Crimson Hawks'),
(13, 13, 'Emerald Wolves'),
(14, 14, 'Scarlet Foxes'),
(15, 15, 'Azure Bulls'),
(16, 16, 'Ivory Owls'),
(17, 17, 'Sapphire Snakes'),
(18, 18, 'Ruby Rhinos'),
(19, 19, 'Coral Crabs'),
(20, 20, 'Cobalt Coyotes'),
(21, 21, 'Amber Antelopes'),
(22, 22, 'Obsidian Otters'),
(23, 23, 'Onyx Orcas'),
(24, 24, 'Copper Cougars'),
(25, 25, 'Platinum Parrots'),
(26, 26, 'Magenta Mambas'),
(27, 27, 'Turquoise Toucans'),
(28, 28, 'Jade Jaguars'),
(29, 29, 'Indigo Iguanas'),
(30, 30, 'Teal Turtles');

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
(1, 5, 'Support member'),
(2, 10, 'Attacker'),
(3, 15, 'Defense specialist'),
(4, 20, 'Midfielder'),
(5, 25, 'Team leader'),
(6, 30, 'Substitute'),
(7, 1, 'Support member'),
(8, 6, 'Strategy advisor'),
(9, 11, 'Attacker'),
(10, 16, 'Main defender'),
(11, 21, 'Playmaker'),
(12, 26, 'Reserve player'),
(13, 2, 'Goalkeeper'),
(14, 7, 'Striker'),
(15, 12, 'Coach assistant'),
(16, 17, 'Scout'),
(17, 22, 'Fitness coach'),
(18, 27, 'Technical analyst'),
(19, 3, 'Right winger'),
(20, 8, 'Left winger'),
(21, 13, 'Forward'),
(22, 18, 'Captain'),
(23, 23, 'Medical staff'),
(24, 28, 'Tactical analyst'),
(25, 4, 'Left back'),
(26, 9, 'Right back'),
(27, 14, 'Central midfielder'),
(28, 19, 'Bench player'),
(29, 24, 'Data analyst'),
(30, 29, 'Media coordinator');

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
  MODIFY `idachievement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `idevent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `game`
--
ALTER TABLE `game`
  MODIFY `idgame` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `join_proposal`
--
ALTER TABLE `join_proposal`
  MODIFY `idjoin_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `idmember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `team`
--
ALTER TABLE `team`
  MODIFY `idteam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
