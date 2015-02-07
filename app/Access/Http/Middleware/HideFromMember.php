<?php namespace Rpgo\Access\Http\Middleware;

use Closure;
use Rpgo\Application\Services\Guide;

class HideFromMember {

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
        if($this->guide->member())
            return redirect()->route('worlds.show', [$this->guide->world()->slug()]);

        return $next($request);
    }


}
