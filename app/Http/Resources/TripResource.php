<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class TripResource extends JsonResource
{
    public function toArray($request): array|Arrayable|JsonSerializable
    {
        return [
            'id'    => $this->id,
            'date'  => $this->date->format('m/d/Y'),
            'miles' => $this->miles,
            'total' => $this->total,
            'car'   => CarResource::make($this->car),
        ];
    }
}
