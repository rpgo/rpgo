<?php namespace Rpgo\Access\Http\Controllers;

use Illuminate\Http\Response;
use Rpgo\Application\Commands\AddLocationCommand;
use Rpgo\Application\Repository\Eloquent\Model\Location;
use Rpgo\Application\Repository\LocationRepository;
use Rpgo\Application\Services\Guide;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LocationController extends Controller {

    /**
     * @var Guide
     */
    private $guide;
    /**
     * @var LocationRepository
     */
    private $location;

    /**
     * @param Guide $guide
     * @param LocationRepository $location
     */
    public function __construct(Guide $guide, LocationRepository $location)
    {
        $this->guide = $guide;
        $this->location = $location;
    }

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($location)
	{
        $location = $this->location($location);

		return view('location.create')->with(compact('location'));
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
     * Display the location.
     *
     * @param string $location
     * @return Response
     */
	public function show($location)
	{
        $location = $this->location($location);

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

    /**
     * @param $location
     * @return mixed
     */
    private function location($location)
    {
        $world = $this->guide->world();

        $path = explode('/', $location);

        $location = $this->location->fetchByWorldAndPath($world, $path);

        if( ! $location )
            throw new NotFoundHttpException;

        return $location;
    }

}
