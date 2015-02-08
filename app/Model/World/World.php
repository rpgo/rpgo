<?php namespace Rpgo\Model\World;

use Carbon\Carbon;
use Rpgo\Model\User\User;
use Rpgo\Support\Collection\Collection;

class World {

    /**
     * @var WorldId
     */
    private $id;
    /**
     * @var Trademark
     */
    private $trademark;
    /**
     * @var User
     */
    private $creator;

    /**
     * @var Collection
     */
    private $members;

    /**
     * @var Publication
     */
    private $publication;

    function __construct(WorldId $id, Trademark $trademark, User $creator)
    {
        $this->id = $id;
        $this->trademark = $trademark;
        $this->creator = $creator;
    }

    public function id()
    {
        return (string) $this->id;
    }

    public function name()
    {
        return (string) $this->trademark->name();
    }

    public function slug()
    {
        return (string) $this->trademark->slug();
    }

    public function brand()
    {
        return (string) $this->trademark->brand();
    }

    public function creator()
    {
        return $this->creator;
    }

    public function members(Collection $members = null)
    {
        return $members ? $this->members = $members : $this->members;
    }

    public function isPublished()
    {
        if(!$this->publication)
            return false;
        
        return $this->publication->isPublished();
    }

    public function publish()
    {
        $this->publishedOn(Carbon::now());
    }

    public function publishedOn(Carbon $date = null)
    {
        if(!$date)
            return $this->publicationDate();

        return $this->publication = new Publication($date);
    }

    private function publicationDate()
    {
        if(! $this->publication)
            return null;
        return $this->publication->date();
    }
}
