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
      $table->string('provider')->nullable();
      $table->string('provider_id')->default('Trad');
      $table->string('name')->nullable();
      $table->string('username')->unique();
      $table->string('email')->unique();
      $table->string('password', 80);
      $table->string('bio', 140)->nullable();
      $table->string('location')->nullable();
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
