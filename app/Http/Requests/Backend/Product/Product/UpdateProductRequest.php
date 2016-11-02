<?php

namespace PaperStore\Http\Requests\Backend\Product\Product;

use PaperStore\Http\Requests\Request;

/**
 * Class UpdateProductRequest
 * @package PaperStore\Http\Requests\Backend\Product
 */
class UpdateProductRequest extends Request
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
     * Get the validation rules that PaperStorely to the request.
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
