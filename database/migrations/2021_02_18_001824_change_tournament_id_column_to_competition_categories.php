<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTournamentIdColumnToCompetitionCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('competition_categories', function (Blueprint $table) {
            $table->renameColumn('tournament_id', 'competition_id');
        });

        Schema::table('competition_contact', function (Blueprint $table) {
            $table->renameColumn('tournament_id', 'competition_id');
        });

        Schema::table('competition_registration', function (Blueprint $table) {
            $table->renameColumn('tournament_id', 'competition_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('competition_categories', function (Blueprint $table) {
            //
        });
    }
}
