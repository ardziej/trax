<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreTripRequest;
use App\Http\Resources\TripResource;
use App\Interfaces\TripServiceInterface;
use Illuminate\Http\JsonResponse;

class TripController extends Controller
{
    public function __construct(public readonly TripServiceInterface $tripService)
    {
    }

    public function index(): JsonResponse
    {
        $tripsResourceCollection = TripResource::collection(
            $this->tripService->getTripsByUserId(1)
        );

        return $this->successResponse(data: $tripsResourceCollection->resolve());
    }

    public function store(StoreTripRequest $request): JsonResponse
    {
        $tripsResource = new TripResource(
            $this->tripService->createTrip([...$request->validated(), 'user_id' => 1])
        );

        return $this->successResponse(data: $tripsResource->resolve(), code: 201);
    }
}
