<?php namespace Rpgo\Access\Providers;

use Illuminate\Support\ServiceProvider;
use Rpgo\Application\Repository\RepositoryManager;

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
        $this->app->singleton('Rpgo\Application\Repository\RepositoryManager', function($app)
        {
            return new RepositoryManager($app);
        });
        $this->app->alias('Rpgo\Application\Repository\RepositoryManager', 'repository');

		$this->app->singleton('Rpgo\Application\Repository\UserRepository', 'Rpgo\Application\Repository\Eloquent\UserRepository');
        $this->app->alias('Rpgo\Application\Repository\UserRepository', 'repository.user');

        $this->app->singleton('Rpgo\Application\Repository\WorldRepository', 'Rpgo\Application\Repository\Eloquent\WorldRepository');
        $this->app->alias('Rpgo\Application\Repository\WorldRepository', 'repository.world');

        $this->app->singleton('Rpgo\Application\Repository\MemberRepository', 'Rpgo\Application\Repository\Eloquent\MemberRepository');
        $this->app->alias('Rpgo\Application\Repository\UserRepository', 'repository.user');
	}

}
