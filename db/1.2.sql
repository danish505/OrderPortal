alter table gpt_user drop FOREIGN KEY fk_gpt_user_role;
alter table gpt_user drop KEY fk_gpt_user_role;
drop table gpt_user_role;

alter table gpt_user drop column role_id;
alter table gpt_user add column role varchar(50) after email;
alter table gpt_user add column association_id tinyint after role;
alter table gpt_user modify column user_id int AUTO_INCREMENT;
alter table gpt_user add column name varchar(255) after username;
