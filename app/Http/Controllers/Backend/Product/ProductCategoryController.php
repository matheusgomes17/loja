<?php

namespace PaperStore\Http\Controllers\Backend\Products;

use PaperStore\Http\Controllers\Controller;
use PaperStore\Exceptions\GeneralException;
use PaperStore\Http\Requests\Backend\Products\Category\StoreProductCategoryRequest;
use PaperStore\Http\Requests\Backend\Products\Category\UpdateProductCategoryRequest;
use PaperStore\Repositories\Backend\Product\Contract\ProductRepository;
use PaperStore\Repositories\Backend\Product\Contract\ProductCategoryRepository;

/**
 * Class ProductController
 * @package PaperStore\Http\Controllers\Backend
 */
class ProductCategoryController extends Controller {

    /**
     * @var ProductRepositoryContract
     */
    private $products;

    /**
     * @var ProductCategoryRepositoryContract
     */
    private $categories;

    /**
     * @param ProductRepositoryContract
     * @param ProductCategoryRepositoryContract
     */
    public function __construct(ProductRepositoryContract $product, ProductCategoryRepositoryContract $category) {
        $this->products = $product;
        $this->categories = $category;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index() {
        $categories = $this->categories->all();
        return view('backend.products.categories.index', compact('categories'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create() {
        $categories = $this->categories->getCategoryOptions();
        $data = \Illuminate\Support\Facades\Input::only('parent_id');
        return view('backend.products.categories.create', compact('categories', 'data'));
    }

    /**
     * @param StoreProductRequest $request
     * @return mixed
     */
    public function store(StoreProductCategoryRequest $request) {
        try {
            $this->categories->create($request->all());
            return redirect()->route('admin.product.category.index')->withFlashSuccess(trans('alerts.backend.products.categories.created'));
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
            $category = $this->categories->find($id);
            $categories = $this->categories->getCategoryOptions($category);
            return view('backend.products.categories.edit', compact('category', 'categories'));
        } catch (GeneralException $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * @param UpdateProductCategoryRequest $request
     * @param $id
     * @return mixed
     */
    public function update(UpdateProductCategoryRequest $request, $id) {
        try {
            $this->categories->update($id, $request->all());
            return redirect()->route('admin.product.category.index')->withFlashSuccess(trans('alerts.backend.products.categories.updated'));
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
            $this->categories->delete($id);
            return redirect()->route('admin.product.category.index')->withFlashSuccess(trans('alerts.backend.products.categories.deleted'));
        } catch (GeneralException $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
}
