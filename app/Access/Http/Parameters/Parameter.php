<?php namespace Rpgo\Access\Http\Parameters;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

abstract class Parameter {

    abstract public function bind($parameter);

    protected function bindingNotFound()
    {
        throw new NotFoundHttpException;
    }

}