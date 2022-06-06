<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Property;
use App\Models\PropertyType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function Home(){
        $date = Carbon::now()->toDateString();
        $property = Property::where('status','!=', 'deactive')
        ->where('end_date','>=',$date)->paginate(5,['*'],'pag');
        return view('user.index', compact('property'));
    }

    public function showContact(){
        return view('user.contact');
    }

    public function showAbout(){
        return view('user.about');
    }

    public function showProperty($id_category){
        $date = Carbon::now()->toDateString();
        $property = Property::where('categories_id', $id_category)
        ->where('status','!=', 'deactive')
        ->where('end_date','>=',$date)->paginate(8,['*'],'pag');
        $category = Category::find($id_category);
        return view('user.list-property',compact('property', 'category'));
    }

    public function showAuction($id_property_type){
        $property = Property::where('property_type_id', $id_property_type)
        ->where('status','active')
        ->get();
        return view('user.list-auction', compact('property'));
    }

    public function showPropertyDetail(){
        return view('user.property-detail');
    }
}
