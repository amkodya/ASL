# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: PantryAssistant
# Generation Time: 2016-01-25 04:20:21 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cost
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cost`;

CREATE TABLE `cost` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table foods
# ------------------------------------------------------------

DROP TABLE IF EXISTS `foods`;

CREATE TABLE `foods` (
  `foodid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `expiration` date DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `cal` int(11) DEFAULT NULL,
  `fats` int(11) DEFAULT NULL,
  `protein` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`foodid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `foods` WRITE;
/*!40000 ALTER TABLE `foods` DISABLE KEYS */;

INSERT INTO `foods` (`foodid`, `name`, `expiration`, `price`, `cal`, `fats`, `protein`, `quantity`, `category`)
VALUES
	(67,'Bread','2016-01-02',2,0,10,10,10,'pantry'),
	(68,'Broccoli','2016-01-02',1,0,1,1,10,'vegetables'),
	(76,'Kale','2016-03-01',2,0,1,1,20,'vegetables'),
	(80,'apple','2016-01-02',10,0,100,10,10,'fruit'),
	(81,'apple','2016-01-02',10,0,100,10,10,'fruit'),
	(82,'apple','2016-01-02',10,0,100,10,10,'fruit'),
	(83,'','0000-00-00',0,0,0,0,0,''),
	(84,'','0000-00-00',0,0,0,0,0,''),
	(85,'Kale','2016-03-01',2,0,1,1,20,'vegetables'),
	(86,'Kale','2016-03-01',2,0,1,1,20,'vegetables'),
	(87,'APple','2016-01-02',10,0,10,10,10,'fruit'),
	(88,'orange','2016-03-01',10,0,1,1,1,'fruit'),
	(89,'orange','2016-03-01',10,0,1,1,1,'fruit'),
	(90,'orange','2016-03-01',10,0,1,1,1,'fruit'),
	(91,'orange','2016-03-01',10,0,1,1,1,'fruit'),
	(92,'orange','2016-03-01',10,0,1,1,1,'fruit'),
	(93,'orange','2016-03-01',10,0,1,1,1,'fruit'),
	(94,'orange','2016-03-01',10,0,1,1,1,'fruit'),
	(95,'orange','2016-03-01',10,0,1,1,1,'fruit'),
	(96,'orange','2016-03-01',10,0,1,1,1,'fruit'),
	(97,'orange','2016-03-01',10,0,1,1,1,'fruit'),
	(98,'orange','2016-03-01',10,0,1,1,1,'fruit'),
	(99,'orange','2016-03-01',10,0,1,1,1,'fruit'),
	(100,'orange','2016-03-01',10,0,1,1,1,'fruit'),
	(101,'orange','2016-03-01',10,0,1,1,1,'fruit'),
	(102,'orange','2016-03-01',10,0,1,1,1,'fruit'),
	(103,'orange','2016-03-01',10,0,1,1,1,'fruit'),
	(104,'orange','2016-03-01',10,0,1,1,1,'fruit'),
	(105,'orange','2016-03-01',10,0,1,1,1,'fruit'),
	(106,'Pasta','2017-12-12',2,0,2,10,1,'pantry'),
	(107,'Pasta','2017-12-12',2,0,2,10,1,'pantry'),
	(108,'Pasta','2017-12-12',2,0,2,10,1,'pantry'),
	(109,'Pasta','2017-12-12',2,0,2,10,1,'pantry'),
	(110,'Pasta','2017-12-12',2,0,2,10,1,'pantry'),
	(111,'Pasta','2017-12-12',2,0,2,10,1,'pantry'),
	(112,'Pasta','2017-12-12',2,0,2,10,1,'pantry'),
	(113,'Pasta','2017-12-12',2,0,2,10,1,'pantry'),
	(114,'Pasta','2017-12-12',2,0,2,10,1,'pantry'),
	(115,'Pasta','2017-12-12',2,0,2,10,1,'pantry'),
	(116,'Pasta','2017-12-12',2,0,2,10,1,'pantry'),
	(117,'Pasta','2017-12-12',2,0,2,10,1,'pantry'),
	(118,'Pasta','2017-12-12',2,0,2,10,1,'pantry'),
	(119,'Pasta','2017-12-12',2,0,2,10,1,'pantry'),
	(120,'Pasta','2017-12-12',2,0,2,10,1,'pantry'),
	(121,'Pasta','2017-12-12',2,0,2,10,1,'pantry'),
	(122,'Pasta','2017-12-12',2,0,2,10,1,'pantry'),
	(123,'Pasta','2017-12-12',2,0,2,10,1,'pantry'),
	(124,'Pasta','2017-12-12',2,0,2,10,1,'pantry'),
	(125,'Pie','2016-03-01',100,0,20,10,1,'misc'),
	(126,'Green Apple','2016-02-02',1,0,20,1,20,'fruit'),
	(127,'Green Apple','2016-02-02',1,0,20,1,20,'fruit'),
	(128,'Green Apple','2016-02-02',1,0,20,1,20,'fruit'),
	(129,'Green Apple','2016-02-02',1,0,20,1,20,'fruit'),
	(130,'Green Apple','2016-02-02',1,0,20,1,20,'fruit'),
	(131,'Green Apple','2016-02-02',1,0,20,1,20,'fruit'),
	(132,'Green Apple','2016-02-02',1,0,20,1,20,'fruit'),
	(133,'Green Apple','2016-02-02',1,0,20,1,20,'fruit'),
	(134,'Green Apple','2016-02-02',1,0,20,1,20,'fruit'),
	(135,'Green Apple','2016-02-02',1,0,20,1,20,'fruit'),
	(136,'Green Apple','2016-02-02',1,0,20,1,20,'fruit'),
	(137,'Green Apple','2016-02-02',1,0,20,1,20,'fruit'),
	(138,'Green Apple','2016-02-02',1,0,20,1,20,'fruit'),
	(139,'Green Apple','2016-02-02',1,0,20,1,20,'fruit'),
	(140,'Green Apple','2016-02-02',1,0,20,1,20,'fruit'),
	(141,'Green Apple','2016-02-02',1,0,20,1,20,'fruit'),
	(142,'Spagetti','2018-01-01',2,0,2,2,1,'pantry');

/*!40000 ALTER TABLE `foods` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table login
# ------------------------------------------------------------

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `zip` int(5) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profile` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;

