<?php

namespace PaperStore\Http\Controllers\Backend\Product;

use PaperStore\Http\Controllers\Controller;
use PaperStore\Exceptions\GeneralException;
use PaperStore\Http\Requests\Backend\Products\Size\StoreProductSizeRequest;
use PaperStore\Http\Requests\Backend\Products\Size\UpdateProductSizeRequest;
use PaperStore\Repositories\Backend\Product\Contract\ProductSizeRepository;

/**
 * Class ProductSizeController
 * @package PaperStore\Http\Controllers\Backend\
 */
class ProductSizeController extends Controller
{
    /**
     * @var ProductSizeRepository
     */
    private $sizes;

	/**
	 * @param ProductSizeRepository
	 */
	public function __construct(ProductSizeRepository $size)
	{
        $this->sizes = $size;
	}

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sizes = $this->sizes->all();
        return view('backend.products.sizes.index', compact('sizes'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $sizes = $this->sizes->getSize();
        return view('backend.products.sizes.create', compact('sizes'));
    }

	/**
     * @param StoreProductRequest $request
     * @return mixed
     */
    public function store(StoreProductSizeRequest $request)
    {
        try {
            $this->sizes->create($request->all());
            return redirect()->route('admin.product.size.index')->withFlashSuccess(trans('alerts.backend.products.sizes.created'));
        } catch (GeneralException $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        try {
            $size = $this->sizes->find($id);
            $sizes = $this->sizes->getSize();
            return view('backend.products.sizes.edit', compact('size', 'sizes'));
        } catch (GeneralException $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * @param UpdateProductSizeRequest $request
     * @param $id
     * @return mixed
     */
    public function update(UpdateProductSizeRequest $request, $id) {
        try {
            $this->sizes->update($id, $request->all());
            return redirect()->route('admin.product.size.index')->withFlashSuccess(trans('alerts.backend.products.sizes.updated'));
        } catch (GeneralException $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        try {
            $this->sizes->delete($id);
            return redirect()->route('admin.product.size.index')->withFlashSuccess(trans('alerts.backend.products.sizes.deleted'));
        } catch (GeneralException $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
}