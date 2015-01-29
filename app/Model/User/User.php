<?php namespace Rpgo\Model\User;

use Rpgo\Model\Contracts\User\User as UserContract;
use Rpgo\Model\Contracts\User\UserId as UserIdContract;

final class User implements UserContract {

    /**
     * @var UserIdContract
     */
    private $userId;

    /**
     * @var Name
     */
    private $name;

    /**
     * @var Email
     */
    private $email;

    /**
     * @var Password
     */
    private $password;

    public function __construct(UserIdContract $userId, Name $name, Email $email, Password $password)
    {
        $this->userId = $userId;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
}
