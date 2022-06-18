<?php

namespace App\Http\Controllers\Web\User;

use App\Models\Property;
use App\Models\Street;
use App\Models\Ward;
use Illuminate\Http\Request;
use Carbon\Carbon;

trait SearchTrait
{
    public function searchs($request)
    {
        $date = Carbon::now()->toDateString();
        $query = Property::query();
        if($request->category){
            $query->where('categories_id', $request->category)
            ->where('status', '!=', 'deactive')
            ->where('end_date', '>=', $date);
        }
        if($request->property_type){
            $query->where('property_type_id', $request->property_type)
            ->where('status', '!=', 'deactive')
            ->where('end_date', '>=', $date);
        }
        if($request->acreage){
            if($request->acreage <= 100){
                $query->where('acreage','<=', 100)
                ->where('status', '!=', 'deactive')
                ->where('end_date', '>=', $date);
            }
            if($request->acreage > 100 && $request->acreage <= 200){
            $query->whereBetween('acreage', [$request->acreage,200])
            ->where('status', '!=', 'deactive')
            ->where('end_date', '>=', $date);
            }
            if($request->acreage >200 && $request->acreage <= 500){
            $query->whereBetween('acreage',[$request->acreage,500])
            ->where('status', '!=', 'deactive')
            ->where('end_date', '>=', $date);
            }
            if($request->acreage > 500){
                $query->where('acreage','>=', $request->acreage)
                ->where('status', '!=', 'deactive')
                ->where('end_date', '>=', $date);
            }
        }

        if($request->price){
            if($request->price <=1000000000){
                $query->where('price','<=', $request->price)
                ->where('status', '!=', 'deactive')
                ->where('end_date', '>=', $date);
            }
            if($request->price >1000000000 && $request->price <= 3000000000){
                $query->whereBetween('price', [$request->price, 3000000000])
                ->where('status', '!=', 'deactive')
                ->where('end_date', '>=', $date);
            }
            if($request->price > 3000000000 && $request->price <= 7000000000){
                $query->whereBetween('price', [$request->price, 7000000000])
                ->where('status', '!=', 'deactive')
                ->where('end_date', '>=', $date);
            }
            if($request->price > 7000000000 && $request->price <= 10000000000){
                $query->whereBetween('price', [$request->price, 10000000000])
                ->where('status', '!=', 'deactive')
                ->where('end_date', '>=', $date);
            }
            if($request->price > 10000000000 && $request->price <= 20000000000){
                $query->whereBetween('price', [$request->price, 20000000000])
                ->where('status', '!=', 'deactive')
                ->where('end_date', '>=', $date);
            }
            if($request->price > 20000000000){
                $query->where('price', '>',$request->price)
                ->where('status', '!=', 'deactive')
                ->where('end_date', '>=', $date);
            }
        }

        if($request->street){
            $query->where('street_id',$request->street)
            ->where('status', '!=', 'deactive')
            ->where('end_date', '>=', $date);
        }
        return $query->get();
    }
}
