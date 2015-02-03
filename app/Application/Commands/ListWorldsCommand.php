<?php namespace Rpgo\Application\Commands;

class ListWorldsCommand extends Command {

    /**
     * @var bool
     */
    public $published;

    /**
     * Create a new command instance.
     *
     * @param bool $published
     */
	public function __construct($published = true)
	{
        $this->published = $published;
    }

}
