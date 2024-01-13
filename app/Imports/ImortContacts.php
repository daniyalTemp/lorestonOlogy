<?php

namespace App\Imports;

use App\Models\contacts;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class ImortContacts implements ToModel
{

    public function model(array $row)
    {
        return new contacts([
            'firstName' =>$row[0],
            'lastName'=>$row[1],
            'email'=>$row[2],
            'phone'=>$row[3],
            'address'=>$row[4],
            'birthday'=>$row[5],
            'type'=>$row[7],
            'sex'=>$row[6],
            'image'=>'profile.png',

        ]);
    }
}
