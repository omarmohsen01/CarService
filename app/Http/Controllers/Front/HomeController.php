<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\SparePart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $best_sale_spare_parts=SparePart::orderBy('sold_out','desc')->take(10)->get();
        $latest_spare_parts=SparePart::latest()->take(2)->get();
        $best_posts=Post::orderBy('views','desc')->take(3)->get();
        // dd($latest_spare_parts);
        return view('front.home',compact('best_sale_spare_parts','latest_spare_parts','best_posts'));
    }
}
