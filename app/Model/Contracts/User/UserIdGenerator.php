<?php namespace Rpgo\Model\Contracts\User;

use Rpgo\Model\Contracts\IdGenerator;

interface UserIdGenerator extends IdGenerator {

    /**
     * @return UserId
     */
    public function generateNewId();

    /**
     * @param string $id
     * @return UserId
     */
    public function idFromString($id);

}