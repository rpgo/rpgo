<?php namespace Rpgo\Model\User;

use Rpgo\Model\Contracts\User\UserFactory as UserFactoryContract;

final class UserFactory implements UserFactoryContract {

    /**
     * @var UserIdGenerator
     */
    private $generator;

    public function __construct(UserIdGenerator $generator)
    {
        $this->generator = $generator;
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return User
     */
    public function create($name, $email, $password)
    {
        $id = $this->getNewId();
        $name = $this->getName($name);
        $email = $this->getEmail($email);
        $password = $this->getNewPassword($password);

        return $this->getUser($name, $email, $password, $id);
    }

    /**
     * @param string $id
     * @param string $name
     * @param string $email
     * @param string $password
     * @return User
     */
    public function revive($id, $name, $email, $password)
    {
        $id = $this->getOldId($id);
        $name = $this->getName($name);
        $email = $this->getEmail($email);
        $password = $this->getOldPassword($password);

        return new User($id, $name, $email, $password);
    }

    /**
     * @param string $name
     * @return Name
     */
    private function getName($name)
    {
        return new Name($name);
    }

    /**
     * @param string $email
     * @return Email
     */
    private function getEmail($email)
    {
        return new Email($email);
    }

    /**
     * @param string $password
     * @return Password
     */
    private function getNewPassword($password)
    {
        return new Password($password);
    }

    /**
     * @param string $password
     * @return Password
     */
    private function getOldPassword($password)
    {
        return new Password($password, true);
    }

    /**
     * @param Name $name
     * @param Email $email
     * @param Password $password
     * @param UserId $id
     * @return User
     */
    private function getUser($name, $email, $password, $id)
    {
        return new User($id, $name, $email, $password);
    }

    /**
     * @return UserId
     */
    private function getNewId()
    {
        return $this->generator->next();
    }

    /**
     * @param $id
     * @return UserId
     */
    private function getOldId($id)
    {
        return $this->generator->from($id);
    }
}
