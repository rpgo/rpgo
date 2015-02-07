<?php namespace Rpgo\Application\Commands;

use Illuminate\Validation\Factory;
use Illuminate\Validation\Validator;
use Rpgo\Application\Exception\UnauthorizedException;
use Rpgo\Application\Exception\ValidationException;

trait ValidatesWhenResolved {

    /**
     * @throws UnauthorizedException
     * @throws ValidationException
     */
    public function validate()
    {
        if ( method_exists($this, 'authorize') && ! app()->call([$this, 'authorize']))
            throw new UnauthorizedException;

        if ( ! method_exists($this, 'rules') )
            return;

        $validation = app()->call([$this, 'validator']);

        if ( $validation->fails() )
            throw new ValidationException($validation->errors());
    }

    /**
     * @return array
     */
    public function data()
    {
        return get_object_vars($this);
    }

    /**
     * @param Factory $validator
     * @return Validator
     */
    public function validator(Factory $validator)
    {
        return $validator->make($this->data(), app()->call([$this, 'rules']), $this->messages());
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [];
    }

}