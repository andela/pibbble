<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSideprojectsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('sideprojects', function (Blueprint $table) {
      $table->increments('sideproject_id');
      $table->integer('user_id')->unsigned();
      $table->string('projectname');
      $table->string('description');
      $table->string('url');
      $table->string('technologies');
      $table->timestamps();

      $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('sideprojects');
  }
}
