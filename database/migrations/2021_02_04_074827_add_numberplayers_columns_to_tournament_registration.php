<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNumberplayersColumnsToTournamentRegistration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tournament_registration', function (Blueprint $table) {
            $table->char('number_players', 2)->nullable()->after('team');
            $table->unsignedTinyInteger('gender')->default(1)->after('number_players');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tournament_registration', function (Blueprint $table) {
            $table->dropColumn('number_players');
            $table->dropColumn('gender');
        });
    }
}
