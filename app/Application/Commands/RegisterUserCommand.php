<?php namespace Rpgo\Application\Commands;

use Rpgo\Application\Services\Guard;

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
     * @param string $name
     * @param string $email
     * @param string $password
     */
	public function __construct($name, $email, $password)
	{
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:30', 'regex:/^[a-zA-ZáéíóöőúűÁÉÍÓÖŐÚŰ0-9]+$/', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:256', 'unique:users'],
            'password' => ['required', 'string'],
        ];
    }

}
