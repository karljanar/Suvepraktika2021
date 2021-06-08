<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAppsArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_apps_archives', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->string('user_app_name');
            $table->unsignedBigInteger('application_id');
            $table->string('arc_real_app_url')->nullable();
            $table->string('arc_app_url');
            $table->string('arc_current_version')->nullable();
            $table->string('arc_app_loc_in_server')->nullable();
            $table->longText('arc_comments')->nullable();
            $table->string('arc_service_subscriber_name')->nullable();
            $table->string('arc_technical_supervisor_name')->nullable();
            $table->string('arc_content_supervisor_name')->nullable();
            $table->timestamps();
            $table->foreign('application_id')
                ->references('id')
                ->on('user_apps')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_apps_archives');
    }
}
