<?php namespace Rpgo\Model\World;

use Carbon\Carbon;

class Publication {

    /**
     * @var Carbon
     */
    private $date;

    public function __construct(Carbon $date)
    {
        $this->date = $date;
    }

    public function isPublished()
    {
        return ! $this->date->isFuture();
    }

    public function date()
    {
        return $this->date;
    }
}
