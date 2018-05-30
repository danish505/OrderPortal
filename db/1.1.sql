alter table gpt_user drop column auth_level;
alter table gpt_user add column role_id TINYINT NOT NULL AFTER email;
alter table gpt_user_role modify role varchar(100);
truncate table gpt_user_role;
insert into `gpt_user_role` (id, role) values (1, 'Patient'),(2, 'Hospital Representative'),(3, 'Service Provider');
ALTER TABLE gpt_user ADD CONSTRAINT `fk_gpt_user_role` FOREIGN KEY (`role_id`) REFERENCES `gpt_user_role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
