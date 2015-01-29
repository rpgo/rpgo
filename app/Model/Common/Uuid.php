<?php namespace Rpgo\Model\Common;

use Rhumsaa\Uuid\Uuid as Ruuid;
use Rpgo\Model\Contracts\Id;

class Uuid implements Id {

    /**
     * @var Ruuid
     */
    private $uuid;

    /**
     * @param Ruuid $uuid
     */
    function __construct(Ruuid $uuid)
    {
        $this->uuid = $uuid;
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
    public function equals(Id $uuid)
    {
        return $this === $uuid;
    }
}