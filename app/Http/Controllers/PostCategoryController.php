<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Post::paginate();
        return view('post_category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostCategory  $articleCategories
     * @return \Illuminate\Http\Response
     */
    public function show(PostCategory $articleCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostCategory  $articleCategories
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategory $articleCategories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostCategory  $articleCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostCategory $articleCategories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostCategory  $articleCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategory $articleCategories)
    {
        //
    }
}
