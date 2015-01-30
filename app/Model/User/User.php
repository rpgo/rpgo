<?php namespace Rpgo\Model\User;

use Rpgo\Model\Contracts\User\User as UserContract;
use Rpgo\Model\Contracts\User\UserId as UserIdContract;

final class User implements UserContract {

    /**
     * @var UserIdContract
     */
    private $id;

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
        $this->id = $userId;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function email()
    {
        return (string) $this->email;
    }

    public function id()
    {
        return (string) $this->id;
    }

    public function name()
    {
        return (string) $this->name;
    }
}
