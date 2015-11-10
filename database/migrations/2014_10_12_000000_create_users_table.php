<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('username');
            $table->string('password', 80)->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('bio', 140)->nullable();
            $table->string('location')->nullable();
            $table->string('job', 25)->nullable();
            $table->string('avatar')->nullable();
            $table->string('provider')->nullable();
            $table->bigInteger('uid')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->index(['username', 'uid']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
