<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        return [
            'name'  =>  $this->faker->lastName().' '.$this->faker->firstName(),
            'crew_id'  => $this->faker->randomElement(['1', '2', '3']),
            'status'  => '1',
        ];
    }
}