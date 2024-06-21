<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\SparePart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user() && Auth::user()->brand_id!=null){
            $bestSale = SparePart::where('brand_id', Auth::user()->brand_id)
            ->orderBy('sold_out', 'desc')
            ->take(10)
            ->get();

            if (!$bestSale->isEmpty()) {
                $remainingSpareParts = SparePart::where('brand_id', '!=', Auth::user()->brand_id)
                    ->orderBy('sold_out', 'desc')
                    ->take(10 - $bestSale->count())
                    ->get();
                $best_sale_spare_parts = $bestSale->merge($remainingSpareParts);
            } else {
                $best_sale_spare_parts = SparePart::where('brand_id', '!=', Auth::user()->brand_id)
                    ->orderBy('sold_out', 'desc')
                    ->take(10)
                    ->get();
            }
            $latest_spare_parts=SparePart::where('brand_id', Auth::user()->brand_id)->latest()->take(2)->get();
            if (!$latest_spare_parts->isEmpty()) {
                $remainingSparePartsLatest = SparePart::where('brand_id', '!=', Auth::user()->brand_id)
                    ->latest()
                    ->take(10 - $latest_spare_parts->count())
                    ->get();
                $latest_spare_parts = $latest_spare_parts->merge($remainingSparePartsLatest);
            } else {
                $latest_spare_parts = SparePart::where('brand_id', '!=', Auth::user()->brand_id)
                    ->latest()
                    ->take(10)
                    ->get();
            }

        }else{
            $best_sale_spare_parts=SparePart::orderBy('sold_out','desc')->take(10)->get();
            $latest_spare_parts=SparePart::latest()->take(2)->get();
        }
        $best_posts=Post::orderBy('views','desc')->take(3)->get();
        // dd($latest_spare_parts);
        return view('front.home',compact('best_sale_spare_parts','latest_spare_parts','best_posts'));
    }
}
