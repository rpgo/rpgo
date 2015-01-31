<?php namespace Rpgo\Support\Guard;

use Illuminate\Auth\Guard as IlluminateGuard;
use Rpgo\Application\Repository\UserRepository;
use Rpgo\Model\User\User;
use Rpgo\Support\Contracts\Guard\Guard as GuardContract;

final class Guard implements GuardContract {

    /**
     * @var IlluminateGuard
     */
    private $guard;
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @var User
     */
    private $user;

    public function __construct(IlluminateGuard $guard, UserRepository $repository)
    {
        $this->guard = $guard;
        $this->repository = $repository;
    }

    /**
     * Return the currently logged in User if any.
     *
     * @return User|null
     */
    public function user()
    {
        return $this->getUser() ?: $this->loadUser();
    }

    /**
     * Check if the credentials match.
     *
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function check($email, $password)
    {
        return $this->guard->validate(compact('email', 'password'));
    }

    /**
     * Log in the User with the given credentials.
     *
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function login($email, $password)
    {
        return $this->guard->attempt(compact('email', 'password'));
    }

    /**
     * Identify the User and log them in.
     *
     * @param string $email
     * @param string $password
     * @return User|null
     */
    public function identify($email, $password)
    {
        $this->login($email, $password);

        return $this->user();
    }

    /**
     * Log in an already known User
     *
     * @param User $user
     * @return bool
     */
    public function vouch(User $user)
    {
        $this->guard->loginUsingId($user->id());
    }

    /**
     * Check whether we have a guest.
     *
     * @return bool
     */
    public function out()
    {
        return ! $this->in();
    }

    /**
     * Check whether we have a User logged in.
     *
     * @return bool
     */
    public function in()
    {
        return (bool) $this->id();
    }

    /**
     * @return int|null
     */
    private function id()
    {
        return $this->guard->id();
    }

    /**
     * @return User
     */
    private function fetchUser()
    {
        return $this->repository->fetchById($this->id());
    }

    /**
     * @return null|User
     */
    private function loadUser()
    {
        return $this->user = $this->id() ? $this->fetchUser() : null;
    }

    /**
     * @return User
     */
    private function getUser()
    {
        return $this->user;
    }
}
