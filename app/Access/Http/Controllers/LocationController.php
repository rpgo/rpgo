<?php namespace Rpgo\Access\Http\Controllers;

use Illuminate\Http\Response;
use Rpgo\Application\Commands\AddLocationCommand;
use Rpgo\Application\Repository\Eloquent\Model\Location;
use Rpgo\Application\Repository\LocationRepository;
use Rpgo\Application\Services\Guide;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LocationController extends Controller {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($location)
	{
		dd("creating ".$location);
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
     * @param string $location
     * @param Guide $guide
     * @param LocationRepository $repository
     * @return Response
     */
	public function show($location, Guide $guide, LocationRepository $repository)
	{
        $world = $guide->world();

		$path = explode('/', $location);

        $location = $repository->fetchByWorldAndPath($world, $path);

        if( ! $location )
            throw new NotFoundHttpException;

        return view('location.show')->with(compact('location'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($location)
	{
		dd("editing ". $location);
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
