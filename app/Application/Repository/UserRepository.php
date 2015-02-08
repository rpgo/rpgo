<?php namespace Rpgo\Application\Repository;

use Rpgo\Model\User\User;
use Rpgo\Support\Collection\Collection;

interface UserRepository {

    /**
     * @param User $user
     * @return bool
     */
    public function save($user);

    /**
     * @param User $user
     * @return bool
     */
    public function delete($user);

    /**
     * @param string $id
     * @return User
     */
    public function fetchById($id);

    /**
     * @return Collection
     */
    public function fetchAll();

    /**
     * @param string $name
     * @return User
     */
    public function fetchByName($name);

}