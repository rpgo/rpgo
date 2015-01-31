<?php namespace Rpgo\Access\Providers;

use Illuminate\Support\ServiceProvider;
use Rpgo\Application\Repository\MemberRepository as MemberRepositoryContract;
use Rpgo\Application\Repository\Eloquent\MemberRepository;
use Rpgo\Application\Repository\WorldRepository as WorldRepositoryContract;
use Rpgo\Application\Repository\Eloquent\WorldRepository;
use Rpgo\Application\Repository\UserRepository as UserRepositoryContract;
use Rpgo\Application\Repository\Eloquent\UserRepository;

class RepositoryServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton(
            UserRepositoryContract::class, UserRepository::class
        );

        $this->app->singleton(
            WorldRepositoryContract::class, WorldRepository::class
        );

        $this->app->singleton(
            MemberRepositoryContract::class, MemberRepository::class
        );
	}

}
