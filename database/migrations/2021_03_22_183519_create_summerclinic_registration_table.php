<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummerclinicRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summerclinic_registration', function (Blueprint $table) {
            $table->id();
            $table->unsignedMediumInteger('event_id')->default(0);
            $table->unsignedMediumInteger('user_id')->default(0);
            $table->string('address', 100)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('zip', 10)->nullable();
            $table->string('phone_home', 20)->nullable();
            $table->string('phone_cell', 20)->nullable();
            $table->string('emergency_contact', 50)->nullable();
            $table->string('emergency_phone', 20)->nullable();
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
        Schema::dropIfExists('summerclinic_registration');
    }
}
