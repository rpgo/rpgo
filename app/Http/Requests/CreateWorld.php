<?php namespace Rpgo\Http\Requests;

use Rpgo\Http\Requests\Request;

class CreateWorld extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return \Auth::check();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required|unique:worlds',
            'brand' => 'required|unique:worlds',
            'slug' => 'required|unique:worlds',
		];
	}

}