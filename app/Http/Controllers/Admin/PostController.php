<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryPost;
use App\Models\Post;
use GrahamCampbell\ResultType\Success;
use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::with('category')->get();
        return view('Admin.posts.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryPost = CategoryPost::all();
        return view('Admin.posts.create', compact('categoryPost'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'image' => 'required|image|mimes:jpg,png,gif',
        //     'short_desc' => 'required',
        //     'desc' => 'required',
        // ]);

        $img = $request->image->getClientOriginalName();
        $request->image->move(public_path('images/post'), $img);
        
        $post->create([
            'title' => $request->title,
            'image' => $img,
            'short_desc' => $request->short_desc,
            'desc' => $request->desc,
            'post_category_id' => $request->post_category_id
        ]);
        return redirect()->back()->with('msg', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
