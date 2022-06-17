<?php

namespace App\Http\Controllers\Web\User;

use App\Models\Property;
use Illuminate\Http\Request;

trait SearchTrait
{
    public function searchs($request)
    {
        $query = Property::query();
        if($request->category){
            $query->where('categories_id', $request->category);
        }
        if($request->property_type){
            $query->where('property_type_id', $request->property_type);
        }
        if($request->acreage){
            if($request->acreage <= 100){
                $query = Property::where('acreage','<=', 100);
            }
            if($request->acreage > 100 && $request->acreage <= 200){
            $query->whereBetween('acreage', [$request->acreage,200]);
            }
            if($request->acreage >200 && $request->acreage <= 500){
            $query->whereBetween('acreage',[$request->acreage,500]);
            }
            if($request->acreage > 500){
                $query->where('acreage','>=', $request->acreage);
            }
        }

        if($request->price){
            if($request->price <=1000000000){
                $query = Property::where('price','<=', $request->price);
            }
            if($request->price >1000000000 && $request->price <= 3000000000){
                $query->whereBetween('price', [$request->price, 3000000000]);
            }
            if($request->price > 3000000000 && $request->price <= 7000000000){
                $query->whereBetween('price', [$request->price, 7000000000]);
            }
            if($request->price > 7000000000 && $request->price <= 10000000000){
                $query->whereBetween('price', [$request->price, 10000000000]);
            }
            if($request->price > 10000000000 && $request->price <= 20000000000){
                $query->whereBetween('price', [$request->price, 20000000000]);
            }
            if($request->price > 20000000000){
                $query->where('price', '>',$request->price);;
            }
        }
        return $query->get();
        // return view('user.layouts.search', compact('query'));
    }
}
