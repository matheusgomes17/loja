<?php

namespace PaperStore\Http\Requests\Backend\Product\Size;

use PaperStore\Http\Requests\Request;

/**
 * Class StoreProductRequest
 * @package PaperStore\Http\Requests\Backend\Product
 */
class StoreProductSizeRequest extends Request
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
