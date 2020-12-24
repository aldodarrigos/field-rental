<?php

namespace Database\Factories;

use App\Models\Field;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FieldFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Field::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence();
        return [
            'name' =>  $name,
            'slug'  =>  Str::of($name)->slug('-'),
            'sumary'  => $this->faker->sentence(),
            'content'  => $this->faker->paragraph(),
            'img'  => 'https://source.unsplash.com/random/1080x700',
            'img_md'  => 'https://source.unsplash.com/random/720x480',
            'img_sm'  => 'https://source.unsplash.com/random/250x166',
            'price_regular'  => $this->faker->randomElement(['1', '2', '3']),
            'price_night'  => $this->faker->randomElement(['1', '2', '3']),
            'price_weekend'  => $this->faker->randomElement(['1', '2', '3']),
            'tag_id'  => $this->faker->randomElement(['1', '2', '3']),
            'status'  => '1',
        ];
    }
}


