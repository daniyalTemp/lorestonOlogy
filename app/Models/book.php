<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable=[
        'uID',
        'title',
        'publication',
        'appearance',
        'frost',
        'ISBN',
        'notes',
        'contents',
        'other_title',
        'Issue',
        'AddedID',
        'congressClassification',
        'deweyClassification',
        'nationalBibliographyNumber',
        'year',
        'location',
        'image',
    ];
    public function Contacts()
    {
        return $this->belongsToMany(contacts::class, 'book_contact' , 'book_id', 'contact_id' );
    }
}
