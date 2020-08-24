/*
SQLyog Community v11.52 (64 bit)
MySQL - 10.1.32-MariaDB : Database - bio_fertilizers
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bio_fertilizers` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bio_fertilizers`;

/*Table structure for table `employee` */

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(12) DEFAULT NULL,
  `name` text,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `org_password` varchar(250) DEFAULT NULL,
  `mobile_number` varchar(250) DEFAULT NULL,
  `alt_mobile_number` varchar(250) DEFAULT NULL,
  `age` varchar(250) DEFAULT NULL,
  `experience` varchar(250) DEFAULT NULL,
  `location` longtext,
  `dob` varchar(250) DEFAULT NULL,
  `profile_pic` varchar(250) DEFAULT NULL,
  `org_image` varchar(250) DEFAULT NULL,
  `status` int(12) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(12) DEFAULT NULL,
  `admin_id` int(12) DEFAULT NULL,
  `manager_id` int(12) DEFAULT NULL,
  `group_leader` int(12) DEFAULT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `employee` */

insert  into `employee`(`e_id`,`role_id`,`name`,`email`,`password`,`org_password`,`mobile_number`,`alt_mobile_number`,`age`,`experience`,`location`,`dob`,`profile_pic`,`org_image`,`status`,`created_at`,`updated_at`,`created_by`,`admin_id`,`manager_id`,`group_leader`) values (1,1,'super admin','superadmin@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','9874563211','9874563211','25','10','Tirupati','2020-08-28','1598286779.jpeg','1589514780.jpeg',1,'2020-08-24 22:04:05','2020-08-24 22:04:05',NULL,NULL,NULL,NULL);

/*Table structure for table `expenses` */

DROP TABLE IF EXISTS `expenses`;

CREATE TABLE `expenses` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(12) DEFAULT NULL,
  `st_se_name` longtext,
  `abm_tm_name` longtext,
  `month` varchar(250) DEFAULT NULL,
  `branch` text,
  `status` int(12) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  `admin_id` int(12) DEFAULT NULL,
  `manager_id` int(12) DEFAULT NULL,
  `group_leader` int(12) DEFAULT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `expenses` */

/*Table structure for table `expenses_data` */

DROP TABLE IF EXISTS `expenses_data`;

