<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title_tm');
            $table->string('title_ru')->nullable();
            $table->string('title_en')->nullable();
            $table->text('name_tm');
            $table->text('name_ru')->nullable();
            $table->text('name_en')->nullable();
            $table->string('slug')->unique();
            $table->string('img')->nullable(TRUE);
            $table->string('image_index')->nullable();
            $table->string('image_banner')->nullable(TRUE);
            $table->string('icon')->nullable();
            $table->integer('order')->default(1);
            $table->boolean('active')->default(0);
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
        Schema::dropIfExists('services');
    }
}
