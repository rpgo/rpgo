<?php namespace Rpgo\Http\Controllers;

use Rpgo\Http\Requests;
use Rpgo\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class WorldController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        $worlds = \Rpgo\World::all();

		return view('world.index', ["worlds" => $worlds]);
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
	 * @return Response
	 */
	public function store()
	{
		//
	}

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @param $tld
     * @return Response
     */
	public function show($slug, $tld)
	{
		$world = \Rpgo\World::where('slug', $slug)->first();

        if(! $world)
            throw new RouteNotFoundException;

        return view('world.show', ['world' => $world]);
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
