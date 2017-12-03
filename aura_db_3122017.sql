/*
SQLyog Ultimate v8.55 
MySQL - 5.5.54 : Database - aura_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`aura_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `aura_db`;

/*Table structure for table `aura_item` */

DROP TABLE IF EXISTS `aura_item`;

CREATE TABLE `aura_item` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT '0.00',
  `available_qty` int(5) DEFAULT '0',
  `status` varchar(10) DEFAULT 'ACTIVE',
  `img_path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `aura_item` */

insert  into `aura_item`(`id`,`item_name`,`category`,`price`,`available_qty`,`status`,`img_path`) values (1,'Girls Frock','T-SHIRT','223333.00',107,'ACTIVE','124.jpg'),(2,'Women Silk Top','SHIRT','33445.00',0,'ACTIVE','124Z.jpg'),(3,'Frock','FROCK','1499.00',34,'ACTIVE','Kalla.jpg');

/*Table structure for table `aura_order` */

DROP TABLE IF EXISTS `aura_order`;

CREATE TABLE `aura_order` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `itemid` int(5) DEFAULT NULL,
  `userid` int(5) DEFAULT NULL,
  `order_qty` int(5) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `ordertime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `aura_order` */

insert  into `aura_order`(`id`,`itemid`,`userid`,`order_qty`,`status`,`ordertime`) values (1,2,3,2,'APPROVED','2017-12-02 18:33:57'),(2,2,3,2,'APPROVED','2017-12-02 18:36:00'),(3,2,3,2,'APPROVED','2017-12-03 22:23:07'),(4,2,3,4,'PENDING','2017-12-03 22:36:24');

/*Table structure for table `aura_sales` */

DROP TABLE IF EXISTS `aura_sales`;

CREATE TABLE `aura_sales` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `userid` int(5) DEFAULT NULL,
  `itemid` int(5) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `item_price` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `createdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `orderid` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `aura_sales` */

insert  into `aura_sales`(`id`,`userid`,`itemid`,`qty`,`item_price`,`total`,`createdtime`,`orderid`) values (1,1,2,4,'33445.00','133780.00','2017-12-02 16:43:39',NULL),(2,3,1,111,'223333.00','24789963.00','2017-12-03 21:05:44',NULL),(3,3,1,111,'223333.00','24789963.00','2017-12-03 21:05:46',NULL),(4,3,1,3,'111.00','669999.00','2017-12-03 22:22:45',NULL),(5,3,1,3,'111.00','669999.00','2017-12-03 22:22:47',NULL),(6,3,1,2,'223333.00','446666.00','2017-12-03 22:24:32',NULL),(7,3,1,2,'223333.00','446666.00','2017-12-03 22:24:33',NULL),(8,3,1,2,'223333.00','446666.00','2017-12-03 22:26:05',NULL),(9,3,1,2,'223333.00','446666.00','2017-12-03 22:36:03',NULL);

/*Table structure for table `aura_user` */

DROP TABLE IF EXISTS `aura_user`;

CREATE TABLE `aura_user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `pword` text,
  `mobile` int(20) DEFAULT NULL,
  `regdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `aura_user` */

insert  into `aura_user`(`id`,`fname`,`lname`,`gender`,`email`,`pword`,`mobile`,`regdatetime`,`role`) values (1,'admin','admin','male','admin@aura.lk','*4ACFE3202A5FF5CF467898FC58AAB1D615029441',715833470,'2017-11-27 21:00:07','ADMIN'),(2,'Kumara','Perera','MALE','sss@gg.com','*667F407DE7C6AD07358FA38DAED7828A72014B4E',715833470,'2017-12-02 17:54:22','CUSTOMER'),(3,'Ravinath','Fernando','MALE','ravi@gmail.com','*667F407DE7C6AD07358FA38DAED7828A72014B4E',715833470,'2017-12-02 18:09:20','CUSTOMER');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
