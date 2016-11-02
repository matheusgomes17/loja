<?php

Route::group([
    'namespace'	=> 'Product',
], function() {

	/**
	 * Product Manager
	 */
	Route::group([
		'middleware' => 'access.routeNeedsPermission:manage-products',
	], function() {
		Route::resource('product', 'ProductController', ['except' => ['show']]);

		/**
		 * Product Status'
		 */
		Route::get('product/deactivated', 'ProductController@deactivated')->name('admin.product.deactivated');
		Route::get('product/deleted', 'ProductController@deleted')->name('admin.product.deleted');

		/**
         * Deleted Product
         */
        Route::group(['prefix' => 'product/{deletedProduct}'], function() {
			Route::get('delete', 'ProductController@delete')->name('admin.product.delete-permanently');
            Route::get('restore', 'ProductController@restore')->name('admin.product.restore');
        });

        /**
		 * Product Size Management
		 */
        Route::group(['prefix' => 'product'], function() {
			Route::group([
				'middleware' => 'access.routeNeedsPermission:manage-products',
			], function() {
				Route::group(['namespace' => 'Size'], function () {
					Route::resource('size', 'SizeController', ['except' => ['show']]);
				});
			});
        });

    	/**
		 * Product Category Management
		 */
        Route::group(['prefix' => 'product'], function() {
			Route::group([
				'middleware' => 'access.routeNeedsPermission:manage-products',
			], function() {
				Route::group(['namespace' => 'Category'], function () {
					Route::resource('category', 'CategoryController', ['except' => ['show']]);
				});
			});
        });
	});
});