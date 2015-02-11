<?php namespace Rpgo\Model\Common;

use Rhumsaa\Uuid\Uuid as Ruuid;
use Rpgo\Model\Contracts\Id;

class Uuid extends Value implements Id {

    /**
     * @var Ruuid
     */
    protected $value;

    /**
     * @param string $id
     */
    function __construct($id = null)
    {
        $this->value = $id ? Ruuid::fromString($id) : Ruuid::uuid4();
    }

    /**
     * @param Id $id
     * @return bool
     */
    public function isIdenticalTo(Id $id)
    {
        return $this->isEqualTo($id);
    }
}