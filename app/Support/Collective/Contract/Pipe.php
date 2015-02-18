<?php namespace Rpgo\Support\Collective\Contract;

use Closure;

interface Pipe {

    /**
     * Add an item to the end of the pipe.
     *
     * @param $item
     * @return void
     */
    public function put($item);

    /**
     * Return the first item of the pipe and remove it from the pipe.
     *
     * @return mixed
     */
    public function get();

    /**
     * Empty out the pipe.
     *
     * @return void
     */
    public function clear();

    /**
     * Loop through the items in the pipe and empty the pipe in the process.
     *
     * @param callable $closure
     * @return void
     */
    public function each(Closure $closure);

    /**
     * Return all of the items and empty the pipe in the process.
     * @return mixed
     */
    public function dump();

}