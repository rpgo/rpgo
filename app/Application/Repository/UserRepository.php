<?php namespace Rpgo\Application\Repository;

use Rpgo\Model\User\User;

interface UserRepository {

    /**
     * @param string $id
     * @return User
     */
    public function fetchById($id);

    /**
     * @param User $model
     * @return bool
     */
    public function save($model);

    /**
     * @param User $model
     * @return bool
     */
    public function delete($model);

    /**
     * @param string $name
     * @return User
     */
    public function fetchByName($name);

}