<?php namespace Rpgo\Model\User;

use Rpgo\Support\Exception\InvalidCharacterInUserNameException;
use Rpgo\Support\Exception\UserNameTooLongException;

class Name {

    private $name;

    public function __construct($name)
    {
        $this->setName($name);
    }

    public function __toString()
    {
        return $this->name;
    }

    private function setName($name)
    {
        $this->checkLength($name);

        $this->checkLetters($name);

        $this->name = $name;
    }

    /**
     * @param $name
     * @throws UserNameTooLongException
     */
    private function checkLength($name)
    {
        if (strlen(utf8_decode($name)) > 30)
            throw new UserNameTooLongException;
    }

    /**
     * @param $name
     * @throws InvalidCharacterInUserNameException
     */
    private function checkLetters($name)
    {
        if (!preg_match("/^[a-zA-ZáéíóöőúűÁÉÍÓÖŐÚŰ0-9]*$/", $name))
            throw new InvalidCharacterInUserNameException;
    }

    public function change($name)
    {
        return new self($name);
    }
}
