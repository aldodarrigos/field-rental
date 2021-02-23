<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_registration', function (Blueprint $table) {
            $table->id();
            $table->unsignedMediumInteger('service_id')->default(0);
            $table->unsignedMediumInteger('responsible_user')->default(0);
            $table->string('player_name', 80)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('zip', 10)->nullable();
            $table->string('phone_home', 20)->nullable();
            $table->string('phone_cell', 20)->nullable();
            $table->string('email', 40)->nullable();
            $table->string('grade', 40)->nullable();
            $table->date('dob')->nullable();
            $table->string('gender', 10)->nullable();
            $table->char('tshirt_size', 2)->nullable();
            $table->string('emergency_contact', 50)->nullable();
            $table->string('emergency_phone', 20)->nullable();
            $table->string('obs', 120)->nullable();
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
        Schema::dropIfExists('service_registration');
    }
}
