<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class antiquitiesTypes extends Model
{
    use HasFactory;
    protected $table='antiquities_types';
    protected  $fillable=['name'];

    public function Antiquities()
    {
        return $this->hasMany(antiquitie::class , 'type_id' , 'id');
    }
}
