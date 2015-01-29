<?php namespace Rpgo\Model\Common;

use Rpgo\Model\Contracts\Id;

abstract class EntityId implements Id {

    /**
     * @var Id
     */
    private $id;

    function __construct(Id $id)
    {
        $this->id = $id;
    }

    /**
     * @param Id $id
     * @return bool
     */
    public function equals(Id $id)
    {
        if( ! $this->isIdForSameEntity($id))
            return false;

        return $this->id->equals($id);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->id;
    }

    /**
     * @param Id $id
     * @return bool
     */
    abstract public function isIdForSameEntity(Id $id);
}