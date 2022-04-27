<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use App\Models\Car;
use App\Models\Trip;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class TripTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_get_trips(): void
    {
        $user = User::factory()->create();
        $this->be($user, 'api');
        $response = $this->getJson(route('trips.index'));

        $response
            ->assertStatus(200)
            ->assertJson(
                [
                    'success' => true,
                ]
            );
    }

    public function test_create_trip(): void
    {
        $user = User::factory()->create();
        $car  = Car::factory()->for($user)->create();
        $this->be($user, 'api');

        $trip = Trip::factory()->make(
            [
                'car_id'  => $car->id,
                'user_id' => $user->id,
            ]
        );
        $response = $this->postJson(
            route('trips.store'),
            $trip->toArray(),
        );

        $response
            ->assertStatus(201)
            ->assertJson(
                [
                    'success' => true,
                ]
            );
    }
}
