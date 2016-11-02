<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
	/**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Product Repository Backend
        $this->app->bind(
            \App\Repositories\Backend\Product\Contract\ProductRepository::class,
            \App\Repositories\Backend\Product\Eloquent\ProductRepository::class
        );
        
        // Product Size Repository Backend
        $this->app->bind(
            \App\Repositories\Backend\Product\Contract\ProductSizeRepository::class,
            \App\Repositories\Backend\Product\Eloquent\ProductSizeRepository::class
        );

        // Product Category Repository Backend
        $this->app->bind(
            \App\Repositories\Backend\Product\Contract\ProductCategoryRepository::class,
            \App\Repositories\Backend\Product\Eloquent\ProductCategoryRepository::class
        );
    }
}