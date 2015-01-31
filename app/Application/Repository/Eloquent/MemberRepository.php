<?php namespace Rpgo\Application\Repository\Eloquent;

use Rpgo\Application\Repository\Eloquent\Member as Eloquent;
use Rpgo\Application\Repository\MemberRepository as MemberRepositoryContract;
use Rpgo\Model\Member\Member;

class MemberRepository implements MemberRepositoryContract {

    public function save(Member $member)
    {
        $eloquent = Eloquent::findOrNew($member->id());

        $eloquent->id = $member->id();
        $eloquent->name = $member->name();
        $eloquent->world_id = $member->world()->id();
        $eloquent->user_id = $member->user()->id();

        return $eloquent->save();
    }

    public function delete(Member $member)
    {
        $eloquent = Eloquent::find($member->id());

        return $eloquent->delete();
    }

    /**
     * @param $id
     * @return Member
     */
    public function fetchById($id)
    {
        // TODO: Implement fetchById() method.
    }
}
