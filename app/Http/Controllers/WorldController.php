<?php namespace Rpgo\Http\Controllers;

use Rpgo\Http\Requests;
use Rpgo\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Rpgo\Http\Requests\CreateWorld;
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
     * @param CreateWorld $request
     * @return Response
     */
	public function store(CreateWorld $request)
	{
        $data = array_merge($request->all(),['creator_id' => \Auth::user()->id]);

        $world = \Rpgo\World::create($data);

        if(!$world)
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
