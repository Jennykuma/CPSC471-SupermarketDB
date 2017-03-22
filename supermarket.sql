# Host: localhost  (Version 5.7.17-log)
# Date: 2017-03-21 20:12:56
# Generator: MySQL-Front 6.0  (Build 1.78)


#
# Structure for table "names"
#

DROP TABLE IF EXISTS `names`;
CREATE TABLE `names` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "names"
#

INSERT INTO `names` VALUES (1,'John'),(2,'John'),(3,'John'),(4,'John'),(5,'John'),(6,'John');
