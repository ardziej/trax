<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    public function definition(): array
    {
        $user = User::factory()->create();

        return [
            'make'    => $this->faker->name(),
            'model'   => $this->faker->name(),
            'year'    => $this->faker->year(),
            'user_id' => $user->id,
        ];
    }
}
