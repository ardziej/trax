<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\TripServiceInterface;
use App\Models\Trip;
use Illuminate\Support\Collection;

final class TripService implements TripServiceInterface
{
    public function getTripsByUserId(int $userId): Collection
    {
        return Trip::query()->where('user_id', $userId)->orderByDesc('id')->get();
    }

    public function createTrip(array $data): Trip
    {
        return Trip::create($data);
    }
}
