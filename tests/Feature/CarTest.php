<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Car;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CarTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_get_cars(): void
    {
        $user = User::factory()->create();
        $this->be($user, 'api');
        $cars = Car::factory()->for($user)->count(10)->create();

        $response = $this->getJson(route('cars.index'));

        $response
            ->assertStatus(200)
            ->assertJson(
                [
                    'success' => true,
                ]
            );
    }

    public function test_get_car_by_id(): void
    {
        $user = User::factory()->create();
        $this->be($user, 'api');
        $cars = Car::factory()->for($user)->count(10)->create();

        $response = $this->getJson(route('cars.show', ['car' => $cars->first()->id]));

        $response
            ->assertStatus(200)
            ->assertJson(
                [
                    'success' => true,
                ]
            );
    }

    public function test_create_car(): void
    {
        $user = User::factory()->create();
        $this->be($user, 'api');

        $car      = Car::factory()->for($user)->create();
        $response = $this->postJson(
            route('cars.store'),
            $car->toArray(),
        );

        $response
            ->assertStatus(201)
            ->assertJson(
                [
                    'success' => true,
                ]
            );
    }

    public function test_delete_car_by_id(): void
    {
        $user = User::factory()->create();
        $this->be($user, 'api');

        $car      = Car::factory()->for($user)->create();
        $response = $this->deleteJson(
            route('cars.destroy', ['car' => $car->id]),
        );

        $response->assertStatus(204);
    }
}
