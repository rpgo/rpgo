<?php namespace Rpgo\Access\Http\Middleware;

use Closure;

class SetLanguage {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        //\App::setlocale('hu');

        return $next($request);
	}

}
