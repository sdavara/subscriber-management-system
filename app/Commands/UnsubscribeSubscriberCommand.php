<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class UnsubscribeSubscriberCommand extends Command {

	public $confirmation_code;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($confirmation_code)
	{
		$this->confirmation_code = $confirmation_code;
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
