<?php

namespace Acme;

use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ShowCommand extends Command{

	public function configure()
	{
		$this->setName('show')
			->setDescription('Show all tasks');
	}

	public function execute(InputInterface $input, OutputInterface $output)
	{
		$this->showTasks($output);
	}

	private function showTasks(OutputInterface $output)
	{
		if (!$tasks = $this->database->fetchAll('tasks')){
			return $output->writeln('<info>No task at the moment</info>');
		}

		$table = new Table($output);

		$table->setHeaders(['Id', 'Description'])
			->setRows($tasks)
			->render();
	}
}