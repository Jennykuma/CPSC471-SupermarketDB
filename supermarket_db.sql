# Host: localhost  (Version 5.7.17-log)
# Date: 2017-04-03 22:27:03
# Generator: MySQL-Front 6.0  (Build 1.74)


#
# Structure for table "employee"
#

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `eid` int(8) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `sin` decimal(9,0) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `salary` decimal(5,0) DEFAULT NULL,
  `phone_num` varchar(10) DEFAULT NULL,
  `dep_name` varchar(255) DEFAULT NULL,
  `super_id` int(8) DEFAULT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "employee"
#

INSERT INTO `employee` VALUES (1,'Jenny','Le',123456789,'Boss',9000,'1234567890','Manager',NULL),(2,'Aron','Chan',987654321,'Boss',10000,'9876543210','Manager',NULL),(5,'asd','dasa',123456788,'a',1,'1234567','a',12345678);
