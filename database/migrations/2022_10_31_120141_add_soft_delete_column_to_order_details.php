<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeleteColumnToOrderDetails extends Migration
{
    public function up()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->softDeletes();
        });
    }
    

    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
