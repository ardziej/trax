<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'miles',
        'car_id',
        'user_id',
    ];

    protected $casts = [
        'date'    => 'datetime',
        'miles'   => 'float',
        'car_id'  => 'integer',
        'user_id' => 'integer',
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function date(): Attribute
    {
        return new Attribute(
            set: fn($value) => Carbon::parse($value),
        );
    }

    public function total(): Attribute
    {
        return new Attribute(
            get: fn() => (float)$this->user?->trips()->where('date', '<=', $this->date)?->sum('miles'),
        );
    }
}
