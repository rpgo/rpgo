<?php namespace Rpgo\Model\World;

use Rpgo\Model\User\User;

class WorldFactory {


    /**
     * @var WorldIdGenerator
     */
    private $generator;

    function __construct(WorldIdGenerator $generator)
    {
        $this->generator = $generator;
    }

    public function create($name, $brand, $slug, User $creator)
    {
        $id = $this->generator->generateNewId();
        $trademark = $this->getTrademark($name, $brand, $slug);
        return new World($id, $trademark, $creator);
    }

    /**
     * @param $name
     * @param $slug
     * @param $brand
     * @return Trademark
     */
    private function getTrademark($name, $brand, $slug)
    {
        $name = new Name($name);
        $brand = new Brand($brand);
        $slug = new Slug($slug);
        return new Trademark($name, $brand, $slug);
    }

    public function revive($id, $name, $brand, $slug, User $creator)
    {
        $id = $this->generator->idFromString($id);
        $trademark = $this->getTrademark($name, $brand, $slug);
        return new World($id, $trademark, $creator);
    }
}
