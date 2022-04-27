<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class TripTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_asserting_an_exact_json_match_for_get_trips(): void
    {
        $response = $this->get('/api/mock-get-trips');

        $response->assertStatus(200)
                 ->assertExactJson(
                     [
                         'data' => [
                             [
                                 'id'    => 1,
                                 'date'  => Carbon::now()->subDays(1)->format('m/d/Y'),
                                 'miles' => 11.3,
                                 'total' => 45.3,
                                 'car'   => [
                                     'id'    => 1,
                                     'make'  => 'Land Rover',
                                     'model' => 'Range Rover Sport',
                                     'year'  => 2017
                                 ]
                             ],
                             [
                                 'id'    => 2,
                                 'date'  => Carbon::now()->subDays(2)->format('m/d/Y'),
                                 'miles' => 12.0,
                                 'total' => 34.1,
                                 'car'   => [
                                     'id'    => 4,
                                     'make'  => 'Aston Martin',
                                     'model' => 'Vanquish',
                                     'year'  => 2018
                                 ]
                             ],
                             [
                                 'id'    => 3,
                                 'date'  => Carbon::now()->subDays(3)->format('m/d/Y'),
                                 'miles' => 6.8,
                                 'total' => 22.1,
                                 'car'   => [
                                     'id'    => 1,
                                     'make'  => 'Land Rover',
                                     'model' => 'Range Rover Sport',
                                     'year'  => 2017
                                 ]
                             ],
                             [
                                 'id'    => 4,
                                 'date'  => Carbon::now()->subDays(4)->format('m/d/Y'),
                                 'miles' => 5,
                                 'total' => 15.3,
                                 'car'   => [
                                     'id'    => 2,
                                     'make'  => 'Ford',
                                     'model' => 'F150',
                                     'year'  => 2014
                                 ]
                             ],
                             [
                                 'id'    => 5,
                                 'date'  => Carbon::now()->subDays(5)->format('m/d/Y'),
                                 'miles' => 10.3,
                                 'total' => 10.3,
                                 'car'   => [
                                     'id'    => 3,
                                     'make'  => 'Chevy',
                                     'model' => 'Tahoe',
                                     'year'  => 2015
                                 ]
                             ]
                         ]
                     ]
                 );
    }

    public function test_create_trip(): void
    {
        $response = $this->post(
            '/api/mock-add-trip',
            [
                'date'   => Carbon::now()->format('Y-m-d'),
                'car_id' => 8,
                'miles'  => 777.77,
            ]
        );

        $response->assertStatus(200);
    }
}
