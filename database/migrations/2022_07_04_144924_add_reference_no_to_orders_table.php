<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReferenceNoToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //php artisan make:migration add_reference_no_to_orders_table --table=orders
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('reference_no',255)->default(0)->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('reference_no');
        });
    }
}
