<?php namespace Rpgo\Model\User;

use Rpgo\Model\Contracts\User\UserFactory as UserFactoryContract;
use Rpgo\Model\Contracts\User\UserIdGenerator;

final class UserFactory implements UserFactoryContract {

    /**
     * @var UserIdGenerator
     */
    private $generator;

    public function __construct(UserIdGenerator $generator)
    {
        $this->generator = $generator;
    }

    public function createFromRaw($name, $email, $password)
    {
        $id = $this->generator->next();

        $name = new Name($name);
        $email = new Email($email);
        $password = new Password($password);

        return new User($id, $name, $email, $password);
    }
}
