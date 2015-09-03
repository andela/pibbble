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
      $table->increments('user_id');
      $table->string('provider');
      $table->string('provider_id')->unique();
      $table->string('name');
      $table->string('username')->unique();
      $table->string('email')->nullable();
      $table->string('password', 80);
      $table->string('bio', 140);
      $table->string('location');
      $table->string('avatar')->nullable();
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