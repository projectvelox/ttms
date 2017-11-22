-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for ttms
DROP DATABASE IF EXISTS `ttms`;
CREATE DATABASE IF NOT EXISTS `ttms` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ttms`;

-- Dumping structure for table ttms.accounts
DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `firstname` varchar(150) DEFAULT NULL,
  `middlename` varchar(150) DEFAULT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `account_type` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table ttms.accounts: ~11 rows (approximately)
DELETE FROM `accounts`;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` (`id`, `username`, `password`, `firstname`, `middlename`, `lastname`, `account_type`) VALUES
	(1, 'admin', 'admin', 'Jim', 'Robles', 'Simpas', 'Admin'),
	(7, 'ahmad', 'ahmad', 'Ahmad', 'Riyahd', 'Fahran', 'Coach'),
	(9, 'sample', 'sample', 'Sample', 'Sample', 'Sample', 'Coach'),
	(10, 'user', 'user', 'User', 'U', 'User', 'Coach'),
	(11, 'test', 'test', 'test', 'test', 'test', 'Coach'),
	(12, 'demo', 'demo', 'demo', 'demo', 'demo', 'Coach'),
	(13, 'demo', 'demo', 'demo', 'demo', 'demo', 'Coach'),
	(14, 'demo', 'demo', 'demo', 'demo', 'demo', 'Coach'),
	(15, 'testing', 'testing', 'demo', 'test', 'test', 'Coach'),
	(16, 'demo', 'demo', 'demo', 'demo', 'demo', 'Coach'),
	(17, 'coach', 'coach', 'coach', 'coach', 'coach', 'Coach');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;

-- Dumping structure for table ttms.belts
DROP TABLE IF EXISTS `belts`;
CREATE TABLE IF NOT EXISTS `belts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `belt` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table ttms.belts: ~14 rows (approximately)
DELETE FROM `belts`;
/*!40000 ALTER TABLE `belts` DISABLE KEYS */;
INSERT INTO `belts` (`id`, `belt`) VALUES
	(1, 'White Belt'),
	(2, 'Yellow Belt'),
	(3, 'Blue Belt'),
	(4, 'Red Belt'),
	(5, 'Brown Belt'),
	(6, '1st Dan Black Belt'),
	(7, '2nd Dan Black Belt'),
	(8, '3rd Dan Black Belt'),
	(9, '4th Dan Black Belt'),
	(10, '5th Dan Black Belt'),
	(11, '6th Dan Black Belt'),
	(12, '7th Dan Black Belt'),
	(13, '8th Dan Black Belt'),
	(14, '9th Dan Black Belt');
/*!40000 ALTER TABLE `belts` ENABLE KEYS */;

-- Dumping structure for table ttms.coaches
DROP TABLE IF EXISTS `coaches`;
CREATE TABLE IF NOT EXISTS `coaches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(150) NOT NULL,
  `middlename` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `sex` varchar(150) NOT NULL,
  `age` int(11) NOT NULL,
  `belt` varchar(150) NOT NULL,
  `gym` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL DEFAULT 'Active',
  `username` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table ttms.coaches: ~8 rows (approximately)
DELETE FROM `coaches`;
/*!40000 ALTER TABLE `coaches` DISABLE KEYS */;
INSERT INTO `coaches` (`id`, `firstname`, `middlename`, `lastname`, `sex`, `age`, `belt`, `gym`, `address`, `status`, `username`) VALUES
	(1, 'Jim', 'Robles', 'Simpas', 'Male', 22, 'Black Belt', 'MVP Gym', 'Jaro, Iloilo', 'Active', 'admin'),
	(2, 'Ahmad', 'Riyahd', 'Fahran', 'Male', 34, '5th Dan Black Belt', 'MVP Gym', 'Lopez Jaena, Jaro Iloilo', 'Active', 'ahmad'),
	(3, 'Sample', 'Sample', 'Sample', 'Male', 23, '5th Dan Black Belt', 'MVP Gym', 'Jaro, Iloilo', 'Active', 'sample'),
	(4, 'User', 'U', 'User', 'Male', 20, '3rd Dan Black Belt', 'User Gym', 'Jaro Iloilo CIty', 'Active', 'user'),
	(5, 'test', 'test', 'test', 'Male', 30, '4th Dan Black Belt', 'Test Gym', 'Mandurriao iloilo City', 'Active', 'test'),
	(9, 'demo', 'test', 'test', 'Female', 28, '4th Dan Black Belt', 'Testing Gym', 'Jaro iloilo CIty', 'Active', 'testing'),
	(10, 'demo', 'demo', 'demo', 'Male', 30, '4th Dan Black Belt', 'Demo Gym', 'lapaz iloilo city', 'Active', 'demo'),
	(11, 'coach', 'coach', 'coach', 'Male', 30, '4th Dan Black Belt', 'Coach Gym', 'Jaro iloilo City', 'Active', 'coach');
