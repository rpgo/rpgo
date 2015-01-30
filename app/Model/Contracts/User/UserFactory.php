<?php namespace Rpgo\Model\Contracts\User;

interface UserFactory {

    public function create($name, $email, $password);

    public function revive($id, $name, $email, $password);

}