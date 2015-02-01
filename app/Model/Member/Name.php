<?php namespace Rpgo\Model\Member;

use Rpgo\Model\Member\Exception\EmptyMemberNameException;
use Rpgo\Model\Member\Exception\InvalidMemberNameException;
use Rpgo\Model\Member\Exception\LongMemberNameException;

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
     * @throws InvalidMemberNameException
     * @throws LongMemberNameException
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
     * @throws EmptyMemberNameException
     * @throws \Rpgo\Model\User\Exception\LongUserNameException
     */
    private function checkLength($name)
    {
        $this->checkIfEmpty($name);

        $this->checkIfTooLong($name);
    }

    /**
     * @param $name
     * @throws InvalidMemberNameException
     */
    private function checkLetters($name)
    {
        if ( ! preg_match("/^[a-zA-ZáéíóöőúűÁÉÍÓÖŐÚŰ0-9]+$/", $name))
            throw new InvalidMemberNameException("A member cannot have the name '${name}', because it contains special characters.");
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
     * @throws EmptyMemberNameException
     */
    private function checkIfEmpty($name)
    {
        if (strlen(utf8_decode($name)) == 0)
            throw new EmptyMemberNameException("A member cannot have an empty name.");
    }

    /**
     * @param $name
     * @throws LongMemberNameException
     */
    private function checkIfTooLong($name)
    {
        if (strlen(utf8_decode($name)) > 30)
            throw new LongMemberNameException("A member cannot have the name '${name}', because it's more than 30 characters.");
    }
}
