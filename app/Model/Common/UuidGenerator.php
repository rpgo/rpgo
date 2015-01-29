<?php namespace Rpgo\Model\Common;

use Rhumsaa\Uuid\Uuid as Ruuid;
use Rpgo\Model\Contracts\IdGenerator;

class UuidGenerator implements IdGenerator {

    /**
     * @return Uuid
     */
    public function next()
    {
        return new Uuid(Ruuid::uuid4());
    }

    /**
     * @param string $string
     * @return Uuid
     */
    public function from($string)
    {
        return new Uuid(Ruuid::fromString($string));
    }

}