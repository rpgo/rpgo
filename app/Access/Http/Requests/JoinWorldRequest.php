<?php namespace Rpgo\Access\Http\Requests;

use Rpgo\Application\Services\Guide;

class JoinWorldRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

    /**
     * Get the validation rules that apply to the request.
     *
     * @param Guide $guide
     * @return array
     */
	public function rules(Guide $guide)
	{
        $world = $guide->world();

		return [
			'name' => 'unique:members,name,NULL,id,world_id,' . $world->id()
		];
	}

}
