<?php

namespace Acme;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CompleteCommand extends Command
{
	public function configure()
	{
		$this->setName('complete')
			->setDescription('finish a task by id')
			->addArgument('id', InputArgument::REQUIRED);
	}

	public function execute(InputInterface $input, OutputInterface $output)
	{
		$id = $input->getArgument('id');
		$this->database->query(
			'delete from tasks where id = :id',
			compact('id')
		);

		$output->write('<info> Task removed! </info>');

		$this->showTasks($output);
	}
}