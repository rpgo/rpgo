<?php namespace Rpgo\Application\Services;

use Rpgo\Application\Repository\MemberRepository;
use Rpgo\Application\Repository\WorldRepository;
use Rpgo\Application\Repository\LocationRepository;
use Rpgo\Model\User\User;
use Rpgo\Model\Member\MemberFactory;
use Rpgo\Model\World\World;
use Rpgo\Model\World\WorldFactory;
use Rpgo\Model\Location\Location;
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

        $location = $this->locationFactory->make(['name' => 'Helyszínek', 'slug' => 'helszinek']);

        $world = $this->worldFactory->make(array_merge($data, compact('location')));

        $admin = $this->memberFactory->create($data['admin'], $world, $data['creator']);

        if( ! $this->locationRepository->save($location) )
        {
            return null;
        }

        if( ! $this->worldRepository->save($world))
        {
            $this->locationRepository->delete($location);
            return null;
        }

        if( ! $this->memberRepository->save($admin))
        {
            $this->worldRepository->delete($world);
            $this->locationRepository->delete($location);
            return null;
        }

        return $world;
    }

}