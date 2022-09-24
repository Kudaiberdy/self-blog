<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    public function index()
    {
        $categories = PostCategory::paginate();

        return view('post_category.index', compact('categories'));
    }

    public function create()
    {
        $category = new PostCategory();

        return view('post_category.create', compact('category'));
    }

    public function store(Request $request)
    {
        $date = $this->validate($request, [
            'name' => 'required|unique:post_categories|max:100',
            'description' => 'required|min:10',
        ]);
        $category = new PostCategory();
        $category->fill($date);
        $category->save();


        return redirect()
            ->route('post_categories.index')
            ->with('status', 'The category has been successfully created');
    }

    /**
     * @param $categoryId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($categoryId)
    {
        $category = PostCategory::findOrFail($categoryId);

        return view('post_category.show', compact('category'));
    }

    /**
     * @param $categoryId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($categoryId)
    {
        $category = PostCategory::findOrFail($categoryId);

        return view('post_category.edit', compact('category'));
    }

    /**
     * @param Request $request
     * @param string $categoryId
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, string $categoryId)
    {
        $category = PostCategory::findOrFail($categoryId);
        $data = $this->validate($request, [
            'name' => 'required|unique:post_categories,name,' . $category->id,
            'description' => 'required|min:10',
        ]);

        $category->fill($data);
        $category->save();

        return redirect()
            ->route('post_categories.show', $categoryId)
            ->with('status', 'The category has been successfully updated');
    }

    /**
     * @param PostCategory $category
     * @return void
     */
    public function destroy(PostCategory $category)
    {
        //
    }
}
