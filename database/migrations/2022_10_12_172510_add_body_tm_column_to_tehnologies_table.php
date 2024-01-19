<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBodyTmColumnToTehnologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tehnologies', function (Blueprint $table) {
            $table->mediumText('body_tm')->default('default');
            $table->mediumText('body_ru')->nullable();
            $table->mediumText('body_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tehnologies', function (Blueprint $table) {
            $table->dropColumn('body_tm', 'body_ru', 'body_en');
        });
    }
}
