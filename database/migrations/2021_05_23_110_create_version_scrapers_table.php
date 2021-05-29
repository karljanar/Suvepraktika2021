<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVersionScrapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('version_scrapers', function(Blueprint $table){
            $table->id('id');
            $table->string('application_name');
            $table->string('current_app_ver_scraper');
            $table->string('new_app_ver_scraper');
            $table->string('new_app_version');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('version_scrapers');
    }
}
