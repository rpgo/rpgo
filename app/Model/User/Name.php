<?php namespace Rpgo\Model\User;

use Rpgo\Model\User\Exception\InvalidUserNameException;
use Rpgo\Model\User\Exception\UserNameEmptyException;
use Rpgo\Model\User\Exception\UserNameTooLongException;

class Name {

    /**
     * @var string
     */
    private $name;

    public function __construct($name)
    {
        $this->setName($name);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @throws \Rpgo\Model\User\Exception\InvalidUserNameException
     * @throws \Rpgo\Model\User\Exception\UserNameTooLongException
     */
    private function setName($name)
    {
        $name = $this->getString($name);

        $this->checkLength($name);

        $this->checkLetters($name);

        $this->name = $name;
    }

    /**
     * @param $name
     * @throws UserNameEmptyException
     * @throws \Rpgo\Model\User\Exception\UserNameTooLongException
     */
    private function checkLength($name)
    {
        $this->checkIfEmpty($name);

        $this->checkIfTooLong($name);
    }

    /**
     * @param $name
     * @throws InvalidUserNameException
     */
    private function checkLetters($name)
    {
        if ( ! preg_match("/^[a-zA-ZáéíóöőúűÁÉÍÓÖŐÚŰ0-9]+$/", $name))
            throw new InvalidUserNameException("A user cannot have the name '${name}', because it contains special characters.");
    }

    public function change($name)
    {
        return new self($name);
    }

    /**
     * @param $name
     * @return string
     */
    private function getString($name)
    {
        return (string) $name;
    }

    /**
     * @param $name
     * @throws \Rpgo\Model\User\Exception\UserNameEmptyException
     */
    private function checkIfEmpty($name)
    {
        if (strlen(utf8_decode($name)) == 0)
            throw new UserNameEmptyException("A user cannot have an empty username.");
    }

    /**
     * @param $name
     * @throws \Rpgo\Model\User\Exception\UserNameTooLongException
     */
    private function checkIfTooLong($name)
    {
        if (strlen(utf8_decode($name)) > 30)
            throw new UserNameTooLongException("A user cannot have the name '${name}', because it's more than 30 characters.");
    }
}
