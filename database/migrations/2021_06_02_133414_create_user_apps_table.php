<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_apps', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('teams_id');
            $table->unsignedBigInteger('framework_id');
            $table->string('user_app_name');
            $table->string('real_app_url');
            $table->string('app_url');
            $table->string('current_version')->nullable();
            $table->string('app_loc_in_server');
            $table->longText('comments')->nullable();
            $table->string('service_subscriber_name')->nullable();
            $table->string('technical_supervisor_name')->nullable();
            $table->string('content_supervisor_name')->nullable();
            $table->boolean('update_available')->nullable();
            $table->boolean('application_status')->nullable();
            $table->timestamps();
            $table->foreign('framework_id')
                ->references('id')
                ->on('frameworks')
                ->onDelete('cascade');
            $table->foreign('teams_id')
                ->references('id')
                ->on('teams')
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
        Schema::dropIfExists('user_apps');
    }
}
