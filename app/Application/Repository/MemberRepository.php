<?php namespace Rpgo\Application\Repository;

use Rpgo\Model\Member\Member;
use Rpgo\Model\World\World;
use Rpgo\Support\Collection\Collection;

interface MemberRepository extends Repository {

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
     * @param string $id
     * @return Member
     */
    public function fetchById($id);

    /**
     * @return Collection
     */
    public function fetchAll();

    /**
     * @param World $world
     * @return Collection
     */
    public function fetchAllForWorld(World $world);

}