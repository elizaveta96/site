<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $label = str_replace('.', '', $this->faker->unique()->sentence(2));
        return [
            'label' => $label,
            'url' => \Str::slug($label)
        ];
    }
}
