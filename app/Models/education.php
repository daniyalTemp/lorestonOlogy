<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class education extends Model
{
    use HasFactory;


    protected $table = 'education';
    protected $fillable = [
        'grade',
        'major',
        'location',
        'uni',
        'year',
        'contact_id',
    ];

    public function Contact()
    {
        return $this->belongsTo(contacts::class , 'contact_id');
    }
}
