<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $brands=Brand::all();
        $users=User::all();
        $posts = Post::orderBy("created_at","desc")->filter($request->query())->paginate(10);
        return view("dashboard.post.index", compact(["posts","users","brands"]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Post::findOrFail($id);
        try{
            $post->delete();
            return redirect()->route("dashboard.posts.index")
                ->with("success","Post Deleted Successfully");
        }catch(\Exception $e){
            return redirect()->route("dashboard.posts.index")
                ->with("fail","Something Went Wrong");
            throw $e;
        }
    }
}
