<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documents extends Model
{
    use HasFactory;

    protected $table = 'documents';
    protected $fillable = [

        'document_id', //سرشناسه
        'author', //عنوان و نام پدیدآور
        'collection', //مجموعه
        'replication_status', //وضعیت استنساخ
        'Replication_specification_note', //یادداشت مشخصات استنساخ **
        'language', // زبان
        'appearance_characteristics', //مشخصات ظاهری
        'notes_appearance', //یادداشت مشخصات ظاهری **
        'start_finish_version', //آغاز وانجام نسخه
        'general_note', //یادداشت کلی **
        'sources_work', //منابع اثر، نمایه ها، چکیده ها
        'uncontrolled_subjects', //موضوع های کنترل نشده
        'maintenance_center', //مرکز نگهدارنده
        'country',
        'city',
        'version_recovery_number',//شماره بازیابی نسخه
        'note', //یادداشت **
        'other', //اطلاعات اضافی**
        'image',

    ];
    public function Contacts()
    {
        return $this->belongsToMany(contacts::class, 'document_contacts' , 'document_id', 'contact_id' );
    }



}
