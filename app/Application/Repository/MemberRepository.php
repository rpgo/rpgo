<?php namespace Rpgo\Application\Repository;

use Rpgo\Model\Member\Member;

interface MemberRepository {

    /**
     * @param Member $member
     * @return bool
     */
    public function save(Member $member);

    /**
     * @param Member $member
     * @return bool
     */
    public function delete(Member $member);

    /**
     * @param $id
     * @return Member
     */
    public function fetchById($id);

}