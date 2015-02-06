<?php namespace Rpgo\Model\User;

use Illuminate\Hashing\BcryptHasher;
use Rpgo\Model\User\Exception\EmptyPasswordException;

class Password {

    private $password;

    private $hasher;

    public function __construct($password, $hashed = false, BcryptHasher $hasher = null)
    {
        $this->setHasher($hasher ?: new BcryptHasher());
        $this->cantBeEmpty($password);
        $this->password = $this->setPassword($password, $hashed);
    }

    /**
     * @param $password
     * @return string
     */
    public function check($password)
    {
        return $this->hasher->check($password, $this->password);
    }

    /**
     * @param string $password
     * @param bool $hashed
     * @return string
     */
    private function setPassword($password, $hashed)
    {
        return $hashed ? $password : $this->hasher->make($password);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->password;
    }


    /**
     * @param $password
     * @return Password
     */
    public function change($password)
    {
        return new self($password, false, $this->hasher);
    }

    /**
     * @param string $password
     * @throws EmptyPasswordException
     */
    private function cantBeEmpty($password)
    {
        if ($password == '')
            throw new EmptyPasswordException;
    }

    private function setHasher($hasher)
    {
        $this->hasher = $hasher;
    }
}
