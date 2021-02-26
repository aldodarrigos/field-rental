<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crew_players', function (Blueprint $table) {
            $table->id();
            $table->unsignedMediumInteger('crew_id')->default(0);
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->date('dob')->nullable();
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
        Schema::dropIfExists('crew_players');
    }
}
