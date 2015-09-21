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
      Schema::create('projects', function (Blueprint $table) {
      $table->increments('project_id');
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
      Schema::drop('projects');
  }
}
