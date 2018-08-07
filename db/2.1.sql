alter table `gpt_patient_contact` add column relation varchar(50) after last_name;
alter table `gpt_hospital` add column `in_contract` tinyint(1) unsigned DEFAULT '0' after hospital_url;