<?php namespace Rpgo\Access\Http\Middleware;

use Closure;
use Rpgo\Application\Repository\WorldRepository;
use Rpgo\Application\Services\Guide;
use Symfony\Component\HttpKernel\Exception\HttpException;

class IdentifyWorld {

    /**
     * @var Guide
     */
    private $guide;

    function __construct(Guide $guide)
    {
        $this->guide = $guide;
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

        $world = $this->guide->world($slug);

        app('view')->share(compact('world'));

        $request->route()->forgetParameter('slug');

		return $next($request);
	}

}
