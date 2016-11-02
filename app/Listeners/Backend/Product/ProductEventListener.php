<?php

namespace PaperStore\Listeners\Backend\Product;

/**
 * Class ProductEventListener
 * @package PaperStore\Listeners\Backend\Product
 */
class ProductEventListener
{
	/**
	 * @var string
	 */
	private $history_slug = 'Product';

	/**
	 * @param $event
	 */
	public function onCreated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.backend.products.created") <strong>'.ucwords($event->product->name).'</strong>',
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
			'trans("history.backend.products.updated") <strong>'.ucwords($event->product->name).'</strong>',
			$event->product->id,
			'save',
			'bg-aqua'
		);
	}

	/**
	 * @param $event
	 */
	public function onDeleted($event) {
		history()->log(
			$this->history_slug,
			'trans("history.backend.products.deleted") <strong>'.ucwords($event->product->name).'</strong>',
			$event->product->id,
			'trash',
			'bg-maroon'
		);
	}

	/**
	 * @param $event
	 */
	public function onRestored($event) {
		history()->log(
			$this->history_slug,
			'trans("history.backend.products.restored") <strong>'.ucwords($event->product->name).'</strong>',
			$event->product->id,
			'refresh',
			'bg-aqua'
		);
	}

	/**
	 * @param $event
	 */
	public function onPermanentlyDeleted($event) {
		history()->log(
			$this->history_slug,
			'trans("history.backend.products.permanently_deleted") <strong>'.ucwords($event->product->name).'</strong>',
			$event->product->id,
			'trash',
			'bg-maroon'
		);
	}

	/**
	 * @param $event
	 */
	public function onDeactivated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.backend.products.deactivated") <strong>'.ucwords($event->product->name).'</strong>',
			$event->product->id,
			'times',
			'bg-yellow'
		);
	}

	/**
	 * @param $event
	 */
	public function onReactivated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.backend.products.reactivated") <strong>'.ucwords($event->product->name).'</strong>',
			$event->product->id,
			'check',
			'bg-green'
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
			\PaperStore\Events\Backend\Product\ProductCreated::class,
			'PaperStore\Listeners\Backend\Product\ProductEventListener@onCreated'
		);

		$events->listen(
			\PaperStore\Events\Backend\Product\ProductUpdated::class,
			'PaperStore\Listeners\Backend\Product\ProductEventListener@onUpdated'
		);

		$events->listen(
			\PaperStore\Events\Backend\Product\ProductDeleted::class,
			'PaperStore\Listeners\Backend\Product\ProductEventListener@onDeleted'
		);

		$events->listen(
			\PaperStore\Events\Backend\Product\ProductRestored::class,
			'PaperStore\Listeners\Backend\Product\ProductEventListener@onRestored'
		);

		$events->listen(
			\PaperStore\Events\Backend\Product\ProductPermanentlyDeleted::class,
			'PaperStore\Listeners\Backend\Product\ProductEventListener@onPermanentlyDeleted'
		);

		$events->listen(
			\PaperStore\Events\Backend\Product\ProductPasswordChanged::class,
			'PaperStore\Listeners\Backend\Product\ProductEventListener@onPasswordChanged'
		);

		$events->listen(
			\PaperStore\Events\Backend\Product\ProductDeactivated::class,
			'PaperStore\Listeners\Backend\Product\ProductEventListener@onDeactivated'
		);

		$events->listen(
			\PaperStore\Events\Backend\Product\ProductReactivated::class,
			'PaperStore\Listeners\Backend\Product\ProductEventListener@onReactivated'
		);
	}
}