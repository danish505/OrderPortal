alter table gpt_user drop FOREIGN KEY fk_gpt_user_role;
alter table gpt_user drop KEY fk_gpt_user_role;
drop table gpt_user_role;

alter table gpt_user drop column role_id;
alter table gpt_user add column role varchar(50) after email;
alter table gpt_user add column association_id tinyint after role;
alter table gpt_user modify column user_id int AUTO_INCREMENT;
alter table gpt_user add column name varchar(255) after username;

alter table gpt_patient drop FOREIGN KEY fk_patient_status1;
alter table gpt_patient drop KEY fk_patient_status1_idx;
alter table gpt_patient drop column status_id;

alter table gpt_hospital drop FOREIGN KEY fk_hospital_status1;
alter table gpt_hospital drop KEY fk_hospital_status1_idx;
alter table gpt_hospital drop column status_id;

alter table gpt_company drop FOREIGN KEY fk_patient_status1_idx;
alter table gpt_company drop KEY fk_patient_status1_idx_idx;
alter table gpt_hospital drop column status_id;

DROP TABLE IF EXISTS `gpt_patient_status`;
DROP TABLE IF EXISTS `gpt_hospital_status`;
DROP TABLE IF EXISTS `gpt_company_status`;

alter table gpt_user drop column name;
alter table gpt_user drop column email;

alter table gpt_user change banned status tinyint;
alter table gpt_user modify username varchar(50);

alter table gpt_user modify passwd varchar(255);
alter table gpt_user modify passwd_recovery_code varchar(255);
alter table gpt_user add column verification_code varchar(255) after status;
alter table gpt_user add column email varchar(255) after username;
