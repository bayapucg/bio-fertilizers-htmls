/*
SQLyog Community v11.52 (64 bit)
MySQL - 10.1.32-MariaDB : Database - bmw
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bmw` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bmw`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `mobile_number` varchar(250) DEFAULT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `address` text,
  `password` varchar(250) DEFAULT NULL,
  `org_password` varchar(250) DEFAULT NULL,
  `profile_pic` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`a_id`,`name`,`email`,`mobile_number`,`gender`,`address`,`password`,`org_password`,`profile_pic`,`status`,`created_at`,`updated_at`) values (1,'admin','admin@gmail.com','',NULL,NULL,'e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL,NULL);

/*Table structure for table `bill_invoice` */

DROP TABLE IF EXISTS `bill_invoice`;

CREATE TABLE `bill_invoice` (
  `b_i_id` int(12) NOT NULL AUTO_INCREMENT,
  `h_m_b_id` int(12) DEFAULT NULL,
  `hospital_name` longtext,
  `month_name` varchar(250) DEFAULT NULL,
  `year_name` varchar(250) DEFAULT NULL,
  `prev_balance_amount` varchar(250) DEFAULT NULL,
  `total_amount` varchar(250) DEFAULT NULL,
  `paid_amount` varchar(250) DEFAULT NULL,
  `pending_amount` varchar(250) DEFAULT NULL,
  `amount` varchar(250) DEFAULT NULL,
  `status` int(12) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(12) DEFAULT NULL,
  PRIMARY KEY (`b_i_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `bill_invoice` */

/*Table structure for table `district` */

DROP TABLE IF EXISTS `district`;

CREATE TABLE `district` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext,
  `status` int(12) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `district` */

/*Table structure for table `expenditure` */

DROP TABLE IF EXISTS `expenditure`;

CREATE TABLE `expenditure` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `district` varchar(250) DEFAULT NULL,
  `town` varchar(250) DEFAULT NULL,
  `particulars` longtext,
  `image` varchar(250) DEFAULT NULL,
  `org_image` varchar(250) DEFAULT NULL,
  `received_by` longtext,
  `amount` varchar(250) DEFAULT NULL,
  `payment_type` varchar(250) DEFAULT NULL,
  `trans_action_no` longtext,
  `cheque_no` longtext,
  `date` varchar(250) DEFAULT NULL,
  `status` int(12) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(12) DEFAULT NULL,
  `notification_status` int(12) DEFAULT '1' COMMENT '1=active;2=delete;3=edit;0=deactive;',
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB AUTO_INCREMENT=332 DEFAULT CHARSET=latin1;

/*Data for the table `expenditure` */

/*Table structure for table `hospital` */

DROP TABLE IF EXISTS `hospital`;

CREATE TABLE `hospital` (
  `h_id` int(11) NOT NULL AUTO_INCREMENT,
  `hospital_name` longtext,
  `hospital_type` varchar(250) DEFAULT NULL,
  `s_d_r` varchar(250) DEFAULT NULL,
  `e_d_r` varchar(250) DEFAULT NULL,
  `no_beds` varchar(250) DEFAULT NULL,
  `cost_per_month` varchar(250) DEFAULT NULL,
  `total_amount` varchar(250) DEFAULT NULL,
  `advance_fee` varchar(250) DEFAULT NULL,
  `district` varchar(250) DEFAULT NULL,
  `town` varchar(250) DEFAULT NULL,
  `hospital_address` longtext,
  `status` int(12) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(12) DEFAULT NULL,
  `notification_status` int(12) DEFAULT '1' COMMENT '1=active;2=delete;3=edit;0=deactive;',
  PRIMARY KEY (`h_id`)
) ENGINE=InnoDB AUTO_INCREMENT=923 DEFAULT CHARSET=latin1;

/*Data for the table `hospital` */

/*Table structure for table `hospital_mothly_bill` */

DROP TABLE IF EXISTS `hospital_mothly_bill`;

CREATE TABLE `hospital_mothly_bill` (
  `h_m_b_id` int(11) NOT NULL AUTO_INCREMENT,
  `hospital_types` longtext,
  `cnt` int(11) DEFAULT '1',
  `hospital` varchar(250) DEFAULT NULL,
  `month` varchar(250) DEFAULT NULL,
  `month_name` varchar(250) DEFAULT NULL,
  `no_beds` varchar(250) DEFAULT NULL,
  `cost_per_month` varchar(250) DEFAULT NULL,
  `total_amount` varchar(250) DEFAULT NULL,
  `year` varchar(250) DEFAULT NULL,
  `status` int(12) DEFAULT '1',
  `date` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(12) DEFAULT NULL,
  `notification_status` int(12) DEFAULT '1' COMMENT '1=active;2=delete;3=edit;0=deactive;',
  PRIMARY KEY (`h_m_b_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2017 DEFAULT CHARSET=latin1;

/*Data for the table `hospital_mothly_bill` */

/*Table structure for table `months` */

DROP TABLE IF EXISTS `months`;

CREATE TABLE `months` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `months` varchar(250) DEFAULT NULL,
  `status` int(12) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(12) DEFAULT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `months` */

/*Table structure for table `notifications_list` */

DROP TABLE IF EXISTS `notifications_list`;

CREATE TABLE `notifications_list` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(12) DEFAULT NULL,
  `h_id` int(12) DEFAULT NULL,
  `h_m_b_id` int(12) DEFAULT NULL,
  `p_id` int(12) DEFAULT NULL,
  `e_id` int(12) DEFAULT NULL,
  `notification_status` int(12) DEFAULT '1',
  `readcount` int(12) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1138 DEFAULT CHARSET=latin1;

/*Data for the table `notifications_list` */

insert  into `notifications_list`(`n_id`,`s_id`,`h_id`,`h_m_b_id`,`p_id`,`e_id`,`notification_status`,`readcount`,`created_at`,`updated_at`,`created_by`) values (1135,NULL,NULL,NULL,1,NULL,2,0,NULL,'2020-11-03 12:53:03',1),(1136,NULL,NULL,NULL,1,NULL,2,0,NULL,'2020-11-03 12:54:58',1),(1137,6,NULL,NULL,NULL,NULL,3,0,NULL,'2020-11-03 13:07:25',1);

/*Table structure for table `payments` */

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `h_m_b_id` int(12) DEFAULT NULL,
  `s_id` int(12) DEFAULT NULL,
  `hospital` varchar(250) DEFAULT NULL,
  `month_name` varchar(250) DEFAULT NULL,
  `m_name` varchar(250) DEFAULT NULL,
  `investment_amount` varchar(250) DEFAULT NULL,
  `year` varchar(250) DEFAULT NULL,
  `hospitals_name` longtext,
  `months_names` varchar(250) DEFAULT NULL,
  `year_name` varchar(250) DEFAULT NULL,
  `sales_person` varchar(250) DEFAULT NULL,
  `total_amount` varchar(250) DEFAULT NULL,
  `pending_amount` varchar(250) DEFAULT NULL,
  `paid_amount` varchar(250) DEFAULT NULL,
  `discount` varchar(250) DEFAULT NULL,
  `paid_money` varchar(250) DEFAULT NULL,
  `payment_type` longtext,
  `trans_action_no` longtext,
  `cheque_no` longtext,
  `status` int(12) DEFAULT '1' COMMENT '1=sucess;0=pending;2=delete;3=unclear;',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cheque_updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  `notification_status` int(12) DEFAULT '1' COMMENT '1=active;2=delete;3=edit;0=deactive;',
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `payments` */

insert  into `payments`(`p_id`,`h_m_b_id`,`s_id`,`hospital`,`month_name`,`m_name`,`investment_amount`,`year`,`hospitals_name`,`months_names`,`year_name`,`sales_person`,`total_amount`,`pending_amount`,`paid_amount`,`discount`,`paid_money`,`payment_type`,`trans_action_no`,`cheque_no`,`status`,`created_at`,`updated_at`,`cheque_updated_at`,`created_by`,`notification_status`) values (1,NULL,6,NULL,NULL,NULL,'10',NULL,'Investment','3','2020','sankar','0',NULL,NULL,NULL,NULL,'1','trans123456','cheq456789',2,'2020-11-03 12:54:58','2020-11-03 12:54:58',NULL,1,2);

/*Table structure for table `salespersons` */

DROP TABLE IF EXISTS `salespersons`;

CREATE TABLE `salespersons` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `org_password` varchar(250) DEFAULT NULL,
  `mobile_number` longtext,
  `alt_mobile_number` varchar(250) DEFAULT NULL,
  `aadhar_number` varchar(250) DEFAULT NULL,
  `qualification` longtext,
  `dob` varchar(250) DEFAULT NULL,
  `address` longtext,
  `status` int(12) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(12) DEFAULT NULL,
  `otp` text,
  `opt_created_at` timestamp NULL DEFAULT NULL,
  `notification_status` int(12) DEFAULT '1' COMMENT '1=active;2=delete;3=edit;0=deactive;',
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `salespersons` */

insert  into `salespersons`(`s_id`,`name`,`email`,`password`,`org_password`,`mobile_number`,`alt_mobile_number`,`aadhar_number`,`qualification`,`dob`,`address`,`status`,`created_at`,`updated_at`,`created_by`,`otp`,`opt_created_at`,`notification_status`) values (6,'siva','siva@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','7013319036','9874563211','1225852222222','degree','2020-11-27','hyderabad',1,'2020-11-03 13:07:25','2020-11-03 13:07:25',1,NULL,NULL,3),(7,'pal','pal@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','9874563211','8099010155','122575744635656','degree','2020-11-28','hyderabad',1,'2020-11-03 13:06:41','2020-11-03 13:06:41',1,NULL,NULL,1);

/*Table structure for table `town` */

DROP TABLE IF EXISTS `town`;

CREATE TABLE `town` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `district_name` varchar(250) DEFAULT NULL,
  `town_name` longtext,
  `status` int(12) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(12) DEFAULT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `town` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
