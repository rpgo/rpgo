<?php namespace Rpgo\Application\Repository\Eloquent;


use Rpgo\Application\Repository\RepositoryManager;

abstract class Repository {

    /**
     * @var RepositoryManager
     */
    private $repository;

    public function __construct(RepositoryManager $manager)
    {
        $this->repository = $manager;
    }

    /**
     * @return \Rpgo\Application\Repository\UserRepository
     */
    public function user()
    {
        return $this->repository->user();
    }

    /**
     * @return \Rpgo\Application\Repository\WorldRepository
     */
    public function world()
    {
        return $this->repository->world();
    }

    /**
     * @return \Rpgo\Application\Repository\MemberRepository
     */
    public function member()
    {
        return $this->repository->member();
    }
}