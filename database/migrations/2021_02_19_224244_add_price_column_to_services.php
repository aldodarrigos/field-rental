<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceColumnToServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->nullable()->after('flag');
            $table->unsignedTinyInteger('form')->default(0)->after('price');
            $table->unsignedTinyInteger('periot')->default(0)->after('form');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('form');
            $table->dropColumn('periot');
        });
    }
}
