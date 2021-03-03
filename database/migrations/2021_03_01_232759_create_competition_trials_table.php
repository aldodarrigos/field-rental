<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionTrialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competition_trials', function (Blueprint $table) {
            $table->id();
            $table->unsignedMediumInteger('competition_id')->nullable();
            $table->unsignedMediumInteger('manager_id')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('payment_code', 50)->nullable();
            $table->unsignedTinyInteger('status')->default(0);
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
        Schema::dropIfExists('competition_trials');
    }
}
