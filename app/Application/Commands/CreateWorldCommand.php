<?php namespace Rpgo\Application\Commands;

use Rpgo\Support\Contracts\Guard\Guard;
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
     * @param Guard $guard
     * @return bool
     */
	public function handle(Guard $guard)
	{
        $user = $guard->user();

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
