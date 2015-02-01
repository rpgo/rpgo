<?php namespace Rpgo\Application\Events;

use Illuminate\Queue\SerializesModels;
use Rpgo\Model\User\User;

class UserWasRegistered extends Event {

	use SerializesModels;

    /**
     * @var User
     */
    private $user;

    /**
     * Create a new event instance.
     * @param User $user
     */
	public function __construct(User $user)
	{
        $this->user = $user;
    }

}
