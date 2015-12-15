<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProjectsTableUrls extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->renameColumn('imageurl', 'image_url');
            $table->renameColumn('projectUrl', 'project_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->renameColumn('image_url', 'imageurl');
            $table->renameColumn('project_url', 'projectUrl');
        });
    }
}
