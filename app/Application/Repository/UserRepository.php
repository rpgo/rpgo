<?php namespace Rpgo\Application\Repository;

use Rpgo\Model\User\User;

interface UserRepository {

    /**
     * @param string $id
     * @return User
     */
    public function fetchById($id);

    /**
     * @param User $user
     * @return bool
     */
    public function save(User $user);

    /**
     * @param User $user
     * @return bool
     */
    public function delete(User $user);

    /**
     * @param string $name
     * @return User
     */
    public function fetchByName($name);

}