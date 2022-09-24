<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
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
    private function getPostCategories(): array
    {
        $keys = PostCategory::select('id')->get()->map(fn($item) => $item->id)->all();
        $names = PostCategory::select('name')->get()->map(fn($item) => $item->name)->all();

        return array_combine($keys, $names);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        $posts = $query ? Post::where('title', 'like', "%{$query}%")->paginate() : Post::paginate();

        return view('post.index', compact('posts', 'query'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $post = new Post();
        $postCategories = $this->getPostCategories();

        return view('post.create', compact('post', 'postCategories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required|unique:posts|max:200',
            'content' => 'required|min:10',
            'category_id' => [
                Rule::in(array_keys($this->getPostCategories())),
            ],
        ]);

        if ($request->hasFile('image')) {
            $data['img_path'] = $request->file('image')->store('posts_images');
        }
        $post = new Post();
        $post->fill($data);
        $post->save();

        return redirect()
            ->route('posts.index')
            ->with('status', 'The post has been successfully created');
    }

    /**
     * @param $postId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($postId)
    {
        $post = Post::findOrFail($postId);
        $comments = PostComment::where('post_id', $postId)->get();

        return view('post.show', compact('post', 'comments'));
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Post $post)
    {
        $postCategories = $this->getPostCategories();

        return view('post.edit', compact('post', 'postCategories'));
    }

    /**
     * @param Request $request
     * @param $postId
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $postId): \Illuminate\Http\RedirectResponse
    {
        $post = Post::findOrFail($postId);
        $data = $this->validate($request, [
            'title' => 'required|max:200|unique:posts,title,' . $post->id,
            'content' => 'required|min:10',
            'category_id' => [
                Rule::in(array_keys($this->getPostCategories())),
            ],
        ]);

        $post->fill($data);
        $post->save();

        return redirect()
            ->route('posts.show', $postId)
            ->with('status', 'The post has been successfully updated');
    }

    /**
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post): \Illuminate\Http\RedirectResponse
    {
        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('status', 'The post has been successfully deleted');
    }
}
