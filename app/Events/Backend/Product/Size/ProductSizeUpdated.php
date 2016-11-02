<?php

namespace PaperStore\Events\Backend\Product\Size;

use PaperStore\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class ProductSizeUpdated
 * @package PaperStore\Events\Backend\Product
 */
class ProductSizeUpdated extends Event
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