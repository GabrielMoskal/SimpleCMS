DROP TABLE simplecms.contacts;

CREATE TABLE simplecms.contacts
(
	id integer PRIMARY KEY AUTO_INCREMENT,
	companyName varchar(50), 
	clientName varchar(50), 
	job varchar(50), 
	phoneNumber varchar(50), 
	email varchar(50), 
	trader varchar(50),
	aggreePersonalData varchar(50),
	aggreeCommercials varchar(50),
	picture varchar(200)
);