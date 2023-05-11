<?php

namespace Bisix21\src\Core;

use Bisix21\src\ORM\ActiveRecord;

class Handler
{
	protected string $givenCommand;

	public function __construct(
		protected Converter $converter,
		protected Command   $command,
		protected ActiveRecord $connect
	)
	{
	}

	public function handle(): void
	{
		$this->connect->connectToDB();
		$this->givenCommand = $this->converter->commandCall();
		$this->command->run($this->givenCommand);
	}
}