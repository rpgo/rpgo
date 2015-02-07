<?php namespace Rpgo\Access\Http\Requests;

use Rpgo\Application\Services\Guard;

class RegisterUserRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @param Guard $guard
     * @return bool
     */
    public function authorize(Guard $guard)
    {
        return (bool) ! $guard->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'confirmed',
        ];
    }

}
