<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Section::class;

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
            'img'  => 'https://source.unsplash.com/random/1080x700',
            'img_md'  => 'https://source.unsplash.com/random/720x480',
            'status'  => '1',
        ];
    }
}