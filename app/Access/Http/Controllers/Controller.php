<?php namespace Rpgo\Access\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

    public function execute($command, $source, $extras = [])
    {
        return $this->dispatchFrom($command, $source, $extras);
    }

    public function view($view = null, array $data = [], array $mergeData = [])
    {
        return view($view, $data, $mergeData);
    }

}