/*!40000 ALTER TABLE `coaches` ENABLE KEYS */;

-- Dumping structure for view ttms.matchmaking
DROP VIEW IF EXISTS `matchmaking`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `matchmaking` (
	`id` INT(11) NOT NULL,
	`coach` VARCHAR(250) NOT NULL COLLATE 'latin1_swedish_ci',
	`tournament` VARCHAR(250) NULL COLLATE 'latin1_swedish_ci',
	`playerid` INT(11) NULL,
	`name` VARCHAR(250) NULL COLLATE 'latin1_swedish_ci',
	`belt` VARCHAR(150) NULL COLLATE 'latin1_swedish_ci',
	`sex` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`height` INT(11) NULL,
	`weight` INT(11) NULL,
	`school_degree` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`advanceornovice` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`category` VARCHAR(250) NULL COLLATE 'latin1_swedish_ci',
	`statistic_score` DECIMAL(16,0) NULL
) ENGINE=MyISAM;

-- Dumping structure for table ttms.match_results
DROP TABLE IF EXISTS `match_results`;
CREATE TABLE IF NOT EXISTS `match_results` (
  `result_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tournament_id` int(11) NOT NULL,
  `school_level` varchar(255) NOT NULL,
  `advanceornovice` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `category` varchar(255) NOT NULL,
  `result_data` text,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`result_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table ttms.match_results: ~0 rows (approximately)
DELETE FROM `match_results`;
/*!40000 ALTER TABLE `match_results` DISABLE KEYS */;
/*!40000 ALTER TABLE `match_results` ENABLE KEYS */;

-- Dumping structure for table ttms.player
DROP TABLE IF EXISTS `player`;
CREATE TABLE IF NOT EXISTS `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(150) DEFAULT NULL,
  `firstname` varchar(150) DEFAULT NULL,
  `middlename` varchar(150) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `coach` varchar(250) DEFAULT NULL,
  `gym` varchar(250) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `firsttimer` varchar(10) DEFAULT NULL,
  `joinedmorethan` varchar(10) DEFAULT NULL,
  `joinedlessthan` varchar(10) DEFAULT NULL,
  `noviceoradvance` varchar(10) DEFAULT NULL,
  `skillrating` int(11) DEFAULT NULL,
  `stamina` int(11) DEFAULT NULL,
  `speed` int(11) DEFAULT NULL,
  `power` int(11) DEFAULT NULL,
  `achievement` varchar(150) DEFAULT NULL,
  `belt` varchar(150) DEFAULT NULL,
  `school_degree` varchar(50) DEFAULT NULL,
  `category` varchar(150) DEFAULT NULL,
  `group_cat` varchar(100) DEFAULT NULL
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;


-- Dumping data for table ttms.player: ~32 rows (approximately)
DELETE FROM `player`;
/*!40000 ALTER TABLE `player` DISABLE KEYS */;
INSERT INTO `player` (`id`, `lastname`, `firstname`, `middlename`, `age`, `sex`, `dateofbirth`, `coach`, `gym`, `weight`, `height`, `firsttimer`, `joinedmorethan`, `joinedlessthan`, `noviceoradvance`, `skillrating`, `stamina`, `speed`, `power`, `achievement`, `belt`, `school_degree`, `category`) VALUES
	(1, 'Simpas', 'Jim', 'Robles', 20, 'Male', '1996-09-07', 'Ahmad Riyahd Fahran', 'CPU International', 68, 240, 'No', 'Yes', 'No', 'Advance', 8, 6, 5, 5, 'National', '1st Dan Black Belt', 'College', 'Feather Weight'),
	(2, 'Robles', 'Marshall', 'S.', 20, 'Male', '1996-08-28', 'Ahmad Riyahd Fahran', 'CPU International', 72, 240, 'No', 'Yes', 'No', 'Advance', 5, 8, 6, 6, 'National', '2nd Dan Black Belt', 'College', 'Feather Weight'),
	(3, 'player', 'player', 'player', 20, 'Male', '1995-09-02', 'User U User', 'User Gym', 68, 178, 'No', 'Yes', 'No', 'Advance', 5, 2, 6, 7, 'National', '1st Dan Black Belt', 'College', 'Feather Weight'),
	(4, 'player2', 'player2', 'player2', 20, 'Male', '1996-01-28', 'User U User', 'User Gym', 56, 172, 'No', 'Yes', 'No', 'Advance', 5, 3, 9, 5, 'National', '3rd Dan Black Belt', 'College', 'Fin Weight'),
	(5, 'player3', 'player3', 'player3', 20, 'Male', '1995-09-21', 'User U User', 'User Gym', 58, 178, 'No', 'Yes', 'No', 'Advance', 8, 7, 2, 5, 'National', '2nd Dan Black Belt', 'College', 'Fly Weight'),
	(6, 'player4', 'player4', 'player4', 18, 'Male', '1997-02-08', 'User U User', 'User Gym', 59, 178, 'No', 'Yes', 'No', 'Advance', 5, 7, 8, 6, 'National', '3rd Dan Black Belt', 'College', 'Bantam Weight'),
	(7, 'player5', 'player5', 'player5', 20, 'Male', '1995-02-06', 'User U User', 'User Gym', 72, 180, 'No', 'Yes', 'No', 'Advance', 8, 7, 6, 8, 'National', '2nd Dan Black Belt', 'College', 'Welter Weight'),
	(8, 'player6', 'player6', 'player6', 18, 'Female', '1998-08-08', 'User U User', 'User Gym', 46, 172, 'No', 'Yes', 'No', 'Advance', 8, 7, 9, 5, 'National', '3rd Dan Black Belt', 'College', 'Fin Weight'),
	(9, 'player7', 'player7', 'player7', 20, 'Female', '1996-07-02', 'User U User', 'User Gym', 49, 18, 'No', 'Yes', 'No', 'Advance', 8, 7, 6, 5, 'National', '2nd Dan Black Belt', 'College', 'Fly Weight'),
	(10, 'player8', 'player8', 'player8', 20, 'Female', '1996-08-03', 'User U User', 'User Gym', 53, 170, 'No', 'Yes', 'No', 'Advance', 5, 6, 7, 8, 'National', '2nd Dan Black Belt', 'College', 'Bantam Weight'),
	(11, 'player9', 'player9', 'player', 20, 'Female', '1996-08-02', 'User U User', 'User Gym', 57, 171, 'No', 'Yes', 'No', 'Advance', 6, 7, 5, 9, 'National', '2nd Dan Black Belt', 'College', 'Feather Weight'),
	(12, 'player10', 'player10', 'player10', 21, 'Female', '1995-08-08', 'User U User', 'User Gym', 62, 172, 'No', 'Yes', 'No', 'Advance', 6, 7, 8, 9, 'National', '2nd Dan Black Belt', 'College', 'Light Weight'),
	(13, 'player11', 'player11', 'player11', 20, 'Male', '1996-08-02', 'test test test', 'Test Gym', 54, 169, 'No', 'Yes', 'No', 'Advance', 5, 6, 7, 8, 'National', '2nd Dan Black Belt', 'College', 'Fin Weight'),
	(14, 'player12', 'player12', 'player12', 20, 'Male', '1996-08-02', 'test test test', 'Test Gym', 59, 172, 'No', 'Yes', 'No', 'Advance', 5, 6, 7, 6, 'National', '2nd Dan Black Belt', 'College', 'Fly Weight'),
	(15, 'player13', 'player13', 'player13', 20, 'Male', '1997-08-07', 'test test test', 'Test Gym', 63, 175, 'No', 'Yes', 'No', 'Advance', 7, 8, 9, 9, 'National', '2nd Dan Black Belt', 'College', 'Bantam Weight'),
	(16, 'player14', 'player14', 'player', 20, 'Female', '1995-09-01', 'test test test', 'Test Gym', 57, 182, 'No', 'Yes', 'No', 'Advance', 6, 7, 8, 9, 'National', '2nd Dan Black Belt', 'College', 'Fin Weight'),
	(17, 'player15', 'player15', 'player15', 20, 'Female', '1997-08-02', 'test test test', 'Test Gym', 59, 176, 'No', 'Yes', 'No', 'Advance', 6, 7, 8, 9, 'National', '2nd Dan Black Belt', 'College', 'Fly Weight'),
	(18, 'player16', 'player16', 'player16', 20, 'Female', '1995-08-08', 'test test test', 'Test Gym', 60, 175, 'No', 'Yes', 'No', 'Advance', 7, 8, 9, 7, 'National', '2nd Dan Black Belt', 'College', 'Bantam Weight'),
	(19, 'player19', 'player19', 'player19', 20, 'Male', '1996-01-08', 'demo test test', 'Testing Gym', 54, 176, 'No', 'Yes', 'No', 'Advance', 6, 7, 8, 6, 'National', '2nd Dan Black Belt', 'College', 'Fin Weight'),
	(20, 'player20', 'player20', 'player20', 20, 'Male', '1996-09-08', 'demo test test', 'Testing Gym', 59, 179, 'No', 'Yes', 'No', 'Advance', 7, 8, 7, 8, 'National', '3rd Dan Black Belt', 'College', 'Fly Weight'),
	(21, 'player21', 'player21', 'player21', 20, 'Male', '1996-08-09', 'demo test test', 'Testing Gym', 63, 180, 'No', 'Yes', 'No', 'Advance', 7, 8, 9, 7, 'National', '2nd Dan Black Belt', 'College', 'Bantam Weight'),
	(22, 'player22', 'player22', 'player22', 19, 'Female', '1997-08-08', 'demo test test', 'Testing Gym', 52, 169, 'No', 'Yes', 'No', 'Advance', 7, 8, 9, 7, 'National', '2nd Dan Black Belt', 'College', 'Fin Weight'),
	(23, 'player23', 'player23', 'player23', 18, 'Female', '1998-08-04', 'demo test test', 'Testing Gym', 59, 170, 'No', 'Yes', 'No', 'Advance', 7, 8, 9, 7, 'National', '2nd Dan Black Belt', 'College', 'Fly Weight'),
	(24, 'player24', 'player24', 'player24', 20, 'Female', '1996-09-09', 'demo test test', 'Testing Gym', 60, 172, 'No', 'Yes', 'No', 'Advance', 7, 8, 9, 9, 'National', '3rd Dan Black Belt', 'College', 'Bantam Weight'),
	(25, 'player27', 'player27', 'player27', 20, 'Male', '1996-08-08', 'coach coach coach', 'Coach Gym', 56, 170, 'No', 'Yes', 'No', 'Advance', 3, 4, 5, 3, 'National', '1st Dan Black Belt', 'College', 'Fin Weight'),
	(26, 'player28', 'player28', 'player28', 18, 'Male', '1998-08-08', 'coach coach coach', 'Coach Gym', 59, 175, 'No', 'Yes', 'No', 'Advance', 4, 4, 3, 4, 'National', '1st Dan Black Belt', 'College', 'Fly Weight'),
	(27, 'player29', 'player29', 'player29', 20, 'Male', '1996-09-02', 'coach coach coach', 'Coach Gym', 63, 175, 'No', 'Yes', 'No', 'Advance', 4, 4, 5, 3, 'National', '1st Dan Black Belt', 'College', 'Bantam Weight'),
	(28, 'player30', 'player30', 'player30', 19, 'Female', '1997-08-02', 'coach coach coach', 'Coach Gym', 52, 169, 'No', 'Yes', 'No', 'Advance', 4, 4, 4, 5, 'National', '1st Dan Black Belt', 'College', 'Fin Weight'),
	(29, 'player31', 'player31', 'player31', 19, 'Female', '1997-05-03', 'coach coach coach', 'Coach Gym', 56, 171, 'No', 'Yes', 'No', 'Advance', 4, 4, 5, 5, 'National', '1st Dan Black Belt', 'College', 'Fly Weight'),
	(30, 'player32', 'player32', 'player32', 18, 'Female', '1998-07-07', 'coach coach coach', 'Coach Gym', 50, 172, 'No', 'Yes', 'No', 'Advance', 4, 3, 4, 5, 'National', '1st Dan Black Belt', 'College', 'Bantam Weight'),
	(31, 'Sim', 'Rim', 'J.', 20, 'Male', '1996-08-02', 'Ahmad Riyahd Fahran', 'MVP Gym', 68, 178, 'No', 'Yes', 'No', 'Advance', 10, 9, 9, 9, 'National', '2nd Dan Black Belt', 'College', 'Feather Weight'),
	(32, 'mike', 'mike', 'M.', 20, 'Male', '1996-09-09', 'Ahmad Riyahd Fahran', 'MVP Gym', 68, 180, 'No', 'Yes', 'No', 'Advance', 8, 8, 6, 7, 'National', '2nd Dan Black Belt', 'Highschool', 'Feather Weight'),
	(33, '2', '2', '2', 2, 'Male', '2017-11-18', 'coach coach coach', 'Coach Gym', 12, 12, 'No', 'Yes', 'No', 'Novice', 8, 1, 2, 2, 'Local', '8th Dan Black Belt', 'Highschool', 'Light Heavy Weight'),
	(34, 'Bakod', 'Man', 'Lalaki', 23, 'Male', '1987-12-12', 'User U User', 'User Gym', 200, 200, 'No', 'No', 'Yes', 'Advance', 10, 10, 10, 10, 'International', '9th Dan Black Belt', 'College', 'Bantam Weight'),
	(35, 'Dude', 'Test', 'Test', 23, 'Male', '1976-12-12', 'User U User', 'User Gym', 200, 200, 'No', 'Yes', 'No', 'Advance', 10, 8, 10, 10, 'International', '9th Dan Black Belt', 'College', 'Bantam Weight'),
	(36, 'asd', 'asd', 'asd', 1, 'Male', '2017-11-08', 'coach coach coach', 'Coach Gym', 12, 12, 'No', 'No', 'Select an ', 'Novice', 10, 2, 2, 6, 'Local', '8th Dan Black Belt', 'Highschool', 'Light Heavy Weight');
/*!40000 ALTER TABLE `player` ENABLE KEYS */;

-- Dumping structure for table ttms.rules
DROP TABLE IF EXISTS `rules`;
CREATE TABLE IF NOT EXISTS `rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rule` varchar(1000) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Current',
  `tournament_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table ttms.rules: ~9 rows (approximately)
DELETE FROM `rules`;
/*!40000 ALTER TABLE `rules` DISABLE KEYS */;
INSERT INTO `rules` (`id`, `rule`, `status`, `tournament_id`) VALUES
	(1, 'Point(s) shall be awarded when a permitted technique is delivered to the scoring areas of the trunk with a proper level of impact. ', 'Old', 0),
	(2, 'Foot technique: Delivering techniques using any part of the foot below the ankle bone ', 'Old', 0),
	(3, 'Trunk: Attack by fist and foot techniques on the areas covered by the trunk protector are permitted. However, \nsuch attacks shall not be made on the part of the spine. ', 'Current', 0),
	(4, 'If a contestant intentionally and repeatedly refuses to comply with the Competition Rules or the refereeâ€™s orders, the referee may end the match and declare the opposing contestant the winner. ', 'Current', 0),
	(5, 'In major competitions, chest protectors have electronic scoring systems in them. These are adjusted to take into account the weight category of the competitors. (Heavier players have to kick harder to score a point.)', 'Current', 0),
	(6, 'No fucking kicking', 'Current', 2),
	(7, 'HAHAHAH POTA BAD MAG SUMBAG', 'Current', 2),
	(8, 'Bad mag simhot', 'Current', 16),
	(9, 'Tuod bad gd ya', 'Current', 16),
	(10, 'WALANG RULES POTA. PATAY YUN!', 'Current', 17),
	(17, 'asdasdasd', 'Current', 3);
/*!40000 ALTER TABLE `rules` ENABLE KEYS */;

-- Dumping structure for table ttms.tournament
DROP TABLE IF EXISTS `tournament`;
CREATE TABLE IF NOT EXISTS `tournament` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `venue` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table ttms.tournament: ~16 rows (approximately)
DELETE FROM `tournament`;
/*!40000 ALTER TABLE `tournament` DISABLE KEYS */;
INSERT INTO `tournament` (`id`, `name`, `start_date`, `end_date`, `venue`) VALUES
	(1, 'Best of the Best 2017', '2017-06-20', '2017-06-20', 'Robinsons Manila'),
	(2, 'War on the Floor Tournament', '2017-08-01', '2017-08-02', 'Robinsons Place Iloilo'),
	(3, 'Brawl For It All Tournament', '2017-06-30', '2018-02-02', 'SM City Iloilo'),
	(4, 'Face of the Year', '2017-07-02', '2017-06-20', 'SM City Iloilo'),
	(5, 'Local Tournament 2017', '2017-05-10', '2017-06-20', 'Robinsons Place Iloilo'),
	(6, 'Local Tournament 2016', '2016-05-10', '2017-06-20', 'Robinsons Place Iloilo'),
	(7, 'Best of the Best 2016', '2016-05-11', '2017-06-20', 'Robinsons Place Iloilo'),
	(8, 'War on the Floor Tournament 2016', '2016-05-07', '2018-02-02', 'SM City Bacolod'),
	(9, 'Face of the Year 2016', '2016-05-07', '2017-06-20', 'SM City Bacolod'),
	(10, 'Local Tournament 2015', '2015-05-07', '2018-02-02', 'SM City Bacolod'),
	(11, 'Thesis 101', '2017-07-29', '2017-06-20', 'CPU'),
	(12, 'Thesis 102', '2017-10-24', '2017-10-30', 'CPU'),
	(13, 'Thesis 103', '2017-10-24', '2017-10-30', 'CPU'),
	(14, 'Thesis 104', '2017-10-24', '2017-10-30', 'CPU'),
	(15, 'Thesis 105', '2017-10-24', '2017-10-30', 'CPU'),
	(16, 'Bakbakan kay Marlou', '2018-02-01', '2018-02-02', 'Thesis Room'),
	(17, 'Bakbakan kay Marlou 2', '2017-11-14', '2017-11-22', 'Bahay Niya Pota');
/*!40000 ALTER TABLE `tournament` ENABLE KEYS */;

-- Dumping structure for table ttms.tournament_registration
DROP TABLE IF EXISTS `tournament_registration`;
CREATE TABLE IF NOT EXISTS `tournament_registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coach` varchar(250) NOT NULL DEFAULT '0',
  `tournament` varchar(250) DEFAULT NULL,
  `playerid` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `belt` varchar(150) DEFAULT NULL,
  `advanceornovice` varchar(50) DEFAULT NULL,
  `category` varchar(250) DEFAULT NULL,
  `price` double DEFAULT '500',
  `status` varchar(50) DEFAULT 'Unpaid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

-- Dumping data for table ttms.tournament_registration: ~48 rows (approximately)
DELETE FROM `tournament_registration`;
/*!40000 ALTER TABLE `tournament_registration` DISABLE KEYS */;
INSERT INTO `tournament_registration` (`id`, `coach`, `tournament`, `playerid`, `name`, `belt`, `advanceornovice`, `category`, `price`, `status`) VALUES
	(1, 'Ahmad Riyahd Fahran', 'Best of the Best 2017', 2, 'Marshall S. Robles', '2nd Dan Black Belt', 'Advance', 'Feather Weight', 500, 'Unpaid'),
	(2, 'Ahmad Riyahd Fahran', 'War on the Floor Tournament', 1, 'Jim Robles Simpas', '1st Dan Black Belt', 'Advance', 'Feather Weight', 500, 'Paid'),
	(3, 'Sample Sample', 'War on the Floor Tournament', 2, 'Marshall S. Robles', '2nd Dan Black Belt', 'Advance', 'Feather Weight', 500, 'Paid'),
	(4, 'Ahmad Riyahd Fahran', 'Face of the Year', 1, 'Jim Robles Simpas', '1st Dan Black Belt', 'Advance', 'Feather Weight', 500, 'Paid'),
	(5, 'Ahmad Riyahd Fahran', 'Face of the Year', 2, 'Marshall S. Robles', '2nd Dan Black Belt', 'Advance', 'Feather Weight', 500, 'Paid'),
	(6, 'Ahmad Riyahd Fahran', 'Best of the Best 2017', 1, 'Jim Robles Simpas', '1st Dan Black Belt', 'Advance', 'Feather Weight', 500, 'Unpaid'),
	(7, 'coach coach coach', 'War on the Floor Tournament', 25, 'player27 player27 player27', '1st Dan Black Belt', 'Advance', 'Feather Weight', 500, 'Paid'),
	(8, 'coach coach coach', 'War on the Floor Tournament', 26, 'player28 player28 player28', '1st Dan Black Belt', 'Advance', 'Fly Weight', 500, 'Paid'),
	(9, 'coach coach coach', 'War on the Floor Tournament', 27, 'player29 player29 player29', '1st Dan Black Belt', 'Advance', 'Bantam Weight', 500, 'Paid'),
	(10, 'coach coach coach', 'War on the Floor Tournament', 28, 'player30 player30 player30', '1st Dan Black Belt', 'Advance', 'Fin Weight', 500, 'Paid'),
	(11, 'coach coach coach', 'War on the Floor Tournament', 29, 'player31 player31 player31', '1st Dan Black Belt', 'Advance', 'Fly Weight', 500, 'Paid'),
	(12, 'coach coach coach', 'War on the Floor Tournament', 30, 'player32 player32 player32', '1st Dan Black Belt', 'Advance', 'Bantam Weight', 500, 'Paid'),
	(13, 'test test test', 'War on the Floor Tournament', 13, 'player11 player11 player11', '2nd Dan Black Belt', 'Advance', 'Fin Weight', 500, 'Paid'),
	(14, 'test test test', 'War on the Floor Tournament', 14, 'player12 player12 player12', '2nd Dan Black Belt', 'Advance', 'Fly Weight', 500, 'Paid'),
	(15, 'test test test', 'War on the Floor Tournament', 15, 'player13 player13 player13', '2nd Dan Black Belt', 'Advance', 'Bantam Weight', 500, 'Paid'),
	(16, 'test test test', 'War on the Floor Tournament', 16, 'player14 player player14', '2nd Dan Black Belt', 'Advance', 'Fin Weight', 500, 'Paid'),
	(17, 'test test test', 'War on the Floor Tournament', 17, 'player15 player15 player15', '2nd Dan Black Belt', 'Advance', 'Fly Weight', 500, 'Paid'),
	(18, 'test test test', 'War on the Floor Tournament', 18, 'player16 player16 player16', '2nd Dan Black Belt', 'Advance', 'Bantam Weight', 500, 'Paid'),
	(19, 'demo test test', 'War on the Floor Tournament', 19, 'player19 player19 player19', '2nd Dan Black Belt', 'Advance', 'Fin Weight', 500, 'Paid'),
	(20, 'demo test test', 'War on the Floor Tournament', 20, 'player20 player20 player20', '3rd Dan Black Belt', 'Advance', 'Fly Weight', 500, 'Paid'),
	(21, 'demo test test', 'War on the Floor Tournament', 21, 'player21 player21 player21', '2nd Dan Black Belt', 'Advance', 'Bantam Weight', 500, 'Paid'),
	(22, 'demo test test', 'War on the Floor Tournament', 22, 'player22 player22 player22', '2nd Dan Black Belt', 'Advance', 'Fin Weight', 500, 'Paid'),
	(23, 'demo test test', 'War on the Floor Tournament', 23, 'player23 player23 player23', '2nd Dan Black Belt', 'Advance', 'Fly Weight', 500, 'Paid'),
	(24, 'demo test test', 'War on the Floor Tournament', 24, 'player24 player24 player24', '3rd Dan Black Belt', 'Advance', 'Bantam Weight', 500, 'Paid'),
	(25, 'User U User', 'War on the Floor Tournament', 3, 'player player player', '1st Dan Black Belt', 'Advance', 'Fin Weight', 500, 'Paid'),
	(26, 'User U User', 'War on the Floor Tournament', 4, 'player2 player2 player2', '3rd Dan Black Belt', 'Advance', 'Fin Weight', 500, 'Paid'),
	(27, 'User U User', 'War on the Floor Tournament', 5, 'player3 player3 player3', '2nd Dan Black Belt', 'Advance', 'Feather Weight', 500, 'Paid'),
	(28, 'User U User', 'War on the Floor Tournament', 6, 'player4 player4 player4', '3rd Dan Black Belt', 'Advance', 'Bantam Weight', 500, 'Paid'),
	(29, 'User U User', 'War on the Floor Tournament', 7, 'player5 player5 player5', '2nd Dan Black Belt', 'Advance', 'Welter Weight', 500, 'Paid'),
	(30, 'User U User', 'War on the Floor Tournament', 8, 'player6 player6 player6', '3rd Dan Black Belt', 'Advance', 'Fin Weight', 500, 'Paid'),
	(31, 'User U User', 'War on the Floor Tournament', 9, 'player7 player7 player7', '2nd Dan Black Belt', 'Advance', 'Fly Weight', 500, 'Paid'),
	(32, 'User U User', 'War on the Floor Tournament', 10, 'player8 player8 player8', '2nd Dan Black Belt', 'Advance', 'Bantam Weight', 500, 'Paid'),
	(33, 'User U User', 'War on the Floor Tournament', 11, 'player9 player player9', '2nd Dan Black Belt', 'Advance', 'Feather Weight', 500, 'Paid'),
	(34, 'User U User', 'War on the Floor Tournament', 12, 'player10 player10 player10', '2nd Dan Black Belt', 'Advance', 'Light Weight', 500, 'Paid'),
	(35, 'Ahmad Riyahd Fahran', 'Thesis 101', 32, 'mike M. mike', '2nd Dan Black Belt', 'Advance', 'Feather Weight', 500, 'Paid'),
	(36, 'Ahmad Riyahd Fahran', 'Thesis 101', 1, 'Jim Robles Simpas', '1st Dan Black Belt', 'Advance', 'Feather Weight', 500, 'Paid'),
	(39, 'User U User', 'War on the Floor Tournament 2016', 7, 'player5 player5 player5', '2nd Dan Black Belt', 'Advance', 'Welter Weight', 500, 'Unpaid'),
	(40, 'User U User', 'War on the Floor Tournament 2016', 7, 'player5 player5 player5', '2nd Dan Black Belt', 'Advance', 'Welter Weight', 500, 'Unpaid'),
	(41, 'User U User', 'War on the Floor Tournament 2016', 6, 'player4 player4 player4', '3rd Dan Black Belt', 'Advance', 'Bantam Weight', 500, 'Unpaid'),
	(42, 'User U User', 'War on the Floor Tournament 2016', 5, 'player3 player3 player3', '2nd Dan Black Belt', 'Advance', 'Fly Weight', 500, 'Unpaid'),
	(43, 'User U User', 'War on the Floor Tournament 2016', 10, 'player8 player8 player8', '2nd Dan Black Belt', 'Advance', 'Bantam Weight', 500, 'Unpaid'),
	(44, 'User U User', 'War on the Floor Tournament 2016', 3, 'player player player', '1st Dan Black Belt', 'Advance', 'Feather Weight', 500, 'Unpaid'),
	(45, 'User U User', 'War on the Floor Tournament 2016', 4, 'player2 player2 player2', '3rd Dan Black Belt', 'Advance', 'Fin Weight', 500, 'Unpaid'),
	(46, 'User U User', 'War on the Floor Tournament 2016', 8, 'player6 player6 player6', '3rd Dan Black Belt', 'Advance', 'Fin Weight', 500, 'Unpaid'),
	(47, 'User U User', 'War on the Floor Tournament 2016', 9, 'player7 player7 player7', '2nd Dan Black Belt', 'Advance', 'Fly Weight', 500, 'Unpaid'),
	(48, 'User U User', 'War on the Floor Tournament 2016', 11, 'player9 player player9', '2nd Dan Black Belt', 'Advance', 'Feather Weight', 500, 'Unpaid'),
	(49, 'User U User', 'War on the Floor Tournament 2016', 12, 'player10 player10 player10', '2nd Dan Black Belt', 'Advance', 'Light Weight', 500, 'Unpaid'),
	(50, 'User U User', 'War on the Floor Tournament 2016', 34, 'Man Lalaki Bakod', '9th Dan Black Belt', 'Advance', 'Bantam Weight', 500, 'Unpaid'),
	(52, 'User U User', 'War on the Floor Tournament 2016', 34, 'Man Lalaki Bakod', '9th Dan Black Belt', 'Advance', 'Bantam Weight', 500, 'Unpaid'),
	(53, 'User U User', 'War on the Floor Tournament 2016', 35, 'Test Test Dude', '9th Dan Black Belt', 'Advance', 'Bantam Weight', 500, 'Unpaid');
/*!40000 ALTER TABLE `tournament_registration` ENABLE KEYS */;

-- Dumping structure for view ttms.matchmaking
DROP VIEW IF EXISTS `matchmaking`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `matchmaking`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `matchmaking` AS SELECT 

tournament_registration.id,
tournament_registration.coach,
tournament_registration.tournament,

tournament_registration.playerid,
tournament_registration.name,
tournament_registration.belt,

player.sex,
player.height,
player.weight,

player.school_degree,
tournament_registration.advanceornovice,
tournament_registration.category,

ROUND((((player.skillrating + player.stamina + player.speed + player.power)/4) * 10),0) as statistic_score

FROM tournament_registration

INNER JOIN player
ON CONCAT(player.firstname, ' ', player.middlename, ' ', player.lastname)=tournament_registration.name 

ORDER BY tournament ASC ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
