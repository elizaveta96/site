<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5),
            'label' => $this->faker->word(),
            'text' => $this->faker->realTextBetween(200, 500),
            'url' => $this->faker->unique()->word(),
            'likes' => 0,
            'views' => 0,
            'image_path' => '',
            'created_at' => $this->faker->dateTimeBetween('-3 years', 'now'),
        ];
    }
}
