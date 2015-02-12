<?php namespace Rpgo\Model\Location;

class Factory {

    private $required = ['name', 'slug'];

    public function make(array $data)
    {
        if( ! $this->hasRequiredParameters($data))
            return false;

        return $this->makeEntity($data);
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

    private function hasRequiredParameters($data)
    {
        foreach($this->required as $key)
            if( ! array_key_exists($key, $data))
                return false;

        return true;
    }

    /**
     * @param array $data
     * @return null
     */
    private function getContainer(array $data)
    {
        if (array_key_exists('container', $data))
            return $data['container'];

        return null;
    }

    /**
     * @param array $data
     * @return Location
     */
    private function makeEntity(array $data)
    {
        $id = $this->getId($data);

        $name = new Name($data['name']);

        $slug = new Slug($data['slug']);

        $container = $this->getContainer($data);

        return new Location($id, $name, $slug, $container);
    }
}
