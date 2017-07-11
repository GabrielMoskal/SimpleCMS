DROP TABLE simplecms.companies;

create table simplecms.companies
(
	companyName varchar(50), 
	address varchar(50), 
	street varchar(50), 
	town varchar(50), 
	country varchar(50), 
	NIP integer PRIMARY KEY, 
	email varchar(50),
	trader varchar(50),
	aggreePersonalData varchar(50),
	aggreeCommercials varchar(50)
);