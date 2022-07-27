<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingHomePageSeoTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_home_page_seo_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('setting_home_page_seo_id');
            $table->string('locale',191);
            $table->string('meta_site_name');
            $table->string('meta_title');
            $table->string('meta_slug');
            $table->text('meta_description');
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
        Schema::dropIfExists('setting_home_page_seo_translations');
    }
}
