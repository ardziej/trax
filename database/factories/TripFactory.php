<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TripFactory extends Factory
{
    public function definition(): array
    {
        return [
            'date'    => $this->faker->date(),
            'miles'   => $this->faker->randomNumber(3),
        ];
    }
}
