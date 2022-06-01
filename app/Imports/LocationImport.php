<?php

namespace App\Imports;

use App\Models\District;
use App\Models\Provinces;
use App\Models\Ward;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class LocationImport implements ToCollection
{
    public function collection(Collection $row)
    {
        foreach($row as $row){
            Provinces::create([
                'name' => $row[0],
            ]);
            District::create([
                'name' => $row[1],
            ]);
            Ward::create([
                'name'=> $row[2],
            ]);
        }
    }
}
