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
            $table->unsignedBigInteger('price');
            $table->text('thumbnail');
            $table->foreignId('brand_id');
            $table->foreignId('category_id');
            $table->foreignId('sub_category_id');
            $table->tinyInteger('stock_status')->default(0);
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