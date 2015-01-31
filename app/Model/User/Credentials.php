<?php namespace Rpgo\Model\User;

class Credentials {

    /**
     * @var Email
     */
    private $email;
    /**
     * @var Password
     */
    private $password;

    public function __construct(Email $email, Password $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    function match($email, $password)
    {
        return $this->email == $email && $this->password->check($password);
    }

    public function email()
    {
        return (string) $this->email;
    }

    public function password()
    {
        return (string) $this->password;
    }
}
