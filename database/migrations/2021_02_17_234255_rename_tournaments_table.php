<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('tournaments', 'competitions');
        Schema::rename('tournaments_contact', 'competition_contact');
        Schema::rename('tournament_categories', 'competition_categories');
        Schema::rename('tournament_registration', 'competition_registration');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('competitions', 'tournaments');
        Schema::rename('competition_contact', 'tournaments_contact');
        Schema::rename('competition_categories', 'tournament_categories');
        Schema::rename('competition_registration', 'tournament_registration');
    }
}
