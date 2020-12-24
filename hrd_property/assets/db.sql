/*
SQLyog Community v11.52 (64 bit)
MySQL - 10.1.32-MariaDB : Database - hrd
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hrd` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `hrd`;

/*Table structure for table `city` */

DROP TABLE IF EXISTS `city`;

CREATE TABLE `city` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(250) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `city` */

insert  into `city`(`c_id`,`city`,`status`,`created_at`,`updated_at`,`created_by`) values (1,'Hyderabad',1,'2020-12-24 10:18:39','2020-12-24 10:18:39',1),(2,'kadapa',1,'2020-12-24 10:18:47','2020-12-24 10:18:47',1);

/*Table structure for table `employee` */

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(12) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `org_password` varchar(250) DEFAULT NULL,
  `mobile_number` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `address` longtext,
  `profile_pic` varchar(250) DEFAULT NULL,
  `org_image` varchar(250) DEFAULT NULL,
  `status` int(12) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(12) DEFAULT NULL,
  `admin_id` int(12) DEFAULT NULL,
  `manager_id` int(12) DEFAULT NULL,
  `executives_id` int(12) DEFAULT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `employee` */

insert  into `employee`(`e_id`,`role_id`,`name`,`email`,`password`,`org_password`,`mobile_number`,`city`,`address`,`profile_pic`,`org_image`,`status`,`created_at`,`updated_at`,`created_by`,`admin_id`,`manager_id`,`executives_id`) values (1,1,'superadmin','superadmin@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,NULL,NULL,1,'2020-10-15 10:26:59','0000-00-00 00:00:00',NULL,NULL,NULL,NULL);

/*Table structure for table `properties` */

DROP TABLE IF EXISTS `properties`;

CREATE TABLE `properties` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_id` int(11) DEFAULT NULL,
  `property_name` varchar(250) DEFAULT NULL,
  `owner_name` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `type_of_property` varchar(250) DEFAULT NULL,
  `land` varchar(250) DEFAULT NULL,
  `p_cost` varchar(250) DEFAULT NULL,
  `specifications` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `p_status` int(11) DEFAULT '0' COMMENT '0=pending;1=accepted;2=rejected;3=sale;4=unsale;',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `executives_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `properties` */

/*Table structure for table `properties_imgs` */

DROP TABLE IF EXISTS `properties_imgs`;

CREATE TABLE `properties_imgs` (
  `p_i_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) DEFAULT NULL,
  `pics` varchar(250) DEFAULT NULL,
  `org_img_name` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  PRIMARY KEY (`p_i_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `properties_imgs` */

/*Table structure for table `property` */

DROP TABLE IF EXISTS `property`;

CREATE TABLE `property` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `property` varchar(250) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `property` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`r_id`,`role_name`,`status`,`created_at`) values (1,'Super Admin',1,'2020-08-08 20:03:45'),(2,'Admin',1,'2020-08-08 20:03:47'),(3,'Manager',1,'2020-08-08 20:03:49'),(4,'Executives',1,'2020-08-08 20:03:53');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
