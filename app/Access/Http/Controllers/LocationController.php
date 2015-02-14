<?php namespace Rpgo\Access\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Rpgo\Application\Commands\AddLocationCommand;
use Rpgo\Application\Services\Guide;
use Rpgo\Model\Location\Location;

class LocationController extends Controller {

    /**
     * Show the form for creating a new resource.
     *
     * @param $location
     * @return Response
     */
	public function create(Location $location)
	{
		return view('location.create')->with(compact('location'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Location $container
     * @param Guide $guide
     * @param Request $request
     * @return Response
     */
	public function store(Location $container, Guide $guide, Request $request)
	{
        $location = $this->dispatchFrom(AddLocationCommand::class, $request, compact('container'));

        return redirect()->route('location.show', [$guide->world()->slug(), $location->slug()]);
	}

    /**
     * Display the location.
     *
     * @param Location $location
     * @return Response
     */
	public function show(Location $location)
	{
        return view('location.show')->with(compact('location'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param Location $location
     * @return Response
     */
	public function edit(Location $location)
	{
		return view('location.edit');
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
