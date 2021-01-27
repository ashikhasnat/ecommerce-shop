<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku');
            $table->string('title');
            $table->text('slug')->nullable();
            $table->integer('price');
            $table->integer('discount')->nullable();
            $table->integer('old_price')->nullable();
            $table->text('thumbnail');
            $table->foreignId('brand_id');
            $table->foreignId('category_id');
            $table
                ->foreignId('sub_category_id')
                ->nullable()
                ->default(0);
            $table->tinyInteger('stock_status')->default(0);
            $table->tinyInteger('top_rated')->default(0);
            $table->tinyInteger('main_slider')->default(0);
            $table->tinyInteger('best_seller')->default(0);
            $table->tinyInteger('weekly_deal')->default(0);
            $table->mediumText('short_details');
            $table->text('long_details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
