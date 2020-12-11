<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedMediumInteger('crew_a_id')->default(0);
            $table->unsignedMediumInteger('crew_b_id')->default(0);
            $table->unsignedTinyInteger('crew_a_result')->default(0);
            $table->unsignedTinyInteger('crew_b_result')->default(0);
            $table->dateTime('reg_date', $precision = 0);
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
        Schema::dropIfExists('matches');
    }
}
