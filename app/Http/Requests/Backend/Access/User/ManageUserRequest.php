<?php

namespace PaperStore\Http\Requests\Backend\Access\User;

use PaperStore\Http\Requests\Request;

/**
 * Class ManageUserRequest
 * @package PaperStore\Http\Requests\Backend\Access\User
 */
class ManageUserRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return access()->allow('manage-users');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			//
		];
	}
}
