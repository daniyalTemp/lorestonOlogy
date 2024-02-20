<?php

namespace App\Imports;

use App\Models\book;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class BookImport implements  ToModel
{

    public function model(array $row)
    {
        return new book([
            'uID' => $row[0],
            'title' => $row[1],
            'publication' => $row[2],
            'appearance' => $row[3],
            'frost' => $row[4],
            'ISBN' => $row[5],
            'notes' => $row[6],
            'contents' => $row[7],
            'other_title' => $row[8],
            'Issue' => $row[9],
            'AddedID' => $row[10],
            'congressClassification' => $row[11],
            'deweyClassification' => $row[12],
            'nationalBibliographyNumber' => $row[13],
            'year' => $row[14],
            'location' => $row[15],
            'image' => 'profile.png',

        ]);
    }
}
