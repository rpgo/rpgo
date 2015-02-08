<?php namespace Rpgo\Access\Http\Requests;

use Rpgo\Application\Services\Guide;

class PublishWorldRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @param Guide $guide
     * @return bool
     */
	public function authorize(Guide $guide)
	{
		return $guide->member();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [];
	}

}
