<?php namespace Rpgo\Access\Http\Requests;

use Rpgo\Application\Services\Guard;
use Rpgo\Application\Services\Guide;

class JoinWorldRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @param Guide $guide
     * @param Guard $guard
     * @return bool
     */
	public function authorize(Guide $guide, Guard $guard)
	{
		return (bool) $guard->user() && $guide->world();
	}

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
	public function rules()
	{
        return [];
	}

}
