<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('slider_title');
            $table->string('slider_subtitle');
            $table->string('slider_slug');
            $table->string('type');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('page_id')->nullable();
            $table->text('url')->nullable();
            $table->string('image');
            $table->string('target')->nullable();
            $table->string('is_active')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('page_id')->references('id')->on('pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
