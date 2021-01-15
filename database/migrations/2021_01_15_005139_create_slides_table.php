<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('subtitle', 120)->nullable();
            $table->string('title', 120)->nullable();
            $table->string('img', 120)->nullable();
            $table->string('link_text', 120)->nullable();
            $table->string('link_url', 120)->nullable();
            $table->unsignedTinyInteger('sort')->default(0);
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
        Schema::dropIfExists('slides');
    }
}
