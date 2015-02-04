<?php namespace Rpgo\Application\Repository;

use Illuminate\Foundation\Application;

class RepositoryManager {

    /**
     * @var Application
     */
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @return UserRepository
     */
    public function user()
    {
        return $this->app['repository.user'];
    }

    /**
     * @return WorldRepository
     */
    public function world()
    {
        return $this->app['repository.world'];
    }

    /**
     * @return MemberRepository
     */
    public function member()
    {
        return $this->app['repository.member'];
    }

}