<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedMediumInteger('user_id')->nullable('false');
            $table->unsignedTinyInteger('field_id')->nullable('false');
            $table->date('res_date')->nullable();
            $table->string('hour', 10)->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('conf_code', 50)->nullable();
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
        Schema::dropIfExists('reservations');
    }
}
