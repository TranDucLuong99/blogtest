<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('categoryId');
            $table->string('name');
            $table->string('title');
            $table->string('description');
            $table->string('avatar')->nullable();
            $table->integer('price');
            $table->integer('old_price');
            $table->integer('discount');
            $table->integer('amount');
            $table->tinyInteger('status');
            $table->timestamps();
            $table->foreign('categoryId')->references('id')->on('categories');
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
