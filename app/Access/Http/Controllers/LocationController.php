<?php namespace Rpgo\Access\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Rpgo\Application\Commands\AddLocationCommand;
use Rpgo\Application\Commands\RenameLocationCommand;
use Rpgo\Application\Services\Guide;
use Rpgo\Model\Location\Location;

class LocationController extends Controller {

    /**
     * Show the form for creating a new Location.
     *
     * @param $location
     * @return Response
     */
	public function create(Location $location)
	{
		return $this->view('location.create')->with(compact('location'));
	}

    /**
     * Store a newly created Location in storage.
     *
     * @param Location $container
     * @param Guide $guide
     * @param Request $request
     * @return Response
     */
	public function store(Location $container, Guide $guide, Request $request)
	{
        $location = $this->dispatchFrom(AddLocationCommand::class, $request, compact('container'));

        return redirect()->route('location.show', [$guide->world()->slug(), join('/',$location->path())]);
	}

    /**
     * Display the Location.
     *
     * @param Location $location
     * @return Response
     */
	public function show(Location $location)
	{
        return $this->view('location.show')->with(compact('location'));
	}

    /**
     * Show the form for editing the specified Location.
     *
     * @param Location $location
     * @return Response
     */
	public function edit(Location $location)
	{
		return $this->view('location.edit')->with(compact('location'));
	}

    /**
     * Update the specified Location in storage.
     *
     * @param Location $location
     * @param Guide $guide
     * @param Request $request
     * @return Response
     */
	public function update(Location $location, Guide $guide, Request $request)
	{
		$location = $this->dispatchFrom(RenameLocationCommand::class, $request, compact('location'));

        return redirect()->route('location.show', [$guide->world()->slug(), join('/', $location->path())]);
	}

    /**
     * Remove the specified Location from storage.
     *
     * @param Location $location
     * @return Response
     */
	public function destroy(Location $location)
	{
		dd($location);
	}

}
