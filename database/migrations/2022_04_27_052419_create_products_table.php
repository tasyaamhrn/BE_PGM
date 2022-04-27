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
            $table->string('blok');
            $table->integer('no_kavling')->unsigned();
            $table->integer('type');
            $table->integer('luas_tanah')->unsigned();
            $table->integer('price');
            $table->integer('status');
            $table->integer('tanah_lebih')->unsigned()->nullable();
            $table->integer('discount')->unsigned()->nullable();
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
