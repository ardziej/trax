<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Models\Car;
use Illuminate\Support\Collection;

interface CarServiceInterface
{
    public function getCarById(int $carId): ?Car;

    public function getCarsByUserId(int $userId): Collection;

    public function createCar(array $data): Car;

    public function deleteCarById(int $carId): bool;
}
