<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        // Product Table
        Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id');
            $table->string('name');
            $table->string('cover');
            $table->string('cod');
            $table->float('price', 4, 2);
            $table->text('description');
            $table->integer('qtd');

            /**
             * Add Foreign/Unique/Index
             */
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->foreign('category_id')
                    ->references('id')
                    ->on('products_categories')
                    ->onDelete('cascade');

            $table->index('user_id', 'category_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('products');
    }

}
