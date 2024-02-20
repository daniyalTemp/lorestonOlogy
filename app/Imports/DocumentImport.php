<?php

namespace App\Imports;

use App\Models\documents;
use App\Models\paper;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class DocumentImport implements ToModel
{

    public function model(array $row)
    {
        return new documents([


            'document_id' => $row[0], //سرشناسه
            'author' => $row[1], //عنوان و نام پدیدآور
            'collection' => $row[2], //مجموعه
            'replication_status' => $row[3], //وضعیت استنساخ
            'Replication_specification_note' => $row[4], //یادداشت مشخصات استنساخ **
            'language' => $row[5], // زبان
            'appearance_characteristics' => $row[6], //مشخصات ظاهری
            'notes_appearance' => $row[7], //یادداشت مشخصات ظاهری **
            'start_finish_version' => $row[8], //آغاز وانجام نسخه
            'general_note' => $row[9], //یادداشت کلی **
            'sources_work' => $row[10], //منابع اثر، نمایه ها، چکیده ها
            'uncontrolled_subjects' => $row[11], //موضوع های کنترل نشده
            'maintenance_center' => $row[12], //مرکز نگهدارنده
            'country' => $row[13],
            'city' => $row[14],
            'version_recovery_number' => $row[14],//شماره بازیابی نسخه
            'note' => $row[15], //یادداشت **
            'image' => 'profile.png',

        ]);
    }
}
