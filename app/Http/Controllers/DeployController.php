<?php namespace Rpgo\Http\Controllers;

use Rpgo\Http\Requests;
use Rpgo\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DeployController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function migrate()
    {
        $exit = \Artisan::call('migrate');

        return 'The database migration exit code was: ' . $exit;
    }

}
