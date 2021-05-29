<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_notifications', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('applications_id');
            $table->boolean('notification_enabled');
            $table->timestamp('sent_at');
            $table->foreign('applications_id')
                ->references('id')
                ->on('applications')
                ->onDelete('cascade');
            $table->foreign('users_id')
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
        Schema::dropIfExists('email_notifications');
    }
}
