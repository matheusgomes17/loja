<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSizePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_size_pivot', function(Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('size_id');

            /**
             * Add Foreign/Unique/Index
             */
            $table->foreign('product_id')
                    ->references('id')
                    ->on('products')
                    ->onDelete('cascade');

            $table->foreign('size_id')
                    ->references('id')
                    ->on('products_sizes')
                    ->onDelete('cascade');

            $table->index('product_id', 'size_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_size_pivot');
    }
}
