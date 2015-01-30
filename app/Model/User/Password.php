<?php namespace Rpgo\Model\User;

use Illuminate\Hashing\BcryptHasher as Hash;

class Password {

    private $password;

    private $hash;

    public function __construct($password, $hashed = false)
    {
        $this->hash = new Hash();
        $this->password = $hashed ? $password : $this->hash->make($password);
    }

    public function check($password)
    {
        return $this->hash->check($password, $this->password);
    }
}
