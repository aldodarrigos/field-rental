<?php

namespace Database\Factories;

use App\Models\Match;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Match::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'crew_a_id' =>  $this->faker->randomElement(['1', '2', '3', '4', '5']),
            'crew_b_id' =>  $this->faker->randomElement(['1', '2', '3', '4', '5']),
            'crew_a_result' =>  $this->faker->randomElement(['1', '2', '3', '4', '5']),
            'crew_b_result' =>  $this->faker->randomElement(['1', '2', '3', '4', '5']),
            'reg_date'  => $this->faker->dateTimeBetween('now', '+1 month'),
            'status'  => '1',
        ];
    }
}