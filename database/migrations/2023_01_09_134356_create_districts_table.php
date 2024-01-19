<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->text('name_tm');
            $table->text('name_ru')->nullable();
            $table->text('name_en')->nullable();
            $table->text('address_tm')->nullable();
            $table->text('address_ru')->nullable();
            $table->text('address_en')->nullable();
            $table->text('phone')->nullable();
            $table->integer('order')->default(1);

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
        Schema::dropIfExists('districts');
    }
}
