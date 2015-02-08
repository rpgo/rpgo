<?php namespace Rpgo\Application\Repository;

use Rpgo\Model\Member\Member;
use Rpgo\Model\World\World;
use Rpgo\Support\Collection\Collection;

interface MemberRepository {

    /**
     * @param Member $member
     * @return bool
     */
    public function save($member);

    /**
     * @param Member $member
     * @return bool
     */
    public function delete($member);

    /**
     * @param $id
     * @return Member
     */
    public function fetchById($id);

    /**
     * @param World $world
     * @return Collection
     */
    public function fetchAllForWorld(World $world);

}