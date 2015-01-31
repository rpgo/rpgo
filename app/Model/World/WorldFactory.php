<?php namespace Rpgo\Model\World;

use Rpgo\Model\Contracts\User\User;
use Rpgo\Model\Contracts\World\WorldFactory as WorldFactoryContract;

final class WorldFactory implements WorldFactoryContract {


    /**
     * @var WorldIdGenerator
     */
    private $generator;

    function __construct(WorldIdGenerator $generator)
    {
        $this->generator = $generator;
    }

    public function create($name, $slug, $brand, User $user)
    {
        $id = $this->generator->next();
        $name = new Name($name);
        $slug = new Slug($slug);
        $brand = new Brand($brand);
        return new World($id, $user, $name, $slug, $brand);
    }

}
