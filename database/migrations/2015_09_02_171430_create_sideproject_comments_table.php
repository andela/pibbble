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
    Schema::create('sideprojectcomments', function (Blueprint $table) {
      $table->increments('comment_id');
      $table->string('comment');
      $table->integer('user_id')->unsigned();
      $table->integer('sideproject_id')->unsigned();
      $table->timestamps();

      $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('sideproject_id')->references('sideproject_id')->on('sideprojects')->onDelete('cascade')->onUpdate('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('sideprojectcomments');
  }
}
