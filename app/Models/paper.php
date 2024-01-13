<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paper extends Model
{
    use HasFactory;
    protected $table='papers';
    protected $fillable=[
        'title',
        'publication',
        'magazine',
        'magazineRate',
        'year',
        'image',
    ];

    public function Contacts()
    {
        return $this->belongsToMany(contacts::class, 'paper_contact' , 'paper_id', 'contact_id' );
    }
}
