<?php namespace Rpgo\Application\Services;

use HttpException;
use Rpgo\Application\Repository\MemberRepository;
use Rpgo\Application\Repository\WorldRepository;
use Rpgo\Model\Member\Member;
use Rpgo\Model\User\User;
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
    private $worldRepository;

    private $world;
    /**
     * @var MemberRepository
     */
    private $memberRepository;

    private $member;

    function __construct(WorldRepository $worldRepository, MemberRepository $memberRepository)
    {
        $this->worldRepository = $worldRepository;
        $this->memberRepository = $memberRepository;
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

        $world = $this->worldRepository->fetchBySlug($slug);

        return $this->world = $world;
    }

    public function member(User $user = null)
    {
        if(!$user)
            return $this->member;

        $members = $this->memberRepository->fetchAllForWorld($this->world);

        if( ! $members->count() )
            return $this->member;

        $member = $members->filter(function(Member $member) use ($user) {
            return $member->user() == $user;
        })->first();

        return $this->member = $member;
    }
}