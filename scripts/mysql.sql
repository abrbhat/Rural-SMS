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
(1,'useSMSKeyword','No'),
(2,'SMSKeyword','keyword'),
(3,'SMSResponseFormat','html'),
(4,'SMSBodyParameter','Body'),
(5,'SMSFromParameter','From'),
(6,'APIKeyRequired','Yes'),
(7,'SMSAPIKeyParameter','api_key_param'),
(8,'SMSAPIKey','api_key'),
(9,'language','en');

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

CREATE TABLE `registered_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dob_of_child` date NOT NULL,
  `location` int(31) NOT NULL,
  PRIMARY KEY (`id`)
);


CREATE TABLE `query_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(20) NOT NULL,
  `interaction_mode` int(2) NOT NULL,
  `previous_page` varchar(255) NOT NULL,
  `additional_info` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone_number` (`phone_number`)
);
