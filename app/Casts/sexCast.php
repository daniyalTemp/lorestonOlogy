<?php

namespace App\Casts;

use App\Casts\castHelpers\ObjectCreator;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class sexCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        switch ($value) {
            case 'male':
                return new ObjectCreator(1, 'male', 'مرد');
            case 'female':
                return new ObjectCreator(2, 'female', 'زن');
            default:
                return new ObjectCreator(-1, 'male', 'مرد');
        }
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value;
    }
}
