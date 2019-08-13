<?php


namespace Acme;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
class Command extends SymfonyCommand
{
	protected $database;

	public function __construct(DatabaseHook $database)
	{
		$this->database = $database;
		parent::__construct();
	}
}