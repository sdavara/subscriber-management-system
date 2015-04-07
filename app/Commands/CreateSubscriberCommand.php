<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class CreateSubscriberCommand extends Command {

public $firstName;
public $lastName;
public $email;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($firstName, $lastName, $email)
	{
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->email = $email;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		//
	}

}
