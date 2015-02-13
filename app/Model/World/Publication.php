<?php namespace Rpgo\Model\World;

use Carbon\Carbon;
use Rpgo\Model\Common\Value;

class Publication extends Value {

    /**
     * @var Carbon
     */
    protected $value;

    public function __construct(Carbon $date)
    {
        $this->value = $date;
    }

    public function isPublished()
    {
        return ! $this->value->isFuture();
    }

    public function date()
    {
        return $this->value;
    }
}
