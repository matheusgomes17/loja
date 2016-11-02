<?php

namespace PaperStore\Events\Backend\Product\Size;

use PaperStore\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class ProductSizeCreated
 * @package PaperStore\Events\Backend\Product
 */
class ProductSizeCreated extends Event
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