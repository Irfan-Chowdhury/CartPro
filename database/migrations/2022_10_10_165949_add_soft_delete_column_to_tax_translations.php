<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeleteColumnToTaxTranslations extends Migration
{
    // php artisan make:migration add_soft_delete_column_to_tax_translations --table=tax_translations

    public function up()
    {
        Schema::table('tax_translations', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('tax_translations', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
