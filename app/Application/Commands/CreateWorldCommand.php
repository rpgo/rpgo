<?php namespace Rpgo\Application\Commands;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateWorldCommand implements SelfHandling {
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
     * @param $name
     * @param $slug
     * @param $brand
     * @param $member
     */
	public function __construct($name, $slug, $brand, $member)
	{
		//
        $this->name = $name;
        $this->slug = $slug;
        $this->brand = $brand;
        $this->member = $member;
    }

	/**
	 * Execute the command.
	 */
	public function handle(Guard $auth)
	{
        $user = $auth->user();

        $world = new \Rpgo\Application\Repository\Eloquent\World();
        $world->name = $this->name;
        $world->slug = $this->slug;
        $world->brand = $this->brand;
        $world->creator()->associate($user);
        $world->save();

        $member = new \Rpgo\Application\Repository\Eloquent\Member();
        $member->name = $this->member;
        $member->user()->associate($user);
        $member->world()->associate($world);
        $member->save();

        return $world && $member;
	}

}
