<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    public function definition()
    {
        return [
            'make'  => $this->faker->name(),
            'model' => $this->faker->name(),
            'year'  => $this->faker->year(),
        ];
    }
}
