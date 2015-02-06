<?php namespace Rpgo\Application\Commands;

use Illuminate\Validation\Factory;
use Rpgo\Application\Exception\UnauthorizedException;
use Rpgo\Application\Exception\ValidationException;
use Rpgo\Support\Bus\ShouldBeValidated;

abstract class Command implements ShouldBeValidated {

    public function validate()
    {
        if ( ! app()->call([$this, 'permission']))
            throw new UnauthorizedException;

        $validation = app()->call([$this, 'validator']);

        if ( $validation->fails() )
            throw new ValidationException($validation);
    }

    public function data()
    {
        return get_object_vars($this);
    }

    public function rules()
    {
        return [];
    }

    public function permission()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function validator(Factory $validator)
    {
        return $validator->make($this->data(), app()->call([$this, 'rules']), $this->messages());
    }
}
