<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function index()
    {
        if(Auth::user() && Auth::user()->brand_id!=null){
            $post_brnad = Post::where('brand_id', Auth::user()->brand_id)
            ->orderBy('views', 'desc')
            ->paginate(8);

            if (!$post_brnad->isEmpty()) {
                $remainingPost = Post::where('brand_id', '!=', Auth::user()->brand_id)
                    ->orderBy('views', 'desc')
                    ->paginate(8);

                $posts = $post_brnad->merge($remainingPost);
            } else {
                $posts = Post::where('brand_id', '!=', Auth::user()->brand_id)
                    ->orderBy('views', 'desc')
                    ->paginate(8);
            }
        }else{
            $posts=Post::orderBy('views', 'desc')
            ->paginate(8);
        }
        return view('front.posts',compact('posts'));
    }

    public function show($id)
    {
        $post=Post::findOrFail($id);
        return view('front.post-details',compact('post'));
    }

    public function comment($id,Request $request)
    {
        $post=Post::find($id);
        Comment::create([
            'content'=>$request->content,
            'user_id'=>Auth::user()->id,
            'post_id'=>$post->id
        ]);
        return redirect()->back();
    }
}
