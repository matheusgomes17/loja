<?php

namespace PaperStore\Listeners\Backend\Product;

/**
 * Class ProductCategoryEventListener
 * @package PaperStore\Listeners\Backend\Product
 */
class ProductCategoryEventListener
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
			'trans("history.backend.products.categories.created") <strong>'.ucwords($event->product->name).'</strong>',
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
			'trans("history.backend.products.categories.updated") <strong>'.ucwords($event->product->name).'</strong>',
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
			'trans("history.backend.products.categories.permanently_deleted") <strong>'.ucwords($event->product->name).'</strong>',
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
			\PaperStore\Events\Backend\Product\Category\ProductCategoryCreated::class,
			'PaperStore\Listeners\Backend\Product\ProductCategoryEventListener@onCreated'
		);

		$events->listen(
			\PaperStore\Events\Backend\Product\Category\ProductCategoryUpdated::class,
			'PaperStore\Listeners\Backend\Product\ProductCategoryEventListener@onUpdated'
		);

		$events->listen(
			\PaperStore\Events\Backend\Product\Category\ProductCategoryPermanentlyDeleted::class,
			'PaperStore\Listeners\Backend\Product\ProductCategoryEventListener@onPermanentlyDeleted'
		);
	}
}