CREATE TABLE `expenses_data` (
  `e_d_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_id` int(12) DEFAULT NULL,
  `role_id` int(12) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `received_amount` varchar(250) DEFAULT NULL,
  `cumulative_amount` varchar(250) DEFAULT NULL,
  `sign` varchar(250) DEFAULT NULL,
  `org_sign` varchar(250) DEFAULT NULL,
  `status` int(12) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  `admin_id` int(12) DEFAULT NULL,
  `manager_id` int(12) DEFAULT NULL,
  `group_leader` int(12) DEFAULT NULL,
  PRIMARY KEY (`e_d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `expenses_data` */

/*Table structure for table `gl_payment` */

DROP TABLE IF EXISTS `gl_payment`;

CREATE TABLE `gl_payment` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(12) DEFAULT NULL,
  `st_se_name` longtext,
  `camp` text,
  `gm_tm_name` longtext,
  `date` varchar(250) DEFAULT NULL,
  `branch_name` text,
  `status` int(12) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  `admin_id` int(12) DEFAULT NULL,
  `manager_id` int(12) DEFAULT NULL,
  `group_leader` int(12) DEFAULT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gl_payment` */

/*Table structure for table `gl_payment_data` */

DROP TABLE IF EXISTS `gl_payment_data`;

CREATE TABLE `gl_payment_data` (
  `g_d_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_id` int(12) DEFAULT NULL,
  `role_id` int(12) DEFAULT NULL,
  `customer_name` longtext,
  `order_no` varchar(250) DEFAULT NULL,
  `booking_date` varchar(250) DEFAULT NULL,
  `advance` varchar(250) DEFAULT NULL,
  `signature` varchar(250) DEFAULT NULL,
  `org_signature` varchar(250) DEFAULT NULL,
  `village` text,
  `branch` varchar(250) DEFAULT NULL,
  `cell` varchar(250) DEFAULT NULL,
  `units` varchar(250) DEFAULT NULL,
  `status` int(12) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  `admin_id` int(12) DEFAULT NULL,
  `manager_id` int(12) DEFAULT NULL,
  `group_leader` int(12) DEFAULT NULL,
  PRIMARY KEY (`g_d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gl_payment_data` */

/*Table structure for table `godown_stock` */

DROP TABLE IF EXISTS `godown_stock`;

CREATE TABLE `godown_stock` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(12) DEFAULT NULL,
  `name_of_gl` varchar(250) DEFAULT NULL,
  `month` varchar(250) DEFAULT NULL,
  `branch` text,
  `status` int(12) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  `admin_id` int(12) DEFAULT NULL,
  `manager_id` int(12) DEFAULT NULL,
  `group_leader` int(12) DEFAULT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `godown_stock` */

/*Table structure for table `godown_stock_data` */

DROP TABLE IF EXISTS `godown_stock_data`;

CREATE TABLE `godown_stock_data` (
  `g_d_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_id` int(12) DEFAULT NULL,
  `role_id` int(12) DEFAULT NULL,
  `issue_date` varchar(250) DEFAULT NULL,
  `grovin` varchar(250) DEFAULT NULL,
  `free` varchar(250) DEFAULT NULL,
  `3g` varchar(250) DEFAULT NULL,
  `neem` varchar(250) DEFAULT NULL,
  `neem_oil` varchar(250) DEFAULT NULL,
  `ss` varchar(250) DEFAULT NULL,
  `mic` varchar(250) DEFAULT NULL,
  `action` varchar(250) DEFAULT NULL,
  `corax` varchar(250) DEFAULT NULL,
  `bkts` varchar(250) DEFAULT NULL,
  `fatra` varchar(250) DEFAULT NULL,
  `terror` varchar(250) DEFAULT NULL,
  `status` int(12) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  `admin_id` int(12) DEFAULT NULL,
  `manager_id` int(12) DEFAULT NULL,
  `group_leader` int(12) DEFAULT NULL,
  PRIMARY KEY (`g_d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `godown_stock_data` */

/*Table structure for table `order_cum_invoice` */

DROP TABLE IF EXISTS `order_cum_invoice`;

CREATE TABLE `order_cum_invoice` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(12) DEFAULT NULL,
  `name_of_gl` longtext,
  `name_of_abm` longtext,
  `status` int(12) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(12) DEFAULT NULL,
  `admin_id` int(12) DEFAULT NULL,
  `manager_id` int(12) DEFAULT NULL,
  `group_leader` int(12) DEFAULT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `order_cum_invoice` */

/*Table structure for table `order_cum_invoice_data` */

DROP TABLE IF EXISTS `order_cum_invoice_data`;

CREATE TABLE `order_cum_invoice_data` (
  `o_d_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_id` int(12) DEFAULT NULL,
  `role_id` int(12) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `order_no` varchar(250) DEFAULT NULL,
  `name_of_sales_executive` longtext,
  `signature_gl_abm` varchar(250) DEFAULT NULL,
  `org_signature` varchar(250) DEFAULT NULL,
  `invoice_doc` varchar(250) DEFAULT NULL,
  `units` varchar(250) DEFAULT NULL,
  `status` int(12) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  `admin_id` int(12) DEFAULT NULL,
  `manager_id` int(12) DEFAULT NULL,
  `group_leader` int(12) DEFAULT NULL,
  PRIMARY KEY (`o_d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `order_cum_invoice_data` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`r_id`,`role_name`,`status`,`created_at`) values (1,'Super Admin',1,'2020-08-08 20:03:45'),(2,'Admin',1,'2020-08-08 20:03:47'),(3,'Assistant Branch Manager',1,'2020-08-08 20:03:49'),(4,'Group Leader',1,'2020-08-08 20:03:51'),(5,'Executives',1,'2020-08-08 20:03:53');

/*Table structure for table `sales_bulletin` */

DROP TABLE IF EXISTS `sales_bulletin`;

CREATE TABLE `sales_bulletin` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(12) DEFAULT NULL,
  `name_of_gl` varchar(250) DEFAULT NULL,
  `grovin` varchar(250) DEFAULT NULL,
  `free` varchar(250) DEFAULT NULL,
  `3g` varchar(250) DEFAULT NULL,
  `neem` varchar(250) DEFAULT NULL,
  `neem_oil` varchar(250) DEFAULT NULL,
  `ss` varchar(250) DEFAULT NULL,
  `mic` varchar(250) DEFAULT NULL,
  `action` varchar(250) DEFAULT NULL,
  `corax` varchar(250) DEFAULT NULL,
  `bkts` varchar(250) DEFAULT NULL,
  `fatra` varchar(250) DEFAULT NULL,
  `terror` varchar(250) DEFAULT NULL,
  `total_units` varchar(250) DEFAULT NULL,
  `status` int(12) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  `admin_id` int(12) DEFAULT NULL,
  `manager_id` int(12) DEFAULT NULL,
  `group_leader` int(12) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sales_bulletin` */

/*Table structure for table `stock` */

DROP TABLE IF EXISTS `stock`;

CREATE TABLE `stock` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(12) DEFAULT NULL,
  `name_of_gl` varchar(250) DEFAULT NULL,
  `month` varchar(250) DEFAULT NULL,
  `branch` text,
  `status` int(12) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  `admin_id` int(12) DEFAULT NULL,
  `manager_id` int(12) DEFAULT NULL,
  `group_leader` int(12) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `stock` */

/*Table structure for table `stock_data` */

DROP TABLE IF EXISTS `stock_data`;

CREATE TABLE `stock_data` (
  `s_d_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(12) DEFAULT NULL,
  `role_id` int(12) DEFAULT NULL,
  `issue_date` varchar(250) DEFAULT NULL,
  `grovin` varchar(250) DEFAULT NULL,
  `free` varchar(250) DEFAULT NULL,
  `3g` varchar(250) DEFAULT NULL,
  `neem` varchar(250) DEFAULT NULL,
  `neem_oil` varchar(250) DEFAULT NULL,
  `ss` varchar(250) DEFAULT NULL,
  `mic` varchar(250) DEFAULT NULL,
  `action` varchar(250) DEFAULT NULL,
  `corax` varchar(250) DEFAULT NULL,
  `bkts` varchar(250) DEFAULT NULL,
  `fatra` varchar(250) DEFAULT NULL,
  `terror` varchar(250) DEFAULT NULL,
  `status` int(12) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  `admin_id` int(12) DEFAULT NULL,
  `manager_id` int(12) DEFAULT NULL,
  `group_leader` int(12) DEFAULT NULL,
  PRIMARY KEY (`s_d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `stock_data` */

/*Table structure for table `transfer_to_other_camps` */

DROP TABLE IF EXISTS `transfer_to_other_camps`;

CREATE TABLE `transfer_to_other_camps` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(12) DEFAULT NULL,
  `name_of_gl` varchar(250) DEFAULT NULL,
  `month` varchar(250) DEFAULT NULL,
  `branch` text,
  `status` int(12) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  `admin_id` int(12) DEFAULT NULL,
  `manager_id` int(12) DEFAULT NULL,
  `group_leader` int(12) DEFAULT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `transfer_to_other_camps` */

/*Table structure for table `transfer_to_other_camps_data` */

DROP TABLE IF EXISTS `transfer_to_other_camps_data`;

CREATE TABLE `transfer_to_other_camps_data` (
  `t_d_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_id` int(12) DEFAULT NULL,
  `role_id` int(12) DEFAULT NULL,
  `issue_date` varchar(250) DEFAULT NULL,
  `grovin` varchar(250) DEFAULT NULL,
  `free` varchar(250) DEFAULT NULL,
  `3g` varchar(250) DEFAULT NULL,
  `neem` varchar(250) DEFAULT NULL,
  `neem_oil` varchar(250) DEFAULT NULL,
  `ss` varchar(250) DEFAULT NULL,
  `mic` varchar(250) DEFAULT NULL,
  `action` varchar(250) DEFAULT NULL,
  `corax` varchar(250) DEFAULT NULL,
  `bkts` varchar(250) DEFAULT NULL,
  `fatra` varchar(250) DEFAULT NULL,
  `terror` varchar(250) DEFAULT NULL,
  `status` int(12) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  `admin_id` int(12) DEFAULT NULL,
  `manager_id` int(12) DEFAULT NULL,
  `group_leader` int(12) DEFAULT NULL,
  PRIMARY KEY (`t_d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `transfer_to_other_camps_data` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
