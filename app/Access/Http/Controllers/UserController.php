<?php namespace Rpgo\Access\Http\Controllers;

use Rpgo\Access\Http\Requests\RegisterUserRequest;
use Rpgo\Application\Commands\RegisterUserCommand;

class UserController extends Controller {

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
		$success = $this->execute(RegisterUserCommand::class, $request);

        if( ! $success)
            return redirect()->back();

        return redirect()->route('home');

	}

}
