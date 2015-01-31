<?php namespace Rpgo\Support\Hash;

use Illuminate\Hashing\BcryptHasher;

class Hash {

    /**
     * @var BcryptHasher
     */
    private static $hash;

    /**
     * @param string $string
     * @return string
     */
    public static function make($string)
    {
        self::loadInstance();

        return self::$hash->make($string);
    }

    /**
     * @param string $string
     * @param string $against
     * @return string
     */
    public static function check($string, $against)
    {
        self::loadInstance();

        return self::$hash->check($string, $against);
    }

    /**
     * @return void
     */
    private static function loadInstance()
    {
        if ( ! self::$hash)
            self::$hash = new BcryptHasher();
    }

}
