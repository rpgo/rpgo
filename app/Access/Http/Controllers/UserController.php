<?php namespace Rpgo\Access\Http\Controllers;

use Illuminate\Http\Response;
use Rpgo\Access\Http\Requests\RegisterUserRequest;
use Rpgo\Application\Commands\RegisterUserCommand;
use Rpgo\Application\Services\Guard;

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
     * @param Guard $guard
     * @return Response
     */
	public function store(RegisterUserRequest $request, Guard $guard)
	{
		$user = $this->execute(RegisterUserCommand::class, $request);

        if( ! $user)
            return redirect()->back();

        $guard->vouch($user);

        return redirect()->route('home');

	}

}
