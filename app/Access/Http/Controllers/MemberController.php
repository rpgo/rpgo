<?php namespace Rpgo\Access\Http\Controllers;

use Illuminate\Http\Response;
use Rpgo\Access\Http\Requests;
use Rpgo\Access\Http\Requests\JoinWorldRequest;
use Rpgo\Application\Commands\JoinWorldCommand;
use Rpgo\Application\Services\Guard;
use Rpgo\Application\Services\Guide;

class MemberController extends Controller {

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
     * @param Guard $guard
     * @return Response
     */
	public function create(Guard $guard)
	{
        if( ! $guard->user())
            return redirect()->route('auth.register');

		return view('member.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param JoinWorldRequest $request
     * @param Guide $guide
     * @param Guard $guard
     * @return Response
     */
	public function store(JoinWorldRequest $request, Guide $guide, Guard $guard)
	{
        $world = $guide->world();

        $user = $guard->user();

        $member = $this->execute(JoinWorldCommand::class, $request, compact('world', 'user'));

        if ( ! $member )
            return redirect()->back();

        return redirect()->route('worlds.show', [$world->slug()]);
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
