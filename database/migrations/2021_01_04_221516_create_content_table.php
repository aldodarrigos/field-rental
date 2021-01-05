<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('title', 200)->nullable();
            $table->string('short_title', 120)->unique();
            $table->string('subtitle', 200)->nullable();
            $table->text('content')->nullable();
            $table->string('img', 120)->nullable();
            $table->string('link', 120)->nullable();
            $table->string('video', 20)->nullable();
            $table->unsignedTinyInteger('group_id')->default(0);
            $table->unsignedTinyInteger('order')->default(0);
            $table->unsignedTinyInteger('flag')->default(0);
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
        Schema::dropIfExists('content');
    }
}
