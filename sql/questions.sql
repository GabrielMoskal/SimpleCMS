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

INSERT INTO simplecms.questions(questionValue, category, answerType, answer1, answer2, answer3, answer4)
		VALUES ('Example question', 'example category', 'answer type',
						'answer1', 'answer2', 'answer3', 'answer4');
