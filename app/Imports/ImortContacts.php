<?php

namespace App\Imports;

use App\Models\contacts;
use App\Models\education;
use App\Models\job;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class ImortContacts implements ToModel
{

    public function model(array $row)
    {
//        dd($row);
        if ($row[0] == 'ردیف')
            return;

//        dd($row);

        $newContact = contacts::create([
            'Name' => $row[1],
            'phone' => $row[9],
            'bornIN' => $row[6],
            'address' => $row[7],
            'birthday' => $row[5],
            'other' => $row[4],
//            'sex' => $row[10],
            'image' => 'profile.png',

        ]);

//        dd($newContact);
        if ($row[2] != null) {
            $this->createEducation($row, $newContact);
        }
        if ($row[8] != null) {
            $this->createJob($row, $newContact);
        }
//        return $newContact;

    }

    protected function createEducation($data, $contact)
    {
        education::create([
            'grade' => $data[2],
            'major' => $data[3]?$data[3]:'نامشخص',
            'year' => 'نامشخص',
            'uni' => 'نامشخص',
            'location' => 'نامشخص',
            'contact_id' => $contact->id,
        ]);
    }

    protected function createJob($data, $contact)
    {
        job::create([
            'position' => $data[8],
            'duration' => 'نامشخص',
            'city' => 'نامشخص',
            'location' => 'نامشخص',
            'contact_id' => $contact->id,
        ]);
    }


}
