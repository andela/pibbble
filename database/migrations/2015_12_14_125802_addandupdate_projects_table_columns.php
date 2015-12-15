<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddandupdateProjectsTableColumns extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->renameColumn('url', 'image_url');
            $table->string('project_url')->nullable()->unique();
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
            $table->renameColumn('image_url', 'url');
            $table->dropColumn('project_url');
        });
    }
}