INSERT INTO `login` (`id`, `firstname`, `lastname`, `email`, `dob`, `zip`, `username`, `password`, `profile`)
VALUES
	(1,'Ashley','Kodya','akodya12@gmail.com','2016-10-12',13206,'electrikoala','3d3a2ef4be2d50bff4e74f22eb4ad382',X'626134306233366564616132323266396437346463656361653637356236303232376137336339646565613862663038336663636262656266393839656532332E6A7067'),
	(2,'Mike','Russo','mikerusso123@gmail.com','1985-05-22',13206,'MIKERUSSO','3d3a2ef4be2d50bff4e74f22eb4ad382',NULL),
	(3,'wendy','gellert','WGELLERT@TWC.COM','1957-01-01',12221,'WENDY','a3af31746b9218dde8a101df46e4a81f',X'67656172686F7665722E706E67'),
	(4,'Ashley','Kodya','akodya12@gmail.com','1987-10-12',12334,'electrikoala','3d3a2ef4be2d50bff4e74f22eb4ad382',NULL),
	(5,'Ashley','Kodya','akodya12@gmail.com','1987-10-12',12334,'electrikoala','3d3a2ef4be2d50bff4e74f22eb4ad382',NULL),
	(6,'Ashley','Kodya','akodya12@gmail.com','1987-10-12',12334,'electrikoala','3d3a2ef4be2d50bff4e74f22eb4ad382',NULL),
	(7,'Hank','Gellert','hnak@hank.com','1010-10-10',12212,'hank','0addc076efac85aaad9d61e4856741cf',NULL),
	(8,'Morgan','Gaulrapp','ngp@teacher.com','2020-01-01',12201,'morgan','70c3f74bb3863a46fb33e0b0629cc669',NULL),
	(9,'Tim','Gaulrapp','timg@g.com','0110-01-01',13320,'electrikoala','3d3a2ef4be2d50bff4e74f22eb4ad382',NULL),
	(10,'mike','mike','mike@mike.com','2220-10-10',13221,'mikemikemike','76fe5026a9c1e71157c8fbb3198697c3',NULL),
	(11,'January','24th','fullsail@failsail.com','2016-01-24',13206,'jan242016','3d3a2ef4be2d50bff4e74f22eb4ad382',NULL);

/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nutrition
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nutrition`;

CREATE TABLE `nutrition` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `calories` int(11) DEFAULT NULL,
  `fats` int(11) DEFAULT NULL,
  `protein` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
