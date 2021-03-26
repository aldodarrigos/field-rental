<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterServiceRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_registration', function (Blueprint $table) {
            $table->dropColumn('player_name');
            $table->dropColumn('grade');
            $table->dropColumn('dob');
            $table->dropColumn('gender');
            $table->dropColumn('tshirt_size');
            $table->dropColumn('obs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
