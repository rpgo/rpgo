<?php namespace Rpgo\Model\Member;

use Rpgo\Model\Common\Factory as CommonFactory;

class Factory extends CommonFactory{

    protected $required = ['name', 'user', 'world'];

    public function make(array $data)
    {
        if( ! $this->hasRequiredParameters($data))
            return null;

        $id = array_key_exists('id', $data) ? new Id($data['id']) : new Id();

        $membership = new Membership($data['world'], $data['user']);

        $name = new Name($data['name']);

        return new Member($id, $name, $membership);
    }

}
