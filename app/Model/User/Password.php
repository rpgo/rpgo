<?php namespace Rpgo\Model\User;

use Illuminate\Hashing\BcryptHasher as Hash;

class Password {

    private $password;

    private $hash;

    public function __construct($password, $hashed = false)
    {
        $this->hash = new Hash();
        $this->password = $this->password($password, $hashed);
    }

    public function check($password)
    {
        return $this->hash->check($password, $this->password);
    }

    /**
     * @param string $password
     * @param bool $hashed
     * @return string
     */
    private function password($password, $hashed)
    {
        return $hashed ? $password : $this->hash->make($password);
    }
}
