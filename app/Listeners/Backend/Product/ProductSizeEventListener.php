<?php

namespace PaperStore\Listeners\Backend\Product;

/**
 * Class ProductSizeEventListener
 * @package PaperStore\Listeners\Backend\Product
 */
class ProductSizeEventListener
{
	/**
	 * @var string
	 */
	private $history_slug = 'ProductSize';

	/**
	 * @param $event
	 */
	public function onCreated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.backend.products.sizes.created") <strong>'.ucwords($event->product->name).'</strong>',
			$event->product->id,
			'plus',
			'bg-green'
		);
	}

	/**
	 * @param $event
	 */
	public function onUpdated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.backend.products.sizes.updated") <strong>'.ucwords($event->product->name).'</strong>',
			$event->product->id,
			'save',
			'bg-aqua'
		);
	}
	/**
	 * @param $event
	 */
	public function onPermanentlyDeleted($event) {
		history()->log(
			$this->history_slug,
			'trans("history.backend.products.sizes.permanently_deleted") <strong>'.ucwords($event->product->name).'</strong>',
			$event->product->id,
			'trash',
			'bg-maroon'
		);
	}

	/**
	 * Register the listeners for the subscriber.
	 *
	 * @param  \Illuminate\Events\Dispatcher  $events
	 */
	public function subscribe($events)
	{
		$events->listen(
			\PaperStore\Events\Backend\Product\Size\ProductSizeCreated::class,
			'PaperStore\Listeners\Backend\Product\ProductSizeEventListener@onCreated'
		);

		$events->listen(
			\PaperStore\Events\Backend\Product\Size\ProductSizeUpdated::class,
			'PaperStore\Listeners\Backend\Product\ProductSizeEventListener@onUpdated'
		);

		$events->listen(
			\PaperStore\Events\Backend\Product\Size\ProductSizePermanentlyDeleted::class,
			'PaperStore\Listeners\Backend\Product\ProductSizeEventListener@onPermanentlyDeleted'
		);
	}
}