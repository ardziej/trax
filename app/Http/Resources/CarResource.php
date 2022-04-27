<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class CarResource extends JsonResource
{
    protected bool $withTripData = false;

    public function withTripData(): self
    {
        $this->withTripData = true;

        return $this;
    }

    public function toArray($request): array|Arrayable|JsonSerializable
    {
        $data = [
            'id'    => $this->id,
            'make'  => $this->make,
            'model' => $this->model,
            'year'  => $this->year
        ];

        if ($this->withTripData) {
            $data = [...$data, 'trip_count' => $this->trip_count, 'trip_miles' => $this->trip_miles];
        }

        return $data;
    }
}
