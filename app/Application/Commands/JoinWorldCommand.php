<?php namespace Rpgo\Application\Commands;

use Rpgo\Model\User\User;
use Rpgo\Model\World\World;

class JoinWorldCommand extends Command {

    /**
     * @var string
     */
    public $name;
    /**
     * @var World
     */
    public $world;
    /**
     * @var User
     */
    public $user;

    /**
     * Create a new command instance.
     * @param $name
     * @param World $world
     * @param User $user
     */
	public function __construct($name, World $world, User $user)
	{
        $this->name = $name;
        $this->world = $world;
        $this->user = $user;
    }

}
