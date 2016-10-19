<?php

namespace PaperStore\Http\Requests\Frontend\User;

use PaperStore\Http\Requests\Request;

/**
 * Class UpdateProfileRequest
 * @package PaperStore\Http\Requests\Frontend\User
 */
class UpdateProfileRequest extends Request
{
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required',
            'email' => 'sometimes|required|email',
        ];
    }
}