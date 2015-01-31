<?php namespace Rpgo\Application\Services;

use Rpgo\Application\Repository\MemberRepository;
use Rpgo\Application\Repository\WorldRepository;
use Rpgo\Model\User\User;
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

    /**
     * @var WorldRepository
     */
    private $worldRepository;

    /**
     * @var MemberRepository
     */
    private $memberRepository;

    function __construct(WorldFactory $worldFactory,
                         MemberFactory $memberFactory,
                         WorldRepository $worldRepository,
                         MemberRepository $memberRepository)
    {
        $this->worldFactory = $worldFactory;
        $this->memberFactory = $memberFactory;
        $this->worldRepository = $worldRepository;
        $this->memberRepository = $memberRepository;
    }

    /**
     * @param $name
     * @param $slug
     * @param $brand
     * @param $member
     * @param User $user
     * @return bool
     */
    public function create($name, $slug, $brand, $member, User $user)
    {
        $world = $this->worldFactory->create($name, $slug, $brand, $user);

        $member = $this->memberFactory->create($world, $user, $member);

        if( ! $this->worldRepository->save($world))
            return false;

        if( ! $this->memberRepository->save($member))
        {
            $this->worldRepository->delete($world);
            return false;
        }

        return true;
    }

}