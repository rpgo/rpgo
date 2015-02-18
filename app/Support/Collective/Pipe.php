<?php namespace Rpgo\Support\Collective;

use Closure;
use Rpgo\Support\Collective\Contract\Pipe as PipeContract;

class Pipe implements PipeContract {

    private $items = [];

    /**
     * Add an item to the end of the pipe.
     *
     * @param $item
     * @return void
     */
    public function put($item)
    {
        $this->items[] = $item;
    }

    /**
     * Return the first item of the pipe and remove it from the pipe.
     *
     * @return mixed
     */
    public function get()
    {
        return array_shift($this->items);
    }

    /**
     * Empty out the pipe.
     *
     * @return void
     */
    public function clear()
    {
        $this->items = [];
    }

    /**
     * Loop through the items in the pipe and empty it in the process.
     *
     * @param callable $closure
     * @return array
     */
    public function each(Closure $closure)
    {
        $items = [];

        foreach($this->items as $item)
            $items[] = $closure($item);

        $this->clear();

        return $items;
    }

    public function dump()
    {
        $save = $this->items;

        $this->clear();

        return $save;
    }
}
