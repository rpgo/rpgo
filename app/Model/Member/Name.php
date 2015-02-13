<?php namespace Rpgo\Model\Member;

use Rpgo\Model\Common\Value;
use Rpgo\Model\Exception\InvalidValueException;

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
     */
    private function setName($name)
    {
        $name = (string) $name;

        $this->checkLength($name);

        $this->checkLetters($name);

        $this->value = $name;
    }

    /**
     * @param $name
     */
    private function checkLength($name)
    {
        $this->checkIfEmpty($name);

        $this->checkIfTooLong($name);
    }

    /**
     * @param $name
     * @throws InvalidValueException
     */
    private function checkLetters($name)
    {
        if ( ! preg_match("/^[a-zA-ZáéíóöőúűÁÉÍÓÖŐÚŰ0-9]+$/", $name))
            throw new InvalidValueException("A member cannot have the name '${name}', because it contains special characters.");
    }

    /**
     * @param $name
     * @throws InvalidValueException
     */
    private function checkIfEmpty($name)
    {
        if (strlen(utf8_decode($name)) == 0)
            throw new InvalidValueException("A member cannot have an empty name.");
    }

    /**
     * @param $name
     * @throws InvalidValueException
     */
    private function checkIfTooLong($name)
    {
        if (strlen(utf8_decode($name)) > 30)
            throw new InvalidValueException("A member cannot have the name '${name}', because it's more than 30 characters.");
    }
}
