<?php namespace Rpgo\Access\Http\Middleware;

use Closure;
use Rpgo\Application\Services\Guide;

class OnlyIfAdmin {


    /**
     * @var Guide
     */
    private $guide;

    function __construct(Guide $guide)
    {
        $this->guide = $guide;
    }

    public function handle($request, Closure $next)
    {
        if( ! $this->guide->member() )
            return redirect()->route('worlds.show', [$this->guide->world()->slug()]);

        return $next($request);
    }

}