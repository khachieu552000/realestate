<?php

namespace App\Imports;

use App\Models\District;
use App\Models\Provinces;
use App\Models\Street;
use App\Models\Ward;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class LocationImport implements ToCollection
{
    public function collection(Collection $row)
    {
        foreach($row as $row) {
            if(!(Provinces::where('name',$row[0])->first())){
                $provinces = Provinces::create([
                    'name' => $row[0] ?? '',
                ]);
            }
            if(!(District::where('name',$row[1])->first())){
                $district = District::create([
                    'name' => $row[1] ?? '',
                    'provinces_id' =>Provinces::where('name',$row[0])->first()->id ?? $provinces->id,
                ]);
            }
            // if(!(Ward::where('name', $row[2])->first())){
                $ward = Ward::create([
                    'name'=> $row[2] ?? '',
                    'district_id' =>District::where('name',$row[1])->first()->id ?? $district->id,
                ]);
            // }
            // Street::created([
            //     'name' => $row[3] ?? '',
            //     'ward_id' => Ward::where('name',$row[2])->first()->id ?? $ward->id,
            // ]);
        }
    }
}
