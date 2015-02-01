<?php namespace Rpgo\Access\Http\Controllers;

use Rpgo\Application\Repository\Eloquent\World;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class DashboardController extends Controller {

	public function main($slug)
    {
        $world = World::where('slug', $slug)->first();

        if(! $world)
            throw new RouteNotFoundException;

        return view('world.dashboard.main', compact('world'));
    }

}
