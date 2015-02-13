<?php namespace Rpgo\Model\User;

class User {

    /**
     * @var Id
     */
    private $id;

    /**
     * @var Name
     */
    private $name;
    /**
     * @var Credentials
     */
    private $credentials;

    public function __construct(Id $userId, Name $name, Credentials $credentials)
    {
        $this->id = $userId;
        $this->name = $name;
        $this->credentials = $credentials;
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
        return (string) $this->credentials->email();
    }

    public function password()
    {
        return (string) $this->credentials->password();
    }

    public function validateCredentials($email, $password)
    {
        return $this->credentials->match($email, $password);
    }
}
