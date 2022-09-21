<?php

namespace App\Http\Controllers;

use App\Models\{
    Post,
    PostCategory,
    PostComment
};
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * @return array
     */
    private function getPostsCategories(): array
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
        $posts = $query ? Post::where('title', 'like', "%{$query}%")->paginate() : Post::paginate();

        return view('post.index', compact('posts', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $postsCategories = $this->getPostsCategories();

        return view('post.create', compact('post', 'postsCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required|unique:posts|max:200',
            'content' => 'required|min:10',
            'category_id' => [
                Rule::in(array_keys($this->getPostsCategories())),
            ],
        ]);

        $post = new Post();
        $post->fill($data);
        $post->save();

        return redirect()
            ->route('posts.index')
            ->with('status', 'The post has been successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $article
     * @return \Illuminate\Http\Response
     */
    public function show($postId)
    {
        $post = Post::findOrFail($postId);

        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $postsCategories = $this->getPostsCategories();

        return view('post.edit', compact('post', 'postsCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $postId)
    {
        $post = PostCategory::findOrFail($postId);
        $data = $this->validate($request, [
            'title' => 'required|unique:posts,title,' . $post->id,
            'content' => 'required|min:10',
            'category_id' => [
                Rule::in(array_keys($this->getPostsCategories())),
            ],
        ]);

        dump($data);
        $post = new Post();
        $post->fill($data);
        $post->save();

        return redirect()
            ->route('posts.index')
            ->with('status', 'The post has been successfully updated');
    }

    public function destroy(Post $post)
    {
        dump($post->id);
//        if ($post) {
//            $post->delete();
//        }

        return redirect()
            ->route('posts.index')
            ->with('status', 'The post has been successfully deleted');
    }
}
