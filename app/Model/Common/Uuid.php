<?php namespace Rpgo\Model\Common;

use Rhumsaa\Uuid\Uuid as Ruuid;
use Rpgo\Model\Contracts\Id;

class Uuid extends Value implements Id {

    /**
     * @var Ruuid
     */
    private $uuid;

    function __construct()
    {
        $this->uuid = Ruuid::uuid4();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->uuid;
    }

    /**
     * @param Id $uuid
     * @return bool
     */
    public function isIdenticalTo(Id $uuid)
    {
        return $this === $uuid;
    }
}