<?php

namespace Acme;

use PDO;

class DatabaseHook {
	protected $connection;

	function __construct(PDO $connection)
	{
		$this->connection = $connection;
	}

	public function fetchAll($tableName){
		return $this->connection->query('SELECT * FROM '.$tableName)->fetchAll();
	}

	public function query($sql, $parameters){
		return $this->connection->prepare($sql)->execute($parameters);
	}
}