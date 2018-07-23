CREATE TABLE `gpt_patient_favorite` (
  `patient_favorite_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` smallint(6) unsigned DEFAULT NULL,
  `reference_id` smallint(6) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`patient_favorite_id`),
  KEY `fk_patient_favorite_1` (`patient_id`),
  CONSTRAINT `fk_patient_favorite_1` FOREIGN KEY (`patient_id`) REFERENCES `gpt_patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `gpt_search_keyword` (
  `keyword_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `keyword` varchar(100) NOT NULL,
  PRIMARY KEY (`keyword_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;