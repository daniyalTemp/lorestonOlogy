<?php

namespace App\Casts;

use Hekmatinasser\Verta\Verta;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class shamsiCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param array<string, mixed> $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return (verta($value)->format('Y/m/d'));

    }

    /**
     * Prepare the given value for storage.
     *
     * @param array<string, mixed> $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return (Verta::parseFormat('Y/m/d', $value)->toCarbon()->format('Y.m.d'));
//        return $value;
    }
}
