<?php namespace Rpgo\Application\Commands\Handlers;

use Rpgo\Application\Commands\JoinWorldCommand;

use Illuminate\Queue\InteractsWithQueue;
use Rpgo\Application\Repository\MemberRepository;
use Rpgo\Model\Member\Member;
use Rpgo\Model\Member\MemberFactory;

class JoinWorldCommandHandler {
    /**
     * @var MemberFactory
     */
    private $member;
    /**
     * @var MemberRepository
     */
    private $repository;

    /**
     * Create the command handler.
     * @param MemberFactory $member
     * @param MemberRepository $repository
     */
	public function __construct(MemberFactory $member, MemberRepository $repository)
	{
		//
        $this->member = $member;
        $this->repository = $repository;
    }

    /**
     * Handle the command.
     *
     * @param  JoinWorldCommand $command
     * @return null|Member
     */
	public function handle(JoinWorldCommand $command)
	{
		$member = $this->member->create($command->name, $command->world, $command->user);

        if( ! $this->repository->save($member))
            return null;

        return $member;
	}

}
