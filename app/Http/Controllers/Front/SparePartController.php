<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\SparePart;
use Illuminate\Http\Request;

class SparePartController extends Controller
{
    public function index(Request $request)
    {
        $spare_parts=SparePart::frontFilter($request->query())->paginate($request->paginate);
        $brands=Brand::all();
        return view('front.spare-parts',compact('spare_parts','brands'));
    }

    public function show($id)
    {
        $spare_part=SparePart::find($id);
        // dd($id);
        return view('front.spare-part-details',compact('spare_part'));
    }
}
