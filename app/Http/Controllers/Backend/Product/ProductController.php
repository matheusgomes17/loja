<?php

namespace PaperStore\Http\Controllers\Backend\Product;

use PaperStore\Http\Controllers\Controller;
use PaperStore\Exceptions\GeneralException;
use PaperStore\Models\Product\Product;
use PaperStore\Http\Requests\Backend\Product\ManageProductRequest;
use PaperStore\Http\Requests\Backend\Product\StoreProductRequest;
use PaperStore\Http\Requests\Backend\Product\UpdateProductRequest;
use PaperStore\Repositories\Backend\Product\Contract\ProductRepository;
use PaperStore\Repositories\Backend\Product\Contract\ProductSizeRepository;
use PaperStore\Repositories\Backend\Product\Contract\ProductCategoryRepository;

/**
 * Class ProductController
 * @package PaperStore\Http\Controllers\Backend
 */
class ProductController extends Controller {

    /**
     * @var ProductRepository
     */
    private $products;

    /**
     * @var ProductSizeRepository
     */
    private $sizes;

    /**
     * @var ProductCategoryRepository
     */
    private $categories;

    /**
     * @param ProductRepository
     * @param ProductSizeRepository
     * @param ProductCategoryRepository
     */
    public function __construct(ProductRepository $product, ProductSizeRepository $size, ProductCategoryRepository $category) {
        $this->products = $product;
        $this->sizes = $size;
        $this->categories = $category;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index() {
        $products = $this->products->all();
        return view('backend.products.index', compact('products'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create() {
        $sizes = $this->sizes->getSizeOptions();
        $categories = $this->products->getCategoryOptions();
        return view('backend.products.create', compact('sizes', 'categories'));
    }

    /**
     * @param StoreProductRequest $request
     * @return mixed
     */
    public function store(StoreProductRequest $request) {
        try {
            $this->products->create($request->all());
            return redirect()->route('admin.product.index')->withFlashSuccess(trans('alerts.backend.products.created'));
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
            $product = $this->products->find($id);
            $size = $this->sizes->getSize();
            $sizes = $this->sizes->getSizeOptions();
            $categories = $this->categories->getCategoryOptions();
            return view('backend.products.edit', compact('product', 'size', 'sizes', 'categories'));
        } catch (GeneralException $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * @param UpdateProductCategoryRequest $request
     * @param $id
     * @return mixed
     */
    public function update($id, UpdateProductRequest $request) {
        try {
            $this->products->update($id, $request->all());
            return redirect()->route('admin.product.index')->withFlashSuccess(trans('alerts.backend.products.updated'));
        } catch (GeneralException $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id) {
        try {
            $this->products->delete($id);
            return redirect()->route('admin.product.index')->withFlashSuccess(trans('alerts.backend.products.deleted'));
        } catch (GeneralException $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function deactivated() {
        
    }

    public function deleted() {
        
    }

    public function delete() {
        
    }

    public function restore() {
        
    }

}
