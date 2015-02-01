<?php namespace Rpgo\Access\Http\Controllers;

use Rpgo\Access\Http\Requests;
use Rpgo\Access\Http\Requests\CreateWorldRequest;
use Rpgo\Application\Commands\CreateWorldCommand;
use Rpgo\Application\Commands\ListWorldsCommand;
use Rpgo\Application\Repository\Eloquent\World;
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
        $worlds = $this->dispatch(new ListWorldsCommand());

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
     * @param CreateWorldRequest $request
     * @return Response
     */
	public function store(CreateWorldRequest $request)
	{
        $success = $this->execute(CreateWorldCommand::class, $request);

        if( ! $success)
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
		$world = World::where('slug', $slug)->first();

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
