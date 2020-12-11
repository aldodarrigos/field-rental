<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        return [
            'title' =>  $title,
            'slug'  =>  Str::of($title)->slug('-'),
            'sumary'  => $this->faker->sentence(),
            'content'  => $this->faker->paragraph(),
            'img'  => 'https://source.unsplash.com/random/1080x700',
            'img_md'  => 'https://source.unsplash.com/random/720x480',
            'img_sm'  => 'https://source.unsplash.com/random/250x166',
            'tag_id'  => $this->faker->randomElement(['1', '2', '3']),
            'pub_date'  => $this->faker->dateTimeBetween('now', '+1 month'),
            'status'  => '1',
        ];
    }
}
