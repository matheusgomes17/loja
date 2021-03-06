<?php

namespace PaperStore\Http\Requests\Backend\Access\Role;

use PaperStore\Http\Requests\Request;

/**
 * Class StoreRoleRequest
 * @package PaperStore\Http\Requests\Backend\Access\Role
 */
class StoreRoleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('manage-roles');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }
}
