<?php namespace Rpgo\Application\Repository\Eloquent;

use Carbon\Carbon;
use Rpgo\Application\Repository\Eloquent\Model\Eloquent;
use Rpgo\Application\Repository\RepositoryManager;
use Rpgo\Application\Repository\WorldRepository as WorldRepositoryContract;
use Rpgo\Model\World\World as Model;
use Rpgo\Model\World\WorldFactory;
use Rpgo\Support\Collection\Collection;

class WorldRepository extends Repository implements WorldRepositoryContract {

    /**
     * @var WorldFactory
     */
    private $factory;
    /**
     * @var Eloquent
     */
    private $eloquent;

    function __construct(RepositoryManager $manager, WorldFactory $factory, Eloquent $eloquent)
    {
        $this->factory = $factory;
        parent::__construct($manager);
        $this->eloquent = $eloquent->world();
    }

    /**
     * @param Model $model
     * @return bool
     */
    public function save(Model $model)
    {
        $eloquent = $this->eloquent->findOrNew($model->id());

        $eloquent->id = $model->id();
        $eloquent->name = $model->name();
        $eloquent->slug = $model->slug();
        $eloquent->brand = $model->brand();
        $eloquent->creator_id = $model->creator()->id();
        $eloquent->published_at = $model->publishedOn();

        return $eloquent->save();
    }

    /**
     * @param Model $model
     * @return bool
     */
    public function delete(Model $model)
    {
        $eloquent = $this->eloquent->find($model->id());

        return $eloquent->delete();
    }

    /**
     * @param string $id
     * @return null|Model
     */
    public function fetchById($id)
    {
        $eloquent = $this->eloquent->find($id);

        return $this->getModel($eloquent);
    }

    /**
     * @return Collection
     */
    public function fetchAll()
    {
        $eloquents = $this->eloquent->all();

        return $this->getModels($eloquents);

    }

    /**
     * @param string $slug
     * @return null|Model
     */
    public function fetchBySlug($slug)
    {
        $eloquent = $this->eloquent->where('slug', $slug)->first();

        return $this->getModel($eloquent);
    }

    /**
     * @param Eloquent $eloquent
     * @return null|Model
     */
    private function getModel($eloquent)
    {
        if( ! $eloquent)
            return null;

        $creator = $this->user()->fetchById($eloquent->creator_id);

        $model = $this->factory->revive($eloquent->id, $eloquent->name, $eloquent->brand, $eloquent->slug, $creator);

        $model->publishedOn($eloquent->published_at);

        return $model;
    }

    /**
     * @return Collection
     */
    public function fetchAllPublished()
    {
        $eloquents = $this->eloquent->with(['creator', 'members'])->where('published_at', '<=', Carbon::now())->get();

        return $this->getModels($eloquents);
    }

    /**
     * @param $eloquents
     * @return Collection
     */
    private function getModels($eloquents)
    {
        $worlds = new Collection();

        foreach ($eloquents as $eloquent) {
            $world = $this->getModel($eloquent);

            $members = $this->member()->fetchAllForWorld($world);

            $world->members($members);

            $worlds->add($world);
        }

        return $worlds;
    }
}
