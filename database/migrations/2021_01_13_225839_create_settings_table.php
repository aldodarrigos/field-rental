<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('site_name', 50)->nullable();
            $table->string('sumary', 200)->nullable();
            $table->string('logo', 120)->nullable();
            $table->string('img', 120)->nullable();
            $table->string('facebook', 70)->nullable();
            $table->string('instagram', 70)->nullable();
            $table->string('youtube', 70)->nullable();
            $table->string('location', 100)->nullable();
            $table->string('open', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('phone_1', 30)->nullable();
            $table->string('phone_2', 30)->nullable();
            $table->string('latitude', 30)->nullable();
            $table->string('longitude', 30)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
