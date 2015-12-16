<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSideprojectCommentsTable extends Migration
{
    /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::create('project_comments', function (Blueprint $table) {
      $table->increments('id');
      $table->string('comment');
      $table->integer('user_id')->unsigned();
      $table->integer('project_id')->unsigned();
      $table->timestamps();
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::drop('project_comments');
  }
}
