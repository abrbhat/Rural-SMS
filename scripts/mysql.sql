-- @copyright 2006-2013 City of Bloomington, Indiana
-- @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.txt
-- @authors Abhiroop Bhatnagar <bhatnagarabhiroop@gmail.com>, Cliff Ingham <inghamn@bloomington.in.gov>

CREATE TABLE `configuration` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `configName` varchar(255) NOT NULL,
  `configValue` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `configName` (`configName`)
);

INSERT INTO `configuration` VALUES
(1,'SMSCharacterLimit','160'),
(2,'useSMSKeyword','No'),
(3,'SMSKeyword','keyword'),
(4,'SMSResponseFormat','html'),
(5,'SMSBodyParameter','Body'),
(6,'SMSFromParameter','From'),
(7,'APIKeyRequired','Yes'),
(8,'SMSAPIKeyParameter','api_key_param'),
(9,'SMSAPIKey','api_key'),
(10,'language','en');

CREATE TABLE `people` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `authenticationMethod` varchar(40) DEFAULT NULL,
  `role` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ;

CREATE TABLE `scheduled_sms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `day` int(31) NOT NULL,
  `month` int(12) NOT NULL,
  `year` int(10) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `scheduled_sms` VALUES
(1,"Congratulations on the birth of a newborn.Please contact the Anganwadi to know about care-taking of the newborn and mother and the government's healthcare plans.",0,0,0);
(2,"Your child's BCG and Oral Polio Vaccine is due, please take your child to your nearest vaccination centre.",0,0,0);
(3,"Please take the mother for blood and kidney tests to ensure there is no risk of an infection.",2,0,0);
(4,"Please keep to the medicine intake schedule as prescribed by your doctor.",4,0,0);
(5,"Please contact your nearest health centre to get post pregnancy vaccinations.",5,0,0);
(6,"Do not let the mother do any physical work till she gets back to normal health.",7,0,0);
(7,"The government provides financial support to nursing mothers, please contact your anganwadi for details on getting registered in the program",14,0,0);
(8,"Please visit your nearest health centre in case of any health related troubles.",15,0,0);
(9,"Please give the mother and child clean drinking water for their good health, in case of any trouble visit your anganwadi.",20,0,0);
(10,"Please ensure the mother is getting a balanced diet to ensure post pregnancy health, in case of any troubles please visit the Anganwadi centre.",0,1,0);
(11,"Your child's DPT and Oral Polio Vaccine is due, please take your child to your nearest vaccination centre.",13,1,0);
(12,"Please visit the nearest health centre to get the mother's stitches removed. Ensure she is getting a balanced diet.",15,1,0);
(13,"Your child's DPT and Oral Polio Vaccine is due, please take your child to your nearest vaccination centre.",13,2,0);
(14,"Your child's DPT and Oral Polio Vaccine is due, please take your child to your nearest vaccination centre.",13,0,1);
(15,"Your child's Measles Vaccine is due, please take your child to your nearest vaccination centre.",29,8,0);
(16,"Your child's DPT Booster and Oral Polio Vaccine is due, please take your child to your nearest vaccination centre within the next 3 months.",0,3,1);
(17,"Your child's DPT and Oral polio vaccine is due, please take your child to your nearest vaccination centre.",0,0,5);
(18,"Your child's Tetanus toxoid vaccine is due, please take your child to your nearest vaccination centre.",0,0,9);
(19,"Your child's Tetanus toxoid vaccine is due, please take your child to your nearest vaccination centre.",0,0,10);
CREATE TABLE `query_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(20) NOT NULL,
  `dob_of_child` date,
  `previous_page` varchar(255) NOT NULL,
  `location` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone_number` (`phone_number`)
);
