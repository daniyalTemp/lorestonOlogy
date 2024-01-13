<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;
    protected $table='jobs';
    protected $fillable=[
        'location',
        'position',
        'duration',
        'city',
        'contact_id',
    ];

    public function Contact()
    {
        return $this->belongsTo(contacts::class , 'contact_id');
    }

}
