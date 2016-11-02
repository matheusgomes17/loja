<?php

namespace PaperStore\Events\Backend\Product\Category;

use PaperStore\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class ProductCategoryUpdated
 * @package PaperStore\Events\Backend\Product\Category
 */
class ProductCategoryUpdated extends Event {

    use SerializesModels;

    /**
     * @var $product
     */
    public $product;

    /**
     * @param $product
     */
    public function __construct($product) {
        $this->product = $product;
    }

}
