<?php

namespace PaperStore\Repositories\Backend\Product\Contract;

/**
 * Interface ProductSizeRepository
 * @package PaperStore\Repositories\Product
 */
interface ProductSizeRepository {

    /**
     * Retorna o nome especifico do model
     * @return string
     */
    public function model();

    /**
     * @param $input
     * @return mixed
     */
    public function create($input);

    /**
     * @param $id
     * @param $input
     * @return mixed
     */
    public function update($id, $input);

    /**
     * @param  $id
     * @return mixed
     */
    public function delete($id);
}
