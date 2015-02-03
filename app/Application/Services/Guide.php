<?php namespace Rpgo\Application\Services;

use HttpException;
use Rpgo\Application\Exception\WorldNotFoundException;
use Rpgo\Application\Repository\WorldRepository;
use Rpgo\Model\World\World;

class Guide {

    /**
     * @var WorldRepository
     */
    private $repository;

    private $world;

    function __construct(WorldRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $slug
     * @return World
     * @throws HttpException
     */
    public function world($slug = '')
    {
        if(!$slug)
            return $this->world;

        $world = $this->repository->fetchBySlug($slug);

        if( ! $world)
            throw new WorldNotFoundException(404);

        return $this->world = $world;
    }
}