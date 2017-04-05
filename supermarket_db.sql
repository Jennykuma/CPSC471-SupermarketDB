# Host: localhost  (Version 5.7.17-log)
# Date: 2017-04-05 01:00:55
# Generator: MySQL-Front 6.0  (Build 1.100)


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
  `phone_num` varchar(12) DEFAULT NULL,
  `dep_name` varchar(255) DEFAULT NULL,
  `super_id` int(8) DEFAULT NULL,
  PRIMARY KEY (`eid`),
  KEY `emp_id_fk3` (`super_id`),
  KEY `dep_name_fk3` (`dep_name`),
  CONSTRAINT `dep_name_fk3` FOREIGN KEY (`dep_name`) REFERENCES `department` (`dname`),
  CONSTRAINT `emp_id_fk3` FOREIGN KEY (`super_id`) REFERENCES `employee` (`eid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for table "employee"
#

INSERT INTO `employee` VALUES (1,'Jenny','Le',123456789,'Boss',9000,'1234567890','Management',NULL),(2,'Aron','Chan',987654321,'Boss',10000,'9876543210','Management',NULL),(3,'Mary','Wang',459721324,'Cashier',10,'8462485555','Management',1),(4,'Martin','Wong',444975346,'Cashier',10,'4894511572','Management',2),(5,'Gordon','Lee',775245619,'Butcher',10,'4897526548','Meat',2),(6,'Henry','Wilson',159724896,'Baker',10,'7663548941','Bakery',1),(7,'Sarah','Jones',784115745,'Sushi Chef',10,'4897941859','Seafood',1);
