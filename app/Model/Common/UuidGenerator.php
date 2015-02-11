<?php namespace Rpgo\Model\Common;

use Rpgo\Model\Contracts\IdGenerator;

class UuidGenerator implements IdGenerator {

    /**
     * @return Uuid
     */
    public function generateNewId()
    {
        return new Uuid();
    }

    /**
     * @param string $id
     * @return Uuid
     */
    public function idFromString($id)
    {
        return new Uuid($id);
    }

}