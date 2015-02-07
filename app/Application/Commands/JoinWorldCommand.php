<?php namespace Rpgo\Application\Commands;

use Rpgo\Application\Repository\MemberRepository;
use Rpgo\Model\Member\Member;
use Rpgo\Model\User\User;
use Rpgo\Model\World\World;

class JoinWorldCommand extends Command {

    /**
     * @var string
     */
    public $name;
    /**
     * @var World
     */
    public $world;
    /**
     * @var User
     */
    public $user;

    /**
     * Create a new command instance.
     * @param string $name
     * @param World $world
     * @param User $user
     */
	public function __construct($name, World $world, User $user)
	{
        $this->name = $name;
        $this->world = $world;
        $this->user = $user;
    }

    /**
     * @param MemberRepository $memberRepository
     * @return bool
     */
    public function authorize(MemberRepository $memberRepository)
    {
        $members = $memberRepository
            ->fetchAllForWorld($this->world)
            ->filter(function(Member $member){ return $member->user() == $this->user; });

        if($members->count())
            return false;

        return true;

    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:30', 'unique:members,name,NULL,id,world_id,' . $this->world->id()],
        ];
    }

}
