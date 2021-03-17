<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAltPriceColumnToFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fields', function (Blueprint $table) {
            $table->decimal('price_regular_alt', 10, 2)->default(0)->after('price_regular');
            $table->decimal('price_night_alt', 10, 2)->default(0)->after('price_night');
            $table->decimal('price_weekend_alt', 10, 2)->default(0)->after('price_weekend');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fields', function (Blueprint $table) {
            $table->removeColumn('price_regular_alt');
            $table->removeColumn('price_night_alt');
            $table->removeColumn('price_weekend_alt');
        });
    }
}
