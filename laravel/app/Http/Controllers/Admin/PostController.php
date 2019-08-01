<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * @param Request $request
     * @param Post $posts
     * @return View
     */
    public function index(Request $request, Post $posts):View
    {
        return view('admin.posts.index',[
            'posts' => $posts->getAll($request),
        ]);
    }

    /**
     * @return View
     */
    public function create():View
    {
        return view('admin.posts.create',[
            'published_status' => config('config.models.published_status'),
        ]);
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Post $post)
    {
        $post->create(array_merge($request->all(),[
            'slug' => Str::slug($request->title),
            'user_id'=> auth()->user()->id,
            ]));
        return redirect()->route('admin.posts.index');
    }


    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function edit(Post $post):View
    {
        return view('admin.posts.edit',[
            'post' => $post,
            'published_status' => config('config.models.published_status'),
        ]);
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return redirect()->route('admin.posts.edit',[$post->slug]);
    }

    /**
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
       $post->delete();
       return redirect()->route('admin.posts.index');
    }
}
