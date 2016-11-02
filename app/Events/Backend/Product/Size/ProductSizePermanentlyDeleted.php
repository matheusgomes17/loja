<?php

namespace PaperStore\Events\Backend\Product\Size;

use PaperStore\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class ProductSizePermanentlyDeleted
 * @package PaperStore\Events\Backend\Product
 */
class ProductSizePermanentlyDeleted extends Event
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