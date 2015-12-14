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
            $table->renameColumn('url', 'imageUrl');
            $table->string('projectUrl')->unique();
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
            $table->renameColumn('imageUrl', 'url');
            $table->dropColumn('projectUrl');
        });
    }
}

