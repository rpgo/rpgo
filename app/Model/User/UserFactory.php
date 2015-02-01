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
        $name = $this->getName($name);
        $credentials = $this->getCredentials($email, $password);

        return $this->getUser($name, $credentials);
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
        $credentials = $this->getCredentials($email, $password, true);

        return $this->getUser($name, $credentials, $id);
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
     * @param Name $name
     * @param Credentials $credentials
     * @param UserId|null $id
     * @return User
     */
    private function getUser($name, $credentials, $id = null)
    {
        $id = $id ?: $this->getNewId();
        return new User($id, $name, $credentials);
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

    /**
     * @param string $email
     * @param string $password
     * @param bool $hashed
     * @return Credentials
     */
    private function getCredentials($email, $password, $hashed = false)
    {
        $email = $this->getEmail($email);
        $password = $this->getPassword($password, $hashed);
        return new Credentials($email, $password);
    }

    /**
     * @param string $password
     * @param bool $hashed
     * @return Password
     */
    private function getPassword($password, $hashed = false)
    {
        return new Password($password, $hashed);
    }
}
