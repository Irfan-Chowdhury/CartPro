<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->string('type');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('page_id')->nullable();
            $table->string('url')->nullable();
            $table->string('icon')->nullable();
            $table->string('target')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->tinyInteger('is_fluid')->default();
            $table->tinyInteger('is_active')->default(0);
            $table->timestamps();

            //$table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            //Delete ->onDelete('cascade') for these two line later
            //$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            //$table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_items');
    }
}
