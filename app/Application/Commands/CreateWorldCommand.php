<?php namespace Rpgo\Application\Commands;

use Rpgo\Application\Repository\MemberRepository;
use Rpgo\Application\Repository\UserRepository;
use Rpgo\Application\Repository\WorldRepository;
use Rpgo\Application\Services\WorldCreator;
use Rpgo\Model\Member\MemberFactory;
use Rpgo\Model\World\WorldFactory;
use Rpgo\Support\Guard\Guard;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateWorldCommand extends Command implements SelfHandling {
    /**
     * @var
     */
    private $name;
    /**
     * @var
     */
    private $slug;
    /**
     * @var
     */
    private $brand;
    /**
     * @var
     */
    private $member;

    /**
     * Create a new command instance.
     *
     * @param $name
     * @param $slug
     * @param $brand
     * @param $member
     */
	public function __construct($name, $slug, $brand, $member)
	{
        $this->name = $name;
        $this->slug = $slug;
        $this->brand = $brand;
        $this->member = $member;
    }

    /**
     * Execute the command.
     *
     * @param Guard $guard
     * @param WorldCreator $creator
     * @param WorldRepository $worldRepository
     * @return bool
     */
	public function handle(Guard $guard, WorldCreator $creator, WorldRepository $worldRepository)
	{
        $user = $guard->user();

        $world = $creator->create($this->name, $this->slug, $this->brand, $this->member, $user);

        return $worldRepository->save($world);
	}

}
