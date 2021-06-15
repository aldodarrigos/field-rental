<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTshirtColumnToCrewPlayers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crew_players', function (Blueprint $table) {
            $table->string('tshirt', 20)->nullable()->after('age');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crew_players', function (Blueprint $table) {
            $table->dropColumn("tshirt");
        });
    }
}
