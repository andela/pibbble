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
            //$table->string('name');
            //$table->string('email')->unique();
            //$table->string('password', 60);
            //$table->rememberToken();
            //$table->timestamps();

            // Cached from GitHub
            $table->string('github_id')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('avatar');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
