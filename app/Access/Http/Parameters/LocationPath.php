<?php namespace Rpgo\Access\Http\Parameters;

use Illuminate\Http\Request;
use Rpgo\Application\Repository\Eloquent\LocationRepository;

class LocationPath extends Parameter {

    /**
     * @var LocationRepository
     */
    private $repository;

    /**
     * @var Request
     */
    private $request;

    /**
     * Create a new instance.
     *
     * @param LocationRepository $repository
     * @param Request $request
     */
    public function __construct(LocationRepository $repository, Request $request)
    {
        $this->repository = $repository;
        $this->request = $request;
    }

    /**
     * Return the Location in the current World with the specified path.
     *
     * @param string $locationPath
     * @return null|\Rpgo\Model\Location\Location
     */
    public function bind($locationPath)
    {
        $world = $this->getCurrentWorld();

        if(! $world)
            $this->bindingNotFound();

        $path = explode('/', $locationPath);

        $location = $this->repository->fetchByWorldAndPath($world, $path);

        $this->repository->loadLocations($location);

        if (! $location)
            $this->bindingNotFound();

        return $location;
    }

    /**
     * Since we don't have route parameters when the route-model bindings occur,
     * we have to do a little extra work. Shame on you, Laravel! :)
     *
     * @return \Rpgo\Model\World\World
     */
    private function getCurrentWorld()
    {
        preg_match('/(^(?:[^\s](?=.+\..+\..+$))+.)/', $this->request->getHost(), $matches);

        $worldSlug = $matches[0];

        return $this->repository->world()->fetchBySlug($worldSlug);
    }

}