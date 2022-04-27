<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Car;
use App\Interfaces\CarServiceInterface;
use Illuminate\Support\Collection;

final class CarService implements CarServiceInterface
{
    public function getCarById(int $carId): ?Car
    {
        return Car::find($carId);
    }

    public function getCarsByUserId(int $userId): Collection
    {
        return Car::query()->where('user_id', $userId)->orderByDesc('id')->get();
    }

    public function createCar(array $data): Car
    {
        return Car::create($data);
    }

    public function deleteCarById(int $carId, ?int $userId = null): bool
    {
        $deleteQuery = Car::query()->where('id', $carId);

        if ($userId) {
            $deleteQuery->where('user_id', $userId);
        }

        return $deleteQuery->delete() > 0;
    }
}
