# Host: localhost  (Version 5.7.17-log)
# Date: 2017-04-09 17:05:03
# Generator: MySQL-Front 6.0  (Build 1.100)


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
  `department` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pid`),
  KEY `sup_name_fk` (`sup_name`),
  KEY `department` (`department`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`department`) REFERENCES `sells` (`dep_name`),
  CONSTRAINT `sup_name_fk` FOREIGN KEY (`sup_name`) REFERENCES `supplier` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

#
# Data for table "product"
#

INSERT INTO `product` VALUES (1,'Bread',3.70,'YumYumCuppies',1.50,'Bakery'),(2,'Instant Noodles (12 Pk)',11.99,'Snack Stocker Inc.',9.99,'Snacks'),(21,'Spicy Peas',3.99,'Pea Store',1.99,'Snacks'),(25,'Grape Soda',1.99,'PartyDrinkSupply',0.50,'Pop'),(27,'Cream Sode',1.99,'PartyDrinkSupply',0.50,'Pop');
