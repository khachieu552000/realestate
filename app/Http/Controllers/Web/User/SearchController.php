<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if($request->provinces){
            // $property = Property
        }
        return view('user.layouts.search');
    }
}
