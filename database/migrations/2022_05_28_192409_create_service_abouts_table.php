<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title_tm');
            $table->string('title_ru')->nullable();
            $table->string('title_en')->nullable();
            $table->text('name_tm');
            $table->text('name_ru')->nullable();
            $table->text('name_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_abouts');
    }
}
