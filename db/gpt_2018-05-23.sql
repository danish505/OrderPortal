# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.33-MariaDB-1~jessie)
# Database: gpt
# Generation Time: 2018-05-23 08:32:23 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table gpt_company
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_company`;

CREATE TABLE `gpt_company` (
  `svc_comp_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) DEFAULT NULL,
  `company_Type` varchar(100) DEFAULT NULL COMMENT 'Hospital Types ( General, District, Specialised, Teaching and Clinic )',
  `company_url` varchar(1000) DEFAULT NULL,
  `status_id` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `last_verified_dt` timestamp NULL DEFAULT NULL,
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`svc_comp_id`,`status_id`),
  UNIQUE KEY `hospital_name_UNIQUE` (`company_name`),
  KEY `fk_patient_status1_idx_idx` (`status_id`),
  CONSTRAINT `fk_patient_status1_idx` FOREIGN KEY (`status_id`) REFERENCES `gpt_company_status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_company_contact
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_company_contact`;

CREATE TABLE `gpt_company_contact` (
  `cont_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `svc_comp_id` smallint(6) unsigned DEFAULT NULL,
  `salutation` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `job_fuction` varchar(100) DEFAULT NULL,
  `job_role` varchar(100) DEFAULT NULL,
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cont_id`),
  KEY `fk_contact_company1_idx` (`svc_comp_id`),
  CONSTRAINT `fk_contact_company1` FOREIGN KEY (`svc_comp_id`) REFERENCES `gpt_company` (`svc_comp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_company_contact_address
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_company_contact_address`;

CREATE TABLE `gpt_company_contact_address` (
  `address_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `cont_id` smallint(6) unsigned DEFAULT NULL,
  `street_addr_1` varchar(200) DEFAULT NULL,
  `street_addr_2` varchar(100) DEFAULT NULL,
  `street_addr_3` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zipcode` varchar(6) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `primary_flg` tinyint(1) unsigned DEFAULT '0',
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`address_id`),
  KEY `fk_address_contact1_idx` (`cont_id`),
  CONSTRAINT `fk_address_contact1` FOREIGN KEY (`cont_id`) REFERENCES `gpt_company_contact` (`cont_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_company_contact_email
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_company_contact_email`;

CREATE TABLE `gpt_company_contact_email` (
  `email_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `cont_id` smallint(6) unsigned DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `primary_flg` tinyint(1) unsigned DEFAULT '0',
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`email_id`),
  KEY `fk_email_contact1_idx` (`cont_id`),
  CONSTRAINT `fk_email_contact1` FOREIGN KEY (`cont_id`) REFERENCES `gpt_company_contact` (`cont_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_company_contact_phone
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_company_contact_phone`;

CREATE TABLE `gpt_company_contact_phone` (
  `phone_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `cont_id` smallint(6) unsigned DEFAULT NULL,
  `ctry_cd` varchar(3) DEFAULT NULL,
  `area_cd` varchar(6) DEFAULT NULL,
  `phone_no` varchar(11) DEFAULT NULL,
  `extension` varchar(6) DEFAULT NULL,
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `primary_flg` tinyint(1) unsigned DEFAULT '0',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`phone_id`),
  KEY `fk_phone_contact1_idx` (`cont_id`),
  CONSTRAINT `fk_phone_contact1` FOREIGN KEY (`cont_id`) REFERENCES `gpt_company_contact` (`cont_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_company_service
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_company_service`;

CREATE TABLE `gpt_company_service` (
  `service_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `svc_comp_id` smallint(6) unsigned NOT NULL,
  `service_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `service_category` varchar(100) DEFAULT NULL,
  `service_sub_category` varchar(100) DEFAULT NULL,
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`service_id`),
  KEY `fk_service_company_idx` (`svc_comp_id`),
  CONSTRAINT `fk_service_company` FOREIGN KEY (`svc_comp_id`) REFERENCES `gpt_company` (`svc_comp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_company_status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_company_status`;

CREATE TABLE `gpt_company_status` (
  `status_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(100) DEFAULT NULL,
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_hospital
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_hospital`;

CREATE TABLE `gpt_hospital` (
  `hospital_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `hospital_name` varchar(100) DEFAULT NULL,
  `hospital_type` varchar(100) DEFAULT NULL COMMENT 'Hospital Types ( General, District, Specialised, Teaching and Clinic )',
  `hospital_url` varchar(1000) DEFAULT NULL,
  `status_id` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `last_verified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`hospital_id`,`status_id`),
  UNIQUE KEY `hospital_name_UNIQUE` (`hospital_name`),
  KEY `fk_hospital_status1_idx` (`status_id`),
  CONSTRAINT `fk_hospital_status1` FOREIGN KEY (`status_id`) REFERENCES `gpt_hospital_status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_hospital_affiliate_xref
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_hospital_affiliate_xref`;

CREATE TABLE `gpt_hospital_affiliate_xref` (
  `affiliate_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `hospital_id` smallint(6) unsigned NOT NULL,
  `affiliate_hospital_id` smallint(6) unsigned NOT NULL,
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`affiliate_id`),
  UNIQUE KEY `affiliate_id` (`hospital_id`,`affiliate_hospital_id`),
  KEY `fk_hospital_id_idx` (`hospital_id`),
  CONSTRAINT `fk_aff_hospital_id` FOREIGN KEY (`hospital_id`) REFERENCES `gpt_hospital` (`hospital_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_hospital_cont_xref
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_hospital_cont_xref`;

CREATE TABLE `gpt_hospital_cont_xref` (
  `hc_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `cont_id` smallint(6) unsigned NOT NULL,
  `hospital_id` smallint(6) unsigned NOT NULL,
  `hospital_dep_id` smallint(6) unsigned DEFAULT NULL,
  `primary_flg` tinyint(1) unsigned DEFAULT '0',
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`hc_id`),
  UNIQUE KEY `contact_hospital_unique` (`cont_id`,`hospital_id`,`hospital_dep_id`),
  KEY `fk_hospital_cont_xref_contact1_idx` (`cont_id`),
  KEY `fk_hospital_cont_xref_hospital1_idx` (`hospital_id`),
  KEY `fk_hospital_cont_xref_hospital_dept1_idx` (`hospital_dep_id`),
  CONSTRAINT `fk_hospital_cont_xref_contact1` FOREIGN KEY (`cont_id`) REFERENCES `gpt_hospital_contact` (`cont_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hospital_cont_xref_hospital1` FOREIGN KEY (`hospital_id`) REFERENCES `gpt_hospital` (`hospital_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hospital_cont_xref_hospital_dept1` FOREIGN KEY (`hospital_dep_id`) REFERENCES `gpt_hospital_dept` (`hospital_dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_hospital_contact
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_hospital_contact`;

CREATE TABLE `gpt_hospital_contact` (
  `cont_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `salutation` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `job_fuction` varchar(100) DEFAULT NULL,
  `job_role` varchar(100) DEFAULT NULL,
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cont_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_hospital_contact_address
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_hospital_contact_address`;

CREATE TABLE `gpt_hospital_contact_address` (
  `address_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `cont_id` smallint(6) unsigned DEFAULT NULL,
  `street_addr_1` varchar(200) DEFAULT NULL,
  `street_addr_2` varchar(100) DEFAULT NULL,
  `street_addr_3` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zipcode` smallint(6) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `primary_flg` tinyint(4) unsigned DEFAULT '0',
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`address_id`),
  KEY `fk_address_cont_id_idx` (`cont_id`),
  CONSTRAINT `fk_address_cont_id` FOREIGN KEY (`cont_id`) REFERENCES `gpt_hospital_contact` (`cont_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_hospital_contact_email
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_hospital_contact_email`;

CREATE TABLE `gpt_hospital_contact_email` (
  `email_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `cont_id` smallint(6) unsigned DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `primary_flg` tinyint(4) unsigned DEFAULT '0',
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`email_id`),
  KEY `fk_email_cont_id_idx` (`cont_id`),
  CONSTRAINT `fk_email_cont_id` FOREIGN KEY (`cont_id`) REFERENCES `gpt_hospital_contact` (`cont_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_hospital_contact_phone
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_hospital_contact_phone`;

CREATE TABLE `gpt_hospital_contact_phone` (
  `phone_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `cont_id` smallint(6) unsigned DEFAULT NULL,
  `ctry_cd` varchar(3) DEFAULT NULL,
  `area_cd` varchar(6) DEFAULT NULL,
  `phone_no` varchar(11) DEFAULT NULL,
  `extension` varchar(6) DEFAULT NULL,
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `primary_flg` tinyint(1) unsigned DEFAULT '0',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`phone_id`),
  KEY `fk_phone_cont_id_idx` (`cont_id`),
  CONSTRAINT `fk_phone_cont_id` FOREIGN KEY (`cont_id`) REFERENCES `gpt_hospital_contact` (`cont_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_hospital_dept
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_hospital_dept`;

CREATE TABLE `gpt_hospital_dept` (
  `hospital_dept_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `hospital_dept_name` varchar(500) DEFAULT NULL,
  `active_flg` tinyint(1) NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`hospital_dept_id`),
  UNIQUE KEY `hospital_dept` (`hospital_dept_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_hospital_dept_xref
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_hospital_dept_xref`;

CREATE TABLE `gpt_hospital_dept_xref` (
  `hd_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `hospital_dept_id` smallint(6) unsigned NOT NULL DEFAULT '1',
  `hospital_id` smallint(6) unsigned NOT NULL,
  `primary_flg` tinyint(1) unsigned DEFAULT '0',
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`hd_id`),
  UNIQUE KEY `hd_uq_id` (`hospital_dept_id`,`hospital_id`),
  KEY `fk_hospital_dept_xref_hospital1_idx` (`hospital_id`),
  CONSTRAINT `fk_hospital_dept_xref_hospital1` FOREIGN KEY (`hospital_id`) REFERENCES `gpt_hospital` (`hospital_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hospital_dept_xref_hospital_dept1` FOREIGN KEY (`hospital_dept_id`) REFERENCES `gpt_hospital_dept` (`hospital_dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_hospital_service
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_hospital_service`;

CREATE TABLE `gpt_hospital_service` (
  `hospital_service_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `service_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `service_category` varchar(100) DEFAULT NULL,
  `service_sub_category` varchar(100) DEFAULT NULL,
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`hospital_service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_hospital_service_xref
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_hospital_service_xref`;

CREATE TABLE `gpt_hospital_service_xref` (
  `hs_id` smallint(6) unsigned NOT NULL,
  `hospital_dept_id` smallint(6) unsigned DEFAULT NULL,
  `hospital_service_id` smallint(6) unsigned DEFAULT NULL,
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`hs_id`),
  KEY `fk_hospital_service_xref_hospital_dept1_idx` (`hospital_dept_id`),
  KEY `fk_hospital_service_xref_hospital_service1_idx` (`hospital_service_id`),
  CONSTRAINT `fk_hospital_service_xref_hospital_dept1` FOREIGN KEY (`hospital_dept_id`) REFERENCES `gpt_hospital_dept` (`hospital_dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hospital_service_xref_hospital_service1` FOREIGN KEY (`hospital_service_id`) REFERENCES `gpt_hospital_service` (`hospital_service_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_hospital_status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_hospital_status`;

CREATE TABLE `gpt_hospital_status` (
  `status_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(100) DEFAULT NULL,
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_patient
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_patient`;

CREATE TABLE `gpt_patient` (
  `patient_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `salutation` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `age` tinyint(3) unsigned DEFAULT NULL,
  `status_id` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`patient_id`,`status_id`),
  KEY `fk_patient_status1_idx` (`status_id`),
  CONSTRAINT `fk_patient_status1` FOREIGN KEY (`status_id`) REFERENCES `gpt_patient_status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_patient_contact
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_patient_contact`;

CREATE TABLE `gpt_patient_contact` (
  `patient_cont_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` smallint(6) unsigned DEFAULT NULL,
  `salutation` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `primary_flg` tinyint(1) unsigned DEFAULT '0',
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`patient_cont_id`),
  KEY `fk_patient_id_idx` (`patient_id`),
  CONSTRAINT `fk_patient_id` FOREIGN KEY (`patient_id`) REFERENCES `gpt_patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_patient_contact_address
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_patient_contact_address`;

CREATE TABLE `gpt_patient_contact_address` (
  `address_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `patient_cont_id` smallint(6) unsigned DEFAULT NULL,
  `street_addr_1` varchar(200) DEFAULT NULL,
  `street_addr_2` varchar(100) DEFAULT NULL,
  `street_addr_3` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zipcode` smallint(6) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `primary_flg` tinyint(1) unsigned DEFAULT '0',
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`address_id`),
  KEY `fk_address_patient_contact1_idx` (`patient_cont_id`),
  CONSTRAINT `fk_address_patient_contact1` FOREIGN KEY (`patient_cont_id`) REFERENCES `gpt_patient_contact` (`patient_cont_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_patient_contact_email
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_patient_contact_email`;

CREATE TABLE `gpt_patient_contact_email` (
  `email_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `patient_cont_id` smallint(6) unsigned DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `primary_flg` tinyint(1) unsigned DEFAULT '0',
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`email_id`),
  KEY `fk_email_patient_contact1_idx` (`patient_cont_id`),
  CONSTRAINT `fk_email_patient_contact1` FOREIGN KEY (`patient_cont_id`) REFERENCES `gpt_patient_contact` (`patient_cont_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_patient_hospital_pref
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_patient_hospital_pref`;

CREATE TABLE `gpt_patient_hospital_pref` (
  `h_pref_id` smallint(6) unsigned NOT NULL,
  `patient_id` smallint(6) unsigned NOT NULL,
  `hospital_id` smallint(6) unsigned DEFAULT NULL,
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`h_pref_id`),
  KEY `fk_hospital_pref_patient_idx` (`patient_id`),
  KEY `fk_hospital_svc_patient_idx` (`hospital_id`),
  CONSTRAINT `fk_hospital_pref_patient_id` FOREIGN KEY (`patient_id`) REFERENCES `gpt_patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_patient_phone
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_patient_phone`;

CREATE TABLE `gpt_patient_phone` (
  `phone_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `patient_cont_id` smallint(6) unsigned DEFAULT NULL,
  `ctry_cd` varchar(3) DEFAULT NULL,
  `area_cd` varchar(6) DEFAULT NULL,
  `phone_no` varchar(11) DEFAULT NULL,
  `extension` varchar(6) DEFAULT NULL,
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `primary_flg` tinyint(1) unsigned DEFAULT '0',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`phone_id`),
  KEY `fk_phone_patient_contact1_idx` (`patient_cont_id`),
  CONSTRAINT `fk_phone_patient_contact1` FOREIGN KEY (`patient_cont_id`) REFERENCES `gpt_patient_contact` (`patient_cont_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_patient_service
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_patient_service`;

CREATE TABLE `gpt_patient_service` (
  `hs_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `hospital_id` smallint(6) unsigned DEFAULT NULL,
  `service_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `service_category` varchar(100) DEFAULT NULL,
  `service_sub_category` varchar(100) DEFAULT NULL,
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`hs_id`),
  KEY `fk_patient_service_hospital_pref_idx` (`hospital_id`),
  CONSTRAINT `fk_patient_service_hospital_pref` FOREIGN KEY (`hospital_id`) REFERENCES `gpt_patient_hospital_pref` (`hospital_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gpt_patient_status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gpt_patient_status`;

CREATE TABLE `gpt_patient_status` (
  `status_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(100) DEFAULT NULL,
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
