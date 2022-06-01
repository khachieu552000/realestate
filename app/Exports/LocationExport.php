<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Provinces;

class LocationExport implements FromView
{

    // public function headings():array{
    //     // $location = Provinces::with('district.ward')->get();
    //     return [
    //         'id',
    //         'Tỉnh/Thành phố',
    //         'Quận/Huyện',
    //         'Phường/Xã',
    //     ];
    // }

    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {

    // }
    public function view(): View
    {
           $location = Provinces::with('district.ward')->get();
        return view('admin.location.export',compact('location'));
    }
}
