<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cust_id')->nullable()->default(12);
            $table->bigInteger('product_id')->nullable()->default(12);
            $table->string('bukti');
            $table->integer('status')->unsigned()->nullable()->default(12);
            $table->timestamps();
            $table->foreign('cust_id')
            ->references('id')->on('customers')
            ->onDelete('cascade');
            $table->foreign('product_id')
            ->references('id')->on('products')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
