<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Models\Trip;
use Illuminate\Support\Collection;

interface TripServiceInterface
{
    public function getTripsByUserId(int $userId): Collection;

    public function createTrip(array $data): Trip;
}
