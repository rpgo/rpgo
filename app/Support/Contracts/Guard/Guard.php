<?php namespace Rpgo\Support\Contracts\Guard;

use Rpgo\Model\User\User;

interface Guard {

    /**
     * Return the currently logged in User if any.
     *
     * @return User|null
     */
    public function user();

    /**
     * Check if the credentials match.
     *
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function check($email, $password);

    /**
     * Log in the User with the given credentials.
     *
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function login($email, $password);

    /**
     * Identify the User when logging them in.
     *
     * @param string $email
     * @param string $password
     * @return User|null
     */
    public function identify($email, $password);

    /**
     * Log in an already known User.
     *
     * @param User $user
     * @return bool
     */
    public function vouch(User $user);

    /**
     * Check whether we have a guest.
     *
     * @return bool
     */

    public function out();

    /**
     * Check whether we have a User logged in.
     *
     * @return bool
     */

    public function in();

}