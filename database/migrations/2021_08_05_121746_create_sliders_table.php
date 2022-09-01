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
            $table->string('slider_slug');
            $table->string('type');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->text('url')->nullable();
            $table->string('slider_image');
            $table->string('slider_image_full_width');
            $table->string('slider_image_secondary');
            $table->string('target')->nullable();
            $table->string('is_active')->nullable();
            $table->string('text_alignment')->nullable();
            $table->string('text_color')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
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
