DROP TABLE IF EXISTS simplecms.questions;

CREATE TABLE simplecms.questions
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	questionValue varchar(200), 
	category varchar(50), 
	answerType varchar(20), 
	answer1 varchar(200), 
	answer2 varchar(200), 
	answer3 varchar(200),
	answer4 varchar(200)
);