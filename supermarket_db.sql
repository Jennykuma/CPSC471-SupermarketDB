# Host: localhost  (Version 5.7.17-log)
# Date: 2017-04-05 11:09:19
# Generator: MySQL-Front 6.0  (Build 1.100)


#
# Structure for table "customer"
#

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `cid` int(8) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone_num` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "customer"
#

INSERT INTO `customer` VALUES (1,'Saul Goodman','5055034455'),(2,'Jane Underwood','7891457497');

#
# Structure for table "department"
#

DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `dname` varchar(255) DEFAULT NULL,
  `dnumber` int(11) DEFAULT NULL,
  UNIQUE KEY `dname` (`dname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "department"
#

INSERT INTO `department` VALUES ('Bakery',1),('Seafood',2),('Management',3),('Meat',4),('Cleaning',5);

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

#
# Data for table "employee"
#

INSERT INTO `employee` VALUES (1,'Jenny','Derp',123456789,'Jackie\'s Boss',99,'1234567890','Management',NULL),(2,'Aron','Chan',987654321,'Boss',10000,'9876543210','Management',NULL),(3,'Mary','Wang',459721324,'Cashier',10,'8462485555','Management',1),(4,'Martin','Wong',444975346,'Cashier',10,'4894511572','Management',2),(5,'Gordon','Lee',775245619,'Butcher',10,'4897526548','Meat',2),(6,'Henry','Wilson',159724896,'Baker',10,'7663548941','Bakery',1),(7,'Sarah','Jones',784115745,'Sushi Chef',10,'4897941859','Seafood',1),(25,'Cinnamon','Roll',45645645,'Sweetner',1,'1231231234','Bakery',1),(26,'Jackie','Nim',78978978,'Pleb',1,'6969696969','Bakery',1),(27,'Justine','Bui',384192684,'Owner',50000,'4031239485','Management',1),(28,'AerJay','Italia',384295384,'Janitor',90000,'4031294853','Cleaning',1),(29,'Spencer','Manzon',475283193,'Sub Janitor',5,'4031935864','Cleaning',1);

#
# Structure for table "dependent"
#

DROP TABLE IF EXISTS `dependent`;
CREATE TABLE `dependent` (
  `name` varchar(255) NOT NULL DEFAULT '',
  `emp_id` int(8) NOT NULL,
  `relation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`name`,`emp_id`),
  KEY `emp_id_fk` (`emp_id`),
  CONSTRAINT `emp_id_fk` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "dependent"
#

INSERT INTO `dependent` VALUES ('Carol Lee',5,'Spouse'),('Joey Wong',4,'Father'),('Marie Wong',4,'Mother');

#
# Structure for table "gives_feedback"
#

DROP TABLE IF EXISTS `gives_feedback`;
CREATE TABLE `gives_feedback` (
  `cust_id` int(8) NOT NULL,
  `dep_name` varchar(255) NOT NULL,
  `rating` int(10) DEFAULT NULL,
  `feedback` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cust_id`,`dep_name`),
  KEY `dep_name` (`dep_name`),
  CONSTRAINT `cust_id` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cid`),
  CONSTRAINT `dep_name` FOREIGN KEY (`dep_name`) REFERENCES `department` (`dname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "gives_feedback"
#

INSERT INTO `gives_feedback` VALUES (1,'Management',5,NULL),(2,'Management',2,'They wouldn\'t accept my coupon!');

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

#
# Structure for table "shift"
#

DROP TABLE IF EXISTS `shift`;
CREATE TABLE `shift` (
  `shift_num` int(8) NOT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `dep_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`shift_num`),
  KEY `dep_name_fk2` (`dep_name`),
  KEY `emp_id_fk2` (`emp_id`),
  CONSTRAINT `dep_name_fk2` FOREIGN KEY (`dep_name`) REFERENCES `department` (`dname`),
  CONSTRAINT `emp_id_fk2` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "shift"
#

INSERT INTO `shift` VALUES (1,'2017-04-16','09:00:00','17:00:00',3,'Management'),(2,'2017-04-16','09:00:00','17:00:00',4,'Management'),(3,'2017-04-16','08:00:00','17:00:00',5,'Meat'),(4,'2017-04-16','08:00:00','17:00:00',6,'Bakery'),(5,'2017-04-16','08:00:00','17:00:00',7,'Seafood');

#
# Structure for table "supplier"
#

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `name` varchar(255) DEFAULT NULL,
  `phone_num` varchar(12) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "supplier"
#

INSERT INTO `supplier` VALUES ('SupplyMarket','4038741569','1220 Breeze St. NW'),('Snack Stocker Inc.','7489415799','12 742 Ave. SE');

#
# Structure for table "product"
#

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `pid` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `sup_name` varchar(255) DEFAULT NULL,
  `wholesale_price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`pid`),
  KEY `sup_name_fk` (`sup_name`),
  CONSTRAINT `sup_name_fk` FOREIGN KEY (`sup_name`) REFERENCES `supplier` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "product"
#

INSERT INTO `product` VALUES (1,'Bread',5.99,'SupplyMarket',3.99),(2,'Instant Noodles (12 Pk)',11.99,'Snack Stocker Inc.',9.99);

#
# Structure for table "sells"
#

DROP TABLE IF EXISTS `sells`;
CREATE TABLE `sells` (
  `dep_name` varchar(11) NOT NULL DEFAULT '',
  `prod_id` int(8) NOT NULL,
  PRIMARY KEY (`dep_name`,`prod_id`),
  KEY `dep_name_fk` (`dep_name`),
  KEY `prod_id_fk` (`prod_id`),
  CONSTRAINT `dep_name_fk` FOREIGN KEY (`dep_name`) REFERENCES `department` (`dname`),
  CONSTRAINT `prod_id_fk` FOREIGN KEY (`prod_id`) REFERENCES `product` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "sells"
#

INSERT INTO `sells` VALUES ('Bakery',1),('Management',2);

#
# Structure for table "transaction"
#

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `time` datetime DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "transaction"
#

INSERT INTO `transaction` VALUES (1,'2017-03-15 09:35:00',18.99,'Debit'),(2,'2017-03-15 10:20:00',37.98,'Cash');

#
# Structure for table "makes"
#

DROP TABLE IF EXISTS `makes`;
CREATE TABLE `makes` (
  `cust_id` int(8) NOT NULL AUTO_INCREMENT,
  `trans_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cust_id`,`trans_id`),
  KEY `cust_id_fk` (`cust_id`),
  KEY `trans_id_fk` (`trans_id`),
  CONSTRAINT `cust_id_fk` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cid`),
  CONSTRAINT `trans_id_fk` FOREIGN KEY (`trans_id`) REFERENCES `transaction` (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "makes"
#

INSERT INTO `makes` VALUES (1,2),(2,1);
