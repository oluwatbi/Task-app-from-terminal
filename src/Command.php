<?php


namespace Acme;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends SymfonyCommand
{
	protected $database;

	public function __construct(DatabaseHook $database)
	{
		$this->database = $database;
		parent::__construct();
	}

	protected function showTasks(OutputInterface $output)
	{
		if (!$tasks = $this->database->fetchAll('tasks')){
			return $output->writeln('<info>No task at the moment</info>');
		}

		$table = new Table($output);

		$table->setHeaders(['SN', 'Description'])
			->setRows($tasks)
			->render();
	}
}