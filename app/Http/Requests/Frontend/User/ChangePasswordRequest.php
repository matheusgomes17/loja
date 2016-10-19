<?php

namespace PaperStore\Http\Requests\Frontend\User;

use PaperStore\Http\Requests\Request;

/**
 * Class ChangePasswordRequest
 * @package PaperStore\Http\Requests\Frontend\Access
 */
class ChangePasswordRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->user()->canChangePassword();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => 'required',
            'password'     => 'required|min:6|confirmed',
        ];
    }
}