alter table gpt_hospital_cont_xref change column `hospital_dep_id`  `hospital_dept_id` smallint(6) unsigned DEFAULT NULL;
drop table gpt_hospital_service_xref;
CREATE TABLE `gpt_hospital_service_xref` (
  `hs_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `hospital_id` smallint(6) unsigned NOT NULL,
  `hospital_dept_id` smallint(6) unsigned DEFAULT NULL,
  `hospital_service_id` smallint(6) unsigned DEFAULT NULL,
  `active_flg` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`hs_id`),
  UNIQUE KEY `service_hospital_unique` (`hospital_id`,`hospital_service_id`,`hospital_dept_id`),
  KEY `fk_hospital_service_xref_hospital1_idx` (`hospital_id`),
  KEY `fk_hospital_service_xref_hospital_dept1_idx` (`hospital_dept_id`),
  KEY `fk_hospital_service_xref_hospital_service1_idx` (`hospital_service_id`),
  CONSTRAINT `fk_hospital_service_xref_hospital1` FOREIGN KEY (`hospital_id`) REFERENCES `gpt_hospital` (`hospital_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hospital_service_xref_hospital_dept1` FOREIGN KEY (`hospital_dept_id`) REFERENCES `gpt_hospital_dept` (`hospital_dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hospital_service_xref_hospital_service1` FOREIGN KEY (`hospital_service_id`) REFERENCES `gpt_hospital_service` (`hospital_service_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

alter table gpt_hospital_cont_xref drop foreign key fk_hospital_cont_xref_hospital1;