<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducts_0_Table extends Migration
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
            $table->string('image');
            $table->string('product_name');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('collection_id');
            $table->unsignedBigInteger('brand_id');
            $table->longText('description');
            $table->integer('product_amount');
            $table->string('tags');
            $table->integer('price');
            $table->tinyInteger('has_attribute')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('collection_id')->references('id')->on('collections');
            $table->foreign('brand_id')->references('id')->on('brands');
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
