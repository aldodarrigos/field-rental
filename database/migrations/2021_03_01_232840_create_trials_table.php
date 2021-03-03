<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trials', function (Blueprint $table) {
            $table->id();
            $table->unsignedMediumInteger('competition_id')->nullable();
            $table->unsignedInteger('registration_id')->nullable();
            $table->string('name', 50)->nullable();
            $table->string('age', 5)->nullable();
            $table->unsignedTinyInteger('gender')->default(0);
            $table->unsignedTinyInteger('category_id')->default(0);
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
        Schema::dropIfExists('trials');
    }
}
