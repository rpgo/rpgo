<?php namespace Rpgo\Application\Repository\Eloquent;

use Carbon\Carbon;
use Rpgo\Application\Repository\Eloquent\Model\Eloquent as EloquentAdapter;
use Rpgo\Application\Repository\RepositoryManager;
use Rpgo\Application\Repository\WorldRepository as WorldRepositoryContract;
use Rpgo\Model\World\World as Entity;
use Rpgo\Application\Repository\Eloquent\Model\World as Eloquent;
use Rpgo\Model\World\WorldFactory;
use Rpgo\Support\Collection\Collection;

class WorldRepository extends Repository implements WorldRepositoryContract {

    /**
     * @var WorldFactory
     */
    private $factory;

    protected $with = []; // members?

    function __construct(RepositoryManager $manager, WorldFactory $factory, EloquentAdapter $eloquent)
    {
        $this->factory = $factory;
        parent::__construct($manager);
        $this->eloquent = $eloquent->world();
    }

    /**
     * @param string $slug
     * @return null|Entity
     */
    public function fetchBySlug($slug)
    {
        $eloquent = $this->eloquent
            ->where('slug', $slug)
            ->first();

        return $this->getEntity($eloquent);
    }

    /**
     * @return Collection
     */
    public function fetchAllPublished()
    {
        $eloquents = $this->eloquent
            ->where('published_at', '<=', Carbon::now())
            ->get();

        return $this->getEntities($eloquents);
    }

    /**
     * @param Entity $world
     * @return array
     */
    protected function getEloquentAttributes($world)
    {
        return [
            'id'           => $world->id(),
            'name'         => $world->name(),
            'slug'         => $world->slug(),
            'brand'        => $world->brand(),
            'creator_id'   => $world->creator()->id(),
            'published_at' => $world->publishedOn(),
        ];
    }

    /**
     * @return Eloquent
     */
    protected function eloquent()
    {
        return $this->eloquent;
    }

    /**
     * @param Eloquent $eloquent
     * @return Entity
     */
    protected function getEntity($eloquent)
    {
        $creator = $this->user()->fetchById($eloquent->creator_id);

        $entity = $this->factory->revive($eloquent->id, $eloquent->name, $eloquent->brand, $eloquent->slug, $creator);

        $entity->publishedOn($eloquent->published_at);

        if (in_array('members', $this->with))
        {
            $this->without('members');
            $members = $this->member()->fetchAllForWorld($entity);
            $entity->members($members);
        }

        return $entity;
    }
}
