<?php

namespace PaperStore\Repositories\Backend\Product\Contract;

/**
 * Interface ProductRepository
 * @package PaperStore\Repositories\Product
 */
interface ProductRepository {

    /**
     * Retorna o nome especifico do model
     * @return string
     */
    public function model();

    /**
     * @param  array $input
     * @return mixed
     */
    public function create($input);

    /**
     * @param  $id
     * @param  array $input
     * @return mixed
     */
    public function update($id, $input);

    /**
     * @param  $id
     * @return mixed
     */
    public function destroy($id);

    /**
     * @param  $id
     * @return mixed
     */
    public function delete($id);
}
