<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLimitCouponToCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //php artisan make:migration add_limit_coupon_to_coupons_table --table=coupons

        Schema::table('coupons', function (Blueprint $table) {
            $table->integer('limit_qty')->nullable()->after('discount_type');
            $table->boolean('is_expire')->nullable()->after('used');
            $table->boolean('is_limit')->nullable()->after('is_expire');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->dropColumn('limit_qty');
            $table->dropColumn('is_expire');
            $table->dropColumn('is_limit');
        });
    }
}
