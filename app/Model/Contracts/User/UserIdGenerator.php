<?php namespace Rpgo\Model\Contracts\User;

use Rpgo\Model\Contracts\IdGenerator;

interface UserIdGenerator extends IdGenerator {

    /**
     * @return UserId
     */
    public function next();

    /**
     * @param string $string
     * @return UserId
     */
    public function from($string);

}