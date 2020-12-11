<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Crew;
use App\Models\Field;
use App\Models\Match;
use App\Models\Player;
use App\Models\Post;
use App\Models\Section;
use App\Models\Service;
use App\Models\Tag;
use App\Models\Team;
use App\Models\Tournament;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Crew::factory(10)->create();
        Field::factory(10)->create();
        Match::factory(10)->create();
        Player::factory(10)->create();
        Post::factory(10)->create();
        Section::factory(10)->create();
        Service::factory(10)->create();
        Tag::factory(10)->create();
        Tournament::factory(10)->create();
    }
}
