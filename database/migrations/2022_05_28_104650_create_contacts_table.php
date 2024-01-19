<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->char('phone');
            $table->char('phone1')->nullable();
            $table->char('email');
            $table->text('adress_tm');
            $table->text('adress_ru')->nullable();
            $table->text('adress_en')->nullable();
            $table->text('slogan_tm');
            $table->text('slogan_ru')->nullable();
            $table->text('slogan_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
