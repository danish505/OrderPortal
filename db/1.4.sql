alter table gpt_company drop key hospital_name_UNIQUE;
alter table gpt_company drop column status_id;

alter table gpt_hospital drop key hospital_name_UNIQUE;
alter table gpt_hospital drop column status_id;
alter table `gpt_hospital_contact` add column `hospital_id` smallint(6) unsigned DEFAULT NULL after cont_id;
alter table `gpt_hospital_contact` add KEY `fk_contact_hospital1_idx` (`hospital_id`), add CONSTRAINT `fk_contact_hospital1` FOREIGN KEY (`hospital_id`) REFERENCES `gpt_hospital` (`hospital_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;