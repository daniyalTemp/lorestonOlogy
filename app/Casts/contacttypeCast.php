<?php

namespace App\Casts;

use App\Casts\castHelpers\ContactType;
use App\Casts\castHelpers\ObjectCreator;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class contacttypeCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param array<string, mixed> $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {

        switch ($value) {
            case 'researcher':
                return new ObjectCreator(1, 'researcher', 'پژوهشگر');
            case 'researcher':
                return new ObjectCreator(2, 'causes_of_glory', 'مفاخر');
            case 'researcher':
                return new ObjectCreator(3, 'publisher', 'ناشر');
            case 'researcher':
                return new ObjectCreator(4, 'artist', 'هنرمند');
            default:
                return new ObjectCreator(-1, 'researcher', 'عادی');
        }

//        return $value;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param array<string, mixed> $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value;
    }
}
