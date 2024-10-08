<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceColumnToServiceRegistration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_registration', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->nullable()->after('emergency_phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_registration', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }
}
