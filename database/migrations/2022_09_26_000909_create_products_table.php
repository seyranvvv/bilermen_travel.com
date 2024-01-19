<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title_tm');
            $table->string('title_ru')->nullable();
            $table->string('title_en')->nullable();
            $table->text('body_tm');
            $table->text('body_ru')->nullable();
            $table->text('body_en')->nullable();
            $table->text('description_tm');
            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->string('slug')->unique();
            $table->string('img')->nullable();
            $table->string('main_img')->nullable();
            $table->string('barcode')->nullable();
            $table->boolean('active')->default(0);
            $table->integer('stars')->default(5);
            $table->unsignedInteger('category_id')->default(1)->index();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

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
        Schema::dropIfExists('products');
    }
}
