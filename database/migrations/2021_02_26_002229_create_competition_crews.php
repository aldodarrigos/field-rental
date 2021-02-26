<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionCrews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competition_crews', function (Blueprint $table) {
            $table->id();
            $table->unsignedMediumInteger('competition_id')->nullable();
            $table->unsignedMediumInteger('user_id')->nullable();
            $table->unsignedMediumInteger('crew_id')->default(0);
            $table->decimal('price', 10, 2)->nullable();
            $table->string('payment_code', 50)->nullable();
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
        Schema::dropIfExists('competition_crews');
    }
}
