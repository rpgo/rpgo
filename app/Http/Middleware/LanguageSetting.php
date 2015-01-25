<?php namespace Rpgo\Http\Middleware;

use Closure;

class LanguageSetting {

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
