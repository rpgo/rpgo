<?php namespace Rpgo\Access\Http\Middleware;

use Closure;
use Rpgo\Application\Exception\WorldNotFoundException;
use Rpgo\Application\Services\Guide;

class UnpublishedOnlyToMembers {

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
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

        $world = $this->guide->world();

        $member = $this->guide->member();

        if( ! $world->isPublished() and ! $member )
            throw new WorldNotFoundException(404);

		return $next($request);
	}

}
