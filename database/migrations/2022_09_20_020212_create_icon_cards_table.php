<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIconCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icon_cards', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable(TRUE);
            $table->text('text'); 
		    $table->text('text_ru')->nullable();
 		    $table->text('text_en')->nullable();
            $table->text('name')->default('Title');
            $table->text('name_ru')->nullable();
            $table->text('name_en')->nullable();
            $table->string('type');
            $table->unsignedBigInteger('counter');
            $table->string('after_text');
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
        Schema::dropIfExists('icon_cards');
    }
}
