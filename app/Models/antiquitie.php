<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class antiquitie extends Model
{
    use HasFactory;

    protected $table='antiquities';
    protected $fillable = [
        'name',
        'address',
        'nationalRegistrationNumber',
        'nationalRegistrationDate',
        'text',
        'type_id',
    ];

    public function Types()
    {
        return $this->hasMany(antiquitiesTypes::class,'id');

    }

}
