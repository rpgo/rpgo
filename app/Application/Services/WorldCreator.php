<?php namespace Rpgo\Application\Services;


use Rpgo\Application\Commands\CreateWorldCommand;
use Rpgo\Model\Contracts\User\User;
use Rpgo\Model\Member\MemberFactory;
use Rpgo\Model\World\WorldFactory;

class WorldCreator {


    /**
     * @var WorldFactory
     */
    private $worldFactory;
    /**
     * @var MemberFactory
     */
    private $memberFactory;

    function __construct(WorldFactory $worldFactory, MemberFactory $memberFactory)
    {
        $this->worldFactory = $worldFactory;
        $this->memberFactory = $memberFactory;
    }

    public function create($name, $slug, $brand, $member, User $user)
    {
        $world = $this->worldFactory->create($name, $slug, $brand, $user);

        $member = $this->memberFactory->create($world, $user, $member);

        $world->addMember($member);

        return $world;
    }

}