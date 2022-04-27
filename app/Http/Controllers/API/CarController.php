<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreCarRequest;
use App\Http\Resources\CarResource;
use App\Interfaces\CarServiceInterface;
use Illuminate\Http\JsonResponse;

class CarController extends Controller
{
    public function __construct(public readonly CarServiceInterface $carService)
    {
    }

    public function index(): JsonResponse
    {
        $carsResourceCollection = CarResource::collection($this->carService->getCarsByUserId(1));

        return $this->successResponse(data: $carsResourceCollection->resolve());
    }

    public function store(StoreCarRequest $request): JsonResponse
    {
        $carResource = new CarResource(
            $this->carService->createCar([...$request->validated(), 'user_id' => request()->user()->id])
        );

        return $this->successResponse(data: $carResource->resolve(), code: 201);
    }

    public function show(int $carId): JsonResponse
    {
        $car = $this->carService->getCarById($carId);

        if ( ! $car) {
            return $this->errorResponse(404, 'Not found.');
        }

        $carResource = (new CarResource($car))->withTripData();

        return $this->successResponse(data: $carResource->resolve());
    }

    public function destroy(int $carId): JsonResponse
    {
        $deleteCar = $this->carService->deleteCarById(carId: $carId, userId: request()->user()->id);

        if ( ! $deleteCar) {
            return $this->errorResponse(code: 403, message: 'Not deleted.');
        }

        return $this->successResponse(code: 204);
    }
}
