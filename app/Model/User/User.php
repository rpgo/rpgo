<?php namespace Rpgo\Model\User;

class User {

    /**
     * @var UserId
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

    public function __construct(UserId $userId, Name $name, Email $email, Password $password)
    {
        $this->id = $userId;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function id()
    {
        return (string) $this->id;
    }

    public function name()
    {
        return (string) $this->name;
    }

    public function email()
    {
        return (string) $this->email;
    }
}
