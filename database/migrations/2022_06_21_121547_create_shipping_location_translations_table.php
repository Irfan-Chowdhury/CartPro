<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingLocationTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_location_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipping_location_id');
            $table->string('locale',191);
            $table->string('location_name');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('shipping_location_id')->references('id')->on('shipping_locations')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_location_translations');
    }
}
