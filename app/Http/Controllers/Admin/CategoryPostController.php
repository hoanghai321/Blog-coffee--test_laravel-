<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryPost = CategoryPost::all();
        return view('Admin.category.create', compact('categoryPost'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CategoryPost $categoryPost)
    {
        $request->validate([
            'title' => 'required'
        ]);
        
        $categoryPost->create($request->all());
        return redirect()->back()->with('msg', 'Add new successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoryPost = CategoryPost::find($id);
        return view('Admin.category.show', compact('categoryPost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryPost $categoryPost)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryPost $categoryPost, $id)
    {
        $categoryPost->find($id)->update($request->all());
        return redirect()->back()->with('msg', 'Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryPost $categoryPost, $id)
    {
        $categoryPost->find($id)->delete();
        return redirect()->back()->with('msg', 'Delete successfully.');
    }
}
