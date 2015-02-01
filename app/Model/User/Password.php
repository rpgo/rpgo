<?php namespace Rpgo\Model\User;

use Rpgo\Model\User\Exception\EmptyPasswordException;
use Rpgo\Support\Hash\Hash;

class Password {

    private $password;

    public function __construct($password, $hashed = false)
    {
        $this->cantBeEmpty($password);
        $this->password = $this->setPassword($password, $hashed);
    }

    /**
     * @param $password
     * @return string
     */
    public function check($password)
    {
        return Hash::check($password, $this->password);
    }

    /**
     * @param string $password
     * @param bool $hashed
     * @return string
     */
    private function setPassword($password, $hashed)
    {
        return $hashed ? $password : Hash::make($password);
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
        return new self($password);
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
}
