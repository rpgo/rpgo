<?php namespace Rpgo\Application\Repository\Eloquent\Model;

class Eloquent {

    private $models = [
        'User',
        'World',
        'Member',
    ];

    private $model;

    public function __call($name, $arguments)
    {
        if ( in_array(ucfirst($name), $this->models) )
            return $this->configure($name);

        return $this->forward($name, $arguments);

    }

    private function model()
    {
        return __NAMESPACE__ . '\\' . $this->model;
    }

    private function configure($name)
    {
        $this->model = ucfirst($name);
        return $this;
    }

    private function forward($name, $arguments)
    {
        return forward_static_call_array([$this->model(), $name],$arguments);
    }


}