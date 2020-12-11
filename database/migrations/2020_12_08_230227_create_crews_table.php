<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crews', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name', 120)->unique();
            $table->string('slug', 120)->nullable();
            $table->string('sumary', 160)->nullable();
            $table->string('img', 120)->nullable();
            $table->string('img_md', 120)->nullable();
            $table->string('img_sm', 120)->nullable();
            $table->unsignedMediumInteger('tournament_id')->default(0);
            $table->unsignedTinyInteger('status')->default(1);
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
        Schema::dropIfExists('crews');
    }
}
