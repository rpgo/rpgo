<?php namespace Rpgo\Model\Common;

use Rpgo\Model\Contracts\Id;
use Rpgo\Model\Contracts\IdGenerator;

abstract class EntityIdGenerator implements IdGenerator {

    private $generator;

    public function __construct(UuidGenerator $generator)
    {
        $this->generator = $generator;
    }

    /**
     * @return Id
     */
    public function next()
    {
        return $this->getEntityId($this->generator->next());
    }

    /**
     * @param string $string
     * @return Id
     */
    public function from($string)
    {
        return $this->getEntityId($this->generator->from($string));
    }

    abstract public function getEntityId(Id $id);
}