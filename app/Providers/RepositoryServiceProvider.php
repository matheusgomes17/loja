<?php

namespace PaperStore\Providers;

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
            \PaperStore\Repositories\Backend\Product\Contract\ProductRepository::class,
            \PaperStore\Repositories\Backend\Product\Eloquent\ProductRepository::class
        );
        
        // Product Size Repository Backend
        $this->app->bind(
            \PaperStore\Repositories\Backend\Product\Contract\ProductSizeRepository::class,
            \PaperStore\Repositories\Backend\Product\Eloquent\ProductSizeRepository::class
        );

        // Product Category Repository Backend
        $this->app->bind(
            \PaperStore\Repositories\Backend\Product\Contract\ProductCategoryRepository::class,
            \PaperStore\Repositories\Backend\Product\Eloquent\ProductCategoryRepository::class
        );
    }
}