<?php namespace Rpgo\Application\Commands;

class RegisterUserCommand extends Command {
    /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $email;
    /**
     * @var
     */
    public $password;

    /**
	 * Create a new command instance.
	 *
     * return void
	 */
	public function __construct($name, $email, $password)
	{
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

}
