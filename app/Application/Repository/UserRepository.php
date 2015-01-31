<?php namespace Rpgo\Application\Repository;


use Rpgo\Application\Repository\Eloquent\User as Eloquent;
use Rpgo\Model\Contracts\User\User;

interface UserRepository {

    /**
     * @param Eloquent $user
     * @return User
     */
    public function model(Eloquent $user);

    /**
     * @param string $id
     * @return User
     */
    public function fetchById($id);

}