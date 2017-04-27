<?php

namespace App\Http\Requests;

class IndexSyncTaskSyncTaskLogRequest extends ApiRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'public' => 'boolean'
		];
	}
}