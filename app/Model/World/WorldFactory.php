<?php namespace Rpgo\Model\World;

class WorldFactory {

    private $required = ['name', 'brand', 'slug', 'creator', 'location'];

    /**
     * @param array $data
     * @return Trademark
     */
    private function getTrademark(array $data)
    {
        $name = new Name($data['name']);
        $brand = new Brand($data['brand']);
        $slug = new Slug($data['slug']);

        return new Trademark($name, $brand, $slug);
    }

    public function make(array $data)
    {
        if( ! $this->hasRequiredParameters($data))
            return null;

        return $this->makeEntity($data);
    }

    private function hasRequiredParameters($data)
    {
        foreach($this->required as $key)
            if( ! array_key_exists($key, $data))
                return false;

        return true;
    }

    /**
     * @param array $data
     * @return World
     */
    private function makeEntity(array $data)
    {
        $id = $this->getId($data);

        $trademark = $this->getTrademark($data);

        $creator = $data['creator'];

        $location = $data['location'];

        return new World($id, $trademark, $creator, $location);
    }

    /**
     * @param array $data
     * @return Id
     */
    private function getId(array $data)
    {
        if (array_key_exists('id', $data))
            return $this->makeId($data['id']);
        else
            return $this->makeId();
    }

    /**
     * @param null $id
     * @return Id
     */
    private function makeId($id = null)
    {
        return new Id($id);
    }
}
