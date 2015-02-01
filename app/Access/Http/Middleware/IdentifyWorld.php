<?php namespace Rpgo\Access\Http\Middleware;

use Closure;
use Rpgo\Application\Repository\WorldRepository;
use Symfony\Component\HttpKernel\Exception\HttpException;

class IdentifyWorld {

    /**
     * @var WorldRepository
     */
    private $world;

    function __construct(WorldRepository $world)
    {
        $this->world = $world;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @throws \HttpException
     */
	public function handle($request, Closure $next)
	{
        $slug = $request->route()->parameter('slug');

        $world = $this->world->fetchBySlug($slug);

        if( ! $world)
            throw new HttpException(404);

        app('view')->share(compact('world'));

        $request->route()->forgetParameter('slug');

		return $next($request);
	}

}
