DROP TABLE IF EXISTS simplecms.contacts;

CREATE TABLE simplecms.contacts
(
	id integer PRIMARY KEY AUTO_INCREMENT,
	companyName varchar(50) REFERENCES simplecms(companies), 
	clientName varchar(50), 
	job varchar(50), 
	phoneNumber varchar(50), 
	email varchar(50), 
	trader varchar(50),
	aggreePersonalData varchar(50),
	aggreeCommercials varchar(50),
	picture varchar(200)
);

INSERT INTO simplecms.contacts (companyName, clientName, job, phoneNumber, email,
                                trader, aggreePersonalData, aggreeCommercials, picture)
    VALUES ('Google', 'John Smith', 'Driver', '123125421', 'john@smith.com',
            'Jan Kowalski', 'true', 'true', 'paris.jpg');