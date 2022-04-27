<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CarTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_asserting_an_exact_json_match_for_get_cars(): void
    {
        $response = $this->get('/api/mock-get-cars');

        $response->assertStatus(200)
                 ->assertExactJson(
                     [
                         'data' => [
                             [
                                 'id'    => 1,
                                 'make'  => 'Land Rover',
                                 'model' => 'Range Rover Sport',
                                 'year'  => 2017
                             ],
                             [
                                 'id'    => 2,
                                 'make'  => 'Ford',
                                 'model' => 'F150',
                                 'year'  => 2014
                             ],
                             [
                                 'id'    => 3,
                                 'make'  => 'Chevy',
                                 'model' => 'Tahoe',
                                 'year'  => 2015
                             ],
                             [
                                 'id'    => 4,
                                 'make'  => 'Aston Martin',
                                 'model' => 'Vanquish',
                                 'year'  => 2018
                             ]
                         ]
                     ]
                 );
    }

    public function test_asserting_an_exact_json_match_for_get_car_by_id(): void
    {
        $response = $this->get('/api/mock-get-car/1');

        $response->assertStatus(200)
                 ->assertExactJson(
                     [
                         'data' => [
                             'id'         => 1,
                             'make'       => 'Land Rover',
                             'model'      => 'Range Rover Sport',
                             'year'       => 2017,
                             'trip_count' => 2,
                             'trip_miles' => 18.1
                         ]
                     ]
                 );
    }

    public function test_create_car(): void
    {
        $response = $this->post(
            '/api/mock-add-car',
            [
                'year'  => 2022,
                'make'  => 'make',
                'model' => 'model'
            ]
        );

        $response->assertStatus(200);
    }

    public function test_delete_car_by_id(): void
    {
        $response = $this->delete('/api/mock-delete-car/1');

        $response->assertStatus(200);
    }
}
