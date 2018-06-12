rename table gpt_patient_phone to gpt_patient_contact_phone;
alter table gpt_patient_contact_address drop foreign key fk_address_patient_contact1;
alter table gpt_patient_contact_address add FOREIGN KEY (`patient_cont_id`) REFERENCES `gpt_patient_contact` (`patient_cont_id`) ON DELETE cascade ON UPDATE NO ACTION;
