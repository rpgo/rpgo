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
     * @param $admin
     * @param User $user
     * @return bool
     */
    public function create($name, $slug, $brand, $admin, User $user)
    {
        $world = $this->worldFactory->create($name, $brand, $slug, $user);

        $admin = $this->memberFactory->create($admin, $world, $user);

        if( ! $this->worldRepository->save($world))
            return false;

        if( ! $this->memberRepository->save($admin))
        {
            $this->worldRepository->delete($world);
            return false;
        }

        return true;
    }

}