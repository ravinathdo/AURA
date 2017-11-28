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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `aura_user` */

insert  into `aura_user`(`id`,`fname`,`lname`,`gender`,`email`,`pword`,`mobile`,`regdatetime`,`role`) values (1,'admin','admin','male','a@gmail.com','*667F407DE7C6AD07358FA38DAED7828A72014B4E',993888,'2017-11-27 21:00:07','ADMIN');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
