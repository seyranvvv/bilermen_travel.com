<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImgRuColumnToContactBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact_banners', function (Blueprint $table) {
            $table->string('img_ru')->nullable(TRUE);
            $table->string('img_en')->nullable(TRUE);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_banners', function (Blueprint $table) {
            $table->dropColumn('img_ru', 'img_en');
        });
    }
}
