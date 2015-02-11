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
    public function generateNewId()
    {
        return $this->getEntityId($this->generator->generateNewId());
    }

    /**
     * @param string $id
     * @return Id
     */
    public function idFromString($id)
    {
        return $this->getEntityId($this->generator->idFromString($id));
    }

    abstract public function getEntityId(Id $id);
}