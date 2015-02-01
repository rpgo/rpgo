<?php namespace Rpgo\Access\Http\Controllers;

use Rpgo\Access\Http\Requests\RegisterUserRequest;
use Rpgo\Application\Commands\RegisterUserCommand;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('user.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param RegisterUserRequest $request
     * @return Response
     */
	public function store(RegisterUserRequest $request)
	{
		$success = $this->dispatchFrom(RegisterUserCommand::class, $request);

        if( ! $success)
            return redirect()->back();

        return redirect()->route('home');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
