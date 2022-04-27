<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTripRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'date'   => 'required|date',
            'car_id' => 'required|integer',
            'miles'  => 'required|numeric|min:0',
        ];
    }
}
