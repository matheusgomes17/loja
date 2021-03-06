<?php

namespace PaperStore\Events\Backend\Product\Product;

use PaperStore\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class ProductRestored
 * @package PaperStore\Events\Backend\Product
 */
class ProductRestored extends Event
{
	use SerializesModels;

	/**
	 * @var $product
	 */
	public $product;

	/**
	 * @param $product
	 */
	public function __construct($product)
	{
		$this->product = $product;
	}
}