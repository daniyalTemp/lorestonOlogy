<?php

namespace App\Imports;

use App\Models\paper;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class PaperImport implements ToModel
{

    public function model(array $row)
    {
        return new paper([
            'title' => $row[0],
            'publication' => $row[1],
            'magazine' => $row[2],
            'magazineRate' => $row[3],
            'year' => $row[4],
            'image' => 'profile.png',

        ]);
    }
}
