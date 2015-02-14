<?php namespace Rpgo\Application\Services;

use Rpgo\Application\Repository\MemberRepository;
use Rpgo\Application\Repository\WorldRepository;
use Rpgo\Application\Repository\LocationRepository;
use Rpgo\Model\Member\Factory as MemberFactory;
use Rpgo\Model\World\World;
use Rpgo\Model\World\Factory as WorldFactory;
use Rpgo\Model\Location\Factory as LocationFactory;

class WorldCreator {

    /**
     * @var WorldFactory
     */
    private $worldFactory;

    /**
     * @var MemberFactory
     */
    private $memberFactory;

    /**
     * @var WorldRepository
     */
    private $worldRepository;

    /**
     * @var MemberRepository
     */
    private $memberRepository;
    /**
     * @var LocationRepository
     */
    private $locationRepository;
    /**
     * @var LocationFactory
     */
    private $locationFactory;

    function __construct(WorldFactory $worldFactory,
                         MemberFactory $memberFactory,
                         WorldRepository $worldRepository,
                         MemberRepository $memberRepository,
                         LocationRepository $locationRepository,
                         LocationFactory $locationFactory)
    {
        $this->worldFactory = $worldFactory;
        $this->memberFactory = $memberFactory;
        $this->worldRepository = $worldRepository;
        $this->memberRepository = $memberRepository;
        $this->locationRepository = $locationRepository;
        $this->locationFactory = $locationFactory;
    }

    /**
     * @param array $data
     * @return null|World
     */
    public function create(array $data)
    {

        $world = $this->worldFactory->make($data);

        if( ! $this->worldRepository->save($world))
            return null;

        $admin = $this->memberFactory->make([
            'name' => $data['admin'],
            'user' => $data['creator'],
            'world' => $world,
        ]);

        if( ! $this->memberRepository->save($admin))
            return null;

        $location = $this->locationFactory->make(['name' => 'Helyszínek', 'slug' => 'helyszinek']);

        if( ! $this->locationRepository->save($location) )
            return null;

        $world->location($location);

        if( ! $this->worldRepository->save($world))
            return null;

        return $world;
    }

}