<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->integer('cust_id');
            $table->integer('category_id');
            $table->integer('type');
            $table->string('judul');
            $table->string('deskripsi');
            $table->dateTime('waktu');
            $table->integer('status');
            $table->string('bukti');
            $table->integer('feedback_score');
            $table->string('feedback_deskripsi');
            $table->foreign('cust_id')
                  ->references('id')->on('customers')
                  ->onDelete('cascade');
            $table->foreign('category_id')
                  ->references('id')->on('categories')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('complaints');
    }
}
