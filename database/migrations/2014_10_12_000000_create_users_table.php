<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('cust_id');
            $table->unsignedBigInteger('dept_id');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('role_id')
                  ->references('id')->on('roles')
                  ->onDelete('cascade');
            $table->foreign('cust_id')
                  ->references('id')->on('customers')
                  ->onDelete('cascade');
            $table->foreign('dept_id')
                  ->references('id')->on('departements')
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
        Schema::dropIfExists('users');
    }
}
