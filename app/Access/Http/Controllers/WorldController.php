<?php namespace Rpgo\Access\Http\Controllers;

use Illuminate\Http\Response;
use Rpgo\Access\Http\Requests;
use Rpgo\Access\Http\Requests\CreateWorldRequest;
use Rpgo\Access\Http\Requests\PublishWorldRequest;
use Rpgo\Application\Commands\CreateWorldCommand;
use Rpgo\Application\Commands\ListWorldsCommand;
use Rpgo\Application\Commands\PublishWorldCommand;
use Rpgo\Application\Services\Guard;
use Rpgo\Application\Services\Guide;

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
     * @param Guard $guard
     * @return Response
     */
	public function store(CreateWorldRequest $request, Guard $guard)
	{
        $creator = $guard->user();

        $world = $this->execute(CreateWorldCommand::class, $request, compact('creator'));

        if( ! $world)
            return redirect()->back();

        return redirect()->route('worlds.show', [$world->slug()]);
	}

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @param $tld
     * @return Response
     */
	public function show()
	{
        return view('world.show');
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

    /**
     * @param PublishWorldRequest $request
     * @param Guide $guide
     * @return \Illuminate\Http\RedirectResponse
     */
    public function publish(PublishWorldRequest $request, Guide $guide)
    {
        $world = $guide->world();

        $this->dispatchFrom(PublishWorldCommand::class, $request, compact('world'));

        return redirect()->route('worlds.dashboard.main', [$world->slug()]);
    }

}
