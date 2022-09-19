<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Post  $article
     * @return \Illuminate\Http\Response
     */
    public function index(Post $article)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Post  $article
     * @return \Illuminate\Http\Response
     */
    public function create(Post $article)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $article
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $article)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $article
     * @param  \App\Models\PostComment  $articleComment
     * @return \Illuminate\Http\Response
     */
    public function show(Post $article, PostComment $articleComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $article
     * @param  \App\Models\PostComment  $articleComment
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $article, PostComment $articleComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $article
     * @param  \App\Models\PostComment  $articleComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $article, PostComment $articleComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $article
     * @param  \App\Models\PostComment  $articleComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $article, PostComment $articleComment)
    {
        //
    }
}
