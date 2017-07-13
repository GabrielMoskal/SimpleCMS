<?php

class QueryBuilder {

    /**
     *   @var PDO
     */
	private $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function selectAll($table) {
		$statement = $this->pdo->prepare("SELECT * FROM {$table};");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS);
	}

	public function insert($table, $parameters) {
		$sql = sprintf(
			'insert into %s (%s) values (%s);',
			$table,
			implode(', ', array_keys($parameters)),
			':' . implode(', :', array_keys($parameters))
		);

		try {
			$statement = $this->pdo->prepare($sql);
			$statement->execute($parameters);
		} catch(PDOException $e) {
			die('Whoops, something went wrong');
		}
	}

	public function deleteAll($table) {
		$queryString = "DELETE FROM {$table} WHERE 1;";

		try {
			$statement = $this->pdo->prepare($queryString);
			$statement->execute();
		} catch(PDOException $e) {
			die('Whoops, something went wrong');
		}
	}

	public function selectRestricted($table, $parameters) {
		$queryString = sprintf(
			'SELECT * FROM %s WHERE %s LIKE %s;',
			$table,
			implode(', ', array_keys($parameters)),
			':' . implode(', :', array_keys($parameters))
		);

		try {
			$statement = $this->pdo->prepare($queryString);
			$statement->execute($parameters);
			return $statement->fetchAll(PDO::FETCH_CLASS);
		} catch(PDOException $e) {
			die('Whoops, something went wrong');
		}
	}

	public function getPDO() {
		return $this->pdo;
	}
}