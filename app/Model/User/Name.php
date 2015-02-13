<?php namespace Rpgo\Model\User;

use Rpgo\Model\Common\Value;
use Rpgo\Model\User\Exception\InvalidUserNameException;
use Rpgo\Model\User\Exception\EmptyUserNameException;
use Rpgo\Model\User\Exception\LongUserNameException;

class Name extends Value {

    /**
     * @var string
     */
    protected $value;

    public function __construct($name)
    {
        $this->setName($name);
    }

    /**
     * @param string $name
     * @throws \Rpgo\Model\User\Exception\InvalidUserNameException
     * @throws \Rpgo\Model\User\Exception\LongUserNameException
     */
    private function setName($name)
    {
        $name = $this->getString($name);

        $this->checkLength($name);

        $this->checkLetters($name);

        $this->value = $name;
    }

    /**
     * @param $name
     * @throws EmptyUserNameException
     * @throws \Rpgo\Model\User\Exception\LongUserNameException
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
     * @throws \Rpgo\Model\User\Exception\EmptyUserNameException
     */
    private function checkIfEmpty($name)
    {
        if (strlen(utf8_decode($name)) == 0)
            throw new EmptyUserNameException("A user cannot have an empty name.");
    }

    /**
     * @param $name
     * @throws \Rpgo\Model\User\Exception\LongUserNameException
     */
    private function checkIfTooLong($name)
    {
        if (strlen(utf8_decode($name)) > 30)
            throw new LongUserNameException("A user cannot have the name '${name}', because it's more than 30 characters.");
    }
}
