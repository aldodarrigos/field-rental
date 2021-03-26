<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummerclinicPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summerclinic_players', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('registration_id')->default(0);
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->string('gender', 10)->nullable();
            $table->string('tshirt_size', 4)->nullable();
            $table->date('dob')->nullable();
            $table->string('obs', 120)->nullable();
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
        Schema::dropIfExists('summerclinic_players');
    }
}
