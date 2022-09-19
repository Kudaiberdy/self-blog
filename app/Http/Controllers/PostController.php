<?php

namespace App\Http\Controllers;

use App\Models\{
    Post,
    PostCategory,
    PostComment
};
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @return array
     */
    private function getArticleCategory(): array
    {
        $keys = PostCategory::select('id')->get()->map(fn($item) => $item->id)->all();
        $names = PostCategory::select('name')->get()->map(fn($item) => $item->name)->all();
        return array_combine($keys, $names);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        dump($query);
        $posts = $query ? Post::where('name', 'like', "%{$query}%")->paginate() : Post::paginate();
        return view('post.index', compact('posts', 'query'));
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
     * @param  \App\Models\Post  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Post $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $article)
    {
        //
    }
}
