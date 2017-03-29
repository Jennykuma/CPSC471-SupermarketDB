# Host: localhost  (Version 5.7.17-log)
# Date: 2017-03-29 16:51:32
# Generator: MySQL-Front 6.0  (Build 1.100)


#
# Structure for table "customer"
#

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `cid` int(8) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone_num` int(10) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "customer"
#

INSERT INTO `customer` VALUES (1,'Tyrone',1234567890);

<<<<<<< HEAD
=======
=======
# Date: 2017-03-29 15:24:52
# Generator: MySQL-Front 6.0  (Build 1.99)
>>>>>>> origin/master

>>>>>>> origin/master
>>>>>>> origin/master
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

<<<<<<< HEAD
INSERT INTO `department` VALUES ('Produce',2);
=======
INSERT INTO `department` VALUES ('Bakery',1);

#
# Structure for table "dependent"
#

DROP TABLE IF EXISTS `dependent`;
CREATE TABLE `dependent` (
  `name` varchar(255) NOT NULL DEFAULT '',
  `emp_id` int(8) NOT NULL,
  `relation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`name`,`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "dependent"
#

>>>>>>> origin/master

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
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "employee"
#


#
<<<<<<< HEAD
# Structure for table "makes"
#

DROP TABLE IF EXISTS `makes`;
CREATE TABLE `makes` (
  `cust_id` int(8) NOT NULL AUTO_INCREMENT,
  `trans_id` int(8) DEFAULT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "makes"
=======
# Structure for table "gives_feedback"
#

DROP TABLE IF EXISTS `gives_feedback`;
CREATE TABLE `gives_feedback` (
  `cust_id` int(8) NOT NULL,
  `dep_name` varchar(255) NOT NULL,
  `rating` int(10) DEFAULT NULL,
  `feedback` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cust_id`,`dep_name`),
  KEY `cust_id_fk` (`cust_id`),
  KEY `dep_name_fk` (`dep_name`),
  CONSTRAINT `cust_id_fk` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cid`),
  CONSTRAINT `dep_name_fk` FOREIGN KEY (`dep_name`) REFERENCES `department` (`dname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "gives_feedback"
>>>>>>> origin/master
#

INSERT INTO `gives_feedback` VALUES (1,'Produce',9,'Groceries ;)');

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
# Structure for table "product"
#

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `pid` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `sup_name` varchar(255) DEFAULT NULL,
  `wholesale_price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`pid`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "product"
#

INSERT INTO `product` VALUES (1,'Bread',NULL,NULL,NULL);

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

INSERT INTO `sells` VALUES ('Bakery',1);
=======
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "product"
#

>>>>>>> origin/master

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
  PRIMARY KEY (`shift_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "shift"
#


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "transaction"
#

