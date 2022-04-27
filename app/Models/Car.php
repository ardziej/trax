<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'make',
        'model',
        'year',
        'user_id',
    ];

    protected $casts = [
        'make'    => 'string',
        'model'   => 'string',
        'year'    => 'integer',
        'user_id' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function trips(): HasMany
    {
        return $this->hasMany(Trip::class);
    }

    public function tripCount(): Attribute
    {
        return new Attribute(
            get: fn() => (int)$this->trips?->count(),
        );
    }

    public function tripMiles(): Attribute
    {
        return new Attribute(
            get: fn() => (float)$this->trips?->sum('miles'),
        );
    }
}
