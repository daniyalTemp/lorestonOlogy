<?php

namespace App\Models;

use App\Casts\contacttypeCast;
use App\Casts\sexCast;
use App\Casts\shamsiCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $fillable = [
        'Name',
        'bornIN',
        'email',
        'phone',
        'address',
        'image',
        'birthday',
        'type',
        'sex',
        'congrats',
        'interests',
        'other',
    ];


    public function Educations()
    {
    return $this->hasMany(education::class,'contact_id' , 'id');
    }
    public function Jobs()
    {
    return $this->hasMany(job::class,'contact_id' , 'id');
    }

    public function Papers()
    {
        return $this->belongsToMany(paper::class, 'paper_contact' , 'contact_id' , 'paper_id');

    }
    public function Books()
    {
        return $this->belongsToMany(book::class, 'book_contact' , 'contact_id' , 'book_id');

    }
    public function Documents()
    {
        return $this->belongsToMany(documents::class, 'document_contacts' , 'contact_id' , 'document_id');

    }
    protected $casts = [
        'birthday' => shamsiCast::class,
        'type'=>contacttypeCast::class,
        'sex'=>sexCast::class,
    ];
}
