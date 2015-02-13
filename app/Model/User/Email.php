<?php namespace Rpgo\Model\User;

use Rpgo\Model\Common\Value;
use Rpgo\Model\User\Exception\InvalidEmailException;

class Email extends Value {

    protected $value;

    public function __construct($email)
    {
        $this->setEmail($email);
    }

    /**
     * @param $email
     */
    private function setEmail($email)
    {
        $email = (string) $email;

        $this->checkAddress($email);

        $this->value = $email;
    }

    private function checkAddress($email)
    {
        if ( ! preg_match("/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\\.[A-Z]{2,4}$/i", $email))
            throw new InvalidEmailException("A user cannot have the email '${email}', because its not a valid email address.");
    }

    public function handle()
    {
        return substr($this, 0, strpos($this, '@'));
    }

    public function domain()
    {
        return substr($this, strpos($this, '@') + 1);
    }

}
