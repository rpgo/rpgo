<?php namespace Rpgo\Access\Http\Controllers;

use Rpgo\Access\Http\Requests;
use Rpgo\Access\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Rpgo\Access\Http\Requests\CreateWorld;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class WorldController extends Controller {

    function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store']]);
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        $worlds = \Rpgo\World::all();

		return view('world.index')->with(compact('worlds'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('world.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateWorld $request
     * @return Response
     */
	public function store(CreateWorld $request)
	{
        $user = \Auth::user();

        $world = new \Rpgo\World();
        $world->name = $request->get('name');
        $world->slug = $request->get('slug');
        $world->brand = $request->get('brand');
        $world->creator()->associate($user);
        $world->save();

        $member = new \Rpgo\Member();
        $member->name = $request->get('member');
        $member->user()->associate($user);
        $member->world()->associate($world);
        $member->save();

        if(!$world || !$member)
            return redirect()->back();

        return redirect()->route('worlds.index')->with('message', 'success');



	}

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @param $tld
     * @return Response
     */
	public function show($slug)
	{
		$world = \Rpgo\World::where('slug', $slug)->first();

        if(! $world)
            throw new RouteNotFoundException;

        return view('world.show')->with(compact('world'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
