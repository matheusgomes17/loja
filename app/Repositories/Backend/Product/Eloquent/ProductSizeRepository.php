<?php

namespace PaperStore\Repositories\Backend\Eloquent;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use PaperStore\Models\Product\Size;
use PaperStore\Exceptions\GeneralException;
use PaperStore\Events\Backend\Product\Size\ProductSizeCreated;
use PaperStore\Events\Backend\Product\Size\ProductSizePermanentlyDeleted;
use PaperStore\Events\Backend\Product\Size\ProductSizeUpdated;
use PaperStore\Repositories\Backend\Product\Contract\ProductSizeRepository as Contract;
use PaperStore\Repositories\Backend\BaseRepository;

class ProductSizeRepository extends BaseRepository implements Contract {


    /**
     * Retorna o nome especifico do model
     * @return string
     */
    public function model() {
        return Size::class;
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

                event(new ProductSizeCreated($model));
                return true;
            }
            throw new GeneralException(trans('exceptions.backend.products.sizes.create_error'));
        });
    }

    /**
     * @param  Size $id
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function update($id, $input) {
        $model = $this->find($id);
        $model->fill($input);

        DB::transaction(function() use ($model) {
            if ($model->save()) {

                event(new ProductSizeUpdated($model));
                return true;
            }
            throw new GeneralException(trans('exceptions.backend.products.sizes.update_error'));
        });
    }

    /**
     * @param  Size $id
     * @throws GeneralException
     * @return bool
     */
    public function delete($id) {
        $model = $this->find($id);

        if ($model->delete()) {

            event(new ProductSizePermanentlyDeleted($model));
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.products.sizes.delete_error'));
    }

    /**
     * @param  Size $except
     * @return SizeController
     */
    public function getSizeOptions() {
        $query = Size::select('id', 'rgt', 'lft');
        return $this->makeSizeOptions($query->get());
    }

    /**
     * Retorna um array com as medidas
     * @return array
     */
    public function getSize()
    {
        return $this->model->getSize();
    }

    // PROTECTED / PRIVATE METHODS

    /**
     * @param  $input
     * @return mixed
     */
    private function createStub($input) {
        $size = new Size;
        $size->type = strtolower($input['type']);
        $size->rgt = $input['rgt'];
        $size->lft = $input['lft'];
        return $size;
    }

    /**
     * @param Collection $items
     * @return static
     */
    protected function makeSizeOptions(Collection $items) {
        $options = [];

        foreach ($items as $item) {
            $options[$item->id] = $item->getName();
        }

        return $options;
    }
}