<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToSettingMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('setting_mails', function (Blueprint $table) {
            $table->string('mail_header_theme_color',191)->nullable()->after('mail_order_status');
            $table->string('mail_body_theme_color',191)->nullable()->after('mail_header_theme_color');
            $table->string('mail_footer_theme_color',191)->nullable()->after('mail_body_theme_color');
            $table->string('mail_layout_background_theme_color',191)->nullable()->after('mail_footer_theme_color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('setting_mails', function (Blueprint $table) {
            $table->dropColumn('mail_header_theme_color');
            $table->dropColumn('mail_body_theme_color');
            $table->dropColumn('mail_footer_theme_color');
            $table->dropColumn('mail_layout_background_theme_color');
        });
    }
}
