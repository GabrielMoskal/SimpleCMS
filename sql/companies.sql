DROP TABLE IF EXISTS simplecms.companies;

CREATE TABLE simplecms.companies
(
	id INT PRIMARY KEY AUTO_INCREMENT,
	companyName varchar(50), 
	address varchar(50), 
	street varchar(50), 
	town varchar(50), 
	country varchar(50), 
	NIP integer, 
	email varchar(50),
	trader varchar(50),
	aggreePersonalData varchar(50),
	aggreeCommercials varchar(50),
	creationDate DATE
);

INSERT INTO simplecms.companies(companyName, address, street, town, country, NIP,
								email, trader, aggreePersonalData, aggreeCommercials, creationDate)
VALUES ('Google', 'Adres', 'Krakowska 10', 'Tarnow', 'Polska', 12345, 'example@mail.com',
		'Handlarz', 'true', 'true', '2012/10/10');