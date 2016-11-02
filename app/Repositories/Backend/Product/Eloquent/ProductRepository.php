<?php

namespace PaperStore\Repositories\Backend\Eloquent;

use Illuminate\Support\Facades\DB;
use Kalnoy\Nestedset\Collection;
use PaperStore\Models\Product\Product;
use PaperStore\Models\Product\Category;
use PaperStore\Exceptions\GeneralException;
use PaperStore\Events\Backend\Product\Product\ProductCreated;
use PaperStore\Events\Backend\Product\Product\ProductDeactivated;
use PaperStore\Events\Backend\Product\Product\ProductDeleted;
use PaperStore\Events\Backend\Product\Product\ProductPermanentlyDeleted;
use PaperStore\Events\Backend\Product\Product\ProductReactivated;
use PaperStore\Events\Backend\Product\Product\ProductRestored;
use PaperStore\Events\Backend\Product\Product\ProductUpdated;
use PaperStore\Repositories\Backend\Product\Contract\ProductRepository as Contract;
use PaperStore\Repositories\Backend\BaseRepository;

class ProductRepository extends BaseRepository implements Contract {

    /**
     * Retorna o nome especifico do model
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
        $model = $this->createStub($input);

        DB::transaction(function() use ($model, $input) {
            if ($model->save()) {
                // Cria as medidas na tabela pivot
                $this->createSize($model->id, $input['size']);

                event(new ProductCreated($model));
                return true;
            }
            throw new GeneralException(trans('exceptions.backend.products.create_error'));
        });
    }

    /**
     * @param  $id
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function update($id, $input)
    {
        $model = $this->find($id);

        DB::transaction(function() use ($model, $input) {
            if ($model->update($input)) {
                // Remove dados antigos e registra novos dados atualizados
                $this->updateSize($model->id, $input['size']);

                event(new ProductUpdated($model));
                return true;
            }
            throw new GeneralException(trans('exceptions.backend.products.update_error'));
        });
    }

    /**
     * 
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return bool
     */
    public function delete($id)
    {
        $model = $this->find($id);

        if ($model->user_id != auth()->user()->id) {
            return new GeneralException(trans('exceptions.backend.products.belongs_user'));
        }

        DB::transaction(function() use ($model) {
            // Retire todas as medidas associadas
            $model->size()->sync([]);

            if ($model->delete()) {
                event(new ProductPermanentlyDeleted($model));
                return true;
            }
            throw new GeneralException(trans('exceptions.backend.products.delete_error'));
        });
    }
    
    /**
     * @param  Category $except
     * @return array
     */
    public function getCategoryOptions($except = null)
    {
        /** @var \Kalnoy\Nestedset\QueryBuilder $query */
        $query = Category::select('id', 'name')->withDepth();
        if ($except) {
            $query->whereNotDescendantOf($except)->where('id', '<>', $except->id);
        }
        return $this->makeCategoryOptions($query->get());
    }

    // PROTECTED / PRIVATE METHODS

    /**
     * @param  Product $productId
     * @param  $input
     * @return Product
     */
    private function createSize($productId, array $input)
    {
        $product = $this->find($productId);

        // Registra os dados na tabela pivot
        foreach ($input as $size) {
            $product->size()->attach($size);
        }

        return $product;
    }

    /**
     * @param  Product $productId
     * @param  $input
     * @return Product
     */
    private function updateSize($productId, array $input)
    {
        $product = $this->find($productId);
        $sizes = $product->size()->get();

        // Remove os dados antigos da tabela pivot
        foreach ($sizes as $size) {
            $product->size()->detach($size);
        }

        // Registra os novos dados na tabela pivot
        foreach ($input as $value) {
            $product->size()->attach($value);
        }

        return $product;
    }

    /**
     * @param  $input
     * @return mixed
     */
    private function createStub($input)
    {
        $product                = new Product;
        $product->user_id       = auth()->user()->id;
        $product->category_id   = $input['category_id'];;
        $product->name          = strtolower($input['name']);
        $product->cover         = $input['cover'];
        $product->cod           = strtolower($input['cod']);
        $product->price         = number_format($input['price'], 2, '.', '');
        $product->description   = strtolower($input['description']);
        $product->qtd           = $input['qtd'];
        return $product;
    }

    /**
     * @param  Collection $items
     * @return static
     */
    protected function makeCategoryOptions(Collection $items)
    {
        $options = ['' => trans('exceptions.backend.products.category_error')];

        if ($items->count() > 0) {
            foreach ($items as $item) {
                if ($item['attributes']['depth'] != 0) {
                    unset($options['']);
                    $options[$item->getKey()] = str_repeat('-', $item->depth + 1) . ' ' . $item->getName();
                }
            }
        }
        return $options;
    }
}