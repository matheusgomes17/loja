<?php

namespace PaperStore\Repositories\Backend\Eloquent;

use Illuminate\Support\Facades\DB;
use Kalnoy\Nestedset\Collection;
use PaperStore\Models\Product\Category;
use PaperStore\Exceptions\GeneralException;
use PaperStore\Events\Backend\Product\Category\ProductCategoryCreated;
use PaperStore\Events\Backend\Product\Category\ProductCategoryPermanentlyDeleted;
use PaperStore\Events\Backend\Product\Category\ProductCategoryUpdated;
use PaperStore\Repositories\Backend\Product\Contract\ProductCategoryRepository as Contract;
use PaperStore\Repositories\Backend\BaseRepository;

class ProductCategoryRepository extends BaseRepository implements Contract {

    /**
     * Retorna o nome especifico do model
     * @return string
     */
    public function model() {
        return Category::class;
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input) {
        $model = $this->createStub($input);

        DB::transaction(function() use ($model) {
            if ($model->save()) {

                event(new ProductCategoryCreated($model));
                return true;
            }
            throw new GeneralException(trans('exceptions.backend.products.categories.create_error'));
        });
    }

    /**
     * @param  Category $id
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function update($id, $input) {
        $model = $this->find($id);
        $model->fill($input);

        DB::transaction(function() use ($model) {
            if ($model->save()) {
                event(new ProductCategoryUpdated($model));
                return true;
            }
            throw new GeneralException(trans('exceptions.backend.products.categories.update_error'));
        });
    }

    /**
     * @param  Category $id
     * @throws GeneralException
     * @return bool
     */
    public function delete($id) {
        $model = $this->find($id);
        
        if ($model->product->count() > 0) {
            throw new GeneralException(trans('exceptions.backend.products.categories.have_products'));
        }

        if ($model->descendants->count() > 0) {
            throw new GeneralException(trans('exceptions.backend.products.categories.parent_error'));
        }

        if ($model->delete()) {
            event(new ProductCategoryPermanentlyDeleted($model));
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.products.categories.delete_error'));
    }

    /**
     * @param  Category $except
     * @return array
     */
    public function getCategoryOptions($except = null) {
        /** @var \Kalnoy\Nestedset\QueryBuilder $query */
        $query = Category::select('id', 'name')->withDepth();
        if ($except) {
            $query->whereNotDescendantOf($except)->where('id', '<>', $except->id);
        }
        return $this->makeOptions($query->get());
    }
    
    // PROTECTED / PRIVATE METHODS

    /**
     * @param  $input
     * @return mixed
     */
    private function createStub($input) {
        $category = new Category;
        $category->name = strtolower($input['name']);
        $category->description = strtolower($input['description']);
        $category->parent_id = $input['parent_id'];

        return $category;
    }

    /**
     * @param Collection $items
     *
     * @return static
     */
    protected function makeOptions(Collection $items) {
        $options = ['' => trans('exceptions.backend.products.categories.main')];
        foreach ($items as $item) {
            $options[$item->getKey()] = str_repeat('-', $item->depth + 1).' '.$item->getName();
        }
        return $options;
    }
}