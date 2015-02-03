<?php namespace Rpgo\Application\Services;

use HttpException;
use Rpgo\Application\Exception\WorldNotFoundException;
use Rpgo\Application\Repository\WorldRepository;
use Rpgo\Model\World\World;

/**
 * Use it as a singleton!
 * Make a middleware to store the current world and share it with the views.
 * Then you can use Guide to retrieve that information only when needed.
 *
 * Class Guide
 * @package Rpgo\Application\Services
 */
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