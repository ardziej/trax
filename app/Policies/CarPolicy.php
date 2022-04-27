<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Car;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Car $car): bool
    {
        return $car->user_id === $user->id;
    }
}
